



<?php
$download=true;
$shipCost=2.99;//shipping cost
$title= "Competency 1";

function writeHead($title)
{
	$htmlCode=<<<EOD
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<title>  $title</title >
</head>

<body>

<nav>
<a href="comp1.php " > Comp1</a>|
<a href="comp2.php " > Comp2</a>|
<a href="comp3.php " > Comp3</a>|
<a href=" comp4.php" > Comp1</a>

</nav>

<h1> My Name is Ganga Datt Bhatt<br> I am taking ITSE 1406 21401 PHP class</h>
<h2> Cost by Quantity<h2>
EOD;
echo $htmlCode;
}
function priceCalc($pricetFalse, $priceTrue)
{

if($download==true)
{
	echo "<h2>-Downloads";
	$counter=1;
while($counter<=6)
{
	
	$tCost= $priceQuanTrue*$counter;
	echo "total price for".$counter."items is".$tCost;
	$counter++;
}
}
else
{
	echo "<h2>-CDs";
	$counter=1;
while($counter<=6)
{

	$tCost= $pricetFalse*$counter + $shipCost;
	echo "total price for".$counter."items is".$tCost;
	$counter++;
}
}

$download=false;

echo"<h2> Cost by Quantity</h2>";

if($download==true)
{
	echo "<h2>-Downloads";
	
	for($counter=1; $counter<=5;$counter++)
{
	$tCost= $priceTrue*$counter;
	echo "total price for".$counter."items is".$tCost;
}
}
else
{
	echo "<h2>-CDs";
	for($counter=1; $counter<=5;$counter++)
       {
	$shipCost;
	$tCost= $priceFalse*$counter + $shipCost;;
	echo "total price for".$counter."items is".$tCost;
}
}
}


function writeFoot()
{
$againHtml=<<<EOD
	
</body>
<footer>
<div>
<p>All the contents and pictures are the private property of Geeks Stop. Violation of copy right matrial should be procecuted according to law.<br>
                     Welcome to our store at 555 W Airport FWY Irving Texas 75062</p>

</div>

</footer>

</html>
EOD;
echo $againHtml;
}
?>