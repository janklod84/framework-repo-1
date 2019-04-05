<?php 
namespace JanKlod\Template;



/**
 * @package JanKlod\Template\Html
*/
class HTML
{
       
        
        const MASK_META_DATA = '<meta name="%s" content="%s">';


        /**
         * Title of page
         * @var string 
        */
        private static $title;

        
        /**
         * Meta charset
         * @var string
        */
        private static $charset = 'UTF-8';

        
        /**
         * Meta datas
         * @var array
        */
        private static $metas = [];

        
        
        /**
         * Set title
         * @param string $title 
         * @return string
        */
        public static function setTitle($title)
        {
              self::$title = $title;
        }


        /**
         * Get title
         * @return string
        */
        public static function title($full = false)
        {
              $title = self::$title ?? '';
        	  if($full === true)
              {
                  $title = sprintf('<title>%s</title>', $title) . PHP_EOL;
              }
              return $title;
        }

        
        /**
         * Set Page Language 
         * @param string $code 
         * @return string
        */
        public static function lang($code = 'en')
        {
            return sprintf('<html lang="%s">', $code) . PHP_EOL;
        }


        /**
         * Encode meta charset
         * @param type|string $encode 
         * @return type
        */
        public static function charset($encode = 'UTF-8')
        {
             return sprintf('<meta charset="%s">', $encode) . PHP_EOL;
        }


        /**
         * Set meta data
         * @param type|array $metas 
         * @return type
        */
        public static function setMeta($metas)
        {
              self::$metas = $metas;
        }

        
        /**
         * Get meta datas
         * @return string
        */
        public static function metas()
        {
             $meta = '';
             foreach(self::$metas as $name => $content)
             {
                 $meta .= sprintf(self::MASK_META_DATA, $name, $content) . PHP_EOL;
             }
             return $meta;
        }
  
}
