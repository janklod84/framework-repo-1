<?php 
namespace JanKlod\Routing;


/**
 * @package JanKlod\Routing\RouteCollection
*/
class RouteCollection
{
       
       /**
        * @var array
       */
	     private static $routes = [];

       
       /**
        * @var CollectionInterface
       */
       private static $collection;

       

       /**
        * store route object
        * @param RouteObjectInterface $route 
        * @return void
       */
  	   public static function store(RouteObjectInterface $routeObject)
  	   {    
  	   	       $method = $routeObject->getMethod();
               self::$routes[$method][] = $routeObject;
  	   }


       /**
         * Description
         * @param type $key 
         * @return type
       */
       public static function find(string $key)
       {
            return self::$routes[$key] ?? [];
       }


       /**
         * get all stored routes
         * @return array
       */
       public static function all()
       {
           return self::$routes;
       }

}