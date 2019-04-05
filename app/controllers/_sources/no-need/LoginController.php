<?php 
namespace app\controllers;


use JanKlod\Http\Controller;
use app\library\BootstrapForm;
use Asset;
use HTML;
use Auth;
use JanKlod\Database\Model;


/**
 * @package app\controllers\admin\LoginController
*/
class LoginController extends Controller
{

        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
        public function __construct($app)
        {
            parent::__construct($app);
            
            // Если авторизован пользователь то мы его перенаправим к /task
            if(Auth::isLogged())
            {
                 response()->redirect('/admin/task');
            }

            HTML::setMeta($this->meta());
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
            return [
               'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no',
               'description' => '',
               'author' => ''
            ];
        }
        
        /**
         * Страница главная отвечая за вывода Логин сттраницы
         * Index
         * password_hash(123, PASSWORD_DEFAULT);
         * 
         * @return void
        */
        public function index()
        {    
             // Выводим форму
    	     $this->form();
        }


        public function send()
        {
             //  Если запрос отпрвленно метода Пост [Method POST]
             if($this->isPost())
             {
                  die('SEND');
                   debug($_POST, true);
                   $username = $this->request->post('username');
                   $password = $this->request->post('password');
                    
                   debug($this->request->post(), true);
                   $user = new \app\models\User();
                   $isOk = $user->login($username, $password);

                   if($isOk)
                   {
                        die('User Loggin');
                   }
             }
             $this->index();
        }
        
        /**
         * Factory render form
         * Приватный метод для выхода формы
         * @return string
        */
        private function form()
        {
             // Инициализую Library для работы с Формами
             $post = $this->request->post();
             $form = new BootstrapForm();

             // Утановливаем заголовок страницы
             HTML::setTitle('Вход');

             // Загрузжаю страниу и передачи качествые параметры в виде
    	     $this->render('login', compact('form'));
        }
}