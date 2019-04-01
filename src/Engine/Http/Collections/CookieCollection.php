<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Collections\CookieCollection 
*/ 
class CookieCollection extends GlobalCollection  
{
      
       /**
        * Return Collection object
        * @return Collection with items $_COOKIE
       */
	   public function fromGlobals()
	   {
	   	   return $this->collection->asObject($_COOKIES);
	   }

}