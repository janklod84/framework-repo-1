<?php 
namespace JanKlod\Template;


/**
 * @package JanKlod\Template\Components\Asset
*/ 
class Asset 
{


  	     const JS_MASK  = '<script src="%s" type="text/javascript"></script>';
         const CSS_MASK = '<link rel="stylesheet" href="%s">';
         // ...

           
         /**
            * @var array container
         */
  	     public static $container = [];


         /**
          * Base Url 
          * @var string
          */
         private static $baseUrl;



         /**
          * Constructor
          * @param array $container
          * @return void
         */
         public function __construct() { }
        
         
         /**
          * Set base Url, It's for management base URL
          * @param string $baseUrl 
          * @return void
         */
         public static function setbaseUrl($baseUrl)
         {
              self::$baseUrl = $baseUrl;
         }


         private static function getbaseUrl()
         {
             return trim(self::$baseUrl, '/') . '/' ?? '';
         }


         /**
          * Set asset container 
          * @param array $container 
          * @return void
         */
         public static function set(array $container = [])
         {
              self::$container = array_merge(self::$container, $container);
         }
         

         
         /**
          * Set asset container 
          * @param array $container 
          * @param string $baseUrl
          * @return void
         */
         public static function setParams(array $container = [], $baseUrl = null)
         {
         	    self::$container = array_merge(self::$container, $container);
              self::$baseUrl = $baseUrl;
         }
         
         
         /**
          * Add css script
          * @param string $link
          * @return void
         */
  	     public static function css($link = null)
  	     {
  	     	    self::$container['css'][] = sprintf(self::JS_MASK, trim($link, '/'));
  	     } 


	      /**
          * Add js script
          * @param string $script 
          * @return void
         */
  	     public static function js($script = null)
  	     {
  	     	   self::$container['js'][] = sprintf(self::JS_MASK, trim($script, '/'));
  	     }

         
         /**
          * render all js 
          * @return string
         */
  	     public static function renderJs()
  	     {
               if(!empty(self::$container['js']))
               {
               	   foreach(self::$container['js'] as $js)
                   {
                       echo self::render(self::JS_MASK, $js);
                   }
               }
  	     }


	      /**
          * render all js 
          * @return string
         */
  	     public static function renderCss()
  	     {
               if(!empty(self::$container['css']))
               {
               	  foreach(self::$container['css'] as $css)
                  {
                      echo self::render(self::CSS_MASK, $css);
                  }
               }
  	     }

         
         /**
          * render output
          * @param string $mask 
          * @param string $path 
          * @return string
         */
         private static function render($mask, $path)
         {
             return sprintf($mask . PHP_EOL, self::getbaseUrl(). trim($path, '/'));
         }
}