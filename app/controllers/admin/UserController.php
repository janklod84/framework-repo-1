<?php 
namespace app\controllers\admin;


use app\library\bootstrap\BForm;
use \HTML;
use \Token;


/**
 * @package app\controllers\admin\UserController
 */
class UserController extends AdminController
{
        
	        /**
	         * render login admin
	         * @return type
	        */
	        public function login()
	        {
	             $this->layout = 'admin';

                 // Проверка метод отправки данные тут ожидаем , метод пост
	             if($this->isPost())
	             {
                       // проверяю наличе Токен
	             	   if($this->tokenIsMatch())
	             	   {
                             // Проверяем валидности данные
                             if($this->isValidData())
                             {
                                   // Проверяем нашли пользователь соответвующий логин и пароль
                             	   // если нашел то храняем текущий пользователь в Сессии
                             	   // и вернем true , а в противом случае вернем false
                             	   if($this->userFinded())
                             	   {
                             	   	    // debug(Session::all(), true);
                                        // Если все прошло успешно то перенаправим пользователь на главную страницу с имеющими правами
                             	   	    $this->redirect('/');

                                  
                             	   }

                             }else{

                             	  $this->errors = $this->validation->errors();
                             }
	             	   }
	             }
                 
                 // вывод форму
	             $this->form();
	        }
	        
            
            /**
             * Determine if has Token and if is match
             * @return bool
            */
            private function tokenIsMatch(): bool
            {
            	  return Token::check($this->request->post('_csrf'));
            }


            
            /**
             * Verify if data match or correctly parse
             * проверяю если у нас валидные данные с Поста
	         * при помощью валидатор
             * @return bool
             */
            private function isValidData(): bool
            {
	               $validation = $this->validation->check($this->request->post(), [
	                   'username' => ['required' => true],
	                   'password' => ['required' => true]
	               ]);

	               return $validation->passed();
            }

            
            /**
             * Verify if find correspondant user 
             * @return bool
            */
            private function userFinded(): bool
            {
        	     // получаю данные с Поста
                 $username = $this->request->post('username');
                 $password = $this->request->post('password');
               
                 // Получаю с БД если есть такой пользователь
                 return $this->user->login($username, $password);                  
            }
            

	       

	        /**
	         * Factory render form
	         * Приватный метод для выхода формы
	         * @param array $errors
	         * @return string
	        */
	        private function form()
	        {
		             // Инициализую Library для работы с Формами
		             $dataForm = $this->request->post();
		             $form = new BForm($dataForm);
                     $errors = $this->errors;

		             // Утановливаем заголовок страницы
		             HTML::setTitle('Вход');

		             // Загрузжаю страниу и передачи качествые параметры в виде
		    	     $this->render('admin/user/login', compact('form', 'errors'));
	        }


}