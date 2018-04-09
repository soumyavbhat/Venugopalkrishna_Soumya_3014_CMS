<?php

include('phpscripts/config.php');

if(isset($_GET['filter']))
{
  $tbl1 = "tbl_movies";
  $tbl2 = "tbl_genre";
  $tbl3 = "tbl_movies_genre";
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
    // $getGenre = genre($id);
}
else{

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
    <link rel="stylesheet" href="../css/style.css">

  <title>Movie Reviews</title>
</head>

<body>
  <div class="sidebar">
    <ul class="allbutton filterNav">
      <li class="sidebutton"><a href="admin_movie.php">All</a></li>
      <!-- <div class="sidebutton">New Release</div> -->
      <li class="sidebutton"><a href="admin_movie.php?filter=action">Action</a></li>
      <li class="sidebutton"><a href="admin_movie.php?filter=comedy">Comedy</a></li>
      <li class="sidebutton"><a href="admin_movie.php?filter=animation">Animation</a></li>
      <li class="sidebutton"><a href="admin_movie.php?filter=horror">Horror</a></li>
      <li class="sidebutton"><a href="admin_movie.php?filter=crime">Crime</a></li>
    </ul>

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
  echo "  <a href=\"admin_movie.php?id={$row['movies_id']}\"><img src=\"../images/{$row['movies_img']}\" alt=\"{$row['movies_name']}\"></a>";
}
}
else {
  echo "<p class=\"error\">{$getMovies}</p>";
}

 ?>

</div>
</div>


<div class="contentSection">
  <!-- <h1 class="heading"></h1><br>
  <h3 class="gen"></h3><br>
  <h3 class="year"></h3><h3 class="rate"></h3><br>
  <h3 class="dir"></h3><h3 class="stars"></h3><br>
  <p class="synopsis"></p> -->

  <?php

  if(!is_string($getMovie))
  {
    while($singleRow = mysqli_fetch_array($getMovie))
    {

    echo "<h1>{$singleRow['movies_name']}</h1>";
      echo "<h3> {$singleRow['genre_name']} </h3>";
    echo "<h3>Year : {$singleRow['movies_year']} |  Rating : {$singleRow['movies_rating']}/10</h3>";
      echo "<h3>Director : {$singleRow['movies_director']}  |  Stars : {$singleRow['movies_stars']}</h3><br>";
    echo "<p>Synopsis: {$singleRow['movies_desc']}</p>";
    echo "
    <div class=\"moviebuttons\">
<div class=\"button\">
      <a href=\"admin_addmovie.php\">  Add Movies
    </a>
    </div>
    <div class=\"button\">
        <a href=\"admin_editmovie.php?id={$singleRow['movies_id']}\">  Edit this movie
      </a>
    </div>
    <div class=\"button\">
      <a href=\"admin_deletemovie.php?id={$singleRow['movies_id']}\">  Delete this movie</a>
</div>
    </div>";
  }
  }
   ?>

   </div>

  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>

  <script src="../js/main.js"></script>
  <!-- <script src="js/ajax.js"></script> -->

</body>

</html>
