<?php 
namespace JanKlod\Collections;


/**
 * This Interface for manipulate array collection
 * Will be implements \ArrayAccess, \Iterator [... This part for later ..,]
 * @package JanKlod\CollectionInterface
*/
interface CollectionInterface
{
        
      /**
       * Set key and value
       * @param $key
       * @param $value
      */
      public function set($key, $value); 

      /**
       * Get config
       * @param mxed $key 
       * @return mxed
      */
      public function get($key);


      
      /**
       * @param mixed $key 
       * @return bool
      */
      public function has($key);


      /**
       * append config data in container
       * @param mixed $data
       * @return void
      */
      public function push($data); 
}