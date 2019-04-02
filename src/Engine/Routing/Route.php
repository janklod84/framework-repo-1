<?php 
namespace JanKlod\Routing;


use Closure;


/**
 * @package JanKlod\Routing\Route
*/
class Route 
{
    
         /**
          * Add Routes by method GET
          * @param string $path 
          * @param string|callable $callback 
          * @param string $name 
          * @return RouteObject
         */
         public static function get(string $path, $callback, string $name = null) 
         {
                return self::add($path, $callback, $name, $method = 'GET');
         }


         /**
           * Add Routes by method POST
           * @param string $path 
           * @param string|callable $callback 
           * @param string $name 
           * @return RouteObject
        */
         public static function post(string $path, $callback, string $name = null)
         {
              return self::add($path, $callback, $name, $method = 'POST');
         }

         
         /**
          * Description
          * @param array $options ['prefix', 'controller', ...]
          * @param \Closure $callback 
          * @return RouteObject
         */
         public static function group(array $options, Closure $callback) {}



         /**
          * Add Routes by format CRUD MORE Advance [ CREATE READ UPDATE DELETE] 
          * 
          * @param string $path 
          * @param string|callable $callback 
          * @return mixed
         */
         public static function package($path, $callback) {}
		 
		 
		 
		 /**
          * Add Routes by format CRUD [ CREATE READ UPDATE DELETE]
          * @param string $path 
          * @param string|callable $callback 
          * @param string $name 
          * @return mixed
         */
         public static function crud($prefix, \Closure $callback){}

        


         /**
          * add not found path
          * @param string $path
          * @return void
         */
         public static function notFound($path)
         {
               RouteObject::notFound($path);
         }


        
         /**
          * Add routes
          * @param ...$args / func_get_args()
          * @param string $path
          * @param string string|\Closure $callback
          * @param string $method
          * 
          * @return \JanKlod\Routing\RouteObject
         */
         public static function add($path, $callback, $name, $method = 'GET')
         {
              $routeObject = new RouteObject($path, $callback, $name, $method); 
              RouteCollection::store($routeObject);
              $routeObject->filter();
              return $routeObject;
         }


         
         /**
          * Get URL Named route
          * @param type $name 
          * @param string|array $params 
          * @return string
         */
         public static function url($name, $params = [])
         {
              return RouteObject::url($name, $params);
         }


         /**
          * Map routes with params
          * @param type ...$args 
          * @return void
         */
         public function map(...$args) 
         {
              self::add($args);
         }
      

}