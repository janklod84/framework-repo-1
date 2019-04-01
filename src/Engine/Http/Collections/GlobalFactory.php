<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\GlobalFactory
*/ 
class GlobalFactory
{
      
      /**
       * - Prefix Namespace Collections 
       * - Suffix Namespace Collections 
      */
      const PREFIX_NC = '\\JanKlod\\Http\\Collections\\';
      const SUFFIX_NC = 'Collection';

       /**
        * Constructor
        * @param string $name 
        * @return object
       */
	     public function retrieve(string $name)
	     {
     	      $obj = $this->instance($name);
     	      return (new GlobalStrategy($obj))->fromGlobals();
	     }

       
       /**
        * Get Instance of current Request
        * @param string $name 
        * @return RequestCollectible
        */
	     private function instance(string $name): GlobalCollectible
	     {
	     	      $classObject = self::PREFIX_NC . ucfirst($name) . self::SUFFIX_NC;
              if(!class_exists($classObject))
              {
              	  die(sprintf('Sorry, class <strong>%s</strong> doesn\'t exist', $classObject));
              }
              return new $classObject;
	     }
}