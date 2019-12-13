<?php
require_once "common.class.php";
	class Category extends Common{
		public $id,$name,$rank,$status,$description,$created_date,$updated_date,$created_by,$updated_by;
		function create(){
			// print_r($this);
			 $sql="insert into tbl_category (name,rank,status,description,created_date,created_by) values ('$this->name','$this->rank','$this->status','$this->description','$this->created_date','$this->created_by') ";
			 return $this->insert($sql);

		}
		public function list(){
			$sql="select * from tbl_category";
			return $this->select($sql);
		}
		public function remove(){
			$sql="delete from tbl_category where id='$this->id'";
			return $this->delete($sql);
		}
		public function getCategoryByID(){
			$sql="select * from tbl_category where id='$this->id'";
			return $this->select($sql);
		}
		public function edit(){
			$sql="update tbl_category set name='$this->name',rank='$this->rank',status='$this->status',description='$this->description',updated_date='$this->updated_date',updated_by='$this->updated_by' where id='$this->id' ";
			 return $this->update($sql);
		}
		public function getCategoryForMenu(){
			$sql="select * from tbl_category where status='1' order by rank ";
			return $this->select($sql);
		}
		public function getMenubyCategoryID(){
			$sql="select id,image,price,name,description from tbl_menu where status=1 and category_id='$this->id' order by created_date desc";
			return $this->select($sql);
		}
	}
?>