<?php
include "../../../mysqli.php";

$user = $_POST["user_i"];
$pass = $_POST["pass_i"];

$sql = "SELECT * FROM public_users WHERE user='$user' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)){
	echo "Nombre de Usuario o Contraseña incorrecta!";
}else{
	echo "Ok!";
}
?>
