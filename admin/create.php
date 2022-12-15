<?php include_once "./../header.php" ?>
<?php 
  include "./../data.php";
  include "./../functions.php";
  if(!authenticate_admin()){
    header("Location: ./../index.php");
  } 
?>
<form action="" method="POST">
    Name <input type="text" id="name" name="name"><br>
    Email <input type="email" id="email" name="email"><br>
    Description <input type="text" id="body" name="body"><br>
    <input type="submit">
</form>
<?php 
if($_SERVER['REQUEST_METHOD']==="POST"){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $body = $_POST['body'];
  $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
  $conn->exec($sql);
  header("Location:index.php");
}
?>
<?php include_once "./../footer.php" ?>