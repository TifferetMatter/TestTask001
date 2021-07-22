<?php

namespace Controller;

class User
extends \Controller
{
    public function __construct()
	{
		// set model
		$this->model = new \Model\User();

		// set view
		$this->view = new \View();

		// start session
		session_start();
    }

	// create task
	public function Add()
	{
		if (
			isset($_POST['name']) &&
			isset($_POST['email']) &&
			isset($_POST['text'])
		)
		{
			if ($this->model->Add($_POST['name'], $_POST['email'], $_POST['text']))
			{
				$this->view->Render('Success', [
					'active' => 'add',
					'title' => 'Задача успешно создана'
				]);
			}
			else
			{
				throw new \Exception('Error while saving Task');
			}
		}
	}

	// show form to create Task
	public function Create()
	{
		$this->view->Render('Create', [
			'title' => 'Создание задачи',
			'active' => 'create'
		]);
	}

	// main action (show list)
    public function Index()
	{
        $this->view->Render('ListUser', [
			'active' => 'index',
			'title' => 'Список задач',
			'tasks' => $this->model->GetTaskList()
		]);
    }

    // return task data as JSON
    public function Json()
	{
        if (isset($_POST['id']))
        {
            $task = $this->model->GetTask($_POST['id']);
            die(json_encode($task));
        }
    }
}