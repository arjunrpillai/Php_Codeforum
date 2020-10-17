<?php
	if (isset($_POST['submit'])) {
		include "connection.php";
		$email = $_POST['email'];
        $password = $_POST['password'];
        
		$sql = "SELECT * FROM `users` WHERE user_email ='$email'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);
		if($row == 1){
            $row1 = mysqli_fetch_assoc($result);
            if(password_verify($password,$row1['user_password'])){
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $row1['username'];
				$_SESSION['uno'] = $row1['u_no'];
				$_SESSION['email'] = $email;
				header("Location: /Forum/index.php?login=success");
				exit();
			}else{
				header("Location: /Forum/index.php?error=passworddoesnotmatch");
			}

        }else{
        	header("Location: /Forum/index.php?error=invalidcredentials");
        }

	 }else{
	 	header("location: /Forum/index.php");
	 }
?>