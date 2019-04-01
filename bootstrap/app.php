<?php 

// This path 'll be removed !
require_once ROOT .'/debug.php';

/*
|----------------------------------------------------------------------
|   Autoloading classes and dependencies of application
|----------------------------------------------------------------------
*/
require_once realpath(ROOT .'/vendor/autoload.php');


use JanKlod\Foundation\Controls\UserPhpVersion;
use JanKlod\Foundation\{
	Application,
	ControlManager
};


/*
|----------------------------------------------------------------------
|    Error Handler settings [Simple Error Handler...]
|----------------------------------------------------------------------
*/

error_reporting(E_ALL);
set_error_handler('JanKlod\Exception\ErrorHandler::errorHandler');
set_exception_handler('JanKlod\Exception\ErrorHandler::exceptionHandler');



/*
|-------------------------------------------------------
|     Get instance of Application
|-------------------------------------------------------
*/

if(ControlManager::currently(new UserPhpVersion()))
{
	 $app = Application::instance(ROOT);
}



