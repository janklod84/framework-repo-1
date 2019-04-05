<?php 
namespace app\models;


use  JanKlod\Database\Special\Model;
use \PDO;
use \Session;



/**
 * @package app\models\User
*/ 
class User extends Model
{
      
      /**
       * primary key
       * @var string
       */
      protected $pk = 'id';
      
      /**
       * name table
       * @var string
      */
      protected $table = 'users';

      
      /**
       * @var string
      */
      protected $level = '';
	  
	  
	  /**
	   * Determine if find one user in dabase
	   * @param string $username 
	   * @param string $password 
	   * @return bool
	   */
	  public function login($username, $password)
	  {
		   $sql = $this->queryBuilder
		               ->select()
		               ->from($this->table)
		               ->where('username', $username)
		               ->limit(1)
		               ->sql();
            
		    $stmt = $this->db->query($sql, $this->queryBuilder->values);
            // $stmt->setFetchMode(PDO::FETCH_OBJ);
            $user = $stmt->fetch();
		    if($user)
		    {
		    	if(password_verify($password, $user->password))
		    	{
                      Session::put('sess.auth', $user);
		    		  return true;
		    	}
		    }

		    return false;
	  }

      
      /**
       * User log out
       * @return void
      */
	  public function logout()
	  {
	  	  Session::delete('sess.auth');
	  	  Session::clear();
	  }

      
      /**
       * Get current user
       * @return array
      */
	  public function getUser()
	  {
	  	 return Session::check('sess.auth');
	  }
         
}