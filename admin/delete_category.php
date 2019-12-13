<?php
 require_once "object.php";
 $category->set('id',$_GET['id']);
 $category->remove();
 header('location:list_category.php');
?>