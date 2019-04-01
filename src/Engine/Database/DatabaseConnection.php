<?php 
namespace JanKlod\Database;

use \PDO;


/**
 * @package JanKlod\Database\DatabaseConnection
 */
class DatabaseConnection implements ConnectionInterface
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
             if(!array_key_exists($this->driver, self::REQUIRED_DRIVERS))
             {
                exit(sprintf('Sorry, This <strong>%s</strong> is not required driver!!!', 
                     $this->driver));
             }

             if(!$this->isConnected())
             {
                  return $this->connect();
             }
         }

         
         /**
          * Determine if has connexion to PDO
          * @return bool
         */
         public function isConnected(): bool
         {
             return $this->connection instanceof PDO;
         }

         
         /**
          * Connection to PDO
          * @return mixed
         */
         private function connect()
         {
               try 
               {
                   $connectionObj = $this->currentDriverName();

                   // echo $connectionObj->getDsn();
                   
                   $this->connection = new PDO($connectionObj->getDsn(), 
                                               $connectionObj->getUser(), 
                                               $connectionObj->getPassword(),
                                               $connectionObj->getOptions());
                   
                   return $this->connection;

               } catch (PDOException $e) {
                    
                    die('Error Connection!');
               }
         }

         
         /**
          * Reset connection
          * @return void
         */
         public function closeConnect()
         {
              $this->connection = null;
         }

         
         /**
          * Get full driver object
          * @return DriverInterface
         */
         private function currentDriverName(): DriverInterface
         {
              $name = sprintf(self::NS_DRIVER, self::REQUIRED_DRIVERS[$this->driver]);
              return new $name($this->config);
         }
}