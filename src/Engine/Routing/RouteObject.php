<?php 
namespace JanKlod\Routing;

use JanKlod\Common\Url;


/**
 * Class 'll be To Refactoring!
 * 
 * @package JanKlod\Routing\RouteObject 
*/ 
class RouteObject implements RouteObjectInterface
{
        
        /**
         * @var string
        */
        private $path;

        
        /**
         * @var mixed
        */
        private $callback;


        /**
         * given name of route
         * @var string 
        */ 
        private $name;


        /**
         * method request
         * @var string 
        */ 
        private $requestMethod = 'GET';
        

        
        /**
         * @var params
        */
        private $params = [];


        /**
         * matches params
         * @var array
        */
        private $matches = [];
        
        
        /**
         * contains named routes
         * @var array
        */
        private static $namedRoutes = [];
        


        /**
         * path not found page
         * @var string
         */
        private static $notFound;

        
        
        /**
         * Constructor
         * @param string $path 
         * @param string|\Closure $callback 
         * @param string $name 
         * @param string $method 
         * @return void
        */
	      public function __construct($path, $callback, $name, $requestMethod)
	      {
               $this->setPath($path);
               $this->setCallback($callback);
               $this->setName($name);
               $this->setMethod($requestMethod);
	      }


        /**
          * Filter route
          * @return void
         */
         public function filter()
         {
               if(is_string($this->callback) && $this->name === null)
               {
                    $this->setName($this->callback);
               }

               if($this->name)
               {
                    $this->addNamedRoute($this->name, $this);
               }

         }


        /**
          * Set route path
          * @param string $path 
          * @return void
        */
         public function setPath($path)
         {
              $this->path = RouteManager::prepareUrl($path);
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
         public function setMethod($requestMethod)
         {
              $this->requestMethod = $requestMethod;
         }


         /**
          * Get requet method
          * @return type
         */
         public function getMethod()
         {
               return $this->requestMethod;
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
           * Get not found page
           * @return string
          */
          public static function getNotFound()
          {
               return self::$notFound;
          }

        
           /**
            * Determine if current uri match route
            * @param string $url 
            * @return bool
           */
           public function match($url)
           {
                 $url = RouteManager::prepareUrl($url);
                 $path = $this->replaceParams('#:([\w]+)#');
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
              * callback
              * @return 
             */
             public function call($app)
             {
                  return (new Dispatcher($this->callback, $this->matches, $app))->call();
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
                  if(!self::hasNamedRoute($name))
                  {
                      return Url::to($name, $params);
                  }

                  return self::findNamedRoute($name)->getUrl($params);
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



             /**
              * Add Named Route
              * @param string $name 
              * @param RouteObject $routeObject 
              * @return void
             */
             private static function addNamedRoute($name, $routeObject)
             {
                   self::$namedRoutes[$name] = $routeObject;
             }
         

             /**
              * Get named Route
              * @param type $name 
              * @return type
             */
             private static function findNamedRoute(string $name)
             {
                  return self::$namedRoutes[$name] ?? new \stdClass();
             }
             
           
             /**
              * Determine if has named route
              * @param string $name 
              * @return bool
             */
             private static function hasNamedRoute(string $name): bool
             {
                   return isset(self::$namedRoutes[$name]);
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
        
}