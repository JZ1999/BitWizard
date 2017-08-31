<?php 
//Registering users

if (isset($_POST["submit"])) {
	include_once "../../dbh.php"
	echo "a";
	$user = mysqli_real_escape_string($conn, $_POST["user_r"]);
	$pass = mysqli_real_escape_string($conn, $_POST["pass_r"]);
	$email = mysqli_real_escape_string($conn, $_POST["email_r"]);
	$name = mysqli_real_escape_string($conn, $_POST["name_r"]);
	#Check invalida char
	if (!preg_match("/^[a-zA-Z]*$/", $user) || !preg_match("/^[a-zA-Z]*$/", $name)) {
		header("Location: /error_reg.php?reg=invalid");
		exit();
	}else{
		#Check invalida email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: /error_reg.php?reg=invalid_email");
			exit();
		}else{
			#Checks repeated username
			$sql = "SELECT * FROM public_users WHERE username = '$user'"
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				header("Location: /error_reg.php?reg=repeat_user");
				exit();
			}else{
				#Hashing password and inserting to db
				$hashed = password_hash($pass, PASSWORD_DEFAULT);

				$sql = "INSERT INTO public_users (email, username, name, password) VALUES ('$email', '$user', '$name', '$pass')";
				mysqli_query($conn, $sql);
				header("Location: /reg_success.php")
				exit()
			}

		}
	}
}else{
	echo "aaa";
	//header("Location: /sesion.html");
	//exit();
}
