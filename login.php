<?php session_start();?>
<?php include_once "header.php"?>
<?php include_once "functions.php"?>
<form action="" method="POST">
    User Name: <input type="text" id="user" name="user"><br>
    Password: <input type="password" id="password" name="password"><br>
    <input type="submit">
</form>
<?php 
if($_SERVER['REQUEST_METHOD']==="POST"){
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['password'] = $_POST['password'];
    if(authenticate_admin()){
        header("Location: admin/index.php");
    }else{
        header("Location: index.php");
    }
}
?>
<?php include_once "footer.php"?>