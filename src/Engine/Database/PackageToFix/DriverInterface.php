<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\DriverInterface
*/
interface DriverInterface
{
	 /**
	  * Get Dsn
	  * @return type
	 */
     public function getDsn(): string;
}