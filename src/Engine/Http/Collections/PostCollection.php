<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\PostCollection
*/ 
class PostCollection extends GlobalCollection 
{
      
       /**
        * Return Collection object
        * @return Collection with items $_POST
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_POST);
	   }

}