<?php
     // check to see if user is authorized by checking for session variable

     if (isset($_SESSION['auth'])) {

          // if user doesn't have authorization for this page, send to home page

          if ($_SESSION['auth']<=1)
			  {
          
<?php
    include 'functions.php';   
	if(isset($_GET['tid']))
	{
	$tid=$_GET['tid'];
	}
	else if(isset($_POST['tid']))
	{
		$tid=$_POST['tid'];
	}
writeHead("Desired Comp 3B: Update Track");
        // check to see if the form has been submitted if so write out the data.
        if (isset($_POST['update'])) {
        // set the validation flag
        $valid = true;
        $name = mysqli_real_escape_string($conn,($_POST['name']));
        if (empty($name)) {
            echo "<p class='error'>Please enter your first name</p>";
            $valid = false;
        }
		if(strlen($name)>200)
		{
			echo"<p class='error'> Number of character in name must be less than 200 characters</p>";
			$valid=false;
		}
		$album=$_POST['album'];
		$Composer=mysqli_real_escape_string($conn,($_POST['Composer']));
		if(strlen($Composer)>200)
		{
			echo"<p class='error'> Number of character in Composer must be less than 200 characters</p>";
		$valid=false;
		}
		$Milliseconds=mysqli_real_escape_string($conn,($_POST['Milliseconds']));
		
		
		if(empty($Milliseconds))
		{
			echo"<p class='error'> Please enter milisecond</p>";
			$valid=flase;
		}
		if(!is_numeric($Milliseconds))
		{
			echo"<p class='error'> please enter milisecond in number </p>";
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
			$valid=flase;
		}
		
		if(!is_numeric($unitprice))
		{
			echo"<p class='error'> please enter  Unit price in number </p>";
			$valid=flase;
		}
		$unitprice=round($unitprice,2);
		if(strlen($unitprice)> 1000000000)
		{
			echo"<p class='error'> please enter price less than 1,000,000,000</p>";
		}
		 if ($valid) {
            
            $query = "update  Track   set Name='$name', AlbumId='$album', MediaTypeId=2, GenreId =1,Composer='$Composer',Milliseconds='$Milliseconds',Bytes='$bytes',UnitPrice='$unitprice' where TrackId='$tid'";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn)>0) {
              //  $tid = mysqli_insert_id($conn);
                header("Location:Comp3B.php?action=updated&tid=$tid");
                exit();
            }
            echo "<p class='error'>Unable to update record</p>";
        }//valid
    } //isset
	else {
		
		if (!isset($_GET['tid'])) {
            echo "<p class='error'>No Album ID provided. <a href='Comp3B.php'>Return to display page.</a>";
        }
        $tid=$_GET['tid'];
        $query = "Select * from Track where TrackId = $tid";
        $result = mysqli_query($conn,$query);
        if (!$result) {
            die(mysqli_error($conn));
        }
        // check for results
        if (mysqli_num_rows($result)> 0) {
            // retrieve result row
            $row = mysqli_fetch_assoc($result);
            $name=$row['Name'];
            $album=$row['AlbumId'];
            $Composer=$row['Composer'];
            $Milliseconds=$row['Milliseconds'];
            $bytes=$row['Bytes'];
            $unitprice=$row['UnitPrice'];
		}
		else{
			echo"<p class='error'> Unable to retrive $tid</p>";
		}
	}
        ?>     
<form method="post" action="Comp3BUpdate.php">
<input type="hidden" name="tid" value="<?php echo $tid ;?>">
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
		  echo "<option value='".$row['AlbumId']."'";
                            
              if ($name==$row['AlbumId'])
				  {
                      echo " selected ";
                  }
               echo ">" .$row['Title']."</option>";
		
	    
                    }
                }
	
?>	
    </select>                   
<br>
                          
<label for="Composer"> Composer</label> 
<input type="text" name="Composer" id="Composer" value="<?php echo $Composer;?>">
<br>
<label for="Milliseconds"> Milisecond</label> 
<input type="text" name="Milliseconds" id="Milliseconds" value="<?php echo  $Milliseconds ;?>">
<br>
<label for="bytes"> Bytes</label> 
<input type="text" name="bytes" id="bytes" value="<?php echo $bytes  ;?>">
<br>
<label for="unitprice"> Unit Price</label> 
<input type="text" name="unitprice" id="unitprice" value="<?php echo $unitprice ;?>">

<input type="submit" name="update" value="Update Album">
</form>
 <?php writeFoot(); ?>

	
	 
	 <?php
	  } 
	 }	  // end of authorized for this page
	 else {

          // if user has not logged in, send to login page and include page to return to after login

          header("location: login.php?page=comp4-2.php");

    }
?>
	 
	 
	 