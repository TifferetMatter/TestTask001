<?php

namespace Model;

class Admin
extends \Model
{
    public function Login(string $login, string $pw)
	{
		return
			(ADMIN_LOGIN == $login) &&
			(ADMIN_PASS == $pw);
    }

    public function GetTasks()
	{
        $data = $this->db->Query('SELECT * FROM task');

        return $data->rows;
    }

    public function GetTask(int $id = 0)
	{
        $data = $this->db->Query('
			SELECT * 
			FROM task 
			WHERE id = ' . intval($id)
		);

        return $data->row;
    }

	public function Update(int $taskId, string $taskText, int $taskDone)
	{
		// get initial task data
		$taskData = $this->GetTask(intval($taskId));

		// save data
		return boolval($this->db->Query('
			UPDATE 
			    task 
			SET 
			    text = "' . htmlspecialchars($taskText) . '",
				status = ' . (boolval($taskDone) ? 'UNIX_TIMESTAMP()' : '0') . ',
				edit = ' . ($taskData['text'] != $taskText ? 'UNIX_TIMESTAMP()' : 'edit') . ' 
			WHERE 
				id = ' . intval($taskId)
		));
	}
}