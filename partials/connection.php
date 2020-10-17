<?php
$servername="localhost";
$username="root";
$password="";
$db="codeforum";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
	echo "Database not connected";
}
?>