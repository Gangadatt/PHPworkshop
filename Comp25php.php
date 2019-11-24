<?php
    
   
        // check to see if the form has been submitted if so write out the data.//
    if (isset($_POST['submit'])) {
        // set the validation flag
        $valid = true;
        // retrieve the values from the form. use htmlspecialchars to avoid security issues and trim off the whitespace
        $firstname = htmlspecialchars(trim($_POST['firstname']));
        if (empty($firstname)) {
            echo "<p class='error'>Please enter your first name</p>";
            $valid = false;
        }
        $lastname = htmlspecialchars(trim($_POST['lastname']));
        if (empty($lastname)) {
            echo "<p class='error'>Please enter your last name</p>";
            $valid = false;
        }
        // convert the firstname and lastname to lowercase and capitalize the first letter
        $firstname = ucfirst(strtolower($firstname));
        $lastname = ucfirst(strtolower($lastname));
        $email = htmlspecialchars($_POST['email']);
        if (empty($email)) {
            echo "<p class='error'>Please enter your email</p>";
            $valid = false;
        }
        // validate email using a regular expression
        if (!preg_match('/[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/',$email)) {
            echo "<p class='error'>Invalid email address</p>";
        }
        $username = htmlspecialchars(trim($_POST['username']));
        if (empty($username)) {
            echo "<p class='error'>Please enter a username</p>";
            $valid = false;
        }
        // validate username to be between 6 adn 12 characters
        if (strlen($username)<6 or strlen($username)>12) {
            echo "<p class='error'>Username must be between 6 and 12 characters in length</p>";
            $valid = false;
        }
        $password = htmlspecialchars(trim($_POST['password']));
        if (empty($password)) {
            echo "<p class='error'>Please enter a password</p>";
            $valid = false;
        }
        // validate password using a regular expression: 1 lowercase, 1 uppercase, 1 number, 8-15 length
        if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,15}$/',$password)) {
            echo "<p class='error'>Password must have 1 uppercase letter, 1 lowercase letter, 1 number and be 8-15 characters in length</p>";
        }
       // add validation for password confirmation
        $pwconf = htmlspecialchars(trim($_POST['pwconf']));
        if (empty($pwconf)) {
            echo "<p class='error'>Please confirm the password</p>";
            $valid = false;
        }
        // compare password fields
        if (strcmp($password,$pwconf)!=0) {
            echo "<p class='error'>Passwords do not match</p>";
            $valid = false;
        }
        $zip = htmlspecialchars(trim($_POST['zipcode']));
        // test zip code to make sure it is numeric
        if (!is_numeric($zip)) {
            echo "<p class='error'>Zip code must be numeric</p>";
            $valid = false;
        }
        // validate zip code using a regular expression
        if (!preg_match('/\d{5}(-\d{4})?/',$zip)) {
            echo "<p class='error'>Invalid zip code.</p>";
        }
        // since usertype is a radio button, we will use isset to test if the user selected one of the options.
        if (isset($_POST['usertype'])) {
            // if set, get the type. No need for htmlspecialchars here, since the user can only select a value we provided.
            $type = $_POST['usertype'];
        } else {
            echo "<p class='error'>Please select a user type</p>";
            $valid = false;
            $type="";
        }
        // for the interest checkboxes, use isset to test if the user selected at least one.
        if (isset($_POST['interests'])) {
            // if set, get the interests. No need for htmlspecialchars here, since the user can only select a value we provided. Since they could select more than one, use an array
            $interests = $_POST['interests'];
        } else {
            echo "<p class='error'>Please select at least one interest</p>";
            $valid = false;
            $interests[0]="";
        }
        // by default the first item in a selection list is selected, so this tests to make sure they selected a different option.
        $county = $_POST['county'];
        if ($county=="") {
            echo "<p class='error'>Please select a county</p>";
            $valid = false;
        }
        // if Dallas county, the zip code must start with 75
        if ($county == 'Dallas') {
            if (substr($zip,0,2)!='75') {
                echo "<p class='error'>Zip codes in Dallas county must start with 75.</p>";
                $valid = false;
            }
        }
        // if the data is valid, transfer to another page and send the album name via the querystring
       if ($valid) {
            header("Location:Comp25out.php?firstname=$firstname&lastname=$lastname");
            exit();
        }
		 /*if ($valid) {
            echo "<p>You entered the following values:";
            echo "<br>Artist: $artist";
            echo "<br>Album: $album";
            echo "<br>Release date: $rdate";
            echo "<br>Type: $type";
        }*/
    
    } 
	
	else {
        // if the form was not submitted, initialize the variables for the sticky form fields
        $firstname="";
        $lastname="";
        $email="";
        $username="";
        $password="";
        $type ="";
        $interests[0]="";
        $county="";
        $zip="";
    }
?>
