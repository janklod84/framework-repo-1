<?php 
namespace JanKlod\Database;

use \PDO;


/**
 * @package JanKlod\Database\DatabaseConnection
 */
class DatabaseConnection
{

         /**
          * Required Dirvers
          * @const array 
         */
         const REQUIRED_DRIVERS = [
             'mysql'  => 'MySQL',
             'pgsql'  => 'PgSQL',
             'sqlite' => 'SQLite',
             'oracle' => 'Oracle'
         ];


         const NS_DRIVER = '\\JanKlod\\Database\\Drivers\\%s';


         /**
          * @var DatabaseConfiguration
         */
         private $config;


         /**
          * @var Current driver
         */
         private $driver;


         /**
          * Connection to PDO
          * @var \PDO
         */
         private $connection;


         /**
          * current dsn
          * @var string
         */
         private $dsn;

  
         
         /**
          * Constructor
          * @param DatabaseConfiguration $config 
          * @return void
         */
	       public function __construct(DatabaseConfiguration $config)
	       {
	     	       $this->config = $config;
               $this->driver = $config->get('driver');
	       }

         
         /**
          * Make connection
          * @return type
         */
         public function make() 
         {
             if(array_key_exists($this->driver, self::REQUIRED_DRIVERS))
             {
                   $this->dsn = $this->getCurrentDsn();
             }
          
             $this->connection = new PDO($this->dsn, 
                                         $this->config->get('user'),
                                         $this->config->get('pass'),
                                         $this->config->get('options')
                                       );
         }


         private function getCurrentDsn()
         {
              $name = sprintf(self::NS_DRIVER, $this->driverName());
              $driverClass = new $name($this->config);
              return $driverClass->getDsn();
         }


         private function driverName()
         {
             return self::REQUIRED_DRIVERS[$this->driver];
         }
    
}