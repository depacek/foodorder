<?php
require_once "object.php";
 $comment->set('id',$_GET['id']);
 $comment->set('status',$_GET['status']);
 $comment->edit();
 header('location:comment.php');

?>