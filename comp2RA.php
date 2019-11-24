<?php
require_once 'functions.php';
    writeHead("Required Compitency 2A");
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
if(empty($albName)){
	echo"<p class='error'> Please enter Albumn Name</p>";
	$valid=false;
}

$price=htmlspecialchars($_POST['price']);
if(empty($price)){
	echo"<p class='error'> Please enter Price</p>";
	$valid=false;
}

if(!is_numeric($price)){
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
	echo"<p class='error'> Track is a numeric value</p>";
	$valid=false;
}
if($tracks<1 ||$tracks >50)
{
	echo"<p class='error'> Choose number between 1 -50</p>";
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
	$currency="";
}
?>


<form action="" method="post">                                   <!--fORM STARTS HERE-->
<label for="albID"> Albumn ID</label>
 <input type="text" name="albID" id="albID" value="<?php echo $albID;?>">
<br>
<label for="artName"> Artist Name</label>
<input type="text" name="artName" id="artName" value="<?php echo $artName;?>" >

<br>
<label for="albName" > Albumn Name</label>
 <input type="text" name="albName" id="albName" value="<?php echo $albName;?>">
 <br>
<label for="price" > Price</label>
<input type ="text" name="price" id="price" value="<?php echo $price;?>">
<br>

<h3> Select Media Types</h3>                                             <!--Media Types are Radio Buttons-->
<input type="radio" name="mediaType" id="1" value="1"
<?php if ($mediaType == "1") {echo "checked";}
                 ?>
>
<label for="mpeg"> MPEG audio file</label>
<input type="radio" name="mediaType" id="1" value="2"
<?php if ($mediaType=="2") {echo "checked";}
                 ?>
>
 <label for="pacc">Protected AAC audio file </label>
<input type="radio" name="mediaType" id="3" value="3"
<?php if ($mediaType == "3") {echo "checked";}
                 ?>
>
<label for="mpeg4"> Protected MPEG-4 video file</label>
<input type="radio" name="mediaType" id="4"  value="4"
<?php if ($mediaType == "4") {echo "checked";}
                 ?>
>
<label for="pmpeg4"> Purchased AAC audio filee</label>
<input type="radio" name="mediaType" id="5" value="5"
<?php if ($mediaType=="5") {echo "checked";}
                 ?>
>
<label for="acc"> AAC audio file</label>

<br>                                                                   <!--Playlists are Checkboxes -->
<h3> Check Playlist</h3>

<input type="checkbox" name="playlists[]" id="danceMega" value="danceMega"
<?php foreach($playlists as $playlist) {
  if ($playlist == "danceMega") {echo "checked";}
                 }
                 ?>
>
<label for="danceMega"> Dance Mega Mix</label>
<input type="checkbox" name="playlists[]" id="country" value="country"
<?php foreach($playlists as $playlist) {
  if ($playlist == "country") {echo "checked";}
                 }
                 ?>
>
<label for="country"> Ultimate Country</label>
<input type="checkbox" name="playlists[]" id="teenParty" value="teenParty"
<?php foreach ($playlists as $playlist) {
  if ($playlist == "teenParty") {echo "checked";}
                 }
                 ?>

>
<label for="teenParty"> Teen Party</label>
<input type="checkbox" name="playlists[]" id="monster" value="monster"
<?php foreach($playlists as $playlist) {
  if ($playlist =="monster") {echo "checked";}
                 }
                 ?>
>
<label for="monster"> Hip Hop Monsters</label>
<input type="checkbox" name="playlists[]" id="moodBooster" value="moodBooster"
<?php foreach ($playlists as $playlist) {
  if ($playlist == "moodBooster") {echo "checked";}
                 }
                 ?>
>
<label for="moodBooster"> Mood Booster</label>

<br>
<h3> Choose Genre from list</h3>                                       <!--LIst of Gerne-->
<select name="genre" id="genre">

<option value=""> Select Genre</option> <option value="1"
<?php if($genre=="1") {echo "selected";}?>
> Rock</option>


<option value="2"<?php if($genre=="2") {echo "selected";}?>> JAZZ</option>

<option value="3"
<?php if($genre=="3") {echo "selected";}?>
> Metal</option>

<option value="4"
<?php if($genre=="4") {echo "selected";}?>
> Alternative and Punk</option>

<option value="5"
<?php if($genre=="5") {echo "selected";}?>
> Jazz</option>
<option value="6"
<?php if($genre=="6") {echo "selected";}?>
> Blues</option>


<option value="7"
<?php if($genre=="7") {echo "selected";}?>
>Latin </option>
<option value="8"
<?php if($genre=="8") {echo "selected";}?>
> Reggae</option>
<option value="9"
<?php if($genre=="9") {echo "selected";}?>
> Pop </option>
<option value="10"
<?php if($genre=="10") {echo "selected";}?>
> Soundtrack </option>
</select>
<br>
<h3>Enter Track Number in from 1-50</h3>

<label for="tracks"> Track Number</label>
<input type="tracks" name="tracks" id="tracks" value="<?php echo $tracks;?>">
 
<input type="submit" name="submit" value="SUBMIT" id="submit">

</form>
<?php
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
writeFoot();
?>