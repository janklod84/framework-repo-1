<?php 
namespace app\controllers;


use JanKlod\Http\Controller;
use \Asset; 


/**
 * @package app\controllers\admin\AppController
*/
class AppController extends Controller
{
         
        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
        public function __construct($app)
        {
            parent::__construct($app);
            Asset::setParams($this->app->configs['asset'], $this->app->base_url);
        }
}