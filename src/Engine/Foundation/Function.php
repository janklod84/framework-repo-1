<?php 

use JanKlod\Http\Requests\Response;
use JanKlod\Http\Requests\Request;
use JanKlod\Routing\Router;
use JanKlod\Template\View;
use JanKlod\Encryption\Token;




if(!function_exists('debug'))
{     
	  /**
	   * Function for working with array data
	   * print out datas
	   * @param array $arr 
	   * @param bool $die 
	   * @return mixed
	   */
	  function debug($arr, $die = false)
      {
		  echo '<pre>';
		  print_r($arr);
		  echo '</pre>';
		  if($die) die;
      }
}


if(!function_exists('crop'))
{
     
     /**
      *  Crop string
      * @param string $str 
      * @param int $max
      * @return string
      */
     function crop($str = '', $max = 20)
     {
         return sprintf('%s...', substr($str, 0, $max));
     }
}


if(!function_exists('attr'))
{      
	   /**
	    * Retourne all attributes from input field
	    * Ex: <input ' . attr(['class' => 'form-control', 'id' => 'email']) . '>';
	    * it will show <input class ="form-control" id = "email">
	    * 
	    * @param array $attributes 
	    * @return type
	    */
       function attr(array $attributes = [])
	   {
	   	      $output = '';
	          if(!empty($attributes))
	          {
	          	   foreach($attributes as $name => $value)
	               {
	                    $output .= sprintf(' %s="%s"', $name, $value);
	               }
	               return $output;
	          }
	   }
}

if(!function_exists('checkStatus'))
{      
	  /**
       * Print out status with bootstrap
       * 
       * @param int status
       * @return string
      */
	  function checkStatus($status)
	  {
	       if($status == 1)
           {
           	   return '<span class="label label-success">Выполнена</span>' . PHP_EOL;

           }else{

           	   return '<span class="label label-default">В работе</span>' . PHP_EOL;
           }
    
	  }
}

if(!function_exists('partials'))
{

	 /**
	  * Includes partials views like 'sidebar, widget, menu ..etc'
	  * @param string $path 
	  * @return void
	  */
     function partials($path = '')
     {
     	  if(defined('ROOT'))
     	  {
     	  	    $file = sprintf('%s/app/views/%s.php', ROOT, $path);
     	  	    if(!file_exists($file))
	            {
	     	  	      exit('File <strong>%s</strong> doesn\'t exist');

	            }
     	        return require_once(realpath($file));
	     	  
     	  }else{

     	  	  return require_once('/app/views/'. $path);
     	  }
     	 
     }
}

if(!function_exists('escape'))
{
	 /**
	  * Espace string data [html data]
	  * @param string $string 
	  * @return string
	 */
     function escape($string)
     {
	      return htmlentities($string, ENT_QUOTES, 'UTF-8');
     }
}

if(!function_exists('view_path'))
{
     /**
      * Show full view path for user
      * @param string $path 
      * @return string
      */
     function view_path($path = '', $style = 'margin: 10px 0 10px 5px')
     {
     	  echo sprintf('<div style="%s"><small>Current view path: </small><code>%s</code></div>', $style, $path);
     }
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



if(!function_exists('csrfToken'))
{
      
      /**
       * Generator token against failles Csrf
       * @return string
      */
	  function csrfToken()
	  {
           return Token::generate();
	  }
}


if(!function_exists('redirect'))
{

	  /**
	   * Redirect user another page
	   * Ex: redirect('http://www.google.com');
	   * 
	   * @param string $path 
	   * @return string
	   */
	  function redirect($path = '/') 
	  {
		   if (!headers_sent())
		   {
		       header(sprintf('Location: %s', $path));

		   }else{

		       echo '<script type="text/javascript">';
		       echo sprintf('window.location.href="%s"', $path);
		       echo '</script>';
		       echo PHP_EOL;
		       echo '<noscript>';
		       echo sprintf('<meta http-equiv="refresh" content="0;url=%s"/>', $path);
		       echo '</noscript>';
		       echo PHP_EOL;
		   }
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


function base()
{
	return baseUrl();
}



if(!function_exists('baseUrl'))
{
      
      /**
       * Return current base URL if user active it
       * @param string|null $current 
       * @return mixed
      */
      function baseUrl(string $current = '')
      {
      	  if($current) { return $current; }
      	  elseif($current === false) { return false; }
      	  else{ return (new Request())->baseUrl(false); }
      }
}


if(!function_exists('url'))
{
	 /**
	  * fonction Url Generator
	  * Here it's include both method 
	  * Route::url('/test/path') or Url::to('/test/path')
	  * 
	  * @param type $name 
	  * @param type|array $params 
	  * @return type
	 */
	 function url($name = '', $params = [])
	 {
	 	  return Route::url($name, $params);
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