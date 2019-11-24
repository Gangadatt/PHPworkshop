<?php

     session_start();

     // unset session variables

     unset($_SESSION);

     // destroy the session

     session_destroy();
     writeHead("Desired Comp 4.4: logout");

?>
<h1>You are logged out.</h1>
<h2>Thank you for visiting</h2>
<p><a href="index.php">Home Page</a> | <a href="login.php">Log in</a></p>
<?php writeFoot(): ?>

