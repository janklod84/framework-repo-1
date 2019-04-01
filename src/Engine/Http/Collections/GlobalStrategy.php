<?php 
namespace JanKlod\Http\Collections;


/**
 * @package JanKlod\Http\GlobalCollectible 
*/ 
class GlobalStrategy 
{
         
         /**
          * @var global Collectible
         */
         protected $global;


         /**
          * Constructor
          * @param GlobalCollectible $request 
          * @return void
         */
  	     public function __construct(GlobalCollectible $global)
  	     {
                $this->global = $global;
  	     }


         /**
           * Call method fromGlobals current request
           * @return mixed
         */
	       public function fromGlobals()
	       {
	     	     return $this->global->fromGlobals();
	       }
}