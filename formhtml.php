

<?php

include 'form.php';
?>
<!doctype html>
<head>
<title> hello </title>
</head>
<body>
<header>

<p> This is my header: hello</p>
<h1>My Name is Ganga Datt Bhatt<br> I am taking ITSE 1406 21401 PHP class</h1>
</header>
<nav>
<p> <a href="/"> COMP1</a>| <a href="/"> COMP2</a>|
<a href="/"> COMP3</a>| <a href="/"> COMP4</a></nav>

        <form method="post" action="form.php">
            <p>
                <label for="artist">Artist</label>
                <input type="text" name="artist" id="artist" value="<?php echo $artist; ?>">
            </p>
            <p>
                <label for="album">Album</label>
                <input type="text" name="album" id="album" value="<?php echo $album; ?>">
            </p>
            <p>
                <label for="rdate">Release date</label>
                <input type="text" name="rdate" id="rdate"  value="<?php echo $rdate; ?>">
            </p>
            <p>
                <input type="radio" name="type" id="typecd" value="cd"
                 <?php
                 // test the value of the form input to see if the radio button should be checked
                 if ($type == "cd") {echo "checked";}
                 ?>
                >
                <label for="typecd">CD</label>
                <input type="radio" name="type" id="typedl" value="download" <?php
                 if ($type == "download") {echo "checked";}
                 ?>>
                <label for="typedl">Download</label>
            </p>
            <p>
                <input type="submit" name="submit" value="Add Album">
            </p>
        </form>


	<footer>
	<p>Thanks for visiting my page! 
	This was ITSE 1406-Compitency practice</p>
	</footer>
	</body>
	</html>