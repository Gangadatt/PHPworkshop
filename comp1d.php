<?php
include 'functions.php';
 writeHead("Desired Comp 1 D: Artists and Albums");
$artist=array(
         "The Beatles"=>array("A Hard Day's Night"=> 1964, "Help!"=> 1965, "Rubber Soul"=> 1965," Abbey Road"=> 1969),
          "Led Zepplin"=>array("Led Zepplin IV"=> 1971),
		 " Rolling Stones"=>array("Let It Bleed"=> 1969," Sticky Fingers"=> 1971),
		 
          "The Who"=>array("Tommy"=> 1969," Quadrophenia"=> 1973," The Who by Numbers"=> 1975));


echo"Release date for Tommy by The Who is: " .$artist['The Who']['Tommy']."<br><hr>";

echo" Artist and Album Title<br><br>";
foreach($artist as $artistName=> $albumn_Date)
{
	
foreach($albumn_Date as $albumnTitle=>$albumnDate)
{
echo"artist is: ". $artistName." and albumn title is". $albumnTitle. "<br>";		
}
}
echo"<hr>";
echo" All Albumns and Released dates by The Who<br><br>";
foreach($artist['The Who']as  $albumnTitle=>$albumnDate)
{
echo"artist is: ". $albumnTitle." and released date is". $albumnDate ."<br>";	
	
}


echo"<hr>";
echo"Artists and Albums that were released after 1970<br><br>";
foreach($artist as $artistName=> $albumn_Date)
{
	
foreach($albumn_Date as $albumnTitle=>$albumnRDate)
{
	if($albumnRDate>=1970)
echo"artist is: ". $artistName." and albumn title is ". $albumnTitle."<br>";	
	
}

}
writeFoot();
?>     
