<?php

include('admin/phpscripts/config.php');

if(isset($_GET['filter']))
{
  $tbl1 = "tbl_movies";
  $tbl2 = "tbl_genre";
  $tbl3 = "tbl_mov_genre";
  $col1 = "movies_id";
  $col2 = "genre_id";
  $col3 = "genre_name";
  $filter = $_GET['filter'];
  $getMovies = filterResults($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter);
}
else
{
  $tbl = "tbl_movies";
  $getMovies = getAll($tbl);
}


  if(isset($_GET['id']))
  {
    $tbl = "tbl_movies";
    $col = "movies_id";
    $id = $_GET['id'];
    $getMovie = getSingle($tbl, $col, $id);
}

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
    <?php
    include('includes/nav.html') ?>
  </div>


  <div class="container">
    <div class="leftright">
      <div class="left">&#10094;</div>
  <div class="right">&#10095;</div>

    </div>

    <div class="moviescontainer">


<?php
if(!is_string($getMovies))
{
while($row = mysqli_fetch_array($getMovies))
{
  echo "  <a href=\"index.php?id={$row['movies_id']}\"><img src=\"images/{$row['movies_img']}\" alt=\"{$row['movies_name']}\"></a>";
}
}
else {
  echo "<p class=\"error\">{$getMovies}</p>";
}

 ?>

</div>


</div>
<div class="contentSection">
  <?php

  if(!is_string($getMovie))
  {
    while($singleRow = mysqli_fetch_array($getMovie))
    {

    echo "<h1>{$singleRow['movies_name']}</h1>";
      // echo "<h3> {$singleRow['genre.genre_name']}";
    echo "<h3>Year : {$singleRow['movies_year']} |  Rating : {$singleRow['movies_rating']}/10  |   Stars : {$singleRow['movies_stars']}</h3><br>";
    echo "<p>Synopsis: {$singleRow['movies_desc']}</p>";
  }
  }
   ?>
</div>
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script> -->
<!-- <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script> -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->

  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
