<?php
     require_once 'functions.php';
    
	if(isset($_GET['tid']))
	{
	$tid=$_GET['tid'];
	}
	else if(isset($_POST['tid']))
	{
		$tid=$_POST['tid'];
	}
    writeHead("Desired Comp3B: Delete Employee");
        // check to see if the form has been submitted if so write out the data.
    if (isset($_POST['delete'])) {
        
        $query = "delete from Track where TrackId=$tid";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn)>0) {
                header("Location: Comp3B.php?action=deleted&tid=$tid");
                exit();
            }
            echo "<p class='error'>Unable to delete record</p>";
    } 
    
	else {
        // if the form was not submitted, get the id from the querystring and retrieve the data from the database
        if (!isset($_GET['tid'])) {
            echo "<p class='error'>No Track ID provided. <a href='Comp3B.php'>Return to display page.</a>";
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
            $bytes=$row['Bytes'];
            $unitprice=$row['UnitPrice'];
            
        } else {
            echo "<p class='error'>Unable to retrieve Track $tid. <a href='Comp3B.php'>Return to display page.</a>";
        }
    }

?>						
        <p>Track Table Information</p>
        <p><?php echo "$name  <br>$bytes<br>$unitprice"; ?></p>
        <form method="post" action="Comp3BDelete.php">
            <p>
                <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                <input type="submit" name="delete" value="Confirm Delete">
            </p>
        </form>
        <p>Return to <a href="">Track Table Display</a></p>
        <?php writeFoot(); ?>