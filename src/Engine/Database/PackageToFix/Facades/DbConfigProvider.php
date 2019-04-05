<?php 
namespace JanKlod\Database\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Database\DatabaseConfiguration;


/**
 * @package JanKlod\Database\DbConfigProvider 
*/ 
class DbConfigProvider extends ServiceProvider 
{

	   public function register()
	   {
            $config = $this->app->config->get('database');
            
	   	    $this->app->singleton('db.config', function () use($config) {
	   	    	return new DatabaseConfiguration($config);
	   	    });
	   }
}
