<?php 
/*
|----------------------------------------------------------------------
|   Application  :  Framework using pattern MVC
|   Name         :  Janklod
|   Author       :  Jean-Claude <jeanyao34@yahoo.com>
|----------------------------------------------------------------------
*/
/*
|-------------------------------------------------------
|   Define constante root directory of Application
|-------------------------------------------------------
*/

define('ROOT', dirname(__DIR__));
define('DEV', true);


/*
|-------------------------------------------------------
|    Require bootstrap of Application
|-------------------------------------------------------
*/

require_once realpath(ROOT.'/bootstrap/app.php');


/*
|-------------------------------------------------------
|    Run Application
|-------------------------------------------------------
*/

$app->run();
