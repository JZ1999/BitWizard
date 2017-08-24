<?php
//private db
$host = "localhost"; $user = "root"; $pass = "Callofduty_07"; $db = "users";
$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
	print_r("Error");
}
?>