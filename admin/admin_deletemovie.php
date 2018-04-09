<?php require_once('phpscripts/config.php');
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
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300" rel="stylesheet">
  <title>Delete Movie</title>
</head>
<body>
  <?php if(!empty($message)){
    echo $message;
  } ?>

  <?php while($row = mysqli_fetch_array($getMovie))
  {
    echo "<h2><a href=\"phpscripts/delete.php?delete_id=delete&id={$row['movies_id']}\"> Click here</a> to confirm and delete</h2>";
  }
   ?>

  </div>
</body>
</html>
