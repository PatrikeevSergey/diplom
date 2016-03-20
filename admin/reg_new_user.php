<?php
 session_start();
 if($_SESSION['auth_admin']=="yes_auth")
 {
	/*define('payments', true);*/
   
    if(isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php'>Главная</a>\ <a href='reg_new_user.php'>Регистрация нового пользователя</a> ";
    
    include("include/bd_conect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery_form.js"></script>
	<script type="text/javascript" src="js/jquery_validate.js"></script> 
	<script type="text/javascript" src="js/reg_user.js"></script>
	

	<title>Панель управления - регистрация нового пользователя</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block_header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title_page">Регистрация нового пользователя</p>
</div>
<form action="reg/handler_reg.php" method="post" id='form_reg'>
	<div id="block-form-registration">
<ul id="form-registration">
<li>
<label>Логин</label>
<span class="spar">*</span>
<input type="text" name="reg_login" id="reg_login"/>
</li>

<li>
<label>Пароль</label>
<span class="spar">*</span>
<input type="text" name="reg_pas" id="reg_pas"/>
<span id="genpass"> Сгенерировать</span>
<script type="text/javascript">
$('#genpass').click(function(){
 $.ajax({
  type: "POST",
  url: "functions/genpass.php",
  dataType: "html",
  cache: false,
  success: function(data) {
  $('#reg_pas').val(data);
  }
});
 
});
</script>
</li>

<li>
<label>Фамилия</label>
<span class="spar">*</span>
<input type="text" name="reg_surname" id="reg_surname"/>
</li>

<li>
<label>Имя</label>
<span class="spar">*</span>
<input type="text" name="reg_name" id="reg_name"/>
</li>

<li>
<label>Отчество</label>
<span class="spar">*</span>
<input type="text" name="reg_patronymic" id="reg_patronymic"/>
</li>

<li>
<label>E-mail</label>
<span class="spar">*</span>
<input type="text" name="reg_email" id="reg_email"/>
</li>

<li>
<label>Телефон</label>
<span class="spar">*</span>
<input type="text" name="reg_phone" id="reg_phone"/>
</li>

<li>
<div id="block-captcha">

<img src="reg/reg_captcha.php"/>
<input type="text" name="reg_captcha" id="reg_captcha"/>
<p id="reloadcaptcha">Обновить</p>
<script type="text/javascript"> 
$('#reloadcaptcha').click(function(){
$('#block-captcha > img').attr("src","reg/reg_captcha.php?r="+ Math.random());
});
</script>
</div>
</li>
</ul>
</div>
         
 <input id="add_user"  type="submit" name="add_user"  value="Зарегистрировать"/> 

</form>


</div>
</div>
</body>
</html>

<?php

}
else{
     header("Location: login.php");
}
?>

