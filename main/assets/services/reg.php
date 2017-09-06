<?php 
//Registering users

if (isset($_POST["submit"])) {
	#include_once "../../dbh.php";
	
	#Setting the database
	$dbServer = "localhost";
	$dbUser = "root";
	$dbPass = "Callofduty_07";
	$dbName = "users";
	$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

	#Form data
	$user = $_POST["user_r"];
	$pass = $_POST["pass_r"];
	$email = $_POST["email_r"];
	$name = $_POST["name_r"];

	#Check invalida char
	if (!preg_match("/^[a-zA-Z0-9]*$/", $user) || !preg_match("/^[a-zA-Z]*$/", $name)) {
		header("Location: /error_reg.php?reg=invalid");
		exit();
	}else{
		#Check invalida email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: /error_reg.php?reg=invalid_email");
			exit();
		}else{

			#Checks repeated username
			$sql = "SELECT * FROM public_users WHERE username = '$user'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			if ($resultCheck > 0) {

				header("Location: /error_reg.php?reg=repeat_user");
				exit();
			}else{
				#Hashing password and inserting to db
				$hashed = password_hash($pass, PASSWORD_DEFAULT);

				$sql = "INSERT INTO public_users (email, username, name, password) VALUES ('$email', '$user', '$name', '$pass')";
				$result = mysqli_query($conn, $sql);
				if($result){
					echo "1";
				}else{
					echo "2";
				}
				header("Location: sesion.html");
				exit();
			}

		}
	}
}else{
	header("Location: /sesion.html");
	exit();
}

