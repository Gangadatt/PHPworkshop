<?php 
include 'functions.php';
writeHead(" Desired Compitency 4 A ");
$conn= mysqli_connect("localhost","root","",'chinook');
$currencyType = array("US" => 100, "rupees" => 1.6, "pound" => 149, "yan"=>.80, "liril"=>120);

 if (isset($_COOKIE['name'])) {
         // echo "<h3>Welcome $COOKIE['name']</h3>";
		 echo"<h3> Welcome".$_COOKIE['name']."</h3>";
 }
 
 if(isset($_COOKIE['coupon']))
 {
	 echo"Order todya to receive 25% off your entire order!";
 }
 if(isset($_COOKIE['genre1']))
 {
	 $genre1=$_COOKIE['genre1'];
 }
 if(isset($_COOKIE['genre2']))
 {
	 $genre2=$_COOKIE['genre2'];
 }
 if(isset($_COOKIE['genre3']))
 {
	 $genre3=$_COOKIE['genre3'];
 }
 
 if(isset($_COOKIE['currency']))
 {
	 $myCurrency=$_COOKIE['currency'];
 }
 else{
	$Mycurrency="US"; 
 }
 echo"<h2> Tracks you may like</h2>";
 ?>
 <table>
      <tr>
	  <th>Name</th><th>GenreId</th><th>Composer</th><th>UnitPrice</th>
     </tr>
	  
	  <?php
 $query="select * from Track where GenreId=1 or GenreId=2 or GenreId=3 limit 20";
 $result=mysqli_query($conn, $query);
 if(!$result)
 {
	 die(mysqli_error($conn));
 }
 $row=mysqli_fetch_assoc($result);
 echo "<tr><td>".$row['Name']."</td>";
  echo "<td>".$row['GenreId']."</td>";
  echo "<td>".$row['Composer']."</td>";
  $amount=$row['UnitPrice'];
  
  foreach($currencyType as $currencyType=>$value)
  {
	  if($myCurrency==$currencyType)
	  {
		  if($Currency="us")
		  {
		  echo"<td>$amount</td>";
		  }
		  else{
				$amount=$amount*$value;
				echo "<td> $amount</td></tr>";
		   }
	  
	}
 
  }
 
 ?>
 </table>
 <a href="register.php">Go To Registration Page</a>
        <?php 
       writeFoot();
        ?>