<?php
    require_once 'functions.php';
    // connect to the database
    $conn = mysqli_connect("localhost", "root", "",'chinook');
    writeHead("Desired Comp3.7: Add Table");
	 $query="DROP TABLE IF EXISTS BandMembers";
   mysqli_query($conn, $query);
    // Build the create table query
    $query = "Create table BandMembers (MemberId INT(11) Primary Key auto_increment, LastName varchar(100) not null, FirstName varchar(100), BirthDate Date Not Null, DeathDate Date, ArtistId Int(11), YearJoined Int(4), YearLeft Int(4))";
    // Execute create query. If it works, insert 2 records.
    if (mysqli_query($conn, $query)) {
            $orderQuery = "insert into OrderBhatt values(default, 2, '2019-10-09 00:00:00', 56.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
 $orderQuery = "insert into OrderBhatt values(default, 3, '2019-10-10 00:00:00', 40.32)";
 
 mysqli_query($conn, $orderQuery) or die(mysqli_error($conn));
            if (mysqli_num_rows($result)>0) {
                echo "<table><tr><th>ID</th><th>Name</th><th>Birth</th><th>Death</th><th>Artist Id</th><th>Joined</th><th>Left</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row['MemberId']."</td>";
                    echo "<td>".$row['FirstName']." ".$row['LastName']."</td>";
                    echo "<td>".$row['BirthDate']."</td>";
                    echo "<td>".$row['DeathDate']."</td>";
                    echo "<td>".$row['ArtistId']."</td>";
                    echo "<td>".$row['YearJoined']."</td>";
                    echo "<td>".$row['YearLeft']."</td>";
                }
            } else {
                // if no records were retrieved from the table, display an error
                echo "<p>No records to display</p>";
            }
               
    } else {
        // if the table was not created successfully, write out an error
        echo "<p class='error'>Unable to create BandMembers table: ".mysqli_error($conn)."</p>";
    }
    writeFoot();
 ?>