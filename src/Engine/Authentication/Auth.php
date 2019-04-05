<?php 
namespace JanKlod\Authentication;


use Session;


/**
 * @package JanKlod\Authentication\Auth
*/ 
class Auth implements AuthInterface
{
          
          
          /**
           * @var bool
          */
          private static $authorized = false;


          /**
           * Determine if user is logged
           * This key it basic, after we will hashing key for obtain good session key
           * like it sess.user_---.sha1($_SERVER['HTTP_HOST']) . .... etc
           * @return bool
           */
          public static function isLogged(): bool
          {
              return Session::has('sess.user');
          }


          public static function authorized()
          {
              /// return self::$authorized;
          }


          public static function unauthorized()
          {
              /// return !self::$authorized;
          }
}