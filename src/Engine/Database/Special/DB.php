<?php 
namespace JanKlod\Database\Special;


use \PDO;
use \PDOException;


/**
 * This is momental DB for working quickly
 * 
 * @package JanKlod\Database\Special\DB 
*/ 
class DB
{

        /**
         * @const 
        */
	      const DSN = 'mysql:host=%s;port=%s;dbname=%s;charset=utf8';


        /**
         * @var \PDO
         */
        private $pdo;

        

        /**
         * @var DB
        */
        private static $instance;

        
        /**
         * 
         * @return \PDO
        */
        private function __construct()
        {
              try 
              {
              	   $this->pdo = new PDO($this->getDsn(),  Config::DB_USER, Config::DB_PASS, Config::DB_OPTIONS);

              }catch(PDOException $e) {

                  die($e->getMessage());
              }
        }

        
       
        
        /**
         * Get instance
         * @return type
        */
        public static function getInstance()
        {
        	  if(is_null(self::$instance))
        	  {
        	  	  self::$instance = new DB();
        	  }

        	  return self::$instance;
        }


        /**
         * Query statement 
         * @param string $sql 
         * @return mixed
        */
        public function query(string $sql, $params = [])
        {
           if(!empty($params))
           {
               $stmt = $this->pdo->prepare($sql);
               $stmt->execute($params);
               return $stmt;

           }else{

                return $this->pdo->query($sql);
           }

        }

        
        /**
         * Determine the last insert id in records
         * @return int
        */
        public function lastInsertId()
        {
            return $this->pdo->lastInsertId();
        }

    
        private function getDsn()
        {
            return sprintf(self::DSN, Config::DB_HOST, Config::DB_PORT, Config::DB_NAME, Config::DB_CHARSET);
        }

}