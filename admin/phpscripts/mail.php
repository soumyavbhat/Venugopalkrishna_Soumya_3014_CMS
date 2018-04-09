<?php

// soumyav-com.mail.protection.outlook.com
  // echo "From mail file";

  function submitMessage($direct, $username, $email, $password){
    $to = $email; //Who this is going to? Me!
    $subject = "User login - Do not reply";
    $msg = "Username: ".$username."\n\nEmail: ".$email."\n\nMessage: ".$password; //\n works in html web and application based files. just another <br> tag
    mail($to,$subject,$msg); //expects things in a particular order - Where is it going to, the subject, the message and extra isn't a requirement
    $direct = $direct."?name={$username}";
    redirect_to($direct);
  }

 ?>
