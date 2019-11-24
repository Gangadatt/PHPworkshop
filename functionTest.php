
<?php
function totalTax($price, $quantity)
{
	define("taxRate", .085);
	$taxAmount = round($price*$quantity*taxRate,2);
	return $taxAmount; 
}







function pageFoot()
{
$writeFoot=<<<EOD
	<footer>
	<p>Thanks for visiting my page! 
	This was ITSE 1406-Compitency practice</p>
	</footer>
	</body>
	</html>
EOD;
	echo $writeFoot;
}

?>