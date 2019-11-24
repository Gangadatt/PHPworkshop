<?php
echo"<pre>";
print_r($_POST);
echo"</pre>";
ob_start();
include 'functions.php';
$conn= mysqli_connect("localhost","root","",'chinook');
writeHead("Competency 4A");
if(isset($_POST['submit']))
{	
        // set the validation flag
        $valid = true;
		$email = mysqli_real_escape_string($conn,trim($_POST['email']));
        if (empty($email)) {
            echo "<p class='error'>Please enter your email</p>";
            $valid = false;
        }
		 if (!preg_match('/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/',$email)) {
            echo "<p class='error'>Invalid email address</p>";
			$valid=false;
        }
		if(strlen($email)>60)
		{
		echo "<p class='error'>Number of character must be less than 60</p>";
            $valid = false;
        }	
		
        $firstName = mysqli_real_escape_string($conn,trim($_POST['firstNname']));
        if (empty($firstName)) {
            echo "<p class='error'>Please enter your first name</p>";
            $valid = false;
        }
		if(strlen($firstName)>40)
		{
			echo"<p class='error'> Number of character in name must be less than 40 characters</p>";
			$valid=false;
		}
		
		$lastName = mysqli_real_escape_string($conn,trim($_POST['lastNname']));
        if (empty($lastName)) {
            echo "<p class='error'>Please enter your last name</p>";
            $valid = false;
        }
		if(strlen($lasttName)>20)
		{
			echo"<p class='error'> Number of character in name must be less than 20 characters</p>";
			$valid=false;
		}
		 $password =mysqli_real_escape_string (trim($_POST['password']));
        if (empty($password)) {
            echo "<p class='error'>Please enter a password</p>";
            $valid = false;
        }
		$confirmPass =mysqli_real_escape_string(trim($_POST['pwconf']));
        if (empty($confirmPass)) {
            echo "<p class='error'>Please reenter  password</p>";
            $valid = false;
        }
        // compare password fields
        if (strcmp($password,$confirmPass)!=0) {
            echo "<p class='error'>Passwords do not match</p>";
            $valid = false;
        }
		$genre=$_POST['genre'];                // process chceck box
		if(empty($genre))
		{
			 echo "<p class='error'>Please select atleast 1 genre</p>";
			 $genre[0]="";
            $valid = false;
			
			
		}
		if(count($genre)>3&&count($genre)<=0)
		{
			echo "<p class='error'>more than three genre can't be selected</p>";
            $valid = false;
		}
		$currency=$_POST['currency'];
	
		
		if($valid==true)
		{
			$genreCount = count($_POST['genre']);
            //echo "$genreCount<br>";
            for ($i=1; $i <= $genreCount; $i++)
			{
	            setcookie("genre".$i, $genre, time()+(60*60*24*30*12));
			}
			setcookie('name', $firstName. " ". lastName, time()+(60*60*24*30));
		    setcookie('currency',$currency, time()+(60*60*24*30*12));
	        setcookie('coupon', .25);
        }		
	
	}
else {
		
      echo"form is not submitted";
	}  
$genreSelectList = '<ul style="list-style-type: none;">';                          
 $query = "SELECT `GenreId`, `Name` FROM `genre` WHERE 1";
 $result = mysqli_query($conn,$query);
 // check for errors
     if (!$result) {
 die(mysqli_error($conn));
 }
 if (mysqli_num_rows($result) > 0)
	 {
	 while ($row = mysqli_fetch_assoc($result))
		 {
		 $genreName = $row['Name'];
		 $GenreId = $row['GenreId'];
$genreSelectList .= <<<HERE
	 <li><label><input type="checkbox" name="genre[]" value=$GenreId > $genreName</label></li>
	 foreach($genre as $genrees)
	 { if($genrees==$GenreId) {echo"Checked";}}
HERE;

					/*<?php foreach($playlists as $playlist) {
					  if ($playlist == "danceMega") {echo "checked";}/*
					 foreach($Name as $namee)
					 if($genreName == $namee)
						 echo "checked";
					 setcookie('genreCount', $genreCounter,time()+(60*60*24*14));
					 $genreCounter=$_COOKIE['genreCounter']+1;*/
 }
 } 
$genreSelectList .= "</ul>";
 // <input type="checkbox"  name="hobby[]"  value="Cricket"  size="17" <?php echo (in_array("Cricket",$hobby)) ? 'checked="checked" : '';
 
?>	
	
 <form method="post" action="register.php">
<p> <label for="email">Email Address:</label>
 <input type="text" name="email" value="<?php $email;?>"></p>
<p> <label for="firstName">First Name:</label>
 <input type="text" name="firstName" value="<?php $firstName;?>"></p>
 <p><label for="lastName">Last Name:</label>
 <input type="text" name="lastName" value="<?php $lastName;?>"></p>
 <p><label for="password">Password:</label>
 <input type="text" name="password" value="<?php $password;?>"></p>
 <p><label for="confirmPass">Confirm Password:</label>
 <input type="text" name="confirmPass" value="<?php $confirmPass;?>"></p>
 
<?php    
echo  $genreSelectList;
 ?>
 
 <h3> Choose Currencies from list</h3>
<select name="currency" id="currency">

<option value="us"> US Dollar</option>
 <option value="rupees"   <?php if($currency=="rupees") { echo"selected"; }  ?>>Rupees</option>
<option value="pound"<?php if($currency=="pound") {echo "selected";}?>> Pound</option>
<option value="yan"<?php if($currency=="yan") {echo "selected";}?>> Yan</option>
<option value="liril"<?php if($currency=="liril") {echo "selected";}?>> Liril</option>
<option value="1"<?php if($currency=="1") {echo "selected";}?>> Rock</option>

 </select>
 
 <input type="submit" value="submit">
 
 </form>	
<p> < a href="index4.php"> Show My Total</a></p> 
<?php writeFoot() ?>
