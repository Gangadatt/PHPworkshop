


<?php
include 'functions.php';
pageHead("PHP Competencies 1.9 and 1.10");
$itemPrice=20;
$quantity=5;
$taxAmount= totalTax($itemPrice, $quantity);

$totalPrice= $itemPrice*$quantity +$taxAmount;
echo "Total taxAmount is: \$".round($taxAmount,2);
echo"and Total amount is: \$".round($totalPrice,2);
pageFoot();
?>