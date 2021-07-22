<?php

namespace Controller;

class Admin
{
    public function __construct()
	{
		// set model
        $this->model = new \Model\Admin();

        // set view
        $this->view = new \View();

        // start session
        session_start();
    }

    public function Index()
	{
		// if !auth
        if (!isset($_SESSION['logged']))
        {
        	// redirect
            header('Location: /admin/auth');

            // terminate script
			die('');
        }

        // show task list
        $this->view->Render('ListAdmin', [
			'title' => 'Список задач',
			'tasks' => $this->model->GetTasks()
		]);
    }

    public function Edit()
    {
        if (isset($_GET['id']))
        {
            $this->view->Render('EditTask', [
				'title' => 'Редактирование задачи',
				'task' => $this->model->GetTask((int)$_GET['id'])
			]);
        }
        else
        {
        	// redirect
            header('Location: /admin/index');
        }
    }

    public function Update()
    {
    	// add data...
        if ($this->model->Update(
        	$_POST['id'] ?? 0,
			$_POST['text'] ?? '',
			$_POST['done'] ?? 0
		))
        {
        	// set user message
            $_SESSION['message'] = 'Успешно сохранено';

            // redirect
            header('Location: /admin/index');
        }
    }

    public function Auth()
	{
		// show auth form
		$this->view->Render('Auth', ['title' => 'Вход на страницу администратора']);
	}

    public function Login()
    {
		if ($this->model->Login($_POST['login'] ?? '', $_POST['pass'] ?? ''))
		{
			// set auth flag
			$_SESSION['logged'] = true;

			// return success
			die(json_encode(['status' => 'ok']));
		}

		// return fail
		die(json_encode(['status' => 'error']));
    }

    public function Logout()
    {
    	// unset auth flag
        unset($_SESSION['logged']);

        // close session
        session_destroy();

        // redirect
        header('Location: /admin/auth');
    }
}