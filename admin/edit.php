<?php include_once "./../header.php" ?>
<?php 
  include "./../data.php";
  include "./../functions.php";
  if(!authenticate_admin()){
    header("Location: ./../index.php");
  } 
?>
<?php 
$id = $_GET['edit'];
$name;
$email;
$body;
if($_SERVER['REQUEST_METHOD']==="GET"){
  $stmt = $conn->prepare("SELECT id, name, email, body FROM feedback");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $items = $stmt->fetchAll();
     foreach($items as $item){
     if($item['id']==$id){
        $name = $item['name'];
        $email = $item['email'];
        $body = $item['body'];
     }
    }
}
?>
<form action="" method="POST">
    Name <input type="text" id="name" name="name" value="<?php echo $name?>"><br>
    Email <input type="email" id="email" name="email" value="<?php echo $email?>"><br>
    Description <input type="text" id="body" name="body" value="<?php echo $body?>"><br>
    <input type="submit">
</form>
<?php include "./../data.php"?>
<?php 
if($_SERVER['REQUEST_METHOD']==="POST"){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $body = $_POST['body'];
  $stmt = $conn->prepare("UPDATE feedback SET name = :name, email = :email, body = :body WHERE id = :id");
  $stmt->bindParam(":name", $name);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":body", $body);
  $stmt->bindParam(":id", $id);
  $stmt->execute($sql);
  header("Location:index.php");
}
?>
<?php include_once "./../footer.php" ?>