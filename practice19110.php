<<!doctype html>
<head>
<title> reactice PHP competencies 1.9 to 1.10 </title>
<head>
<body>
<?php

function totalPrice($price, $quantity)
{
	$taxAmount = $price*$quantity - $price*$quantity*.0825;
	return $taxAmount;
}

function pageTitle($title)
{
	<title>$title </title>

}

function noParameter( )
{
	<footer> Thanks for visiting my page!</footer>
}

