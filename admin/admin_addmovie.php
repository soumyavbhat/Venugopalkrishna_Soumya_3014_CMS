<?php require_once('phpscripts/config.php');

// include('confirm_logged_in');

$tbl = "tbl_genre";
$genQuery = getAll($tbl);


if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $image = $_FILES['image'];
  $synopsis = $_POST['synopsis'];
  $stars = $_POST['stars'];
  $rating = $_POST['rating'];

  $year = $_POST['year'];
  $director = $_POST['director'];
  $genre = $_POST['gen'];

$result = addMovie($name, $image, $synopsis, $stars, $rating, $year, $director, $genre);

$message = $result;
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
  <title>Add New Movie</title>
</head>
<body>
  <?php if(!empty($message)){
    echo $message;
  } ?>

  <div class="container3 bg3">
  <form action="admin_addmovie.php" method="post" enctype="multipart/form-data">

    <label class="l" for="">Movie Name</label>
    <input class = "i" type="text" value="" name="name">
  <br>

  <label class="l" for="">Image</label>
  <input class = "i" type="file" value="" name="image">
  <br>

  <label class="l" for="">Movie Synopsis</label>
  <input class = "i" type="textarea" value="" name="synopsis">
  <br>

  <label class="l" for="">Movie Stars</label>
  <input class = "i" type="text" name="stars" value="">
  <br>

  <label class="l" for="">Rating</label>
  <input class = "i" type="text" name="rating" value="">
  <br>

  <label class="l" for="">Year</label>
  <input class = "i" type="text" name="year" value="">
  <br>

  <label class="l" class="l" for="">Movie Director</label>
  <input class = "i" type="text" name="director" value="">
  <br>

  <label class="l" for="">Genre</label>

  <select class="i" name="gen" >
  <option value="">Select genre</option>
  <?php
  while($row = mysqli_fetch_array($genQuery))
  { echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
  }
   ?>
  </select>
<br><br>
  <input class="newMovie" type="submit" name="submit" value="Submit">
</div>
</form>
</body>
</html>
