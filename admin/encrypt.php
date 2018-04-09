<?php

// File to encrypt and decrypt a password

// $password = "abcdefg";
//   $enc_method = 'AES-128-CTR';
//   $enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
//   $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($enc_method));
//   $crypted_password = openssl_encrypt($password, $enc_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
// // unset($password, $enc_method, $enc_key, $enc_iv);
// echo $crypted_password;


$crypted_password = "yRznp8XDp8E=::9193e7fa2d66d10251308aee06d43831";

if(preg_match("/^(.*)::(.*)$/", $crypted_password, $regs)) {
   // decrypt encrypted string
   list(, $crypted_password, $enc_iv) = $regs;
   $enc_method = 'AES-128-CTR';
   $enc_key = openssl_digest(gethostname() . "|" . $_SERVER['SERVER_ADDR'], 'SHA256', true);
   $decrypted_password = openssl_decrypt($crypted_password, $enc_method, $enc_key, 0, hex2bin($enc_iv));
   unset($crypted_password, $enc_method, $enc_key, $enc_iv, $regs);

   echo $decrypted_password;

 }


   ?>
