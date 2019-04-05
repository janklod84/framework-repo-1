<?php 
namespace app\controllers;

use \HTML;
use app\library\bootstrap\BForm;
use app\library\bootstrap\BPagination;
use \Token;
use \Session; 
use \Flash;


/**
 * @package app\controllers\admin
 */
class TaskController extends FrontController
{
        
         const PERPAGE = 3;

         
         private $data = [];


         /**
           * Show Listing
           * @return 
          */
    	    public function index()
    	    {                
                # Вытаскиваем все задачи
                $tasks = $this->task->all();
                
                # Подготовка качества параметры для Рагинации
                $page  = 1;
                $total = 5; // count($tasks)
                $perpage = 3;

                # инициализуем нашу пагинацию
                $pagination = new BPagination($page, 3, $total);

                HTML::setTitle('Главная');
    	    	    $this->render('task/index', compact('tasks', 'pagination', 'total'));
    	    }


          /**
           * Create New task
           * Создание новую задачу
           * @return mixed
          */
          public function create()
          {

               //  Если запрос отпрвленно метода Пост [Method POST] тут простая проверка
               if($this->isPost())
               {
                     
                     // Далее проверяю если токен установлен и совпадают по тому ключу задан ранее)
                     if(Token::check($this->request->post('_csrf')))
                     {
                           $data = $this->request->post();
                           unset($data['_csrf']); // debug($data, true);

                           // проверяю если у нас валидные данные с Поста
                           // при помощью валидатор
                           $validation = $this->validation->check($data, [
                               'username' => [
                                   'required' => true,
                                   'min' => 3,
                                   'max' => 20
                                ],
                               'email' => [
                                   'required' => true,
                                   'unique' => 'tasks'
                               ]
                           ]);
                           
                           // Если валидация прошла успешно
                           if($validation->passed())
                           {
                                 $this->checkIfTaskHasCreated($data);

                           }else{
                               
                               $this->errors = $validation->errors();
                           }
      
                     }
               }
               
               HTML::setTitle('Новая задача');
               $this->form();
          }


          
          /**
           * Edit Task
           * @param int $id
           * @return type
          */
          public function edit(int $id)
          {
               $task = $this->task->find($id);
               
               HTML::setTitle('Редактирование');
               $this->form($task);
          }

          
          
          /**
           * render form partials
           * @var mixed $task
           * @return string
          */
          private function form($task = null)
          {
              $url = $task ? '/task/edit/'. $task->id : '/task/create';
              $dataForm = $this->request->post();
              $form = new BForm($dataForm);
              $errors = $this->errors;
              $this->render('partials/task/form', compact('form', 'errors', 'task', 'url'));
          }


          /**
           * Save Task
           * @param type $id 
           * @return type
          */
          public function save($id)
          {
               if($this->isPost())
               {
                     if($this->tokenIsMatch())
                     {
                           if($this->isValidData())
                           {
                                 
                                 die(__FILE__);

                           }else{
                               
                               $this->errors = $validation->errors();
                           }
      
                     }
              

              //// -----
              $data = $this->request->post();
              if($this->task->update($id))
              {
                   die('UPDATED TASK '. $id);
              }
          }



          /**
            * Выход с Административного панела
            * @return void
          */ 
          public function logout()
          {
                $this->user->logout();
                return $this->redirect('/');
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
                   // проверяю если у нас валидные данные с Поста
                   // при помощью валидатор
                   $validation = $this->validation->check($this->request->post(), [
                       'username' => [
                           'required' => true,
                           'min' => 3,
                           'max' => 20
                        ],
                       'email' => [
                           'required' => true,
                           'unique' => 'tasks'
                       ],
                       'text' => [
                           'required' => true
                       ]
                   ]);

                  return $validation->passed();
            }



            /**
             * Check If Task has successfully created
             * @param array $data
             * @return mixed
            */
            private function checkIfTaskHasCreated()
            {
                   $data = $this->request->post();
                   unset($data['_csrf']); 

                   return $this->task->create($data);

                   if($this->task->create($data))
                   {
                        // Установливаю сообщение об успехе
                        Flash::message('success', 'Вы успешно создали задачик :)');

                        // Перенаправим пользователь на главную странцу
                        return $this->redirect('/'); 

                   }else{
                        // Установливаю сообщение об ошибке
                       Flash::message('error', 'Ошибка создания задачика ! (');
                   }
            }

            
            /**
             * Determine if Task has updated successfully
             * @return type
             */
            private function checkIfTaskHasUpdated()
            {

            }


}