<?php
session_start();
    /*define('payments', true);*/
    include("php/bd_conect.php");
      
 If ($_POST["enter_submit"])
 {
    $login = ($_POST["input_login"]);
    $password  = ($_POST["input_pass"]);
    
  
 if ($login && $password)
  {
    /*$password = md5($password);
    $password = strrev($password);
    $password = strtolower("mb03foo51".$password."qj2jjdp9");  */   

   $result = mysql_query("SELECT * FROM reg_user WHERE login = '$login' AND password = '$password';");
   
  
 If (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);

    $_SESSION['auth_user'] = 'yes_auth';
    header('Location: index.php');
     $_SESSION['user_rol'] = $row["surname"].$row["name"].$row["patronymic"]; 
  }
  else
  {
        $msgerror = "Неверный Логин и(или) Пароль."; 
  }

        
    }else
    {
        $msgerror = "Заполните все поля!";
    }
 
 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Начисления - вход</title>
	<link href="css/style-login.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	if($msgerror)
    {
        echo'<p id="msgerror">'.$msgerror.'</p>';
    }
?>
<form class="contact_form"  method="post" name="contact_form">
    <ul>
        <li>
             <h2>Авторизация для входа в систему</h2>
             <span class="required_notification">* Обязательные поля для ввода</span>
        </li>
        <li>
            <label for="name">Логин:</label>
            <input type="text" name="input_login" placeholder="123-456-789 01" required />
            <span class="form_hint">Правильный формат логина - "123-456-789 01" (без кавычек)"</span>
        </li>
        <li>
            <label for="password">Пароль:</label>
            <input type="password" name="input_pass"  required />
        </li>
        
        <li>
        <input type="submit" name="enter_submit" id="enter_submit" value="Вход"/>
        
        </li>
    </ul>
</form>
</body>
</html>