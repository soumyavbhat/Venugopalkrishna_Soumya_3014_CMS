<?php

function createUser($fname,$username, $email, $lvllist)
{
  include('connect.php');

  $password_string = '_%#&*-abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ1234567890';
$password = substr(str_shuffle($password_string), 0, 8);
// echo $password;

$enc_method = 'AES-128-CTR';
$enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
$enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($enc_method));
$crypted_password = openssl_encrypt($password, $enc_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
// $crypted_password = password_hash($password, PASSWORD_DEFAULT);
date_default_timezone_set('America/Toronto');
$created = date('Y-m-d H:i:s');

  $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$email}','{$crypted_password}', NULL, '{$lvllist}', 'no','0', NULL,'{$created}')";
$userquery = mysqli_query($link, $userstring );
// echo $userstring;

if($userquery){
  // return $password;
  $direct = "success.php";
  $sendMail = submitMessage($direct, $username, $email, $password);
}
else {
  $message = "Error";
  return $message;
}
  mysqli_close($link);
}

function editUser($fname, $username, $email, $password, $id)
{
  include('connect.php');



  $enc_method = 'AES-128-CTR';
  $enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($enc_method));
  $crypted_password = openssl_encrypt($password, $enc_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);

  $update = "update tbl_user set user_fname='{$fname}', user_name='{$username}', user_pass='{$crypted_password}' where user_id ='{$id}'";
$updatequery = mysqli_query($link, $update);
$edittime = "update tbl_user set user_edit = CURRENT_TIMESTAMP where user_id = {$id}";
$edittimequery = mysqli_query($link, $edittime);
if($updatequery)
{
  redirect_to('admin_editsuccess.php');
}
else {
  $message = "error";
  return $message;
}

mysqli_close($link);

}


function deleteUser($id)
{
  include('connect.php');

$delete = "DELETE from tbl_user where user_id= {$id}";
$deletequery = mysqli_query($link, $delete);
// echo $delete;
if($deletequery)
{
  redirect_to('../admin_index.php');

}
else{
  $message = "error";
  return $message;
}
  mysqli_close($link);
}


 ?>
