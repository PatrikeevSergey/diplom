<?php
 session_start();
 if($_SESSION['auth_user'] == 'yes_auth')
 {
	if (isset($_GET["logout"]))
    {
        unset($_SESSION['']);
        header("Location: login.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 5.0 Transitional//EN">
<html>
<head>
<meta http-equiv ="Content-Type" content=text/html; charset=utf-8" />
<link  rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/modal-contact-form.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/jquery_form.js"></script>
<script type="text/javascript" src="js/jquery_validate.js"></script> 
<script type="text/javascript" src="js/verification.js"></script> 
<title>Платежи Автономное рабочее место</title>
</head>
<body>
	<div id="header">
    <div id="block-header1">
<p class="plat">Платежи </p> <br/>
<br/><p class="avtonom">Автономное рабочее место</p>
</div>
<div id="block-header">
<p align="right"><a href="#">Начисления</a> | <a href="?logout">Выход</a></p>
<p align="right">Вы - <span><?php echo $_SESSION['user_rol'];?></span></p>
</div>
</div>
<div id="menu"></div>
<div class="modal-shadow"></div>
		<div class="modal-window">
  		<div class="close">X</div>
  <h2 class="h2-title"> Начисление</h2>
<form action="php/claim.php" method="post" id='form_input'>
	    <ul id="input_list">
        <li>
    <label>Номер заявки ПГУ</label>
	<input type="text" name="application_number" id="application_number" />
	</li>
	<li>
	 <label>Подразделение УФК</label>
	<input type="text" name="UFC" id="UFC" required placeholder="Укажите подразделение" /> 
	</li>
	<li>
	<label>Ведомство</label>
	<input type="text" name="office" id="office"value="<?php
													include('php/number_query.php');
													echo $row[office];
													?>" disabled/>
	</li>
	<li> 	
	<label>Роль ГИС ГМП</label>	
	<input type="text" name="rol" id="rol" value="<?php
													include('php/number_query.php');
													echo $row[rol];
													?>" disabled/> 
	</li>	
	<li>
	<label>Код ГИС ГМП</label>
	<input type="text" name="kod123" id="kod123" value="<?php
													include('php/number_query.php');
													echo $row[kod];
													?>"  disabled/>
	</li> 
	<li>
	<label>ИНН</label>
	<input type="text" name="inn" id="inn" value="<?php
													include('php/number_query.php');
													echo $row[inn];
													?>"  disabled/> 
	</li>	
	<li>
	<label>КПП</label>
	<input type="text" name="kpp" id="kpp" value="<?php
													include('php/number_query.php');
													echo $row[kpp];
													?>" disabled/> 
	 </li>	
	<li>
	 <label>ОГРН</label>
	<input type="text" name="ogrn" id="ogrn" value="<?php
													include('php/number_query.php');
													echo $row[ogrn];
													?>" disabled/> 
	</li>	
	<li>
	 <label>ОКТМО</label>
	<input type="text" name="OKTMO" value="<?php
													include('php/number_query.php');
													echo $row[oktmo];
													?>"  disabled/>
	</li>	 
	 <li>
	<label>Назначение платежа</label>	
	<input type="text" name="payment" id="payment" required placeholder="Введите назначение платежа"/> 
	</li>
	<li>
	<label>КБК</label>	
	<input type="text" name="kbk" id="kbk" maxlength="20"  required placeholder="Код бюджетной классификации"/>
	</li>
	<li>
	<label>Сумма</label>
	<input type="text" name="summ" id="summ"  required placeholder="Сумма"/>
	</li>	
	 <li>
	 <label>Статус плательщика </label>
	<input type="text" name="status" id="status" required placeholder="Статус"/> 
	</li>
	<li>
	<label>Тип платежа</label>	
	<input type="text" name="type_payment" id="type_payment"  required placeholder="Тип платежа" />
	</li>	
	<li> 
	<label>Основание платежа</label>
	<input type="text" name="osn" id="osn" value="<?php
													include('php/number_query.php');
													echo $row[osn];
													?>"  disabled/> 
	</li>	
	<li>
	<label>Налоговый период</label>
	<input type="text" name="tax_period" id="tax_period" value="<?php
													include('php/number_query.php');
													echo $row[tax_period];
													?>"   disabled />	
	</li>
	<li>
	<label>Показатель номера документа</label>
	<input type="text" name="number_doc" id="number_doc" value="<?php
													include('php/number_query.php');
													echo $row[number_doc];
													?>" disabled />
	</li>
	 <li>
	<label> Показатель даты документа</label>
	<input type="text" name="date_doc" id="date_doc" value="<?php
													include('php/number_query.php');
													echo $row[date_doc];
													?>" disabled /> 
	</li>	
	<li>
	<label>Тип плательщика </label>
	<input type="text" name="status_bill_to" id="status_bill_to" required placeholder="Тип плательщика"  /> 
		</li>
	<li>
     <label>Вид документа, <br/> удостоверяющего личность</label>
	<input type="text" name="passport" id="passport"  required placeholder="Документ, удостоверяющий личность"/> 
	 </li> 
	 <li>
	 <label>Серия </label>	 
	<input type="text" name="seria_passport" id="seria_passport"required placeholder="Серия"/> 
	</li>
    <li>
	 <label>Номер </label>	 
	<input type="text" name="numder_passport" id="numder_passport" required placeholder="Номер"/> 
	</li>	
	<li>
	<label>Примечание</label>
     <textarea name="other" id="other"></textarea> 
         </li>
         </ul>    
 <input id="send-message"  type="submit" name="send-message"/> 
	<input type="reset" name="res" id="reset_btm" value="Очистить"/>
	</form>
		</div>
<ul class="accordion-tabs">
	<li class="tab-head-cont">
 	<a href="#" class="is-active">Начисления</a>
	<section>
   <p id="rez"></p>
		<button class="show-btn" >Создать начисление</button>
		<p id="form_message"></p>	
<p id="tt_tabs_block">
<div class="tt-tabs">
<div class="index-tabs">
<span>На отправку</span>
<span>Активные</span>
<span>Архивные</span>
</div>
<div class="index-panel">
<div class="tt-panel">
Настройки фильтра
 <table border="1" id="table_tabs">
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
include("/php/query_bd.php");
?>
</table>
</div>
<div class="tt-panel">
Содержание второй вкладки
</div>
<div class="tt-panel">
Содержание третьей вкладки
</div>
</div>
</div>
</p>
	</section>
	</li>
		<li class="tab-head-cont">
        <a href="#">Платежи</a>
        <section>
            <p>Содержание 2й вкладки</p>
        </section>
    	</li>
    	
		<li class="tab-head-cont">
        <a href="#">Шаблоны</a>
        <section>
            <form action="php/claim.php" method="post" id='form_input'>
	    <ul id="input_list">
        <li>
    <label>Номер заявки ПГУ</label>
	<input type="text" name="application_number" id="application_number" />
	</li>
	<li>
	 <label>Подразделение УФК</label>
	<input type="text" name="UFC" id="UFC" required placeholder="Укажите подразделение" /> 
	</li>
	<li>
	<label>Ведомство</label>
	<input type="text" name="office" id="office"value="<?php
													include('php/number_query.php');
													echo $row[office];
													?>" disabled/>
	</li>
	<li> 	
	<label>Роль ГИС ГМП</label>	
	<input type="text" name="rol" id="rol" value="<?php
													include('php/number_query.php');
													echo $row[rol];
													?>" disabled/> 
	</li>	
	<li>
	<label>Код ГИС ГМП</label>
	<input type="text" name="kod123" id="kod123" value="<?php
													include('php/number_query.php');
													echo $row[kod];
													?>"  disabled/>
	</li> 
	<li>
	<label>ИНН</label>
	<input type="text" name="inn" id="inn" value="<?php
													include('php/number_query.php');
													echo $row[inn];
													?>"  disabled/> 
	</li>	
	<li>
	<label>КПП</label>
	<input type="text" name="kpp" id="kpp" value="<?php
													include('php/number_query.php');
													echo $row[kpp];
													?>" disabled/> 
	 </li>	
	<li>
	 <label>ОГРН</label>
	<input type="text" name="ogrn" id="ogrn" value="<?php
													include('php/number_query.php');
													echo $row[ogrn];
													?>" disabled/> 
	</li>	
	<li>
	 <label>ОКТМО</label>
	<input type="text" name="OKTMO" value="<?php
													include('php/number_query.php');
													echo $row[oktmo];
													?>"  disabled/>
	</li>	 
	 <li>
	<label>Назначение платежа</label>	
	<input type="text" name="payment" id="payment" required placeholder="Введите назначение платежа"/> 
	</li>
	<li>
	<label>КБК</label>	
	<input type="text" name="kbk" id="kbk" maxlength="20"  required placeholder="Код бюджетной классификации"/>
	</li>
	<li>
	<label>Сумма</label>
	<input type="text" name="summ" id="summ"  required placeholder="Сумма"/>
	</li>	
	 <li>
	 <label>Статус плательщика </label>
	<input type="text" name="status" id="status" required placeholder="Статус"/> 
	</li>
	<li>
	<label>Тип платежа</label>	
	<input type="text" name="type_payment" id="type_payment"  required placeholder="Тип платежа" />
	</li>	
	<li> 
	<label>Основание платежа</label>
	<input type="text" name="osn" id="osn" value="<?php
													include('php/number_query.php');
													echo $row[osn];
													?>"  disabled/> 
	</li>	
	<li>
	<label>Налоговый период</label>
	<input type="text" name="tax_period" id="tax_period" value="<?php
													include('php/number_query.php');
													echo $row[tax_period];
													?>"   disabled />	
	</li>
	<li>
	<label>Показатель номера документа</label>
	<input type="text" name="number_doc" id="number_doc" value="<?php
													include('php/number_query.php');
													echo $row[number_doc];
													?>" disabled />
	</li>
	 <li>
	<label> Показатель даты документа</label>
	<input type="text" name="date_doc" id="date_doc" value="<?php
													include('php/number_query.php');
													echo $row[date_doc];
													?>" disabled /> 
	</li>	
	<li>
	<label>Тип плательщика </label>
	<input type="text" name="status_bill_to" id="status_bill_to" required placeholder="Тип плательщика"  /> 
		</li>
	<li>
     <label>Вид документа, <br/> удостоверяющего личность</label>
	<input type="text" name="passport" id="passport"  required placeholder="Документ, удостоверяющий личность"/> 
	 </li> 
	 <li>
	 <label>Серия </label>	 
	<input type="text" name="seria_passport" id="seria_passport"required placeholder="Серия"/> 
	</li>
    <li>
	 <label>Номер </label>	 
	<input type="text" name="numder_passport" id="numder_passport" required placeholder="Номер"/> 
	</li>	
	<li>
	<label>Примечание</label>
     <textarea name="other" id="other"></textarea> 
         </li>
         </ul>    
 <input id="send-message"  type="submit" name="send-message"/> 
	<input type="reset" name="res" id="reset_btm" value="Очистить"/>
	</form>
        </section>
    	</li>
    	
    	<li class="tab-head-cont">
        <a href="#">Отчеты</a>
        <section>
            <p>Содержание 4й вкладки</p>
        </section>
    	</li>
    	
    	<li class="tab-head-cont">
        <a href="#">Внешние ИС</a>
        <section>
            <p>Содержание 5й вкладки</p>
        </section>
    	</li>
	</ul>	
      
</div>
</body>
</html>
<?php
	}
    else
    {
      header("Location: login.php");  
    }
?>