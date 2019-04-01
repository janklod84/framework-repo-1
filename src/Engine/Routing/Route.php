<?php 
namespace JanKlod\Routing;


/**
 * @package Router
*/
class Route implements RouteInterface
{
    
         /**
          * Add Routes by method GET
          * @param string $path 
          * @param string|callable $callback 
          * @param string $name 
          * @return 
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
         * @return 
        */
         public static function post(string $path, $callback, string $name = null)
         {
              return self::add($path, $callback, $name, $method = 'POST');
         }



         /**
          * Add Routes by format CRUD [ CREATE READ UPDATE DELETE]
          * @param string $path 
          * @param string|callable $callback 
          * @param string $name 
          * @return ''
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
          * Description
          * @param array $options 
          * @param \Closure $callback 
          * @return ''
         */
         public static function group() {}

         
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