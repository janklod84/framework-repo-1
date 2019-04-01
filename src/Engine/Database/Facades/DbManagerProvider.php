<?php 
namespace JanKlod\Database\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Database\DatabaseManager;


/**
 * @package JanKlod\Database\DbManagerProvider 
*/ 
class DbManagerProvider extends ServiceProvider 
{

	   public function register()
	   {
	   	    $this->app->singleton('db', function () {
	   	    	return new DatabaseManager($this->app->get('db.connect'));
	   	    });
	   }
}
