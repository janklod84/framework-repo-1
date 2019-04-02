<?php 
namespace app\controllers;


use JanKlod\Http\Controller;
use \Asset; 
use \HTML;


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
            HTML::setMeta($this->metas());
            Asset::setParams($this->app->configs['asset'], $this->app->base_url);
        }

        
        /**
         * This is for the moment, I'll remove them after 
         * and create method for management meta datas
         * 
         * content metas datas
         * @return array
         */
        private function metas()
        {
            return [
               'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
               'description' => '',
               'author' => ''
            ];
        }
}