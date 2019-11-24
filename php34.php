<!doctype html>
<head>
<title> PHP Lab Assignment 1.8</title>
<head>
<body>
<?php

echo " Lab practice: Comp 1.8";
$itemPrice=200;
for($i=0;i<=7;$i++)
{
	$itemPrice=$itemPrice-$itemPrice*.1*$i;
	echo"price after discount on week".($i+1)." is:".$itemPrice."</br>";
}


$afterDiscountPrice;
$actualPrice=50;
$afterDiscountPrice=$actualPrice;
$i=0;
while($afterDiscountPrice>=20)
{
	$afterDiscountPrice=$itemPrice-$actualPrice*.1;
	echo"price after discount on week".($i+1)." is:".$afterDiscountPrice."</br>";
	$i++;
}


$itemNumber=0;
do{
	$afterDiscountPrice=$itemPrice- (itemprice*$i*.01);
	echo"price after discount  is:".$afterDiscountPrice." if you buy" .itemNnumber."items </br>";
	$itemNumber+=10;
}
while($itemNumber<=70);
	
?>

</body>
</html>

