<?php
		include "header.php";
		include "connection.php";
?>

	<?php
	$id = $_GET['threadid'];
	$sql = "SELECT * FROM `thread` WHERE thread_id=$id";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$title = $row['thread_title'];
		$desc = $row['thread_desc'];
		$date = $row['date'];
		$postedby = $row['thread_user_id'];
		$newDate = date("d/m/Y", strtotime($date));
		$sql2 = "SELECT username FROM `users` where u_no=$postedby";
		$result2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$username1 = $row2['username'];    
	}
?>
<?php
		if (isset($_POST['submit'])) {
		$comment = $_POST['comment'];
		$comment = str_replace("<","&lt",$comment);
		$comment = str_replace(">","&gt",$comment);
		$comment_by = $_POST['uno'];
		$sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`,`comment_by`, `date`) VALUES (NULL, '$comment', '$id','$comment_by', current_timestamp());";
		$result = mysqli_query($conn,$sql);
		$showalert = true;
		if($showalert){
			echo '
				<div class="alert alert-success alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Solution </strong> posted successfully!!
				</div>';
		}
	}
?>
<div class="container">
	<div class="jumbotron">
		<h3 class="display-4"><?php echo $title; ?></h3>
		<p class="lead"> <?php echo $desc; ?></p>
		<p><b>Posted By: <?php echo $username1; ?> </b></p>
		<p><b><?php echo $newDate;?></b></p>
		<hr>
	 	<p>No Spam / Advertising / Self-promote in the forums.</p>
	 	<p>Do not post copyright-infringing material.</p>
		<p>Do not post “offensive” posts, links or images.</p>
		<p>Do not cross post questions.</p>
	</div>

	<!--Comments forms-->
	<h3 class="text-center  mb-3 bg-primary text-light">Post a Solution </h3>
	<?php
	if(isset($_SESSION['loggedin'])){
		
		echo '
		<form action="/Forum/partials/threads.php?threadid='.$id.'" method="post">
		<div class="form-group">
			  <label for="exampleFormControlTextarea1" class="lead" style="font-weight: 700">Provide Solution</label>
			  <textarea class="form-control" name="comment" rows="3"></textarea>
			  <input type="hidden" name="uno" value=" '.$_SESSION["uno"].' ">
		  </div>
		<button type="submit" name="submit" class="btn btn-danger mb-3">POST</button>
	  </form>
		';
	}else{
		echo '
		<div class="container">
		<p class=" text-center my-2 py-2 w-100" font-weight-bold"><i class="fas fa-exclamation-circle"></i> You are not logged in. Please login to post a solution.</p>
		</div>';
	}
	
	?>

	<h2 class="my-3 text-center">Discussion</h2>

	<?php
		$sql = "SELECT * FROM comments WHERE thread_id=$id";
		$result = mysqli_query($conn,$sql);
		$noComment = true;
		while ($row = mysqli_fetch_assoc($result)) {
			$content = $row['comment_content'];
			$comment_time = $row['date'];
			$comment_time = date("d/m/Y", strtotime($comment_time)); 
			$noComment = false;

			$comment_by = $row['comment_by'];
			$sql2 = "SELECT username FROM `users` where u_no=$comment_by";
			$result2 = mysqli_query($conn,$sql2);
			$row2 = mysqli_fetch_assoc($result2);
			$username = $row2['username'];
			
			echo 	'<div class="media my-3">
							  <img class="mr-3" src="../avatar.jpg" style="width: 50px;">
							  <div class="media-body my-0">
							  <p class="font-weight-bold my-0">Posted by : '.$username.' | Posted at : '. $comment_time.' </p>
							    '.$content.'
							  </div>
					</div>';
		}
		if ($noComment) {
			echo "<h4 class='my-2'><b>No Solution has been Posted yet!! Stay Tuned </b></h4>";
		}
	?>

</div>

<?php
	include "footer.php";
?>
	
		 	
