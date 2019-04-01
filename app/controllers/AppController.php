<?php 
namespace app\controllers;

use JanKlod\Http\Controller;


class AppController extends Controller
{
        
        /**
         * Constructor Admin
         * @param ContainerIntefcae $app 
         * @return void
        */
	    public function __construct($dispatcher)
	    {
	    	  parent::__construct($dispatcher);
	    }
}