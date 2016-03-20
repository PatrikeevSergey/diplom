<?php
    session_start();
    /*define('payments', true);*/
    include("include/bd_conect.php");
      
 If ($_POST["enter_submit"])
 {
    $login = ($_POST["input_login"]);
    $password  = ($_POST["input_password"]);
    
  
 if ($login && $password)
  {
    /*$password = md5($password);
    $password = strrev($password);
    $password = strtolower("mb03foo51".$password."qj2jjdp9");  */   

   $result = mysql_query("SELECT * FROM admin_reg WHERE login = '$login' AND password = '$password';");
   
 If (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);

    $_SESSION['auth_admin'] = 'yes_auth';
    header('Location: index.php');
     $_SESSION['admin_rol'] = $row["role"]; 
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 5.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html"; charset="iso-8859-1" />
	<title>Панель управления - вход</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="block-pass-login">
<?php
if($msgerror)
    {
        echo'<p id="msgerror">' .$msgerror. '</p>';
    }
?>
<form method="post">
<ul id="login-pass">
<li> <label>Логин</label> <input type="text" name="input_login"/></li>
<li> <label>Пароль</label> <input type="password" name="input_password"/></li>
</ul>
<p align="right"><input type="submit" name="enter_submit" id="enter_submit" value="Вход"/></p>
</form>
</div>


</body>
</html>