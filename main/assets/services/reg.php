<?php 
//Registering users
include "../../../mysqli.php";

$user = $_POST["user_r"];
$pass = $_POST["pass_r"];
$email = $_POST["email_r"];
$name = $_POST["name_r"];

$sql = "INSERT INTO public_users (email, username, name, password) 
VALUES ('$email','$user','$name','$pass')";

$result = mysqli_query($conn, $sql);
?>