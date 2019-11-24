 <?php
 include 'functions.php';
 include 'Comp25php.php';

 
 ?>
 <?php  writeHead("This is PHP form");?>
 <form method="post" action="Comp25php.php">
            <p>
                <label for="firsname">First name</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
            </p>
            <p>
                <label for="email">Email address:</label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>">
            </p>
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username"  value="<?php echo $username; ?>">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <br>
                <label for="pwconf">Confirm Password:</label>
                <input type="password" name="pwconf" id="pwconf">
            </p>
            <p>
                <input type="radio" name="usertype" id="student" value="student"
                 <?php
                 // test the value of the form input to see if the radio button should be checked
                 if ($type == "student") {echo "checked";}
                 ?>
                >
                <label for="student">Student</label>
                <input type="radio" name="usertype" id="instructor" value="instructor" <?php
                 if ($type == "instructor") {echo "checked";}
                 ?>>
                <label for="instructor">Instructor</label>
                <input type="radio" name="usertype" id="tutor" value="tutor" <?php
                 if ($type == "tutor") {echo "checked";}
                 ?>>
                <label for="tutor">Tutor</label>
            </p>
            <p>
                <input type="checkbox" name="interests[]" id="html" value="html"
                 <?php
                 // loop through the array to see if the checkbox value is found and the checkbox should be checked
                 foreach ($interests as $interest) {
                 if ($interest == "html") {echo "checked";}
                 }
                 ?>
                >
                <label for="html">HTML</label>
                <input type="checkbox" name="interests[]" id="css" value="css"
                 <?php
                  foreach ($interests as $interest) {
                 if ($interest == "css") {echo "checked";}
                 }
                 ?>
                >
                <label for="css">CSS</label>
                <input type="checkbox" name="interests[]" id="php" value="php"
                 <?php
                 foreach ($interests as $interest) {
                 if ($interest == "php") {echo "checked";}
                 }
                 ?>
                >
                <label for="php">PHP</label>
                <input type="checkbox" name="interests[]" id="mysql" value="mysql"
                 <?php
                 foreach ($interests as $interest) {
                 if ($interest == "mysql") {echo "checked";}
                 }
                 ?>
                >
                <label for="mysql">MySQL</label>
                <input type="checkbox" name="interests[]" id="js" value="js"
                 <?php
                 foreach ($interests as $interest) {
                 if ($interest == "js") {echo "checked";}
                 }
                 ?>
                >
                <label for="js">JavaScript</label>
            </p>
            <p><label for="county">County: </label>
                <select name="county" id="county">
                    <option value="">Select a county</option>
                    <option value="Dallas"
                    <?php
                    // check to see if the county is selected
                        if ($county=="Dallas") { echo "selected";}
                    ?>
                    >Dallas</option>
                    <option value="Collin"
                    <?php
                        if ($county=="Collin") { echo "selected";}
                    ?>
                    >Collin</option>
                    <option value="Tarrant"
                    <?php
                        if ($county=="Tarrant") { echo "selected";}
                    ?>
                    >Tarrant</option>
                    <option value="Denton"
                    <?php
                        if ($county=="Denton") { echo "selected";}
                    ?>
                    >Denton</option>
                    <option value="other"
                    <?php
                        if ($county=="other") { echo "selected";}
                    ?>
                    >Other</option>
                </select>
            </p>
            <p>
                <label for="zip">Zip Code</label>
                <input type="text" name="zipcode" id="zip" value="<?php echo $zip; ?>">
            </p>
            <p>
                <input type="submit" name="submit" value="Add User">
            </p>
        </form>
		
		<?php writeFoot(); ?>