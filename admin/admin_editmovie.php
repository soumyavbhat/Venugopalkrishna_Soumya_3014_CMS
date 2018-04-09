<?php require_once('phpscripts/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="../css/style.css">

  <link href="https://fonts.googleapis.com/css?family=Merriweather:300" rel="stylesheet">
  <title>Edit Movie</title>
</head>
<body>
  <?php if(!empty($message)){
    echo $message;
  } ?>

  <div class="container3 bg3 scroll">
    <?php
    if(isset($_GET['id']))
    {
    $tbl = "tbl_movies";
    $col = "movies_id";
    $id = $_GET['id'];
    echo single_edit($tbl, $col, $id);
    }
?>
  </div>
</body>
</html>
