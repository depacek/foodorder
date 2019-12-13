<?php
 require_once "object.php";
 $admin->set('id',$_GET['id']);
 $admin->remove();
 header('location:list_admin.php');
?>