<?php 
namespace JanKlod\Common\Sessions;


/**
 * @package \JanKlod\Common\Sessions\SessionInterface
*/
interface SessionInterface 
{

	   /**
       * Get value from session
       * @param string $key
       * @param mixed $default
       * @return mixed
     */
	   public function get(string $key, $default = null);


	   /**
	     * Add information to the session
       * @param string $key
       * @param mixed $value
       * @return void
     */
	   public function set(string $key, $value): void;


	   /**
	     * Remove key in the session
       * @param string $key
       * @return void
     */
	   public function delete(string $key): void;
}