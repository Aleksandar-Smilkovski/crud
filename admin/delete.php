<?php
  include "./../data.php";
  include "./../functions.php";
  if(!authenticate_admin()){
    header("Location: ./../index.php");
  } 
  $id = $_GET['key'];
  $sql = "DELETE FROM feedback WHERE id = '$id'";
  $conn->exec($sql);
  header("Location:index.php");
?>