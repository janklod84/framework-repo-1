<?php 
namespace JanKlod\Database\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Database\DatabaseConnection;


/**
 * @package JanKlod\Database\DbConnectionProvider 
*/ 
class DbConnectionProvider extends ServiceProvider 
{

	   public function register()
	   {
	   	    $configObj = $this->app->get('db.config');
	   	    $this->app->singleton('db.connect', function () use($configObj) {
	   	    	return new DatabaseConnection($configObj);
	   	    });
	   }
}
