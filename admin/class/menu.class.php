<?php
require_once "common.class.php";
	class Menu extends Common{
		public $id,$category_id,$name,$price,$image,$description,$status,$created_date,$updated_date,$created_by,$updated_by;
		function create(){
			// print_r($this);
			 $sql="insert into tbl_menu (category_id,name,price,image,description,status,created_date,created_by) values ('$this->category_id','$this->name','$this->price','$this->image','$this->description','$this->status','$this->created_date','$this->created_by') ";
			 return $this->insert($sql);

		}
		public function list(){
			 $sql="select * from tbl_menu";
			 return $this->select($sql);
		}

		public function remove(){
			$sql="delete from tbl_menu where id='$this->id'";
			return $this->delete($sql);
		}
		public function getMenusByID(){
			$sql="select * from tbl_menu where id='$this->id'";
			return $this->select($sql);
			
		}
		public function edit(){
			if (empty($this->image)) {
				$sql="update tbl_menu set category_id='$this->category_id',name='$this->name',price='$this->price',description='$this->description',status='$this->status',updated_date='$this->updated_date',updated_by='$this->updated_by' where id='$this->id' ";
			}else{
				$sql="update tbl_menu set category_id='$this->category_id',name='$this->name',price='$this->price',image='$this->image',description='$this->description',status='$this->status',updated_date='$this->updated_date',updated_by='$this->updated_by' where id='$this->id' ";
			}
			
			 return $this->update($sql);
			}
		function getMenubyCategoryID(){
			$sql="select id,image,name,description from tbl_menu where status=1 and category_id='$this->category_id' order by created_date desc";
			return $this->select($sql);
		}
		
		function getLatestNews(){
			$sql="select * from tbl_menu where status=1 order by created_date desc";
			return $this->select($sql);
			
		}
		function getBreakingNews(){
			$sql="select * from tbl_menu where status=1 and breaking_key=1 order by created_date desc limit 5";
			return $this->select($sql);
			
		}
		function getFeatureNews(){
			$sql="select * from tbl_menu where status=1 and feature_key=1 order by created_date desc limit 10";
			return $this->select($sql);
		}
		
		function getNewsByCategory($offset){
			$sql="select id,feature_image,title,short_description,category_id from tbl_menu where status=1 and category_id='$this->category_id' order by created_date desc limit 3 offset $offset";
			return $this->select($sql);
		}
		function getTotalNewsByCategory(){
			$sql="select id from tbl_menu where status=1 and category_id='$this->category_id' ";
			return $this->select($sql);
		}
		
		function getNewsInId(){
			$sql="select n.*,c.name as cname,a.name as aname from tbl_menu n join tbl_category c on n.category_id=c.id join tbl_admin a on n.created_by=a.username where n.status=1 and n.id='$this->id'";
			return $this->select($sql);
		}
	}
?>