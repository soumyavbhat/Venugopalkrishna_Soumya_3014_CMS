<?php
require_once('phpscripts/config.php');
confirm_logged_in();
// pull single data
$id = $_SESSION['user_id'];
$tbl = "tbl_user";
$col = "user_id";
$popForm = getSingle($tbl, $col, $id);
$info = mysqli_fetch_array($popForm);
// echo $info;


if(isset($_POST['submit']))
{
  $fname = trim($_POST['fname']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email = trim($_POST['email']);
  // $lvllist = $_POST['lvllist'];

    $result = editUser($fname,$username,$email,$password,  $id);
    // $lvllist);
    $message = $result;


}

$pw = $info['user_pass'];
if(preg_match("/^(.*)::(.*)$/", $pw, $regs)) {
   list(, $pw, $enc_iv) = $regs;
   $enc_method = 'AES-128-CTR';
   $enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
   $password = openssl_decrypt($pw, $enc_method, $enc_key, 0, hex2bin($enc_iv));
   unset($pw, $enc_method, $enc_key, $enc_iv, $regs);
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

<form class="" action="admin_edituser.php" method="post">
  <input type="text" name="fname" placeholder="First Name" value=" <?php echo $info['user_fname']; ?>">
  <input type="text" name="username" placeholder="Username" value=" <?php echo $info['user_name']; ?>">
  <input type="email" name="email" placeholder="Email" value=" <?php echo $info['user_email']; ?>">

  <input type="text" name="password" placeholder="Password" value=" <?php echo $password ?>"><br>

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
