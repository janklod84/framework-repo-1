<?php 
namespace app\controllers;


use app\library\bootstrap\BForm;
use \HTML;
use \Token;



/**
 * @package app\controllers\admin\LoginController
*/
class LoginController extends BaseController
{

        

        // public function before() {}


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

        
        /**
         * Send data 
         * @return mixed
        */
        public function send()
        {
             //  Если запрос отпрвленно метода Пост [Method POST] тут простая проверка
             if($this->isPost())
             {
                   // Далее проверяю если токен установлен в простейшим образом)
                   if(Token::check($this->request->post('_csrf')))
                   {
                          
                           // проверяю если у нас валидные данные с Поста
                           // при помощью валидатор
                           $validation = $this->validation->check($this->request->post(), [
                               'username' => ['required' => true],
                               'password' => ['required' => true]
                           ]);
                           
                           // если валидация прошла успешна то выполняем следующие скрипты
                           if($validation->passed())
                           {
                                 // получаю данные с Поста
                                 $username = $this->request->post('username');
                                 $password = $this->request->post('password');
                               
                                 // Получаю с БД если есть такой пользователь
                                 $login = $this->user->login($username, $password);
                               
                                 // если есть такой то его перенаправлю на страницу список задачик
                                 if($login)
                                 {
                                      response()->redirect('');

                                 }else{

                                     
                                 }

                           }else{


                           }
                           
                   }

             }

             // по умолчанию у нас выводится страницу с логином
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
             $dataForm = $this->request->post();
             $form = new BForm($dataForm);

             // Утановливаем заголовок страницы
             HTML::setTitle('Вход');

             // Загрузжаю страниу и передачи качествые параметры в виде
    	     $this->render('login/index', compact('form'));
        }


        // public function after() {}
}