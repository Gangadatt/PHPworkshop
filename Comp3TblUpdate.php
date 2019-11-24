
			<?php 
include 'functions.php';
writeHead(" Desired Compitency 3 A");


                // check to see if an action has been passed from another script
                if (isset($_GET['action'])) {
                    echo "<p>Employee id ".$_GET['id']." inserted.</p>";
                }
            ?>
<table>
<tr><th>Track ID</th> <th>Name</th><th>Unit Price</th></tr>

    
<?php
$conString= mysqli_connect("localhost","root","",'chinook');
$sqlQuery= "select  TrackId, Name , UnitPrice from Track WHERE GenreId=1 AND MediaTypeId=2";
$result=mysqli_query($conString, $sqlQuery);
if(!$result)
	die(mysqli_error($conString));
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		echo"<tr><td>".$row['TrackId']."</td>";
        echo"<td>".$row['Name']."</td>";
        echo"<td>".$row['UnitPrice']."</td> </tr>";
		echo"<td><a href='update.php?id=".row['TrackId'].'"> Update Data</a></td>";		
        echo"<td><a href='delete.php?id=".row['TrackId'].'">Delete Data</a></td>";
		echo"<td><a href='Insert.php?id=".row['TrackId'].'">Insert Data</a></td>";
		
	}
}
?>
</table>
<?php
writeFoot();
?>