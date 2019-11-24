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
 <form method="post" action="labComp3-8a.php">
 <p><label for="country">Country:</label><input name="country" id="country">
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

Alternately, you could use a dropdown selection list instead of a textbox.

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