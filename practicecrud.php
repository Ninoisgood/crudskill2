<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'crudskill';

$conn = new mysqli($host , $user , $pass , $db  );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>
<body>
<h3>INPUT DATA</h3>
<form method = "POST">
<label>ID</label>
<input type="number" name="ID"  value="<?=isset($row['ID'])  ? $row['ID'] : '' ?>"><br><br>
<label>NAME</label>
<input type = "text" name = "name" value = "<?=isset($row['name']) ? $row['name'] : '' ?> " ><br></br> 
<label>GMAIL</label>
<input type = "text" name = "gmail" value = "<?=isset($row['gmail']) ? $row['gmail'] : '' ?>   " ><br></br> 

<input type = "submit" name = "search" value = "SEARCH"> 
<input type = "submit" name = "create" value = "CREATE"> 
<input type = "submit" name = "update" value = "UPDATE"> 
<input type = "submit" name = "delete" value = "DELETE"> 

</form>

<?php
if(isset($_POST['create'])){

  $ID = $_POST['ID'];
 $name = $_POST['name'];
 $gmail = $_POST['gmail'];

 $conn->query("INSERT INTO users (ID , name , gmail ) VALUES ( '$ID' ,  '$name'  ,  '$gmail'   )   ");
echo "<p>CREATED SUCCESSFULY</p>";
}
?>
<table border = 1>
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
<td><?=$row['ID']?> </td>
<td><?=$row['name']?> </td>
<td><?=$row['gmail']?> </td>


</tr>
<?php endwhile; ?>
</table>

<?php
 if(isset($_POST['delete'])){
    $ID = $_POST ['ID'];
  $conn->query("DELETE  FROM users WHERE ID=$ID");
  echo"<p>DELETE SUCCESSFULY</p>";
 

}

?>
<?php
if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $conn->query("UPDATE users SET name='$name', gmail='$gmail' WHERE ID=$ID");
    echo "<p>User updated successfully.</p>";
}

?>

</body>
</html>