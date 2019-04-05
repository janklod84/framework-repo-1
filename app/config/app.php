<?php 

return [
   
   /*
    |------------------------------------------------------------------
    |   Application starting time
    |------------------------------------------------------------------
   */
    'microtime' => microtime(true),

   /*
    |------------------------------------------------------------------
    |   Application Mode [ dev: development, prod: production ]
    |------------------------------------------------------------------
   */
    'mode' => 'dev',
   
   /*
    |------------------------------------------------------------------
    |   Application Timezone
    |------------------------------------------------------------------
   */
    'timezone' => 'UTC', // Asia/Yekaterinburg

   /*
    |------------------------------------------------------------------
    |   Application Name
    |------------------------------------------------------------------
   */
    'name' => 'JanKlod', // Задачик

   /*
    |------------------------------------------------------------------
    |   Application Debug mode 
    |------------------------------------------------------------------
   */
    'debug' => true, // false

   /*
    |------------------------------------------------------------------
    |   Application Base URL
    |    'base_url' => baseUrl() By default show current url
    |    'base_url' => baseUrl('http://project.loc/') return http://project.loc/
    |    'base_url' => baseUrl(false) remove path current base url
    |------------------------------------------------------------------
   */
    'base_url' => baseUrl(),  // '',  http://project.loc/
    
   /*
    |------------------------------------------------------------------
    |  Add services alias to application
    |------------------------------------------------------------------
   */

    'alias' => [
       // 'Form' => 'app\\library\\BootstrapForm'
    ],
    
   /*
    |------------------------------------------------------------------
    |  Add services providers to application
    |------------------------------------------------------------------
   */
    'providers' => [
         // app\providers\FirstTestProvider::class,
         // app\providers\SecondTestProvider::class,
    ]

];