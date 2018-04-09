<?php
function logIn($username, $password, $ip)
{


  require_once('connect.php');
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $loginstring = "Select * from tbl_user where user_name = '{$username}'";
  // and user_pass = '{$password}
  $loginstringuser = "Select * from tbl_user where user_name = '{$username}'";

  $user_set = mysqli_query($link, $loginstring);
  $user_only = mysqli_query($link, $loginstringuser);
  // echo mysqli_num_rows($user_set);
if(mysqli_num_rows($user_set))
{
$row = mysqli_fetch_array($user_set);
// echo $row;
$crypted_password = $row['user_pass'];
// echo $crypted_password;


if(preg_match("/^(.*)::(.*)$/", $crypted_password, $regs))
{
   list(, $crypted_password, $enc_iv) = $regs;
   $enc_method = 'AES-128-CTR';
   $enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
   $decrypted_password = openssl_decrypt($crypted_password, $enc_method, $enc_key, 0, hex2bin($enc_iv));
   unset($crypted_password, $enc_method, $enc_key, $enc_iv, $regs);

   // echo $decrypted_password;



if($decrypted_password == $password)
{
  // redirect_to("admin_index.php");
  // echo $decrypted_password;

  $loginstring = "Select * from tbl_user where user_name = '{$username}'";
  $user_set = mysqli_query($link, $loginstring);

  $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
  $id = $founduser['user_id'];
  $_SESSION['user_id'] = $id;
  $_SESSION['user_name'] = $founduser['user_name'];
  $_SESSION['user_fname'] = $founduser['user_fname'];

  $_SESSION['user_date'] = $founduser['user_date'];
  $_SESSION['user_attempts'] = $founduser['user_attempts'];
  $_SESSION['user_edit'] = $founduser['user_edit'];
  $_SESSION['user_created'] = $founduser['user_created'];

  $count = $founduser['user_attempts'];
$firstlog = $founduser['user_edit'];

date_default_timezone_set('America/Toronto');

$createduser = $founduser['user_created'];
$endTime = date('Y-m-d H:i:s',strtotime('+0 hour +5 minutes', strtotime($createduser)));

// $l = date('Y-m-d H:i:s', $endTime);

$t = date('Y-m-d H:i:s');

if($firstlog == NULL)
{
  if(strtotime($t) < strtotime($endTime) )
  {
    // return "within";
  redirect_to('admin_edituser');
}
else{
  // return $_SESSION['user_created'];
  redirect_to('admin_suspended');
}
}
else{

  if($count < 4)
  {

  $update = "update tbl_user set user_ip='{$ip}' where user_id = {$id}  ";
  $log = "select user_date from tbl_user where user_id = {$id}";
  $lastlog = mysqli_query($link, $log);
$time = "update tbl_user set user_date = CURRENT_TIMESTAMP where user_id = {$id}";
  // $time = "update tbl_user set user_date='" . date('Y-m-d H:m:s') . "' where user_id = {$id}";
  $updatequery = mysqli_query($link, $update);
  $timeupdate = mysqli_query($link, $time);
  $at =  "update tbl_user set user_attempts='0' where user_name = '{$username}'  ";
  $atupdate = mysqli_query($link, $at);
  redirect_to("admin_index.php");

}

else{
  redirect_to("admin_index2.php");
}
}

}
elseif(mysqli_num_rows($user_only)){

  $founduser = mysqli_fetch_array($user_only, MYSQLI_ASSOC);
  $_SESSION['user_name'] = $founduser['user_fname'];
  $_SESSION['user_attempts'] = $founduser['user_attempts'];

$_SESSION['user_attempts'] += 1;
  $attempts =  $_SESSION['user_attempts'];
  $fail = "update tbl_user set user_attempts='{$attempts}' where user_name = '{$username}'  ";
  $failupdate = mysqli_query($link, $fail);
  $message ="Wrong info";
  return $message;
}

}

}


else{
  $message ="Wrong ";
  return $message;
}
  mysqli_close($link);
}
 ?>
