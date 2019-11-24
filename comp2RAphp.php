<?php 
if(isset($_POST['submit']))
{
	$valid=true;
$albID=htmlspecialchars($_POST['albID']);
if(empty($albID)){
	echo"<p class='error'> Please enter your ID</p>";
	$valid=false;
}


$artName=htmlspecialchars($_POST['artName']);
if(empty($artName)){
	echo"<p class ='error'> Please enter Artist Name";
	$valid=false;
}

$albName=htmlspecialchars($_POST['albName']);
if(emply($albName)){
	echo"<p class='error'> Please enter Albumn Name</p>";
	$valid=false;
}

$albPrice=htmlspecialchars($_POST['price']);
if(emply($albPrice)){
	echo"<p class='error'> Please enter Price</p>";
	$valid=false;
}

if(!isnumbric($albPrice)){
	echo"<p class='error'> Please enter numeric value</p>";
	$valid=false;
}

if(isset($_POST['mediaType'])){   // radio
	$mediaType=$_POST['mediaType'];
}
else
{
	echo"<p class='error'>Please select media type</p>";
	$valid=false;
	$mediaType="";
}

if(isset($_POST['playlists'])){    // it is checkbox
	$playlists=$_POST['playlists'];
	foreach($playlists as $playlist)
	{
		echo"you have selected".$playlist;
}

}
else{
	echo"<p class='error'> Select at lease one Playlist</p>";
$valid=false;
$playlists[0]="";

}
$genre=$_POST['genre'];// it is list
if($genre=="")
{
	echo"<p class='error'> Please select genre</p>";
	$valid=false;
}
$tracks=htmlspecialchars($_POST['tracks']);
if(empty($tracks))
{
	echo"<p class='error'> Please enter track number</p>";
	$valid=false;
}
if(!is_numeric($tracks))
{
	echo"<p> class='error'> Track is a numeric value<p>";
	$valid=false;
}
if($tracks<1 ||$tracks >50)
{
	echo"<p> class='error'> Choose number between 1 -50<p>";
	$valid=false;
}

if($valid)
{
	header("Location:comp2RAout.php?AlbumnID=$albID&ArtistName=$artName&AlbumnName=$albName");

     exit();
}
}
else{
	
	$albID="";
	$artName="";
	$albName="";
	$price="";
	$mediaType="";
	$playlists[0]="";
	$genre="";
	$tracks="";
}
?>