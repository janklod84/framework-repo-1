<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\RequestCollection
*/ 
class RequestCollection extends GlobalCollection 
{
      
       /**
        * Return Collection object
        * @return Collection with items $_REQUEST
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_REQUEST);
	   }

}