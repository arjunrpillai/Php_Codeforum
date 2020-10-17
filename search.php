<!-- ALTER TABLE thread ADD FULLTEXT(thread_title,thread_desc)  for making search enable in given column
    SELECT * FROM `thread` where match(thread_title,thread_desc) against ('unable') - now to match the given parameter 
-->

<?php
		include "partials/header.php";
        include "partials/connection.php";
?>
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>

<div class="container my-3">
    <h1 class="text-center my-2 p-3 " style="border-bottom:1px solid black;"><i>Search results for "<?php echo $_GET['search'];?>"</i></h1>

    <?php
    
    $query = $_GET['search'];
    $sql1 = "SELECT * FROM `thread` where match(thread_title,thread_desc) against ('$query')";
    $result = mysqli_query($conn,$sql1);
    $x = true;
    while($row = mysqli_fetch_assoc($result)){
        $x = false;
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_id = $row['thread_id'];

        echo '
        <div class="results my-2 py-2 " uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay:500">
            <h3 ><a href = "/Forum/partials/threads.php?threadid='.$thread_id.'"> '.$title.'</a></h3>
            <p>'.$desc.'</p>
         </div>
        ';
    }
    if($x){
        echo '
        <div class="results my-2 py-2 " uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay:500">
            <h3 class="bg-danger text-white  text-center py-2" >Sorry No Results found..  <i class="fas fa-frown"></i> </h3>
         </div>
        ';
    }
    

    ?>
 
</div>

<?php
	include "partials/footer.php";
?>
	
