<?php
// buffer the output
     ob_start();
     require_once 'functions.php';
     // check to see if a logintries cookie is set. 
     if (isset($_COOKIE['logintries'])) {
          // if the user has tried to login unsuccessfully more than 4 times, send them to an error page
          if ($_COOKIE['logintries']>4) {
               header("location: loginerr.php");
          }
     }
     // set a variable to check credentials only if id and password are found in cookies or in the form
     $checkCred=false;
     // check to see if login cookies are present. If so, get cookie values.
     if (isset($_COOKIE['uid'])) {
          $userid = $_COOKIE['uid'];
          $pw = $_COOKIE['pw'];
          // set check credentials flag to true
          $checkCred=true;
     }
     // check to see if the form has been submitted
     if (isset($_POST['submit'])) {
          // get form fields
          $userid = $_POST['userid'];
          //encrypt password
          $pw = md5($_POST['password']);
          // set check credentials flag to true
          $checkCred = true;
     }
     // if login credentials have been entered, check for authorization
     if ($checkCred) {
          // connect to database
          $dbConn=mysqli_connect('localhost', 'root', '', 'chinook');
          // create query using the userid and password as criteria
          $query = "select * from user where userid='$userid' and password='$pw';";
          $result = mysqli_query($dbConn,$query);
          // check to see if a match was found, if so, get the authorization level
          if ($result && mysqli_num_rows($result)==1) {
               $row = mysqli_fetch_array($result);
               // start a session
               session_start();
               // set a session variable with the authorization level
               $_SESSION['auth']=$row['auth'];
               // check to see if a logintries cookie is set. If so, delete it.
               if (isset($_COOKIE['logintries'])) {
                    setcookie('logintries',false,time()-1000);
               }
               // check to see if the user wants automatic login

               if (isset($_POST['auto'])) {
                    // save the login info in cookies valid for 14 days
                    setcookie('uid',$userid,time()+(60*60*24*14));
                    setcookie('pw',$pw,time()+(60*60*24*14));
               }
               // check to see if a page was passed in the query string. If not go to the list page
               if (isset($_POST['page'])) {
                    $page = $_POST['page'];
               } else {
                    $page = "list.php";
               }
               // user authorized so transfer back to page or to a default page
               header("location: $page");
          } else {
               // see if a logintries cookie exists
               if (isset($_COOKIE['logintries'])) {
                    // if found, add 1 to the tries else set it to 1
                    $tries = $_COOKIE['logintries'] + 1;
               } else {
                    $tries = 1;
               }
               // create a cookie to count the number of unsuccessful login attempts
               setcookie('logintries',$tries,time()+(60*60*24));
               // if too many tries, send to error page
               if ($tries > 4) {
                    header("location: loginerr.php");
               }
               // if no match, the user is not authorized so try again
               $msg = "Invalid login credentials. You have ".(5-$tries)." more attempts";
          }
          writeHead("Desired Lab Comp 4.4 - User Authentication");
     }
?>
<form method="post" action="login.php">

<?php
     if (isset($msg)) {
          echo "<p class='error'>$msg</p>";
     }
?>

<p><label>User Login: <input type="text " name="userid"></label></p>
<p><label>Password: <input type="password" name="password"></label></p>
<p><label><input type="checkbox" name="auto" value="true"> Log me in automatically</label></p>
<p><input type="submit" name="submit" value="login"></p>
<?php
echo"$userid $pw";
     if (isset($_GET['page'])) {
          echo "<input type='hidden' name='page' value='".$_GET['page']."'>";
     }
?>
</form>
<?php writeFoot(); ?>

