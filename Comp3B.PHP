<?php 
include 'functions.php';
$conn= mysqli_connect("localhost","root","",'chinook');
writeHead(" Desired Compitency 3 A");


                // check to see if an action has been passed from another script
                if (isset($_GET['action'])) {
                    echo "<p>Track id ".$_GET['tid']." ".$_GET['action']."</p>";
                }
            ?>
<table>
<tr><th>Track ID</th> <th>Name</th><th>Unit Price</th></tr>

    
<?php
//$conn= mysqli_connect("localhost","phpstudent","Itse1406",'chinook');
$sqlQuery= "select  TrackId, Name , UnitPrice from Track where GenreId=1 AND MediaTypeId=2";
$result=mysqli_query($conn, $sqlQuery);
if(!$result)
	die(mysqli_error($conn));
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo"<tr><td>".$row['TrackId']."</td>";
        echo"<td>".$row['Name']."</td>";
        echo"<td>".$row['UnitPrice']."</td> ";
		echo"<td><a href='Comp3BUpdate.php?tid=".$row['TrackId']."'> Update Data</a></td>";		
        echo"<td><a href='Comp3BDelete.php?tid=".$row['TrackId']."'>Delete Data</a></td>";
		echo"<td><a href=Comp3BInsert.php>Insert Data</a></td></tr>";
		
	}
}
?>
</table>
<?php
writeFoot();
?>