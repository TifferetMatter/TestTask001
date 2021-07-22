<?php

namespace Model;

class User
extends \Model
{
	public function Add(string $name, string $email, string $text) : bool
	{
		// insert data
		return boolval($this->db->Query('
			INSERT INTO task (id, status, edit, name, email, text) 
			VALUES (NULL, 0, 0, "' . htmlspecialchars($name) . '", "' . htmlspecialchars($email) . '", "' . htmlspecialchars($text) . '")			
		'));
	}

	public function GetTask(int $id = 0)
	{
		$data = $this->db->Query('SELECT * FROM task WHERE id = ' . intval($id));
		return $data->row;
	}

    public function GetTaskList()
	{
        $data = $this->db->Query('
			SELECT * 
			FROM task
		');

        return $data->rows;
    }
}