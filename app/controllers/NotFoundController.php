<?php 
namespace app\controllers;

use JanKlod\Http\Controller;
use JanKlod\Template\Asset;


/**
 * @package app\controllers\NotFoundController
*/
class NotFoundController extends Controller
{
        
        public $layout = 'default';

	    public function index()
	    {
	    	 Asset::setParams($this->app->configs['asset'], $this->app->base_url);
	    	 $title = 'Страница не найдена!';
	    	 // $this->render('not-found', compact('title'));
	    	 $this->render('errors/404', compact('title'));
	    }
}