<?php 
namespace JanKlod\Routing;


/**
 * @package JanKlod\Routing\RouteManager
*/ 
class RouteManager
{
      
        /**
         * @const array 
        */
        const PREDEFINED_PATTERNS = [
             ':id'   => '[0-9]+',
             ':slug' => '[a-z\-0-9]+'
        ];
        
      
         /**
          * Determine if has match params
          * @param string $regex 
          * @param string $url 
          * @return bool
         */
         public static function isMatched($regex, $url): bool
         {
                return preg_match($regex, $url);
         }


         /**
          * Get macthes params
          * @param string $regex 
          * @param string $url 
          * @return array
         */
         public static function getMatches($regex, $url): array
         {
                  preg_match($regex, $url, $matches);
                  return $matches;
         }

        /**
         * Prepare params
         * @param string $regex 
         * @return string
        */
        public static function prepareParams($regex)
        {
             return str_replace('(', '(?:', $regex); 
        }


        /**
         * Prepare Url
         * @param type $url 
         * @return type
        */
        public static function prepareUrl($url)
        {
             return trim($url, '/');
        }
}