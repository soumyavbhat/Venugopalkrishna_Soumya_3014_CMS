<?php
require_once('phpscripts/config.php');
confirm_logged_in();

if(isset($_POST['submit']))
{
  $fname = trim($_POST['fname']);
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  // $password = trim($_POST['password']);
  $lvllist = $_POST['lvllist'];

  if(empty($lvllist))
  {
    $message = "PLease select your level";

  }
  else {
    $result = createUser($fname,$username, $email, $lvllist);
    $message = $result;
  }
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
  <title>Create User</title>
</head>
<body>

  <div class="container userbg">
    <div class="reg">
      <?php if(!empty($message)) {echo $message;}?>

<form class="" action="admin_createuser.php" method="post">
  <input type="text" name="fname" placeholder="First Name">
  <input type="text" name="username" placeholder="Username">
  <input type="email" name="email" placeholder="Email">
  <!-- <input type="password" name="password" placeholder="Password"><br> -->
  <select  name="lvllist">
    <option value="">Select User type</option>
    <option value="2">A</option>
    <option value="1">B</option>

  </select>
  <div class=" regbutton">
    <input type="submit" name="submit" placeholder="Register">
  </a>
</div>

</form>




</div>
<br>
  </div>
</body>
</html>
