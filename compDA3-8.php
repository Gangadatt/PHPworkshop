<?php 
include 'functions.php';
  //$conn = mysqli_connect("localhost", "root", "",'chinook');
   if (isset($_GET['offset'])) {
         $offset=$_GET['offset'];
		 $offsetList = "Limit 25, $offset";
		} 
  else {
         $offset = 0;
		 $offsetList = "Limit 25,$offset";
       }
	
$prev = $offset - 25;
   if ($prev<0) 
   {
         $prev=0;
        }
  $next = $offset + 25;	
  
 $query = "select count(*) as count from Track";
 $result=mysqli_query($conn,$query);
 $row = mysqli_fetch_assoc($result);
 $count=$row['count'];
 if ($next > $count)
	 {
  $next = 0;
	 }
   
  if (isset($_POST['GenreId'])) {
    $GenreId = $_POST['GenreId'];
	$gengreidList = "WHERE GenreId = $GenreId";
	//$genreDefault = "$GenreId=$GenreId";
  } elseif (!empty($_GET['GenreId'])) {
    $GenreId = $_GET['GenreId'];
	$gengreidList = "WHERE GenreId=$GenreId";
	//$genreDefault = "$GenreId=$GenreId";
  } else {
    $gengreidList = NULL;
    //$GenreId = NULL;
	//$genreDefault = "$GenreId=1";
  }


$selectList = '<select name="GenreId" id="GenreId">';

 $query = "select Name, GenreId from Genre";
   $result = mysqli_query($conn,$query);
    if (!$result) {
      die(mysqli_error($conn));
    }
   if (mysqli_num_rows($result) > 0) {
	   while ($row = mysqli_fetch_assoc($result)) {
		   $genreValue=$row['GenreId'];
		   $genreShow=$row['Name'];
		// $selectList .= "<option value=".$row['GenreId'].">".$row['Name']."</option>";
		 $selectList .= "<option value=".$genreValue.">".$genreShow."</option>";
		}
    }

 $selectList .= "</select>";

$trackList = <<<HERE
<table>
<tr><th>Track Name</th> <th>Unit Price</th></tr>
HERE;
$query = "SELECT `Name`, `UnitPrice` FROM `track` $gengreidList $offsetList";
//$query= "select Name, UnitPrice from Track where  =$GenreId Limit 25, OFFSET $offset";
/*   if ($GenreId>0) 
   {
       $query=$query."where TrackId =$GenreId";
    }*/
//$query= $query."Limit $offset,25";
$result=mysqli_query($conn, $query);
//echo $query;
if(!$result)
{
	die($query);
}
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$trackName = $row['Name'];
		$trackPrice = $row['UnitPrice'];
		
        $trackList .= <<<HERE
		<tr><td>$trackName</td><td>$trackPrice</td></tr>
HERE;
						
	}
}
$trackList .= <<<HERE
<tr>
  <td><a href="compDA3-8.php?offset=$prev">PREVIOUS</a></td>
  <td><a href="compDA3-8.php?offset=$next">NEXT</a></td>//$genreDefault
</tr>
</table>
HERE;



$pageContent = <<<HERE
<form method="post" action="compDA3-8.php">
 <p><label for="GenreId">Genre Name:</label>
$selectList
 <input type="submit" value="Search">
 </p>
 </form>
$trackList
HERE;

writeHead(" Desired Compitency 3.8 ");
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo $pageContent;
writeFoot();
?>
 
                   
                