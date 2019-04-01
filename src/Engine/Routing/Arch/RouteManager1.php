<?php 
namespace JanKlod\Routing;


/**
 * @package JanKlod\Routing\RouteManager 
*/ 
class RouteManager
{
        
      
          /**
           * @const match model 
          */
          const MATCH_MODEL = '#^%s$#';


          /**
             * @const array 
          */
           const BASIC_PATTERNS = [
              ':id'   => '[0-9]+',
              ':slug' => '[a-z\-0-9]+'
           ];


           /**
            * Match path
            * @param type $path 
            * @return string
           */
           public static function prepareRoute($path)
           {
                return sprintf(self::MATCH_MODEL, self::preparePath($path));
           }  

           
           /**
            * Prepare regex param
            * @param string $regex 
            * @return string
           */
           public static function prepareParams($regex)
           {
                return str_replace('(', '(?:', $regex); 
           } 

           
           /**
            * Prepare path [URL , path ..]
            * @param string $path
            * @return string
            */
           public static function preparePath($path)
           {
                return trim($path, '/');
           }


           /**
            * Determine if has match params
            * @param string $regex 
            * @param string $url 
            * @return bool
          */
          public static function isMatched(string $regex, string $url): bool
          {
                return preg_match($regex, $url);
          }

          

         /**
           * Get macthes params
           * @param string $regex 
           * @param string $url 
           * @return array
         */
          public static function getMatches(string $regex, string $url): array
          {
               preg_match($regex, $url, $matches);
               return $matches;
          }

}