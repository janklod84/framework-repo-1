<?php 
namespace JanKlod\Container;


/**
 * @package JanKlod\Container\Manager\ContainerInterface
*/
interface ContainerInterface
{
  	   /**
  	    * Assign key and value to item
  	    * @param type $key 
  	    * @param type $resolver 
  	    * @return type
  	   */
       public function set(string $key, $resolver);
         
       /**
        * Get item by key from container
        * @param type $key 
        * @return type
       */
       public function get(string $key);

       
       /**
        * Merge data in container
        * @param array $data 
        * @return void
       */
       public function merge(array $data);
}