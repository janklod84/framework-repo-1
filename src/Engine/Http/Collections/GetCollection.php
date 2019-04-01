<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\GetCollection
*/ 
class GetCollection extends GlobalCollection  
{
      
       /**
        * Return Collection object
        * @return Collection with items $_GET
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_GET);
	   }

}