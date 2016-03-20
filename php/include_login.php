<?php
header('Content-Type: text/html; charset=utf-8');
 session_start();
    /*define('payments', true);*/
    include("bd_conect.php");
      
 If ($_POST["enter_submit"])
 {
    $login = ($_POST["input_login"]);
    $password  = ($_POST["input_password"]);
    
  
 if ($login && $password)
  {
    /*$password = md5($password);
    $password = strrev($password);
    $password = strtolower("mb03foo51".$password."qj2jjdp9");  */   

   $result = mysql_query("SELECT * FROM reg_user WHERE login = '$login' AND password = '$password';");
   
 If (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);

    $_SESSION['auth_admin'] = 'yes_auth';
    header('Location: ../index.php');
  }else
  {
        $msgerror = "Неверный Логин и(или) Пароль."; 
  }

        
    }else
    {
        $msgerror = "Заполните все поля!";
    }
 
 }


?>