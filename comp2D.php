<?php 
echo "<pre>";
 print_r($_GET);
 echo "</pre>";

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
if(preg_match("/[A-Z]{2}\d{3}/",$albID))
{
echo " Must have 2 upper case letter and three numbers";
}

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
$albPrice=trim($price);
if(!preg_match('/[0-9]{1,3}\.[0-9]{2}/',$price))
	echo"<p> Wrong Format, put 1-3 digists to the left of decimal place and precission of 2</p>";

if(!is_numeric($price)){
	echo"<p class='error'> Please enter numeric value</p>";
	$valid=false;
}

if(isset($_POST['mediaType'])){
	$mediaType=$_POST['mediaType'];
}
else
{
	echo"<p class='error'>Please select media type</p>";
	$valid=false;
	$mediaType="";
}

if(isset($_POST['playlists'])){
	$playlists=$_POST['playlists'];
}
else{
	echo"<p class='error'> Select at lease one Playlist</p>";
$valid=false;
$playlists[0]="";
}	

$genre=$_POST['genre'];
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
 $filetype = pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION);
     if ((($filetype == "gif") or ($filetype== "jpg") or ($filetype == "png")) and $_FILES['pic']['size']<200000)
       {
        // check to make sure there is no error on the upload. If so, display the error
        if ($_FILES["pic"]["error"] > 0)
        {
            echo "Return Code: " .$_FILES["pic"]["error"]. "<br/>";
        } 
		else {
                //if the file already exists in the upload directory, give an error
                     if (file_exists("images/".$_FILES["pic"]["name"]))
                     {
                          echo $_FILES["pic"]["name"]. " already exists. ";
                          $valid=false;
                     } 
					 else {
                              // move the file to a permanent location
                               move_uploaded_file($_FILES["pic"]["tmp_name"],"images/".$_FILES["pic"]["name"]);
                          }
          
		   }
	   }
	   
	else{
		echo"Invalid file: file must be: .jpg .gif or .png and less than 20 kb";
		
	      }
if($valid)
{ 
 // header("Location: labComp2Dout.php?firstname=$firstname&lastname=$lastname&file=".$_FILES["pic"]["name"]);
	header("Location: comp2Dout.php?AlbumnID=$albID&ArtistName=$artName&AlbumnName=$albName&file=".$_FILES["pic"]["name"]);
	

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
	$pic="";
}
?>
 
 
<?php writeHead("This is Compitency Required Assessment 2B");?>

<form action="comp2D.php" method="post">
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

<h3> Select Media Types</h3>
<input type="radio" name="mediaType" id="mpeg"
<?php if ($mediaType == "mpeg") {echo "checked";}
                 ?>
>
<label for="mpeg"> MPEG audio file</label>
<input type="radio" name="mediaType" id="pacc"
<?php if ($mediaType=="pacc") {echo "checked";}
                 ?>
>
 <label for="pacc">Protected AAC audio file </label>
<input type="radio" name="mediaType" id="mpeg4" 
<?php if ($mediaType == "mpeg4") {echo "checked";}
                 ?>
>
<label for="mpeg4"> Protected MPEG-4 video file</label>
<input type="radio" name="mediaType" id="pmpeg4" 
<?php if ($mediaType == "pacc") {echo "checked";}
                 ?>
>
<label for="pmpeg4"> Purchased AAC audio filee</label>
<input type="radio" name="mediaType" id="acc" 
<?php if ($mediaType=="acc") {echo "checked";}
                 ?>
>
<label for="acc"> AAC audio file</label>

<br>
<h3> Check Playlist</h3>

<input type="checkbox" name="playlists[]" id="danceMega" value="danceMega"
<?php foreach($playlists as $playlist) {
  if ($playlist == "danceMega") {echo "checked";}
                 }
                 ?>
>
<label for="danceMega"> Dance Mega Mix</label>
<input type="checkbox" name="playlists[]" id="country" value="danceMega"
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
<h3> Choose Genre from list</h3>
<select name="genre" id="genre">
<option value=""> Select Genre</option> 
<option value="Rock"
<?php if($genre=="Rock") {echo "selected";}?>
<option value="Latin"
<?php if($genre=="Latin") {echo "selected";}?>
>Latin </option>
<option value="Reggae"
<?php if($genre=="Raggae") {echo "selected";}?>
> Reggae</option>
<option value="Pop"
<?php if($genre=="Pop") {echo "selected";}?>
> Pop </option>
<option value="Soundtrack"
<?php if($genre=="Soundtrack") {echo "selected";}?>
> Soundtrack </option>
</select>
<br>
<h3>Enter Track Number</h3>
<label for="tracks"> Track Number</label>
<input type="tracks" name="tracks" id="tracks" value="<?php echo $tracks;?>">

<label for="pic"> Album Image</label>
<input type="file" name="pic" id="pic">
<input type="submit" name="submit" value="SUBMIT" id="submit">
<?php writeFoot();?>
