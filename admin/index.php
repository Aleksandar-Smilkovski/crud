<?php include_once "./../header.php" ?>
<?php 
  include "./../data.php";
  include "./../functions.php";
  if(!authenticate_admin()){
    header("Location: ./../index.php");
  } 
?>
<?php 
  $stmt = $conn->prepare("SELECT id, name, email, body FROM feedback");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $items = $stmt->fetchAll();
?>
<a href="create.php" class="btn btn-success">Create</a>
<h1>List</h1>
<table class="table table-striped">
   <?php 
     foreach($items as $item){
   ?>
     <tr>
        <td>
        <a href="edit.php?edit=<?php echo $item['id']?> " class="btn btn-success">Edit</a>
        </td>
        <td>
            <?php echo $item["id"]?>
        </td>
        <td>
            <?php echo $item["name"]?>
        </td>
        <td>
            <?php echo $item["email"]?>
        </td>
        <td>
            <?php echo $item["body"]?>
        </td>
        <td>
            <a href="delete.php?key=<?php echo $item['id']?> " class="btn btn-danger">Delete</a>
        </td>
     </tr>
   <?php
     }
   ?> 
</table>
<a href="logout.php" class="btn btn-danger">Logout</a>
<?php include_once "./../footer.php" ?>