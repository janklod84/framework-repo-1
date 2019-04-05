<?php 
namespace JanKlod\Routing;


/**
 * @package Router
*/
class Router implements RouterInterface
{
         
         
         /**
          * @var \JanKlod\Container\ContainerInterface  
         */
         private $app;



         /**
          * @var array
         */
         private $routes;


         /**
          * @var ResponseInterface
         */
         private $response;


  	     /**
  	      * Constructor app
  	      * @param \JanKlod\Container\ContainerInterface $app 
  	      * @return void
  	     */
  	     public function __construct($app)
  	     {
  	           $this->app = $app;
               $this->routes = RouteCollection::all();
               $this->response = $this->app->get('response');
  	     }

        
         /**
          * Dispatching routes
          * $this->routes['GET'] / $this->routes['POST']
          * @return mixed
         */
         public function dispatch()
         {
              if(!$this->matchedRoute())
              {
                   $this->errorCode(); 
              }
              
              foreach($this->matchedRoute() as $routeObject)
              {
                    if($routeObject->match($this->uri()))
                    {
                        return (string) $routeObject->call($this->app);
                         
                    }
              }
              $this->errorCode(); 
         }


         /**
          * Get not found page with status
          * $this->response->redirect(RouteObject::getNotFound());
          * @return void
         */
         private function notFound()
         {
              $this->response->redirect(RouteObject::getNotFound());
         }

         
         /**
          * set error code and load view
          * @param int $code 
          * @return string
          */
         private function errorCode($code = 404)
         {
              return $this->app->view->errorCode($code);
         }



         /**
          * Determine current request method
          * @return string
          */
         private function currentMethod()
         {
              return $this->app->get('request')->method();
         }

         
         /**
          * Get uri from URL
          * @return string
          */
         private function uri()
         {
              return $this->app->get('request')->uri();
         }

         
         /**
          * Get query string from URL
          * true => signify rtim($queryString, '/')
          * @return type
        */
         private function queryString()
         {
            $qstring = $this->app->request 
                                 ->queryString(true);

            return self::removeQueryString($qstring);
         }
         
         /**
          * Find Matched routes by request Method
          * Can use this RouteCollection::find('GET')
          * This method return collection routes
          * 
          * @return array
         */
         private function matchedRoute()
         {
                return $this->routes[$this->currentMethod()];
         }


        /**
         * Remove Query String
         * @param string $url [Request uri]
         * @return string
       */
        protected static function removeQueryString($url) 
        {
            if($url)
            {
                $params = explode('&', $url, 2);

                if(false === strpos($params[0], '='))
                {
                    return rtrim($params[0], '/');

                }else{

                    return '';
                }
            }
        }
         

}