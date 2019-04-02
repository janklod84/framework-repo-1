<?php 
namespace JanKlod\Encryption;


use JanKlod\Common\Sessions\Session;


/**
 * @package JanKlod\Encryption\CsrfToken
*/
class CsrfToken 
{
	   
            /**
             * Generate token
             * @return string
           */
	    public static function generate()
	    {
	    	 // return Session::put(Config::get('session/token_name'), md5(uniqid()));
	    }
            

            /**
             * check token
             * @param type $token 
             * @return type
            */
	    public static function check($token)
            {
        	  $tokenName = Config::get('session/token_name');

        	  if(Session::exists($tokenName) && $token === Session::get($tokenName))
        	  {
        	  	      // Session::delete($tokenName);
        	  	      return true;
        	  }

        	  return false;
            }

}