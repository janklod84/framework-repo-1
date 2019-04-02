<?php 
namespace JanKlod\Foundation\Modules;


/**
 * This class can used for add new module in application
 * @package JanKlod\Foundation\Module 
*/
abstract class Module 
{
	   
        /**
         * @var string 
        */
	    const ROOT_PATH = 'default-root-path';	 


	    /**
		 * Module Name
		 * @var string
        */		 
	    protected $name = 'test';
	
}