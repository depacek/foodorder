<?php
require_once "common.class.php";
class User extends Common{
	public $id,$name,$username,$password,$address;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	function login(){
		$sql="select * from tbl_user where username='$this->username' and password='$this->password'";
		$conn = new mysqli('localhost','root','','food_order'); 
		if($conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			print_r($data);
			session_start();
			$_SESSION['user_name']=$data->name;
			$_SESSION['user_username']=$data->username;
			$_SESSION['user_address']=$data->address;
			
			header('location:home.php');
		}else {
			return "Username Password didnt match";
		}
	}
	function create(){
			// print_r($this);
			 $sql="insert into tbl_user (name,username,password,address) values ('$this->name','$this->username','$this->password','$this->address') ";
			 return $this->insert($sql);

		}
		public function list()
		{
			$sql="select * from tbl_user";
			return $this->select($sql);
		}
		public function remove()
		{
			$sql="delete from tbl_user where id='$this->id'";
			return $this->delete($sql);
		}
		public function getAdminByID()
		{
			$sql="select * from tbl_user where id='$this->id'";
			return $this->select($sql);
			
		}
		public function edit()
		{
			$sql="update tbl_user set name='$this->name',username='$this->username',password='$this->password',email='$this->email',role='$this->role',status='$this->status',last_login='$this->last_login' where id='$this->id' ";
			 return $this->update($sql);
		}
}
?>