<?php 
namespace app\controllers;


use JanKlod\Http\Controller;
use JanKlod\Validation\Validate;
use Asset;
use HTML;
use Auth;
use app\models\User;


/**
 * @package app\controllers\admin\LoginController
*/
class BaseController extends Controller
{
        

        /**
         * @var app\models\User
        */
        protected $user;

        
        /**
         * @var JanKlod\Validation\Validate
         */
        protected $validation;


        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
        public function __construct($app)
        {
            // Вызод родительского конструктор , т.е базовая контроллер Controller
            parent::__construct($app);
            
            // Если авторизован пользователь то мы его перенаправим к /task
            if(Auth::isLogged())
            {
                 response()->redirect('/admin/task');
            }
            
            // Получаем модел узер
            $this->user = new User();
            
            // Получаем валидатор
            $this->validation = new Validate();

            // Установливаю мета данных для вида
            HTML::setMeta($this->meta());

            // Установливаю все необходимые параметеры для вывода стилей и скриптов
            // для конкретного контроллера или все его дочерые
            Asset::setParams($this->app->configs['asset'], $this->app->base_url);
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