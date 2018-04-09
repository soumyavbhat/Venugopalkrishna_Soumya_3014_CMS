<?php

require_once('admin/phpscripts/config.php');

// if(isset($_GET['filter']))
// {
//   $tbl1 = "tbl_movies";
//   $tbl2 = "tbl_genre";
//   $tbl3 = "tbl_mov_genre";
//   $col1 = "movies_id";
//   $col2 = "genre_id";
//   $col3 = "genre_name";
//   $filter = "action";
//   $getMovies = filterResults($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
// }
// else
// {
  $tbl = "tbl_movies";
  $getMovies = getAll($tbl);
  $count = 0;
// }

// echo $getMovies;
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Merriweather|Roboto" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">

  <title>Movie Reviews</title>
</head>

<body>
  <div class="sidebar">
    <div class="allbutton">
      <div class="sidebutton">All</div>
      <div class="sidebutton">New Release</div>
      <div class="sidebutton">Action</div>
      <div class="sidebutton">Comedy</div>
      <div class="sidebutton">Classic</div>
      <div class="sidebutton">Horror</div>
      <div class="sidebutton">Crime</div>
    </div>
  </div>
<!--
  <div class="container">

    <button class="left">&#10094;</button>
<button class="right">&#10095;</button>

<div class="moviescontainer">
<img class="img" src="images/awrinkleintime.jpg" alt="">
<img class="img" src="images/blackpanther.jpg" alt="">
<img class="img" src="images/roughnight.jpg" alt="">
<img class="img" src="images/blackpanther.jpg" alt="">
<img class="img" src="images/blackpanther.jpg" alt="">
<img class="img" src="images/blackpanther.jpg" alt="">
<img class="img" src="images/blackpanther.jpg" alt="">
</div>
  </div> -->


  <div class="container">

      <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">

              <?php
              echo"  <div class=\"item active\">
                  <div class=\"row moviescontainer\">";

              while($row = mysqli_fetch_array($getMovies)){
if($count<5 )
{
                echo "  <a href=\"details.php?id={$row['movies_id']}\"><img src=\"images/{$row['movies_img']}\" alt=\"{$row['movies_name']}\"></a>";
                $count++;
              }

              // elseif($count>4 && $count<10)
              // {
              //   echo "  <a href=\"details.php?id={$row['movies_id']}\"><img src=\"images/{$row['movies_img']}\" alt=\"{$row['movies_name']}\"></a>";
              //   $count++;
              // }
              // $count = 5;
            }

            echo"</div></div>";
               ?>



          <!-- <div class="item">
            <div class="row moviescontainer">
              <img class="img" src="images/blackpanther.jpg" alt="">
              <img class="img" src="images/blackpanther.jpg" alt="">
              <img class="img" src="images/blackpanther.jpg" alt="">
              <img class="img" src="images/blackpanther.jpg" alt="">
              <img class="img" src="images/blackpanther.jpg" alt="">
            </div>
          </div> -->
          </div>
          <a class="leftside carousel-control" href="#myCarousel" data-slide="prev">‹</a>
          <a class="rightside carousel-control" href="#myCarousel" data-slide="next">›</a>
      </div>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>

  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
