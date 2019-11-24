
<?php
include 'functions.php';
$artistName= array("Danga"=>"Dhoom", "Datt"=>"Rock", "Bhatt"=>"Jaaz", "zarmd"=>"hug","alfa"=>"hung", "Dany"=>"Luck","Ram"=>"Star","Lapsy"=>"Hump",
                        "Suraj"=>"compaq", "Jordan"=>"Laugh");
writeHead("\"The White Album \" by \"The Beatles\"");
echo"<h2> Artists and Albums</h2>";
foreach($artistName as $artist=>$album)
{
	echo"$artist  $album<br>";
}


$download=false;
$h2AppendTrue = " - Downloads";
$h2AppendFalse="-CDs";

if($download==false)
{
	echo "<h2> Cost by Quantity$h2AppendTrue</h2>\n";
	$counter=1;
while($counter<=6)
{

	$tCost= priceCalc(12.99,$counter);
	echo "Total price for ".$counter." items is: ".$tCost."<br>";
	$counter++;
}
}

else
{
		echo "<h2> Cost by Quantity$h2AppendFalse</h2>\n";
	while($counter<=6)
{

	$tCost=priceCalc(9.99,$counter);
    echo "Total price for ".$counter." items is: ".$tCost."<br>";
	$counter++;
}
}

$download=true;

if($download==true)
{
	echo "<h2>Cost by Quantity $h2AppendTrue\n</h2>";
	
	for($counter=1; $counter<=5;$counter++)
{
	$tCost=priceCalc(9.99,$counter);
	echo "total price for ".$counter." items is:".$tCost."<br>";
}
}
else
{
	echo "<h2>Cost by Quantity $h2AppendFalse</h2>\n";
	for($counter=1; $counter<=5;$counter++)
{
      $tCost=priceCalc(12.99,$counter);
	
	echo "total price for ".$counter." items is: ".$tCost."<br>";
}
}
writeFoot();
?>





