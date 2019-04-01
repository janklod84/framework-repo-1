<?php 
namespace JanKlod\Http\Collections;

use JanKlod\Collections\Collection;


/**
 * @package JanKlod\Http\Requests\GlobalCollection
*/
abstract class GlobalCollection implements GlobalCollectible
{

        /**
         * @var Collection
        */
        protected $collection;
        

        /**
         * Constructor
         * @return type
        */
         public function __construct()
         {
	         $this->collection = new Collection();
         }

 
         /**
          * Get Data from superglobal array
          * @return type
         */
         abstract public function fromGlobals();
	   
}