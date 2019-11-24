<?php

include 'functions.php';
writeHead(" Competency 3 Desired Proficiencies 3.7 Create Table");
//$conn = mysqli_connect("localhost", "root", "",'chinook');
   $query="DROP TABLE IF EXISTS OrderBhatt";
   mysqli_query($conn, $query);

$orderQuery = "create table OrderBhatt(OrderId INT(12) Primary Key auto_increment, CustomerId int(10),
               OrderDate Date  Not Null, OrderTotal Decimal(8,2))";
			   
 $query="DROP TABLE IF EXISTS OrderLineBhatt";
 mysqli_query($conn, $query);
 $orderLineQuery = "create table OrderLineBhatt( OrderLineId int (12) Primary Key auto_increment, OrderId int(12), TrackId int(12), Quantity int(30) Not Null, UnitPrice Decimal(8,2))";

	if (mysqli_query($conn, $orderQuery))
	{
 $orderQuery = "insert into OrderBhatt values(default, 2, '2019-10-09 00:00:00', 56.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
 $orderQuery = "insert into OrderBhatt values(default, 3, '2019-10-10 00:00:00', 40.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
	}
		else{ 
        // if the table was not created successfully, write out an error
        echo "<p class='error'>Unable to create OrderBhatt table ".mysqli_error($conn)."</p>";
		}
	
	if (mysqli_query($conn, $orderLineQuery))
	{
 $orderLineQuery = "insert into OrderLineBhatt values(default, 1, 4, 5, 90.32)";
 
 mysqli_query($conn, $orderLineQuery) or die(mysqli_error($conn));
 
 
 $orderLineQuery = "insert into OrderLineBhatt values(default, 1,5,7, 78.32)";
 
 mysqli_query($conn, $orderLineQuery) or die(mysqli_error($conn));
 
 $orderLineQuery = "insert into OrderLineBhatt values(default, 2,6, 8, 45.32)";
 
 mysqli_query($conn, $orderLineQuery) or die(mysqli_error($conn));
 
 $orderLineQuery = "insert into OrderLineBhatt values(default, 2,7, 9, 23.32)";
 
 mysqli_query($conn, $orderLineQuery) or die(mysqli_error($conn));
 
	}
	
		else{ 
       //  if the table was not created successfully, write out an error
        echo "<p class='error'>Unable to create OrderLineBhatt table : ".mysqli_error($conn)."</p>";
		}
 
 $query = "select * from OrderBhatt join OrderLineBhatt Where OrderBhatt.OrderId = OrderLineBhatt.OrderId";
 $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result)>0) 
   {
	echo"<table><th> Order Id</th><th>Customer Id</th> <th> Order Date</th> <th> Track Id</th> <th>Quantity</th><th> Unit Price</th>";
 
			 while($row=mysqli_fetch_assoc($result))
			 {
								echo "<tr><td>".$row['OrderId']."</td>";
								echo "<td>".$row['CustomerId']."</td>";
								echo "<td>".$row['OrderDate']."</td>";
								echo "<td>".$row['TrackId']."</td>";
								echo "<td>".$row['Quantity']."</td>";
								echo "<td>".$row['UnitPrice']."</td></tr>";
			 }
    }
   else 
   {
		   
		  echo "<p>No records to display</p>";
   } 


 
 
  writeFoot()?>                   
 
 
 
 
