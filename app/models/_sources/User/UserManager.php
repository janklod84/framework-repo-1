<?php 
namespace app\models\User;

use JanKlod\Database\Special\Model;


/**
 * @package app\models\User\UserManager
*/ 
class UserManager extends Model
{
         
         /**
          * Table name
          * @var string
         */
	      protected $table = 'users';

         
         /**
          * Primary Key
          * @var string
         */
         protected $pk = 'id';


        /**
         * Find user where $id 
         * @param init $id 
         * @return 
        */
        public function read($id = null)
        {
             
        }
}