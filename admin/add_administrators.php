<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
        
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='add_administrators.php' >Добавление администратора</a>";
  
include("include/bd_conect.php");
include("functions/functions.php");             

if ($_POST["submit_add"])
{
    if (!($_SESSION['auth_admin_login'] == 'admin'))
    {

    $error = array();
    
    if ($_POST["admin_login"])
    {
        $login = clear_string($_POST["admin_login"]);
        $query = mysql_query("SELECT login FROM admin_reg WHERE login='$login'");
 
     If (mysql_num_rows($query) > 0)
     {
        $error[] = "Логин занят!";
     }
        
        
    }else
    {
        $error[] = "Укажите логин!";
    }
    
     
    if (!$_POST["admin_pass"]) $error[] = "Укажите пароль!";
    if (!$_POST["admin_fio"]) $error[] = "Укажите ФИО!";
    if (!$_POST["admin_role"]) $error[] = "Укажите должность!";
    if (!$_POST["admin_email"]) $error[] = "Укажите E-mail!";

 if (count($error))
 {
    $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
 }else
 {
    $pass   = md5(clear_string($_POST["admin_pass"]));
    $pass   = strrev($pass);
    $pass   = strtolower("dfghbh54".$pass."q645yhtrhdfhgdf");
    
                  		mysql_query("INSERT INTO admin_reg(login,password,fio,role,email,phone,view_orders,accept_orders,delete_orders,view_clients,delete_clients,view_admin)
						VALUES(						
                            '".clear_string($_POST["admin_login"])."',
                            '".$pass."',
                            '".clear_string($_POST["admin_fio"])."',
                            '".clear_string($_POST["admin_role"])."',
                            '".clear_string($_POST["admin_email"])."',
                            '".clear_string($_POST["admin_phone"])."',
                            '".$_POST["view_orders"]."',
                            '".$_POST["accept_orders"]."',
                            '".$_POST["delete_orders"]."',							                         
							'".$_POST["view_clients"]."',
                            '".$_POST["delete_clients"]."'
                            '".$_POST["view_admin"]."'  
                            )");
                   
          $_SESSION['message'] = "<p id='form-success'>Пользователь успешно добавлен!</p>";
 }   
        
    }else
    {
       $msgerror = 'У вас нет прав на добавление администраторов!'; 
    }    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>     
	<title>Панель Управления - Администраторы</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block_header.php"); 
?>

<div id="block-content">
<div id="block-parameters">
<p id="title_page">Добавление администратора</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

	if(isset($_SESSION['message']))
  {
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
?>
<form method="post" id="form-info" >

<ul id="info-admin">
<li><label>Логин</label><input type="text" name="admin_login" /></li>
<li><label>Пароль</label><input type="password" name="admin_pass" /></li>
<li><label>ФИО</label><input type="text" name="admin_fio" /></li>
<li><label>Должность</label><input type="text" name="admin_role" /></li>
<li><label>E-mail</label><input type="text" name="admin_email" /></li>
<li><label>Телефон</label><input type="text" name="admin_phone" /></li>
</ul>

<h3 id="title-privilege" >Привилегии</h3>

<p id="link-privilege"><a id="select-all" >Выбрать все</a> | <a id="remove-all" >Снять все</a></p>

<div class="block-privilege">

<ul class="privilege">
<li><h3>Начисления</h3></li>

<li>
<input type="checkbox" name="view_orders" id="view_orders" value="1" />
<label for="view_orders">Просмотр начислений.</label>
</li>

<li>
<input type="checkbox" name="accept_orders" id="accept_orders" value="1" />
<label for="accept_orders">Обработка начислений.</label>
</li>

<li>
<input type="checkbox" name="delete_orders" id="delete_orders" value="1" />
<label for="delete_orders">Удаление начислений.</label>
</li>

</ul>


<!--ul class="privilege">
<li><h3>Вопросы</h3></li>

<li>
<input type="checkbox" name="accept_reviews" id="accept_reviews" value="1" />
<label for="accept_reviews">Модерация вопросов.</label>
</li>

<li>
<input type="checkbox" name="delete_reviews" id="delete_reviews" value="1" />
<label for="delete_reviews">Удаление вопросов.</label>
</li>

</ul-->

</div>
<div class="block-privilege">

<ul class="privilege">
<li><h3>Пользователи</h3></li>

<li>
<input type="checkbox" name="view_clients" id="view_clients" value="1" />
<label for="view_clients">Просмотр пользователей.</label>
</li>

<li>
<input type="checkbox" name="delete_clients" id="delete_clients" value="1" />
<label for="delete_clients">Удаление пользователей.</label>
</li>

</ul>

<!--ul class="privilege">
<li><h3>Новости</h3></li>

<li>
<input type="checkbox" name="add_news" id="add_news" value="1" />
<label for="add_news">Добавление новостей.</label>
</li>


<li>
<input type="checkbox" name="delete_news" id="delete_news" value="1" />
<label for="delete_news">Удаление новостей.</label>
</li>

</ul>

<ul class="privilege">
<li><h3>Категории</h3></li>

<li>
<input type="checkbox" name="add_category" id="add_category" value="1" />
<label for="add_category">Добавление категорий.</label>
</li>

<li>
<input type="checkbox" name="delete_category" id="delete_category" value="1" />
<label for="delete_category">Удаление категорий.</label>
</li>

</ul-->

</div>

<div class="block-privilege">

<ul class="privilege">
<li><h3>Администраторы</h3></li>

<li>
<input type="checkbox" name="view_admin" id="view_admin" value="1" />
<label for="view_admin">Просмотр администраторов.</label>
</li>

</ul>

</div>

<p><input type="submit" id="submit_form" name="submit_add" value="Добавить"/></p>
</form>
</div>
</div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>