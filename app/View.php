<?php

class View
{
    public function Render($template, $data) : void
	{
		// add logon data
		$data['logon'] = ($_SESSION['logged'] ?? 0);

		// render
        include DIR_VIEW . DIRECTORY_SEPARATOR . $template . '.php';
    }

}