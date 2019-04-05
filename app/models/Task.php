<?php 
namespace app\models;


use  JanKlod\Database\Special\Model;


/**
 * @package app\models\Task
*/ 
class Task extends Model
{

      
      /**
       * name table
       * @var string
      */
      protected $table = 'tasks';


     
     /**
      * Create Task
      * @param array $data 
      * @return mixed
      */
     public function create(array $data = [])
     {
            unset($data['_csrf']);
            return parent::create($data);
     }

      /**
       * Update Task
       * @param int $id 
       * @param array $data 
       * @return bool
       */
      public function update(int $id, array $data = [])
      {
            unset($data['_csrf']);
            return parent::update($id, $data);
      }
     
}