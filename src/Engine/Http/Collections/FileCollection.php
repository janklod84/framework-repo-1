<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\FileCollection 
*/ 
class FileCollection extends GlobalCollection 
{
      
       /**
        * Return Collection object
        * @return Collection with items $_FILES
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_FILES);
	   }

}