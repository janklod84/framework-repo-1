<?php 
namespace app\controllers;

use JanKlod\Http\Controller;
use app\models\Task;
use app\models\User;
use JanKlod\Validation\Validate;
use Asset;
use HTML;

/**
 * @package app\controllers\FrontController
 */
class FrontController extends Controller
{


        /**
         * @var Validation
        */
        protected $validation;

        /**
         * storage errors
         * @var array
        */
        protected $errors;


        
        /**
         * @var User
         */
        protected $user;

         
        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
         public function __construct($app)
         {
                // Вызод родительского конструктор , т.е базовая контроллер Controller
                parent::__construct($app);

                $this->task = new Task();
                $this->validation = new Validate();
                $this->user = new User();

                // Установливаю мета данных для вида
                HTML::setMeta($this->meta());

                // Установливаю все необходимые параметеры для вывода стилей и скриптов
                // для конкретного контроллера или все его дочерые
                Asset::setParams($this->app->configs['asset'], $this->app->base_url);
         }


         
         /**
          * Get current name of application
          * @param string $default 
          * @return string
         */
         protected function appName($default = '')
         {
             return $this->app->configs['app']['name'] ?? $default;
         }

         
         /**
         * This is for the moment, I'll remove them after 
         * and create method for management meta datas
         * 
         * content metas datas
         * @return array
         */
         private function meta()
         {
            // Тут возврашаю все конфиги мета данных в виде массив.
            return [
               'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
               'description' => '',
               'author' => ''
            ];
        }

}