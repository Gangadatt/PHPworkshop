<?php
session_start();
isset($playListCount)
{
	writeHead("This is Competency 4 B, Play List");
	
	
	
if(isset($_GET['del']))
{
unset($_SESSION['playListTrack']['del']);	  // playlist track array contain total tracks
$playListCount= $_SESSION['playListCount']-1;

if($playListCount=0)
{
	unset($_SESSION['playListCount']);
	unset($_SESSION['playListTrack']);
	session_destroy();
}
}


else if(($_GET['add']))
{
	isset($playListCount)
	{	
		$playListCount= $_SESSION['playListCount']+1;			
	}	
	else{
			$playListCount=$_SESSION['playListCount'];  // create a session variable playListCount and give it a value of 1
			$playListCount=1;
			$_SESSION['playListTrack']['playListCount']=$add;   // add is track id
	}
}

?>
<table>

<tr>
 <td> Track Name</td> <td> Composer</td> <td> Genre</td>  <td> </td>
 </tr>
<?php
  $playListCount =$_SESSION['playListTrack'];
	for($i=1;$i<=playListCount;i++)
	{
			$track=$_SESSION['item'][$i];
			
		$query= "select  Name, Composer, GenreId from Track where TrackId=$track";
		$resutt=mysqli_query($conn, $query)
		 if(!result)
		die(mysqli_error($conn))
		 if(mysqli_affected_rows($result)>0)
		 while($row=mysqli_fetch_assoc($result))
		 {
			 echo "<tr><td>".$row['Name']."</td>";
			  echo "<td>".$row['Composer']."</td>";
			  echo "<td>".$row['GenreId']."</td>";
			  echo"td><a href='index4B.php?$del=$i"'>Remove</a></td></tr>";
		 }
	}
}   // enf of isset playlistcount

?>







