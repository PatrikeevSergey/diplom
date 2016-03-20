<?php
 session_start();
 if($_SESSION['auth_admin']=="yes_auth")
 {
	define('payments', true);
   
    if(isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php'>Главная</a>\ <a href='payment.php'>Платежи</a> ";
    
    include("include/bd_conect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    
	<title>Панель управления</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block_header.php");
    $all_count=mysql_query("SELECT * FROM data;");
    $all_count_result=mysql_num_rows($all_count);
?>
<div id="block-content">
<div id="block-parameters">

</div>
<div id="block-info">
<p id="cunt-style">Всего платежей - <strong><?php echo $all_count_result; ?></strong></p>
<p align="right" id="add_payment"><a href="add_payment.php">Добавить платеж</a> </p>
<p align="right" id="edit_payment"><a href="add_payment.php">Изменить платеж</a> </p>
<p align="right" id="del_payment"><a href="add_payment.php">удалить платеж</a> </p>
</div>


<table border="1" id="table_style">
    <tr>
    <th>Дата создания начисления </th>
   <th>Номер заявки ПГУ </th>
    <th>Подразделение УФК </th>
    <th>Назначение платежа </th>
    <th>Код бюджетной классификации </th>
   <th>Сумма</th>
    <th>Статус плательщика</th>
    <th>Тип платежа</th>
    <th>Тип плательщика</th>
    <th>Вид документа, удостоверяющего личность </th>	   
    <th>Серия</th>
   <th>Номер</th>
    <th>Примечание</th>
    </tr>
<?
include("include/query_bd.php");
?>

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

