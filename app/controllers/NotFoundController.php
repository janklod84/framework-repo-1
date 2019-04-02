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
	    	 $title = 'Страница не найдена!';
	    	 $this->render('not-found', compact('title'));
	    }
}