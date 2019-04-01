<?php 
namespace JanKlod\Template\Components;


/**
 * @package JanKlod\Template\Components\Asset
*/ 
class Asset 
{

	     const JS_EXT   = '.js';
	     const CSS_EXT  = '.css';
	     const EXT_SCSS = '.scss';
	     // ....


	     const JS_MASK  = '<script src="%s" type="text/javascript"></script>';
         const CSS_MASK  = '<link rel="stylesheet" href="%s">';
         // ...

         /**
          * @var array container
         */
	     public static $container = [];

         
         /**
          * @param string $link
          * @return void
         */
	     public static function css($link)
	     {
	     	   // self::$container['css'][] = $link;
	     }


	     /**
          * 
          * @param string $script 
          * @return void
         */
	     public static function js($script)
	     {
	     	   // self::$container['js'][] = $script;
	     }
}