<?php 
namespace JanKlod\Configuration\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Configuration\Config;
use JanKlod\Foundation\Setting;



/**
 * @package ConfigProvider
*/
class ConfigProvider extends ServiceProvider
{
       
       private function map()
       {
           return $this->app->get('file')
                       ->map(sprintf('%s/config/*.php', Setting::APP_ENV));
       }

       private function process()
       {
           $data = [];

           foreach($this->map() as $file)
           {
               $key = $this->app->get('file')
                                ->details($file)['filename'];
               $data[$key] = include($file);
           }

           $this->app->set('configs', $data);
            
       }


       public function register()
       {
       	   $this->process();

       	   $this->app->singleton('config', function () {
       	   	   return new Config($this->app->get('configs'));
       	   });
       }
}