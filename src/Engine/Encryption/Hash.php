<?php 
namespace JanKlod\Encryption;


/**
 * @package JanKlod\Encryption\Hash 
*/ 
class Hash 
{

	 
		 public function __construct($app)
		 {

		 }

		 
		 /**
	       * Make hash
	       * @var $string, $salt
	       * @return string
	     **/
	      public static function make($algo = 'sha256', $string, $salt ='')
		  {
	           return hash($algo, $string . $salt);
		  }

	     
	     /**
	      * Random Salt
	      * @var $length
	      * @return string
	     **/
	  	 public static function salt($length)
	  	 {   
	           return random_bytes($length);
	  	 }
	     

	     /**
	      * Check Unique ID
	      * @return mixed
	     **/
	  	 public static function unique()
	  	 {
	           return self::make(uniqid());
	  	 }

         
         /**
          * Hash password
          * @param string $flag 
          * @return string
         */
	  	 public function password($flag = PASSWORD_DEFAULT)
	  	 {
	  	 	   return password_hash($password, $flag);
	  	 }

         
         /**
          * Verfiy if password matched
          * @param string $current [ given password want to compare ]
          * @param string $handler [ handler hashed ]
          * @return bool
          */
	  	 public function verifyPassword($current, $handler): bool
	  	 {
	  	 	 return password_verify($current, $handler);
	  	 }
     
}