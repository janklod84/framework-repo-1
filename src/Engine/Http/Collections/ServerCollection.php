<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\ServerCollection
*/ 
class ServerCollection extends GlobalCollection 
{
      
       /**
        * Return Collection object
        * @return Collection with items $_SERVER
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_SERVER);
	   }

}