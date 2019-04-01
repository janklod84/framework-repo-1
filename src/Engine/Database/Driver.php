<?php 
namespace JanKlod\Database;



/**
 * @package Driver 
*/
abstract class Driver implements DriverInterface
{
       
       /**
        * @var DatabaseConfiguration
       */
       protected $config;


       /**
        * Constructor 
        * @return 
       */
       public function __construct(DatabaseConfiguration $config)
       {
             $this->config = $config;
       }


  	   /**
  	    * Get Dsn
  	    * @return string
  	   */
  	   abstract public function getDsn(): string;
       

       /**
        * Get User
        * @return null|string
       */
       abstract public function getUser();
       
       /**
        * Get Password
        * @return null|string
       */
       abstract public function getPassword();
       
       /**
        * Get Options
        * @return null|array
       */
       abstract public function getOptions();
       
}