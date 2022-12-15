<?php 
include "./../functions.php";
if(!authenticate_admin()){
  header("Location: ./../index.php");
} 
session_start();
session_unset();
session_destroy();
header("Location: ./../index.php");
?>