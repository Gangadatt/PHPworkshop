

<?php

include 'functions.php'; 
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

$price=htmlspecialchars($_POST['price']);
if(empty($price)){
	echo"<p class='error'> Please enter Price</p>";
	$valid=false;
}
$price=trim($price);
if(!preg_match('/[0-9]{1,3}\.[0-9]{2}/',$price))
	echo"<p> Wrong Format, put 1-3 digists to the left of decimal place and precission of 2</p>";

if(!is_numeric($price)){
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
<?php writeHead("This is Compitency Required Assessment 2B");?>
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
<input type="radio" name="mediaType" id="mpeg" value="1"
<?php if ($mediaType == "mpeg") {echo "checked";}
                 ?>
>
<label for="mpeg"> MPEG audio file</label>
<input type="radio" name="mediaType" id="pacc" value="2"
<?php if ($mediaType=="pacc") {echo "checked";}
                 ?>
>
 <label for="pacc">Protected AAC audio file </label>
<input type="radio" name="mediaType" id="mpeg4" value="3"
<?php if ($mediaType == "mpeg4") {echo "checked";}
                 ?>
>
<label for="mpeg4"> Protected MPEG-4 video file</label>
<input type="radio" name="mediaType" id="pacc"  value="4"
<?php if ($mediaType == "pacc") {echo "checked";}
                 ?>
>
<label for="pmpeg4"> Purchased AAC audio filee</label>
<input type="radio" name="mediaType" id="acc" value="5"
<?php if ($mediaType=="acc") {echo "checked";}
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
<input type="checkbox" name="playlists[]" id="teenParty" vlue="teenParty"
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

<option value=""> Select Genre</option> 
<option value="1"<?php if($genre=="1") {echo "selected";}?>> Rock</option>


<option value="2"
<?php if($genre=="2") {echo "selected";}?>
> JAZZ</option>

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
<?php writeFoot();?>
