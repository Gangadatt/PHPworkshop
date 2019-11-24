<?php
//$conn = mysqli_connect("localhost","phpstudent","Itse1406",'chinook');

function writeHead($title)
{
	$writeHead=<<<EOD
<!doctype html>
<head>
<title> $title </title>
</head>
<body>
<header>

<p> This is my header: $title</p>
<h1>My Name is Ganga Datt Bhatt<br> I am taking ITSE 1406 21401 PHP class</h1>
</header>
<nav>
<p> <a href="/"> COMP1</a>| <a href="/"> COMP2</a>|
<a href="/"> COMP3</a>| <a href="/"> COMP4</a></nav>


EOD;
echo $writeHead;
}

function writeFoot()
{

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
}

function priceCalc($price, $quantity)
{
	$disPercent=array(0,0,.05,.1,.2,.25);

		if($quantity <=5&& $quantity>0)
		{
			$disPrice= $price-($price*$disPercent[$quantity]);
		      $total= $disPrice*$quantity;
		    return $total;
        }
		else if($quantity>5)
		{
			$disPrice=$price-($price*$disPercent[5]);
	      	$total= $disPrice*$quantity;
			return $total;
		}
		else
			echo"Invalid Quantity";
		
	}
	




?>