<?php 
$conn= mysqli_connect("localhost","root","",'chinook');
$query="insert into user values('ganga', 'bhatt',2)";
mysqli_query($conn, $query);

echo"listpage"?>