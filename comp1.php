



<?php
$download=true;
$shipCost=2.99;//shipping cost
$title= "Competency 1";
$htmlCode=<<<EOD
<!doctype html>
<html lang="en-US">
<head>
<style>
nav{
	text-align:center;
	font-size:200%;
}
div p{
	margin-left:10em;
	
}

</style>
<meta charset="utf-8">
<title>  $title</title >
</head>
<body>

<nav>

<a href="comp1.php " > Comp1</a>|
<a href="comp2.php " > Comp2</a>|
<a href="comp3.php " > Comp3</a>|
<a href=" comp4.php" > Comp4</a>

</nav>

<h1> My Name is Ganga Datt Bhatt<br> I am taking ITSE 1406 21401 PHP class</h1>

EOD;
echo $htmlCode;
$h2AppendTrue = " - Downloads";
$h2AppendFalse="-CDs";
if($download==true)
{
	echo "<h2> Cost by Quantity$h2AppendTrue</h2>\n";
	$counter=1;
while($counter<=6)
{
	$cost=9.99;
	$tCost= $cost*$counter;
	echo "Total price for ".$counter." items is: ".$tCost."<br>";
	$counter++;
}
}
else
{
	echo "<h2> Cost by Quantity$h2AppendFalse</h2>\n";
	$counter=1;
while($counter<=6)
{
	$cost=12.99;
	$shipCost;
	$tCost= $cost*$counter + $shipCost;;
	echo "total price for ".$counter." items is:".$tCost."<br>";
	$counter++;
}
}
$download=false;

if($download==true)
{
	echo "<h2>Cost by Quantity$h2AppendTrue\n</h2>";
	
	for($counter=1; $counter<=5;$counter++)
{
	$cost=9.99;
	$tCost= $cost*$counter;
	echo "total price for ".$counter." items is:".$tCost."<br>";
}
}
else
{
	echo "<h2>Cost by Quantity$h2AppendFalse</h2>\n";
	for($counter=1; $counter<=5;$counter++)
{
	$cost=12.99;
	$shipCost;
	$tCost= $cost*$counter + $shipCost;;
	echo "total price for ".$counter." items is: ".$tCost."<br>";
}
}


$againHtml=<<<EOD
	
</body>
<footer>
<div>
<p>All the contents and pictures are the private property of Geeks Stop. Violation of copy right matrial should be procecuted according to law\n.<br>
                     Welcome to our store at 555 W Airport FWY Irving Texas 75062</p>

</div>

</footer>

</html>
EOD;
echo $againHtml;
?>