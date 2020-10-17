<?php
    include "partials/header.php";
?>
<style>
li img{
    height:50%;
    width:100%;
}
</style>

<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
<!--  -->

<div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
     data-src="https://images.unsplash.com/photo-1490822180406-880c226c150b?fit=crop&w=650&h=433&q=80"
     data-srcset="https://images.unsplash.com/photo-1490822180406-880c226c150b?fit=crop&w=650&h=433&q=80 650w,
                  https://images.unsplash.com/photo-1490822180406-880c226c150b?fit=crop&w=1300&h=866&q=80 1300w"
     data-sizes="(min-width: 650px) 650px, 100vw" uk-img>
    <h1>Forum For Everyone</h1>
</div>

<!--Carousel--> 
<div class="uk-position-relative uk-visible-toggle uk-light mt-5" tabindex="-1" uk-slider>

    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small">
        <li>
            <img src="https://images.unsplash.com/photo-1564865878688-9a244444042a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" width="400" height="300">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1480506132288-68f7705954bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" width="400" height="300">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1526040652367-ac003a0475fe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" width="400" height="300">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1520583457224-aee11bad5112?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" width="400" height="300">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1566241440091-ec10de8db2e1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1529158062015-cad636e205a0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
        </li>
        <li>
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
        </li>
        
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

<?php
    include "partials/footer.php";
?>