<?php
	if (isset($_POST['submit'])) {
		include "connection.php";
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		//Username error
		$exist = "SELECT * FROM `users` WHERE username ='$username'";
		$result = mysqli_query($conn,$exist);
		$many = mysqli_num_rows($result);
		if ($many > 0) {
			$showError = "Usernamealreadytaken";
			header("Location: /Forum/index.php?error=$showError");
			exit();
		}else{
			if($password == $cpassword){
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO `users` (`u_no`, `username`, `user_email`, `user_password`, `date`) VALUES (NULL, '$username', '$email', '$hash', current_timestamp());";
				$result = mysqli_query($conn,$sql);
				if($result){
					header("Location: /Forum/index.php?signup=success");
					exit();
				}

			}else{
				$showError = "passworddoesnotmatch";
				header("Location: /Forum/index.php?error=$showError");
				exit();
			}
		}

	 }else{
	 	header("location: /Forum/index.php");
	 }
?>