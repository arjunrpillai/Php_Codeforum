<?php
		include "partials/header.php";
?>
	<!--Image Carousel-->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="img1.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img2.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img3.jpg" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
	</div>

	<!--Fetch categories from DB -->
	<div class="container">
				<h2 class="my-3 text-center">Code Forum - Categories</h2>
	<div class="row">
	<?php 
		include "partials/connection.php";
		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn,$sql);
		while ($row= mysqli_fetch_assoc($result)) {
			$id = $row['category_id'];

			echo '
			<div class="col-lg-4 mb-3">
					<div class="card grey-card" style="height:100%;">
			            <div class="inner">
			              <img src="/Forum/card'.$id.'.jpg" class="card-img-top" alt="...">
			            </div>
	  					
	 					<div class="card-body">
	    					<h5 class="card-title">'.$row['category_name'].'</h5>
	    					<p class="card-text">'.substr($row['category_description'],0,40).'...'.'</p>
	    					<a href="/Forum/partials/threadlist.php?id='.$id.'" class="btn btn-outline-success btn-sm">Open</a>
	  					</div>
					</div>
				</div>
			';
		}
	 ?>
	

	</div>
</div>
<?php
	include "partials/footer.php";
?>
	
