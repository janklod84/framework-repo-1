<?php 
namespace JanKlod\Foundation;


/**
 * Define somes constantes for Application
 * @package Setting
*/
class Setting
{

       
        /**
         * Minimum Version PHP Required
        */
        const APP_PHP_MIN = '7.1';
       
        /**
         * Name of Application
         * @const string
        */
        const APP_NAME = 'JanKlod';


        /**
         * Default Environment of Application
         * @const string
        */
        const APP_ENV = 'app';


        /**
         * Container Services Providers
         * @const array
        */
        const APP_SERVICES = [
            'providers' => [
                \JanKlod\FileSystem\Facades\FileProvider::class,
                \JanKlod\Configuration\Facades\ConfigProvider::class,
                \JanKlod\Http\Facades\RequestProvider::class,
                \JanKlod\Http\Facades\ResponseProvider::class,
                \JanKlod\Routing\Facades\RouterProvider::class,
                \JanKlod\Template\Facades\ViewProvider::class
            ],
            'alias' => [
               'Route' => 'JanKlod\\Routing\\Route'
            ]
        ];

        

        /**
         * Container modules of Application 
        */
        const APP_MODULES = [
            \JanKlod\Modules\Blog\ModuleManager::class,
            \JanKlod\Modules\Test\ModuleManager::class
        ];

}