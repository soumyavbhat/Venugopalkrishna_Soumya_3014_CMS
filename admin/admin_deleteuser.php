<?php
require_once('phpscripts/config.php');
confirm_logged_in();

$tbl = "tbl_user";
$users = getAll($tbl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300" rel="stylesheet">
  <title>Delete user</title>
</head>
<body>

  <div class="container bg2">
  <h2>Delete</h2>
<table>
  <tr>
  <th>User</th>
  <th>Action</th>
</tr>


  <?php while($row = mysqli_fetch_array($users))
  {
    echo "<tr><td>{$row['user_fname']}</td><td><a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\"> Delete</a></td></tr><br>";
  }
   ?>

</tr>
</table>

</body>
</html>
