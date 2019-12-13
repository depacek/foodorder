<?php
require_once "object.php";
 $menu->set('id',$_GET['id']);
 $menu->remove();
 header('location:list_menu.php');

?>