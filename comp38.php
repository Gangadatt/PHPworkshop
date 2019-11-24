<?php 
include 'functions.php';
writeHead(" Desired Compitency 3.8 ");
 $conn = mysqli_connect("localhost","root","",'chinook');
 
 
 $query = "select Name, GenreId from Genre";
 $result = mysqli_query($conn,$query);
    if (!$result) {
 die(mysqli_error($conn));
 }
 if (mysqli_num_rows($result) > 0)
	 { 
 while ($row = mysqli_fetch_assoc($result))
	 {
 echo"<option value=".$row['GenreId'].">".$row['Name']."</option>";
 }
	 }
?>
<table>
<tr><th>Track Name</th> <th>Unit Price</th></tr>
<?php
 $query = "select Name, GenreId from Genre where ";
 $result = mysqli_query($conn,$query);
    if (!$result) {
 die(mysqli_error($conn));
 }
 if (mysqli_num_rows($result) > 0)
	 { 
 while ($row = mysqli_fetch_assoc($result))
	 {
echo "<option value=".$row['GenreId'].">".$row['Name']."</option>";
 }
 } 
 
 ?>
 </table>
<?php
writeFoot();
?>
 
                   
                