<?php

class Application
{
    public static function Run() : void
	{
		// get route
		$route = $_SERVER['REQUEST_URI'] ?? '';

		// remove leading slash
		if ('/' == substr($route, 0, 1))
		{
			$route = substr($route, 1);
		}

		// remove params
		if (false !== ($pos = strpos($route, '?')))
		{
			$route = substr($route, 0, $pos);
		}

		// map empty to default
		$route = $route ?: 'user/index';

		// analyze
		if (
			preg_match('/(admin)\/(index|edit|update|auth|login|logout)$/', $route, $match) ||
			preg_match('/(user)\/(index|create|json|add)$/', $route, $match)
		)
		{
			// set controller class
			$controllerClass = '\Controller\\' . ucfirst($match[1]);

			// set method name
			$controllerMethod = ucfirst($match[2]);
		}
		else
		{
			// send 404 header
			header('HTTP/1.1 404 Not Found');

			// terminate script
			die('HTTP 404: Sorry, you are looking for non-existing page');
		}

		// create controller
		$controller = new $controllerClass();

        // run controller
		$controller->$controllerMethod();
	}
}