<?php
 abstract class Common{

 	var $conn;
 	function set($var,$value) {
		$this->connect();
 		
		$this->$var= $this->conn->real_escape_string($value);
	}
	function get($var) {
		return $this->$var;
		
	}
	public function connect(){
		$this->conn = new mysqli('localhost','root','','food_order'); 
		if($this->conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		
	}

	function insert($sql){
		$this->connect();
		$this->conn->query($sql);
		 if ($this->conn->affected_rows >0 && $this->conn->insert_id>0) {
			 	return $this->conn->insert_id;
			 }else{
			 	return false;
			 }
	}

	function select($sql){
		$this->connect();
		$res=$this->conn->query($sql);
		 $data=[];
		 while ($da=$res->fetch_object()) {
		 	array_push($data, $da);
		 }
		 return $data;
	}
	function delete($sql){
		$this->connect();
		$this->conn->query($sql);
		 if ($this->conn->affected_rows >0 ) {
			 	return true;
			 }else{
			 	return false;
			 }
	}

	function update($sql){
		$this->connect();
		$this->conn->query($sql);
		 if ($this->conn->affected_rows >0 ) {
			 	return true;
			 }else{
			 	return false;
			 }
	}
 }

?>