<?php
  $host = 'localhost';
   $user = 'root';
  $pass = '';
  $db   =  'crudskill';   

  $conn = new mysqli($host , $user ,$pass , $db);
  

  $row = ['ID'=>'', 'name'=>'', 'gmail'=>''];

// SEARCH FUNCTION
if (isset($_POST['Search'])) {
    $ID = $_POST['ID'];
    $result = $conn->query("SELECT * FROM users WHERE ID='$ID'");
    if ($row = $result->fetch_assoc()) {
    
    } 
    else {
        echo "<p>No record found for ID $ID</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>INPUT DATA</h2>
    <form method="POST" action="">
     <label>ID</label>
     <input type="number" name="ID"  value="<?=isset($row['ID'])  ? $row['ID'] : '' ?>"><br><br>
      <label>Name</label>
     <input type="text"   name="name"  value="<?=isset($row['name'])  ? $row['name'] : '' ?>"><br><br>
      <label>Gmail</label>
     <input type="text"   name="gmail"  value="<?=isset ($row['gmail'] ) ? $row['gmail'] : '' ?>"><br><br>

     <input type="submit" name="Search" value="Search">
    <input type="submit" name="Create" value="Create">
    <input type="submit" name="Update" value="Update">
    <input type="submit" name="Delete" value="Delete">

</form>
<br>

  <?php
   if(isset($_POST['Create'])){
   $ID = $_POST['ID'];   
   $name = $_POST['name'];
   $gmail = $_POST['gmail'];
$conn->query("INSERT INTO users(ID , name , gmail) VALUES ('$ID' , '$name' , '$gmail')");
echo "<p>CREATED SUCCESSFULY</p>";
   }
  ?>
  <table border = "1">
    <tr>
     <th>ID</th>
       <th>Name</th>
         <th>Gmail</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM users");
    while($row = $result->fetch_assoc()):
 
?>
     <tr>

    <td> <?=$row['ID']?></td>
<td> <?=$row['name']?></td>
<td> <?=$row['gmail']?></td>
     </tr>
    <?php endwhile; ?>
  </table>

<?php
  if(isset($_POST['Delete'])){
    $ID = $_POST ['ID'];
  $conn->query("DELETE  FROM users WHERE ID=$ID");
  echo"<p>DELETE SUCCESSFULY</p>";
 
  }



?>

<?php
if (isset($_POST['Update'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $conn->query("UPDATE users SET name='$name', gmail='$gmail' WHERE ID=$ID");
    echo "<p>User updated successfully.</p>";
}

?>




</body>
</html>