<?php 
namespace JanKlod\Common\Sessions;


// use JanKlod\Collections\Collection;

/**
 * @package \JanKlod\Common\Session
*/
class Session implements SessionInterface
{

          
	          /**
	           * 
	           * @return type
	          */
	          private function __construct() {}


	          /**
	           * Ensure if seesion is not started
	           * 
	           * @return void
	           */
		      public static function start()
		      {
	               if(session_status() === PHP_SESSION_NONE)
	               {
	                     session_start();
	               }
		      }


		      /**
		        * Get value from session
		        * @param string $key
		        * @return mixed
	         */
		     public static function check(string $key)
		     {
                  return $_SESSION[$key] ?? null;
		     }

	     
	         /**
	          * Determine if has key in session
	          * @param string $key 
	          * @return bool
	         */
	         public static function has(string $key): bool
	         {
                  return isset($_SESSION[$key]);
	         }


		    /**
		     * Add information to the session
	         * @param string $key
	         * @param mixed $value
	         * @return void
	        */
		    public static function put($key, $value)
		    {
                 return $_SESSION[$key] = $value;
		    }


		   /**
		     * Remove key in the session [delete]
	         * @param string $key
	         * @return void
	       */
	        public static function remove(string $key)
	        {
                 if(self::has($key))
                 {
                 	 unset($_SESSION[$key]);
                 }
	        }


            
            /**
             * Remove all data from session
             * @return type
            */
	        public static function clear()
	        {
         	 	 session_destroy();
         	 	 unset($_SESSION);
	        }

            
            /**
             * Return all session
             * @return array
            */
	        public static function all()
	        {
	        	return $_SESSION ?? [];
	        }


		    /**
		      * Get value from session
		      * @param string $key
		      * @param mixed $default
		      * @return mixed
		    */
	         public function get(string $key, $default = null)
	         {
                   return self::check($key);
	         }


		    /**
		      * Add information to the session
	          * @param string $key
	          * @param mixed $value
	          * @return void
	        */
		     public function set(string $key, $value): void
		     {
	              self::put($key, $value);
		     }


		   /**
		     * Remove key in the session
	         * @param string $key
	         * @return void
	        */
		     public function delete(string $key): void
		     {
	                self::remove($key);
		     }



}