
<?php
include('connect.php');


if (mysqli_connect_errno()){
  printf("Connect fail: %s\n", mysqli_connect_error()); //forces error to be a string
  exit();
}
//echo "working";

if (isset($_GET['id'])) {

  $id=$_GET['id'];

	$myQuery = "SELECT movies_name, movies_desc, movies_year, movies_director, movies_rating, movies_stars, group_concat(' ',g.genre_name) as genre_name FROM tbl_movies m, tbl_genre g, tbl_movies_genre mg WHERE m.movies_id = {$id} and mg.movies_id = {$id} and g.genre_id = mg.genre_id";
//echo $myQuery;
  $result = mysqli_query($link, $myQuery);
echo $result;
  //$row = mysqli_fetch_assoc($result);
}
$grpResult="";
echo"[";
$proResult = array();
while ($proResult = mysqli_fetch_assoc($result)){
  // echo $result['gallery_name'];
  $jsonResult = json_encode($proResult);
  //echo$jsonResult;
  $grpResult .= $jsonResult.",";
  //JSONLINT copy and paste your json code from the browser to see if its valid
}
echo substr ($grpResult,0, -1);

echo "]";
mysqli_close($link);
?>
