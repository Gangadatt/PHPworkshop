 <?php
     require_once 'functions.php';
 writeHead("Desired Comp3.1-3.3: Employee Table Display");
 ?>
 <div>
 <?php
 // connect to the database
 $conn = mysqli_connect("localhost", "root", "",'chinook');
 if (isset($_GET['action'])) {
 echo "<p>Employee id ".$_GET['id']." ".$_GET['action'].".</p>";
 }
 ?>
 <form method="post" action="labComp3-8b.php">
 <p><label for="country">Country:</label><select name="country" id="country">
 <?php
                                // Create query to get list of countries
 $query = "select distinct country from customer";
 $result = mysqli_query($conn,$query);
 // check for errors
                 if (!$result) {
 die(mysqli_error($conn));
 }
 if (mysqli_num_rows($result) > 0) { 
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option>".$row['country']."</option>";
 }
 } 
 ?>
 </select>
 <input type="submit" value="Search">
 </p>
 </form>
 <table>
 <tr><th>ID</th><th>LastName</th><th>FirstName</th><th>Company</th><th>Country</th></tr>
 <?php
         // create the query
 $query = "Select CustomerId, LastName, FirstName, Company, Country from Customer";
 // check for user input and add where clause if found
 if (isset($_POST['country'])) {
 $query=$query." where country ='".$_POST['country']."'";
 }
 // run the query
 $result = mysqli_query($conn,$query);
 // check for errors
 if (!$result) {
 die(mysqli_error($conn));
 }
 // check for results
 if (mysqli_num_rows($result)> 0) {
 // loop through results and display
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr><td>".$row['CustomerId']."</td>";
 echo "<td>".$row['LastName']."</td>";
 echo "<td>".$row['FirstName']."</td>";
 echo "<td>".$row['Company']."</td>";
 echo "<td>".$row['Country']."</td>"; 
 echo "<td><a href='labComp3-8u.php?id=".$row['CustomerId']."'>Update</a></td>";
 echo "<td><a href= 'labComp3-8d.php?id=".$row['CustomerId']."'> Delete</a></td></tr>";
 }
 }
 ?>
 </table>
 </div>
 <?php writeFoot(); ?>

Paging

Use the LIMIT clause to limit the results from the query to a reasonable number
SELECT * FROM Customer LIMIT 20.
Note that the format of the LIMIT clause is LIMIT [offset,] max
where offset is optional. If included it tells the number of records to skip before retrieving rows.
max is required and tells the maximum number of rows to retrieve
Store the starting record number and ending record number in hidden fields to facilitate paging
On subsequent page requests, get the hidden fields and use them in the OFFSET clause of the SQL statement:
SELECT * FROM Customer LIMIT 20,20
This would skip the first 20 records and then retrieve the next 20 records.
Here is an example of a display script that uses paging:

    <?php
        require_once 'functions.php';
        writeHead("Desired Comp3.1-3.3: Employee Table Display");
        ?>
            <div>
                <script>
                      function delete_item(id) {
                          alert("delete");
                          if (confirm("Are you sure you want to delete?")) {
                             window.location = "labComp3-8d.php?id="+ id;
                          }
                       }
                </script>
                <?php
                // connect to the database
                    $conn = mysqli_connect("localhost", "root", "",'chinook');
                // check to see if there is an offset in the querystring. If not set it to 0
                    if (isset($_GET['offset'])) {
                        $offset=$_GET['offset'];
                    } else {
                        $offset=0;
                    }
                    // calculate the offset for the previous link. If < 0, set to 0
                    $prev = $offset - 20;
                    if ($prev<0) {
                        $prev=0;
                    }
                    // calculate the offset for the next link
                    $next = $offset + 20;
                    // see how many records are in the table
                    $query = "select count(*) as count from Customer";
                    $result=mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result);
                    $count=$row['count'];
                    // if the next offset is greater than the number of records,
                    // set it to 0 to loop back to the beginning of the table
                    if ($next > $count) {
                        $next = 0;
                    }
                ?>
                <table>
                    <tr><th>ID</th><th>LastName</th><th>FirstName</th><th>Company</th><th>Country</th></tr>
                <?php
                    // create the query. Use the offset as the starting row and limit the rows to 20.
                    $query = "Select CustomerId, LastName, FirstName, Company, Country from Customer Limit $offset, 20";
                    // check for user input and add where clause if found
                    if (isset($_POST['country'])) {
                        $query=$query." where country ='".$_POST['country']."'";
                    }
                    // run the query
                    $result = mysqli_query($conn,$query);
                    // check for errors
                    if (!$result) {
                        die(mysqli_error($conn));
                    }
                    // check for results
                    if (mysqli_num_rows($result)> 0) {
                        // loop through results and display
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>".$row['CustomerId']."</td>";
                            echo "<td>".$row['LastName']."</td>";
                            echo "<td>".$row['FirstName']."</td>";
                            echo "<td>".$row['Company']."</td>";
                            echo "<td>".$row['Country']."</td>";
                            echo "<td><a href='labComp3-8u.php?id=".$row['CustomerId']."'>Update</a></td>";
                            echo "<td><a href='javascript:delete_item(".$row['CustomerId'].")'>Delete</a></td></tr>";
                        }
                        // add the Previous and Next links in the last row of the table.
                        echo "<tr><td><a href='labComp3-8c.php?offset=$prev'>PREVIOUS</a></td><td> </td><td> </td><td> </td><td> </td><td> </td><td><a href='labComp3-8c.php?offset=$next'>NEXT</a></td></tr>";
                    }
                ?>
                </table>
            </div>
            <?php writeFoot(); ?>