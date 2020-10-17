
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,900;1,700&display=swap" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="/Forum/index.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

	 
</head>
<body>

	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		 <div class="container-fluid">
  		   &nbsp&nbsp<a class="navbar-brand" href="/forum">
  		   	<i class="fas fa-code"></i> &nbsp Code Forum</a>
  		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  		  </button>
  
		  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ">
				      <li class="nav-item active">
				        <a class="nav-link" href="/forum">Home </a>
				      </li>
				      <li class="nav-item ">
				        <a class="nav-link" href="/Forum/about.php">About </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href=/Forum/contact.php>Contact</a>
				      </li>
					  
					  
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php
					session_start();
						if(isset($_SESSION['loggedin'])){
							echo'
							<form class="form-inline" method="get" action="/Forum/search.php">
								<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search for Questions" aria-label="Search">
								<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
								<p class="text-dark m-2 ">Signed In as '.$_SESSION["username"].' </p>
								<a href="/Forum/partials/logout.php" class="btn btn-outline-danger  ml-2 my-2 my-sm-0" >Logout</a>
					  		</form>
							';
							//session_destroy();
						}else{
							echo '
						
							<li class="nav-item ">
							  <a class="nav-link" href="" data-toggle="modal" data-target="#signupmodal">Sign In <i class="fas fa-user-plus"></i></a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" href="" data-toggle="modal" data-target="#loginmodal">Login <i class="fas fa-user"></i></a>
							</li>
									';
						}
					?>
					  

			    </ul>
		  </div>
		</div>
	</nav>

	<?php
	if (isset($_GET['error'])){
		if($_GET['error'] == "Usernamealreadytaken"){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong> <i class="fas fa-exclamation-triangle"></i>Username already taken</strong> Please signup with different name.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		  	</div>';
		}elseif($_GET['error'] == "passworddoesnotmatch"){
			echo'	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fas fa-exclamation-triangle"></i> Password does not match!!</strong> Please check.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>;';
		}elseif($_GET['error'] == "invalidcredentials"){
			echo'	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fas fa-exclamation-triangle"></i> Invalid Credentials</strong> Please check.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>;';}
	}elseif(isset($_GET['signup'])){
		if($_GET['signup'] == "success"){
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong><i class="far fa-check-circle"></i> Succesfull SignUp</strong> Please login...
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>';
		}
	}
?>


	<?php  include "signupmodal.php"; ?>
	<?php  include "loginmodal.php" ; ?>
