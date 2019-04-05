<?php 
namespace JanKlod\Database\Drivers;

use JanKlod\Database\Driver;


/**
 * @package JanKlod\Database\Drivers\MySQL
*/
class MySQL  extends  Driver
{
         

        const DSN = '%s:host=%s;port=%d;dbname=%s;charset=%s';


	     /**
		  * Get Dsn
		  * @return type
		 */
	     public function getDsn(): string
	     {
             return sprintf(
                 self::DSN,
                 $this->config->get('driver'),
                 $this->config->get('host'),
                 $this->config->get('port'),
                 $this->config->get('name'),   
                 $this->config->get('charset') ?? 'utf8'
             );
	     }

         
         public function getUser()
         {
              return $this->config->get('user');
         }


         public function getPassword()
         {
              return $this->config->get('password');
         }

         public function getOptions()
         {
              return $this->config->get('options');
         }

}