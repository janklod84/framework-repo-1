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
                \JanKlod\Template\Facades\ViewProvider::class,
                // \JanKlod\Database\Facades\DbConfigProvider::class,
                // \JanKlod\Database\Facades\DbConnectionProvider::class,
                // \JanKlod\Database\Facades\DbManagerProvider::class,
                // \JanKlod\Validation\Facades\ValidationProvider::class,
                // \JanKlod\Database\Facades\ActiveRecordProvider::class,
                // \JanKlod\Template\Facades\AssetProvider::class,
            ],
            'alias' => [
               'Route'   => 'JanKlod\\Routing\\Route',
               'Asset'   => 'JanKlod\\Template\\Asset',
               'HTML'    => 'JanKlod\\Template\\HTML', 
               'Session' => 'JanKlod\\Common\\Sessions\\Session',
               'Token'   => 'JanKlod\\Encryption\\Token',
               'Auth'    => 'JanKlod\\Authentication\\Auth',
               'Config'  => 'JanKlod\\Configuration\\Config',
               'Url'     => 'JanKlod\\Common\\Url',
               'Flash'   => 'JanKlod\\Common\\Flash',
               'Router'  => 'JanKlod\\Routing\\Router'
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