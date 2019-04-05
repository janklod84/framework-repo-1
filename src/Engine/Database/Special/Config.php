<?php 
namespace JanKlod\Database\Special;

use \PDO;


/**
 * @package config DB
*/
class Config 
{
      

      /**
       * @const string 
      */
	  const DB_HOST = '127.0.0.1';
      
      /**
       * @const int 
      */
	  const DB_PORT = 3306;


	  /**
       * @const string 
      */
	  const DB_NAME = 'jk_task';

      
      /** 
       * @const string 
      */
	  const DB_CHARSET = 'utf8';


	  /** 
       * @const string 
      */
	  const DB_USER = 'admin';


	  /** 
       * @const string 
      */
	  const DB_PASS = '123';

    
    /**
     * @const Options 
    */
	  const DB_OPTIONS = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	  ];
}
