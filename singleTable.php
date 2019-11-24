<?php
 
include 'functions.php';
writeHead(" Competency 3 Desired Proficiencies 3.7 Create Table");
//$conn= mysqli_query("localhost", "root",'chinook');
   $query="DROP TABLE IF EXISTS OrderBhatt";
   mysqli_query($conn, $query);

$orderQuery = "create table OrderBhatt(OrderId INT(12) Primary Key auto_increment, CustomerId int(10),
               OrderDate Date  Not Null, OrderTotal Decimal(8,2))";
			   
			   if (mysqli_query($conn, $orderQuery))
	{
 $orderQuery = "insert into OrderBhatt values(default, 2, '2019-10-09 00:00:00', 56.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
 $orderQuery = "insert into OrderBhatt values(default, 3, '2019-10-10 00:00:00', 40.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
 echo"values added successfully";
 
	}
	
	
		else{ 
        // if the table was not created successfully, write out an error
        echo "<p class='error'>Unable to create OrderBhatt table and OrderLine table: ".mysqli_error($conn)."</p>";
		}