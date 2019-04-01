<?php 
namespace JanKlod\Routing;

use JanKlod\Common\Url;


/**
 * @package JanKlod\Routing\RouteObject 
*/ 
class RouteObject implements RouteObjectInterface
{
        
        
        /**
         * route path
         * @var string
        */
        private $path;

        
        /**
         * @var mixed
        */
        private $callback;



        /**
         * named route
         * @var string
        */
        private $name;


        /**
         * @var string
        */
        private $method;

         
        
        /**
         * Container named routes
         * @var array
         */
        private static $namedRoutes = [];

        
        /**
         * Not found path
         * @var string
        */
        private static $notFound;


        /**
         * Regex param [':id' => '[0-9]+']
         * @var array
         */
        private $params = [];



        /**
         * @var array
        */
        private $matches = [];


        
        /**
         * Constructor
         * @param string $path 
         * @param mixed $callback 
         * @param string $name 
         * @param string $method 
         * @return void
        */
        public function __construct($path, $callback, $name, $method = 'GET')
        {
              $this->setPath($path);
              $this->setCallback($callback);
              $this->setName($name);
              $this->setMethod($method);
        }

        
        
        /**
         * Match path
         * @return type
        */
        public function match($url)
        {
             $url = RouteManager::preparePath($url);
             // $path = $this->replaceParams('#:([\w]+)#');
             $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
             $regex = sprintf("#^%s$#i", $path);

             if(!RouteManager::isMatched($regex, $url))
             {
                   return false;
             }
             
             $matches = RouteManager::getMatches($regex, $url);
             array_shift($matches);
             $this->matches = $matches;
             return true;
        }


        /**
         * Callback
         * @param ContainerInterface $app 
         * @return type
        */
        public function call($app)
        {
            return new Dispatcher($this->callback, $this->matches, $app);
        }


        /**
          * Filter route
          * @return void
        */
        public function filter()
        {
               if(is_string($this->callback) && $this->name === null)
               {
                    $this->name = $this->callback;

               }

               if($this->name)
               {
                    self::$namedRoutes[$this->name] = $this;
               }
         }


        /**
          * add not found
          * @param type $path 
          * @return type
        */
        public static function notFound($path)
        {
             self::$notFound = $path;
        }

        
        /**
         * Get not found route
         * @return string
        */
        public static function getNotFound()
        {
              return self::$notFound;
        }


        
        /**
          * set param / add regex for url
          * 
          * Route::get('/', 'HomeController@index', 'welcome.page')
          *        ->with(':id', '[0-9]+')
          *        ->with(':slug', '[a-z\-0-9]+');
          * 
          * @param type $param 
          * @param type $regex 
          * @return RouteObject
        */
         public function with($param, $regex): self
         {
               $this->params[$param] = RouteManager::prepareParams($regex);
               return $this;
         } 

       

         /**
            * Generate named route
            * @param string $name 
            * @param array $params 
            * @return string
            */
          public static function url($name, $params = [])
          {
               if(!isset(self::$namedRoutes[$name]))
               {
                   return Url::to($name, $params);
               }

               return self::$namedRoutes[$name]->getUrl($params);
          }



         /**
           * Set route path
           * @param string $path 
           * @return void
        */
         public function setPath($path)
         {
              $this->path = $path; // RouteManager::prepareRoute($path);
         }


         /**
           * Get route path
           * @return string
         */
         public function getPath()
         {
              return $this->path;
         }


         /**
           * Set callback
           * @param mixed $callback 
           * @return void
         */
         public function setCallback($callback)
         {
              $this->callback = $callback;
         }


        /**
           * Get callback
           * @return mixed
        */
         public function getCallback()
         {
              return $this->callback;
         }

        
          /**
            * Set name
            * @param string $name 
            * @return void
          */
          public function setName($name)
          {
               $this->name = $name;
          }


         /**
         * Get name
         * @return string
         */
         public function getName()
         {
              return $this->name;
         }


        /**
         * Set method
         * @param string $method 
         * @return void
        */
        public function setMethod($method)
        {
              $this->method = $method;
        }


        /**
         * Get name
         * @return string
        */
        public function getMethod()
        {
              return $this->method;
        }
        
        /**
          * Replace param in path
          * @param string $replace 
          * @param callable $callback 
          * @return string
          */
         private function replaceParams($replace)
         {
              return preg_replace_callback($replace, [$this, 'paramMatch'], $this->path);
         }


         /**
          * Return match param
          * @param string $match 
          * @return string 
        */
         private function paramMatch($match)
         {
               if(isset($this->params[$match[1]]))
               {
                    return '('. $this->params[$match[1]] . ')';
               }
               return '([^/]+)';
         }


        /**
          * Get Url
          * @param array $params 
          * @return string
        */
        private function getUrl($params)
        {
              $path = $this->getPath();

              foreach($params as $k => $v)
              {
                  $path = str_replace(":$k", $v, $path);
              } 

              return $path;
        }

}