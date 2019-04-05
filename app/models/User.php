<?php 
namespace app\models;


use  JanKlod\Database\Special\Model;
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
	   * Determine if find one user from database
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
                      Session::put('sess.user', $user);
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
	  	  Session::remove('sess.user');
	  	  Session::clear();
	  }


      /**
       * Get info current user by key
       * @param mixed $key
       * @return array
      */
	  public function info($key)
	  {
	  	   return Session::check('sess.user')[$key];
	  }
         
}