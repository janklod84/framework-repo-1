<?php 
namespace JanKlod\Validation;

/**
 * @package JanKlod\Validation\ValidationInterface 
*/ 
interface ValidationInterface 
{
       
       /**
         * Determine if all parses data are valids
         * 
         * @return boolean
        */
	   public function isValid(): bool;
}