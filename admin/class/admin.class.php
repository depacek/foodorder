<?php
require_once "common.class.php";
class Admin extends Common{
	public $id,$name,$email,$username,$password,$last_login,$role,$status;

	function set($var,$value) {
		$this->$var= $value;
	}
	function get($var) {
		return $this->$var;
	}
	function login(){
		$sql="select * from tbl_admin where email='$this->email' and password='$this->password'";
		$conn = new mysqli('localhost','root','','food_order'); 
		if($conn->connect_errno != 0) {
			die('Database Connection Error');
		}
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$data=$result->fetch_object();
			print_r($data);
			session_start();
			$_SESSION['admin_name']=$data->name;
			$_SESSION['admin_username']=$data->username;
			$_SESSION['admin_email']=$data->email;
			$_SESSION['admin_role']=$data->role;
			
			header('location:dashboard.php');
		}else {
			return "Username Password didnt match";
		}
	}
	function create(){
			// print_r($this);
			 $sql="insert into tbl_admin (name,email,username,password,last_login,role,status) values ('$this->name','$this->email','$this->username','$this->password','$this->last_login','$this->role','$this->status') ";
			 return $this->insert($sql);

		}
		public function list()
		{
			$sql="select * from tbl_admin";
			return $this->select($sql);
		}
		public function remove()
		{
			$sql="delete from tbl_admin where id='$this->id'";
			return $this->delete($sql);
		}
		public function getAdminByID()
		{
			$sql="select * from tbl_admin where id='$this->id'";
			return $this->select($sql);
			
		}
		public function edit()
		{
			$sql="update tbl_admin set name='$this->name',username='$this->username',password='$this->password',email='$this->email',role='$this->role',status='$this->status',last_login='$this->last_login' where id='$this->id' ";
			 return $this->update($sql);
		}
}
?>