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
        

         /**
           * Show Listing
           * @return 
          */
    	    public function index(int $id = null)
    	    {    
                # Подготовка качества параметры для Рагинации
                $total = $this->task->all()->count();
                $page  = $id ?: 1;
                $perpage = 3;
                
                # инициализуем нашу пагинацию
                $pagination = new BPagination($page, $perpage, $total);
                $start = $pagination->getStart();
                
                $tasks = $this->task->all("$start, $perpage")->results();

                HTML::setTitle('Главная');
    	    	    $this->render('task/index', compact('tasks', 'pagination', 'total'));
    	    }


          /**
           * Create New task
           * Создание новую задачу
           * @return mixed
          */
          public function add()
          {
               if($this->isPost())
               {

                     if($this->tokenIsMatch())
                     {
                           // Если валидация прошла успешно
                           if($this->isValidData())
                           {
                                 if($this->checkIfTaskHasCreated())
                                 {
                                    // Установливаю сообщение об успехе
                                    Flash::message('success', 'Вы успешно создали задачик :)');
                                    // Перенаправим пользователь на главную странцу
                                    return $this->redirect('/'); 

                                 }

                           }else{
                               
                               $this->errors = $this->validation->errors();
                           }
      
                     }
               }
               
               HTML::setTitle('Новая задача');
               return $this->form();
          }


          
          /**
           * Edit Task
           * @param int $id
           * @return mixed
          */
          public function edit(int $id = null)
          {
               $task = $this->task->find($id);
               HTML::setTitle('Редактирование');
               return $this->form($task);
          }

        

          /**
           * Save Task
           * @param int $id 
           * @return mixed
          */
          public function save(int $id)
          {
               if($this->isPost())
               {
                     if($this->tokenIsMatch())
                     {
                           if($this->isValidData())
                           {
                                 if($this->checkIfTaskHasUpdated($id))
                                 {
                                     // Установливаю сообщение об успехе
                                    Flash::message('success', 'Вы успешно обновили задачик :)');
                                    // Перенаправим пользователь на главную странцу
                                    return $this->redirect('/'); 
                                 }

                           }else{
                               
                                 $this->errors = $this->validation->errors();
                           }
      
                     }
              
               }
          }

 
          /**
           * Action Delete Task
           * @param int $id 
           * @return bool
          */
          public function delete(int $id)
          {
              if($this->task->delete($id))
              {
                    // Установливаю сообщение об успехе
                    Flash::message('success', 'Вы успешно удалить задачик :)');
                    return $this->redirect('/');
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
                return Token::check($this->post('_csrf'));
           }



          /**
           * render form partials
           * @var mixed $task
           * @return string
          */
          private function form($task = null)
          {
              $url = $task ? '/task/edit/'. $task->id : '/task/add';
              $dataForm = $this->post();
              $form = new BForm($dataForm);
              $errors = $this->errors;
              $this->render('partials/task/form', compact('form', 'errors', 'task', 'url'));
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
                   $validation = $this->validation->check($this->post(), [
                       'username' => [
                           'required' => true,
                           'min' => 3,
                           'max' => 25
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
             * Create Task
             * Check If Task has successfully created
             * @param array $data
             * @return mixed
            */
            private function checkIfTaskHasCreated()
            {
                   return $this->task->create($this->post());       
            }

            
            /**
             * Update Task
             * And Determine if Task has updated successfully
             * @return mixed
             */
            private function checkIfTaskHasUpdated($id)
            {
                 return $this->task->update($id, $this->post());
            }


}