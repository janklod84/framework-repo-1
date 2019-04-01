<?php 
namespace JanKlod\Database\Drivers;

use JanKlod\Database\Driver;


/**
 * @package JanKlod\Database\Drivers\SQLite
*/
class SQLite extends  Driver
{
      

	     /**
  		  * Get Dsn
        * Will be fixed .! 
  		  * @return string
		   */
	     public function getDsn(): string
	     {
             return  sprintf('%s:%s', $this->getDriver(), $this->getPath());
	     }

       
       
       /**
        * Get path filename for connection to sqlite
        * @return string
       */
       private function getPath()
       {
             return $this->config->get('sqlite_path');
       }


       /**
        * Get Driver
        * @return string
       */
       private function getDriver()
       {
            return $this->config->get('driver');
       }

       
       /**
        * Get username
        * @return null
       */
       public function getUser()
       {
              return null;
       }

       /**
        * Get Password
        * @return null
       */
       public function getPassword()
       {
            return null;
       }
       
       /**
        * Get Options
        * @return array
       */
       public function getOptions()
       {
            return $this->config->get('options');
       }

}