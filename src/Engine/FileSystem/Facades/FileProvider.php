<?php 
namespace JanKlod\FileSystem\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\FileSystem\File;


/**
 * @package FileProvider
*/
class FileProvider extends ServiceProvider
{
       
       public function register()
       {
       	   $this->app->singleton('file', function () {
               return new File($this->app->get('root'));
           });
       }
}