<?php 
namespace app\models\User;


/**
 * @package app\models\User\User
*/ 
class User
{
        
         // trait ActiveRecord;
  
         /**
          * @var int
         */
         private $id;


         /**
          * @var string
         */
	       private $username;


         /**
          * @var string
         */
         private $password;
         


        
         /**
          * Get User Id
          * @return int
         */
          public function getId()
          {
              return $this->id;
          }


         /**
          * Set username 
          * @param string $username 
          * @return void
         */
          public function setUsername($username)
          {
                $this->username = $username;
          }


  	      /**
           * Get name 
           * @return string
          */
          public function getUsername()
          {
              return $this->username;
          }


        /**
          * Set password 
          * @param string $password 
          * @return void
         */
         public function setPassword($password)
         {
              $this->password = password_hash($password, PASSWORD_DEFAULT);
         }


        /**
         * Get password 
         * @return string
        */
        public function getPassword()
        {
            return $this->password;
        }
}