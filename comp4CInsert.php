

<!-- Posted:
<?php
    if ($_POST) {
        echo var_dump($_POST);
    }
?>
-->

<?php
     // check to see if user is authorized by checking for session variable

     if (isset($_SESSION['auth'])) {

          // if user doesn't have authorization for this page, send to home page

          if ($_SESSION['auth']<=1)
			  {
<?php
    include 'functions.php';
writeHead("Desired Comp 4C: Insert Employee");
        // check to see if the form has been submitted if so write out the data.
        if (isset($_POST['insert'])) {
        // set the validation flag
        $valid = true;
        $name = mysqli_real_escape_string($conn,trim($_POST['name']));
        if (empty($name)) {
            echo "<p class='error'>Please enter your first name</p>";
            $valid = false;
        }
		if(strlen($name)>200)
		{
			echo"<p class='error'> Number of character in name must be less than 200 characters</p>";
			$valid=false;
		}
		$album=($_POST['album']);
		$composer=mysqli_real_escape_string($conn,trim($_POST['Composer']));
		if(strlen($composer)>200)
		{
			echo"<p class='error'> Number of character in composer must be less than 200 characters</p>";
		$valid=false;
		}
		$Milliseconds=mysqli_real_escape_string($conn, $_POST['Milliseconds']);
		
		
		if(empty($Milliseconds))
		{
			echo"<p class='error'> Please enter Milliseconds</p>";
			$valid=flase;
		}
		if(!is_numeric($Milliseconds))
		{
			echo"<p class='error'> please enter Milliseconds in number </p>";
			$valid=flase;
		}
		$bytes=mysqli_real_escape_string($conn,($_POST['bytes']));
		
		if(!is_numeric($bytes))
		{
			echo"<p class='error'> please enter  number of bytes </p>";
			$valid=flase;
		}
		$unitprice=mysqli_real_escape_string($conn,($_POST['unitprice']));
		
		if(empty($unitprice))
		{
			echo"<p class='error'> Please enter Unit Price</p>";
			$valid=false;
		}
		
		if(!is_numeric($unitprice))
		{
			echo"<p class='error'> please enter  Unit price in number </p>";
			$valid=false;
		}
		$unitprice=round($unitprice,2);
		if($unitprice> 1000000000)
		{
			echo"<p class='error'> please enter price less than 1,000,000,000</p>";
		}
		 if ($valid) {
            
            $query = "insert into Track values(default,'$name','$album',2,1,'$composer','$Milliseconds','$bytes','$unitprice')";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn)>0) {
                $tid = mysqli_insert_id($conn);
                header("Location:Comp3B.php?action=inserted&tid=$tid");
				echo"data inserted successfully";
                exit();
            }
            echo "<p class='error'>Unable to insert record</p>";
        }//valid
    } //isset
	else {
        // if the form was not submitted, initialize the variables for the sticky form fields
        $name="";
        $albumn="";
        $composer="";
		$Milliseconds="";
		$bytes="";
		$unitprice="";
	}// else
		
        ?>     
<form method="post" action="Comp3BInsert.php">
<label for="name"> Name</label> 
<input type="text" name="name" id="name" value="<?php echo $name;?>">
<br>
<label for="album"> Album</label>
<select  name="album" id="album">

  <?php
   $query="Select AlbumId, Title from Album";          
   $result=mysqli_query($conn,$query);
    if(!result) {
       die(mysqli_error($conn));
	}
    if(mysqli_num_rows($result)>0){
     while($row=mysqli_fetch_assoc($result)){
		
		
                        echo "<option value=".$row['AlbumId'].">".$row['Title']."</option>";
                    }
                }
	
?>	
    </select>                   
<br>
<label for="composer"> Composer</label> 
<input type="text" name="composer" id="composer" value="<?php echo $composer ;   ?>">
<br>
<label for="Milliseconds"> Milliseconds</label> 
<input type="text" name="Milliseconds" id="Milliseconds" value="<?php echo  $Milliseconds; ?>">
<br>

<label for="bytes"> Bytes</label> 

<input type="text" name="bytes" id="bytes" value="<?php echo $bytes  ;  ?>">
<br>
<label for="unitprice"> Unit Price</label> 
<input type="text" name="unitprice" id="unitprice" value="<?php echo $unitprice ;?>">
<br>
<input type="submit" name="insert" value="Insert Album">
</form>
 <?php writeFoot(); ?>
 
 
  
	 <?php
	 }
	 }
	 
 else {

          // if user has not logged in, send to login page and include page to return to after login

          header("location: login.php?page=comp4-2.php");

    }
?>