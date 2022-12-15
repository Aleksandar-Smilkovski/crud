<?php include_once "header.php" ?>
<?php include "data.php" ?>
<?php 
  $stmt = $conn->prepare("SELECT id, name, email, body FROM feedback");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $items = $stmt->fetchAll();
?>
<a href="login.php" class="btn btn-success">Login</a>
<h1>List</h1>
<table class="table table-striped">
   <?php 
     foreach($items as $item){
   ?>
     <tr>
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
     </tr>
   <?php
     }
   ?> 
</table>
<?php include_once "footer.php" ?>