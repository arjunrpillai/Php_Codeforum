<?php
		include "header.php";
		include "connection.php";
?>

<?php
	$showalert = false;
	$id = $_GET['id'];
	$sql = "SELECT * FROM `categories` WHERE category_id=$id";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$catname = $row['category_name'];
		$catdescp = $row['category_description'];
		$date = $row['createdate'];
	}
	if (isset($_POST['submit'])) {
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$desc = str_replace("<","&lt",$desc);
		$desc = str_replace(">","&gt",$desc);
		$thread_user_id = $_POST['u_no'];
		$sql = "INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date`) VALUES (NULL, '$title', '$desc', '$id', '$thread_user_id', current_timestamp());";
		$result = mysqli_query($conn,$sql);
		$showalert = true;
		if($showalert){
			echo '
				<div class="alert alert-success alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Success! </strong> Question posted successfully! Wait for community to respond..
				</div>';
		}
	}
	
?>
	<!--Fetch categories from DB -->
<div class="container">
	<h2 class="my-3 text-center"><i class="fab fa-centercode"></i>  Code Forum - Categories</h2>
	<?php 
		include "connection.php";
	 ?>
	 <div class="jumbotron">
	 	<h1 class="display-4">Welcome to <?php echo $catname; ?> Forums</h1>
	 	<hr>
	 	<p class="lead"><?php echo $catdescp; ?></p>
	 	<hr >
	 	<p>No Spam / Advertising / Self-promote in the forums.</p>
	 	<p>Do not post copyright-infringing material.</p>
		<p>Do not post “offensive” posts, links or images.</p>
		<p>Do not cross post questions.</p>
	 	<a href="#" class="btn btn-md btn-secondary">Learn more</a>
	 </div>
	 <h3 class="">Start a Discussion</h3>
</div>

<?php
if(isset($_SESSION['loggedin'])){
echo 
'<div class="container">
	<h3 class="text-center  mb-3 bg-danger text-light">Ask A Questions  <i class="fas fa-question-circle"></i></h3>
	<form action="/Forum/partials/threadlist.php?id='.$id.'" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="lead" style="font-weight: 700">Problem title</label>
	    <input type="text" class="form-control" name="title" placeholder="Enter your problem">
		<small id="emailHelp" class="form-text text-muted">Keep your problem title as crisp as possible.</small>
		
	  </div>
	  <div class="form-group">
    		<label for="exampleFormControlTextarea1" class="lead" style="font-weight: 700">Description</label>
			<textarea class="form-control" name="desc" rows="3"></textarea>
			<input type="hidden" name="u_no"  value = "'.$_SESSION['uno'].'">
  	  </div>
	  <button type="submit" name="submit" class="btn btn-success mb-3">Submit</button>
	</form>';
}else{
	echo '
	<div class="container">

		<p class="bg-dark text-light text-center my-2 py-2" font-weight-bold"><i class="fas fa-exclamation-circle"></i> You are not logged in. Please login to join the Discussion</p>
	</div>
	';
}

?>


	 	<h3 class="text-center  mb-3 bg-info text-light">Browse Questions  <i class="far fa-window-restore"></i></h3>
	 		 	<?php
					$id = $_GET['id'];
					$sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
					$result = mysqli_query($conn,$sql);
					$noResult = true;
					while ($row = mysqli_fetch_assoc($result)) {

						$noResult = false;
						$id = $row['thread_id'];
						$title = $row['thread_title'];
						$desc = $row['thread_desc'];
						$thread_time = $row['date'];
						$thread_time = date("d/m/Y", strtotime($thread_time));
						$thread_user_id = $row['thread_user_id']; 
						$sql2 = "SELECT username FROM `users` where u_no=$thread_user_id";
						$result2 = mysqli_query($conn,$sql2);
						$row2 = mysqli_fetch_assoc($result2);
						$username = $row2['username'];
			
			echo 	'<div class="media">
						  <img class="mr-3" src="../avatar.jpg" style="width: 50px;">
						  <div class="media-body mb-2">
						  <p class="font-weight-bold my-0">Posted by : '.$username.' | Posted at : '. $thread_time.' </p>
						    <h5 class="mt-0"><a href="threads.php?threadid='.$id.'">'.$title.'</a></h5>
						    '.$desc.'
						  </div>
					</div>';

	}
	if ($noResult) {
		echo "<h4 class='my-2'><b>Be the first person to ask !!</b></h4>";
	}
	?>
	 
</div>
<?php
	include "footer.php";
?>
	
		 	
