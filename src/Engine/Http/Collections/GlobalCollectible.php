<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\Requests\GlobalCollectible
*/ 
interface GlobalCollectible 
{
      /**
       * return data from superglobal array
       * @return mixed
      */
      public function fromGlobals();
}