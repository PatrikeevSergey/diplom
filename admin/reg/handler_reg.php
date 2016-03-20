<?php
include ("../include/bd_conect.php");

 $error = array();
        if(!(isset($_POST['reg_login']) && $_POST['reg_login']!='')) 
 		$error[] = "Введите логин!";
        if(!(isset($_POST['reg_pas']) && $_POST['reg_pas']!='')) 
 		$error[] = "Введите пароль!";
        if(!(isset($_POST['reg_surname']) && $_POST['reg_surname']!='')) 
 		$error[] = "Введите фамилию!";
        if(!(isset($_POST['reg_name']) && $_POST['reg_name']!='')) 
 		$error[] = "Введите имя!";
        if(!(isset($_POST['reg_patronymic']) && $_POST['reg_patronymic']!='')) 
 		$error[] = "Введите отчество!";
        if(!(isset($_POST['reg_email']) && $_POST['reg_email']!='')) 
 		$error[] = "Введите адрес электронной почты!";
        if(!(isset($_POST['reg_phone']) && $_POST['reg_phone']!='')) 
 		$error[] = "Введите номер телефона!";
 		
 	if(strlen($_POST['reg_login'])<5 or strlen($_POST['reg_login'])>15)
 	{
		$error[] = "Логин должен быть от 5 до 15 символов";
	
      if(!preg_match('|^[A-Z0-9]+$|i', $_POST['reg_login']))
		{
    	$error[] = "Логин должен состоять из букв латинского алфавита и цифр!";
		}
	}
	else
		{
		/*$result = mysql_query("SELECT login FROM reg_user WHERE login = $_POST['reg_login']; ");
			if (mysql_num_rows($_POST['reg_login'])>0)
			{
			$error[]="Логин занят!";
			}*/
		}
	if (strlen($_POST['reg_pas']) < 7 or strlen($_POST['reg_pas'])>15 )
	{
	$error[] = "Укажите пароль от 7 до 15 символов!";	
	}
	if (strlen($_POST['reg_surname'])< 3 or strlen($_POST['reg_surname'] > 20))
	{
		$error[]="Укажите фамилию от 3 до 20 символов!";
	}
	if (strlen($_POST['reg_name'])<3 or strlen($_POST['reg_name'])>15)
	{
		$error[]="Укажите имя от 3 до 15 символов!";
	}
	if (strlen($_POST['reg_patronymic'])<3 or strlen($_POST['reg_patronymic'])>25)
	{
		$error[]="Укажите отчество от 3 до 25 символов!";
	}
	if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST['reg_email'])))
	{
		$error[] = "Вы ввели некорректный email!";
	}
	if($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha'])) 
	{
		$error[] = "Неверный код с картинки!";
	}
    unset($_SESSION['img_captcha']);
	
	if (count($error))
	{
		echo implode('<br />', $error);
	}
	 else
	 {
	 	$_POST['reg_pas'] = md5($_POST['reg_pas']);
	 	$_POST['reg_pas'] = strrev($_POST['reg_pas']);
	 	$_POST['reg_pas'] = "57fhbxkj". $_POST['reg_pas'] . "3hfdb";
	 	 
	 	 $ip = $_SERVER['REMOTE_ADDR'];
	 	 
	 	 mysql_query("INSERT INTO reg_user (login,password,surname,name,patronymic,email,phone,datetime,ip)
	 	 VALUES(
	 	         '".$_POST['reg_login']."',
	 	         '".$_POST['reg_pas']."',
	 	         '".$_POST['reg_surname']."',
	 	         '".$_POST['reg_name']."',
	 	         '".$_POST['reg_patronymic']."',
	 	         '".$_POST['reg_email']."',
	 	         '".$_POST['reg_phone']."',
	 	         NOM(),
	 	         '".$ip."'
	 	         ) ;")
	 echo 'true';
	 }
 		
?>