<?php

class MySql
{
    private object $_link;


    public function __construct()
	{
		// connect
        $this->_link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // check connection
        if ($this->_link->connect_error)
        {
            throw new \Exception('Error ' . $this->_link->errno . ': ' . $this->_link->error);
        }

        // set client charset
        $this->_link->set_charset('utf8');
	}

	public function __destruct()
	{
		$this->_link->close();
	}

    public function Query($query)
	{
		// exec query
        $qr = $this->_link->query($query);

        // check errors
        if (!$this->_link->errno)
        {
            if ($qr instanceof \mysqli_result)
            {
            	// fetch
                while ($row = $qr->fetch_assoc())
				{
                    $data[] = $row;
                }

                // turn data into class
                $result = new stdClass();
                $result->num_rows = $qr->num_rows;
                $result->row = $data[0] ?? [];
                $result->rows = $data ?? [];

                // close marker
                $qr->close();

                // return result data as class
                return $result;
	        }
            else
            {
				return true;
            }
        }
        else
        {
            throw new \Exception('Error ' . $this->_link->errno . ': ' . $this->_link->error);
        }
    }
}