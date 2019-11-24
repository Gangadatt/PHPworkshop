<?php 
include 'functions.php';
writeHead(" Desired Compitency 3 A");
?>
<table>
<tr><th>Track ID</th> <th>Name</th><th>Unit Price</th></tr>

    
<?php
$conn= mysqli_connect("localhost","root","",'chinook');
$sqlQuery= "select  TrackId, Name , UnitPrice from Track WHERE GenreId=1 AND MediaTypeId=2";
$result=mysqli_query($conn, $sqlQuery);
if(!$result)
	die(mysqli_error($conn));
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo"<tr><td>".$row['TrackId']."</td>";
        echo"<td>".$row['Name']."</td>";
        echo"<td>".$row['UnitPrice']."</td> </tr>";
						
	}
}
?>

</table>
<?php
writeFoot();
?>