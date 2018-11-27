<?php
	
class Database{
	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $db_name = "1660626_quanlysanpham";
	private $conn = null;		
	private $result = null;
	
	public function connect()
	{
		$this->conn = mysqli_connect($this->server, $this->username, $this->password);
		mysqli_select_db($this->conn, $this->db_name);
	}
	public function query($sql)
	{
		$this->resultQuery = mysqli_query($this->conn, $sql);
		return $this->resultQuery;
	}
	public function num_rows()
	{
		if($this->result){
			$row = mysqli_num_rows($this->result);
		}
		else{
			$row = 0;
		}
	}
	public function fetch_assoc()
	{
		if($this->result)
		{
			$data = mysqli_fetch_assoc($this->result);
		}
		else{
			$data = 0;
		}
		return $data;
	}
	public function disconnect()
	{
		mysqli_close($this->conn);
	}
	// LIST RECORD
	public function listRecord($resultQuery = null){
		$result = array();
		$resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;
		if(mysqli_num_rows($resultQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($resultQuery))
			{
				$result[] = $row;
			}
			mysqli_free_result($resultQuery);
		}
		return $result;
	}

	// SINGLE RECORD
	public function singleRecord($resultQuery = null)
	{
		$result = array();
		$resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;
		if(mysqli_num_rows($resultQuery) > 0)
		{
			$result = mysqli_fetch_assoc($resultQuery);
		}
		return $result;
	}
	public function isExist($query)
	{
		if($query != null)
		{
			$this->resultQuery = mysqli_query($this->conn, $query);
		}
		if (mysqli_num_rows($this->resultQuery) > 0)
			return true;
		return false;
	}
	// TOTAL ITEM
	public function totalItem($query)
	{
		$result = array();
		if(!empty($query)){
			$resultQuery = $this->query($query);
			if(mysqli_num_rows($resultQuery) > 0)
			{
				$result = mysqli_fetch_assoc($resultQuery);
			}
		 	mysqli_free_result($resultQuery);
		}	
		return $result['totalItem'];
	}
}

