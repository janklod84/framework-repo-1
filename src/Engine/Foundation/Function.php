<?php 

use JanKlod\Http\Requests\Response;
use JanKlod\Routing\Router;
use JanKlod\Template\ViewFactory;


function debug($arr, $die = false)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
	if($die) die;
}


function dd($arr, $die = false)
{
    echo '<pre>';
	var_dump($arr);
	echo '</pre>';
	if($die) die;
}


if(!function_exists('array_get'))
{
       /**
        * Check array items
        * @param array $arr 
        * @param mixed $key 
        * @param mixed|null $default 
        * @return mixed
       */
	   function array_get($arr, $key, $default = null)
	   {
	   	   return !empty($arr[$key]) ? $arr[$key] : $default;
	   }
}


if(!function_exists('response'))
{
	 /**
	  * Check Response object
	  * @return Response
	  */
	 function response()
	 {
	 	 return new Response();
	 }
}


if(!function_exists('url'))
{
	 /**
	  * fonction Url Generator
	  * @param type $name 
	  * @param type|array $params 
	  * @return type
	 */
	 function url($name, $params = [])
	 {
	 	 Router::url($name, $params);
	 }
}


if(!function_exists('view'))
{
	 /**
	  * Get view and parse data
	  * @param string $path 
	  * @param array $data 
	  * @return mixed
	 */
	 function view($path, $data = [])
	 {
	 	  // return (new View($this->app))->render($path, $data);
	 }
}