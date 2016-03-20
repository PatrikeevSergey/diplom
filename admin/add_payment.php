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
    $_SESSION['urlpage'] = "<a href='index.php'>Главная</a>\ <a href='payment.php'>Платежи</a> \ <a href='add_payment.php'>Добавление платежа</a>";
    
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
    <script type="text/javascript" src="js/verification.js"></script> 
    
	<title>Панель управления</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block_header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title_page">Добавление платежа</p>
</div>
<form action="functions/claim.php" method="post" id='form_input_admin'>
	    <ul id="input_list_admin">
        <li>
    <label>Номер заявки ПГУ</label>
	<input type="text" name="application_number" id="application_number" />
	</li>
	
	<li>
	 <label>Подразделение УФК</label>
	<input type="text" name="UFC" id="UFC"  /> 
	</li>
	
	<li>
	<label>Ведомство</label>
	<input type="text" name="office" id="office" disabled/>
	</li>
	
	<li> 
	<label>Роль ГИС ГМП</label>
	
	<input type="text" name="rol" id="rol" disabled/> 
	</li>
	
	<li>
	<label>Код ГИС ГМП</label>
	<input type="text" name="kod123" id="kod123" disabled/>
	</li> 
	
	<li>
	<label>ИНН</label>
	<input type="text" name="inn" id="inn" value="<?php
													include('include/number_query.php');
													echo $row['inn'];
													?>"  disabled/> 
	</li>
	
	<li>
	<label>КПП</label>
	<input type="text" name="kpp" id="kpp" value="616500001"  disabled/> 
	 </li>
	
	<li>
	 <label>ОГРН</label>
	<input type="text" name="ogrn" id="ogrn" value="6100001234121"  disabled/> 
	</li>
	
	<li>
	 <label>ОКТМО</label>
	<input type="text" name="OKTMO" value="61650011"  disabled/>
	</li>
	 
	 <li>
	<label>Назначение платежа</label>
	
	<input type="text" name="payment" id="payment" /> 
	</li>

	<li>
	<label>КБК</label>
	
	<input type="text" name="kbk" id="kbk" maxlength="20"  />
	</li>
	
	<li>
	<label>Сумма</label>
	
	<input type="text" name="summ" id="summ"  />
	</li>
	
	 <li>
	 <label>Статус плательщика </label>
	 
	<input type="text" name="status" id="status"/> 
	</li>

	<li>
	<label>Тип платежа</label>
	
	<input type="text" name="type_payment" id="type_payment"   />
	</li>
	
	<li> 
	<label>Основание платежа</label>
	<input type="text" name="osn" id="osn"  disabled/> 
	</li>
	
	<li>
	<label>Налоговый период</label>
	
	<input type="text" name="tax_period" id="tax_period"   disabled/>	
	</li>
	
	<li>
	<label>Показатель номера документа</label>
	<input type="text" name="number_doc" id="number_doc"  disabled/>
	</li>
	 
	 <li>
	<label> Показатель даты документа</label>
	<input type="text" name="date_doc" id="date_doc" disabled/> 
	</li>
	
	<li>
	<label>Тип плательщика </label>

	<input type="text" name="status_bill_to" id="status_bill_to"   /> 
	</li>
	
	<li>
     <label>Вид документа, <br/> удостоверяющего личность</label>
    
	<input type="text" name="passport" id="passport"  /> 
	 </li>
	 
	 <li>
	 <label>Серия </label>
	 
	<input type="text" name="seria_passport" id="seria_passport"   /> 
	</li>
    <li>
	 <label>Номер </label>
	 
	<input type="text" name="numder_passport" id="numder_passport"  /> 
	</li>
	
	<li>
	<label>Примечание</label>
     <textarea name="other" id="other"></textarea> 
         </li>
         </ul>
         
 <input id="send-message"  type="submit" name="send-message" value="Добавить"/> 
 <script type="text/javascript" >
           function SendMessage(){
           $.ajax({
  url: "functions/claim.php",
  type: "post",
  data: $('#form_input_admin').serialize(),
  success: function(data){
    alert(data);
  }
}); 
}    
</script>
</form>
</div>
</div>
<?php

}
else{
     header("Location: login.php");
}
?>
</body>
</html>



