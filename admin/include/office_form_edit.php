<?php
/*include("include/bd_conect.php");*/

 $error = array();
 	if(!(isset( $_POST['input_edit']) && $_POST['input_edit']!='')) 
 		$error[] = "Введите названия ведомства, чтобы изменить его в базе!";
 		
 		else{
			echo 'test';
		}
 	/*$update = mysql_query("UPDATE number SET $querynew WHERE id = 0"); 
 	echo "Данные изменены! Пожалуйста, одновите страницу!"*/
 	
 
?>