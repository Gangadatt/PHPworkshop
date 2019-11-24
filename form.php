  <?php
        // check to see if the form has been submitted if so write out the data.
    if (isset($_POST['submit'])) {
        // set the validation flag
        $valid = true;
        // retrieve the values from the form. use htmlspecialchars to avoid security issues
        $artist = htmlspecialchars($_POST['artist']);
        if (empty($artist)) {
            echo "<p class='error'>You must enter an artist</p>";
            $valid = false;
        }
        $album = htmlspecialchars($_POST['album']);
        if (empty($album)) {
            echo "<p class='error'>You must enter an album</p>";
            $valid = false;
        }
        $rdate = htmlspecialchars($_POST['rdate']);
        // since release date is a year, test to make sure it is numeric
        if (!is_numeric($rdate)) {
            echo "<p class='error'>Release date must be numeric</p>";
            $valid = false;
        }
        // since type is a radio button, we will use isset to test if the user selected one of the options.
        if (isset($_POST['type'])) {
            // if set, get the type. No need for htmlspecialchars here, since the user can only select a value we provided.
            $type = $_POST['type'];
        } else {
            echo "<p class='error'>Please select a type</p>";
            $valid = false;
            $type="";
        }
        // if the data is valid, display the values on the page
        if ($valid) {
            echo "<p>You entered the following values:";
            echo "<br>Artist: $artist";
            echo "<br>Album: $album";
            echo "<br>Release date: $rdate";
            echo "<br>Type: $type";
        }
    } else {
        // if the form was not submitted, initialize the variables for the sticky form fields
        $album="";
        $artist="";
        $rdate="";
        $type="";
    }
?>