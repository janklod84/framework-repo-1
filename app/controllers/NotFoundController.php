<?php 
namespace app\controllers;

use JanKlod\Http\Controller;

/**
 * @package app\controllers\NotFoundController
*/
class NotFoundController extends Controller
{
        
        public $layout = 'default';

	    public function index()
	    {
	    	 $st = $this->app->response->setStatus(404);
	    	 echo $st;
	    	 
	    	 // die('Not Found Page');
	    	 $this->render('not-found');
	    }
}