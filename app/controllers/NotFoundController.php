<?php 
namespace app\controllers;

use JanKlod\Http\Controller;
use JanKlod\Template\Asset;
use \HTML;



/**
 * @package app\controllers\NotFoundController
*/
class NotFoundController extends Controller
{
        
		/**
		 * @string 
		*/
        public $layout = 'default';
        
		
		/**
		 * Render page 404
		 * @return mixed 
		*/
	    public function index()
	    {
	    	 Asset::setParams($this->app->configs['asset'], $this->app->base_url);
	    	 HTML::setTitle('Страница не найдена');
	    	 $this->render('errors/404');
	    }
}