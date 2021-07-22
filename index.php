<?php

// code directory
const DIR_APP = 'app' . DIRECTORY_SEPARATOR;

// views directory
const DIR_VIEW = DIR_APP . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

// load configuration
require(DIR_APP . 'Config.php');

// register autoloader
spl_autoload_register(function($className)
{
	require(DIR_APP . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php');
});

// run application (router)
\Application::Run();