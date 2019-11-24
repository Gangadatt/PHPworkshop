<?php 

if(isset($_POST['submit']))
{
	$valid=true;
$albID=htmlspecialchars($_POST['albID']);
if(empty($albID)){
	echo"<p class='error'> Please enter your ID</p>";
	$valid=false;
}

$albID=trim($albID);
if(!preg_match('/[A-Z]{2}\d{3}/',$albID))
	echo"<p> Must have 2 upper case letter and three numbers</p>";

$artName=htmlspecialchars($_POST['artName']);
if(empty($artName)){
	echo"<p class ='error'> Please enter Artist Name";
	$valid=false;
}
$artName=trim($artName);
$artName=ucfirst(strtolower($artName));


$albName=htmlspecialchars($_POST['albName']);
if(empty($albName)){
	echo"<p class='error'> Please enter Albumn Name</p>";
	$valid=false;
}
$albName=trim($albName);

$albPrice=htmlspecialchars($_POST['price']);
if(empty($albPrice)){
	echo"<p class='error'> Please enter Price</p>";
	$valid=false;
}
$albPrice=trim($albPrice);
if(!preg_match('/[0-9]{1,3}\.[0-9]{2}/',$albPrice))
	echo"<p> Wrong Format, put 1-3 digists to the left of decimal place and precission of 2</p>";

if(!is_numeric($albPrice)){
	echo"<p class='error'> Please enter numeric value</p>";
	$valid=false;
}

if(isset($_POST['mediaType'])){       // radio button
	$mediaType=$_POST['mediaType'];
}
else
{
	echo"<p class='error'>Please select media type</p>";
	$valid=false;
	$mediaType="";
}

if(isset($_POST['playlists'])){            // // check box
	$playlists=$_POST['playlists'];
}
else{
	echo"<p class='error'> Select at lease one Playlist</p>";
$valid=false;
$playlists[0]="";
}	

$genre=$_POST['genre'];                          // drop down list
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
$tracks=trim($tracks);
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
	header("Location:comp2Bout.php?AlbumnID=$albID&ArtistName=$artName&AlbumnName=$albName");
	// echo date('l F d Y h:ia');

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