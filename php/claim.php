<?php
include("bd_conect.php");

 $error = array();
  	if(!(isset( $_POST['UFC']) && $_POST['UFC']!='')) 
 		$error[] = "Введите УФК по Ростовской области!";
 	if(!(isset( $_POST['kbk']) && $_POST['kbk']!='')) 
 		$error[] = "Введите код бюджетной классификации";
 	if (!(isset( $_POST['payment']) && $_POST['payment']!=''))
 		$error[] = "Введите назначение платежа!";
 	if (!(isset( $_POST['summ']) && $_POST['summ']!=''))
 		$error[] = "Введите сумму!";
 	if (!(isset( $_POST['status']) && $_POST['status']!=''))
 		$error[] = "Введите статус!";
 	if (!(isset( $_POST['type_payment']) && $_POST['type_payment']!=''))
 		$error[] = "Введите тип платежа!";
 	if (!(isset( $_POST['status_bill_to']) && $_POST['status_bill_to']!=''))
 		$error[] = "Введите тип плательщика!";
 	if (!(isset( $_POST['passport']) && $_POST['passport']!=''))
 		$error[] = "Введите вид документа!";
    if (!(isset( $_POST['seria_passport']) && $_POST['seria_passport']!=''))
        $error[] = "Введите 4 цифр серии паспорта!";
 	if (!(isset( $_POST['numder_passport']) && $_POST['numder_passport']!=''))
 		$error[] = "Введите 6 цифры номера паспорта!";
    if (strlen($_POST['kbk']) < 20 or strlen($_POST['kbk']) > 20)
    {
       $error[] = "Код бюджетной классификации  должен состоять из 20 цифр!"; 
    } 
    if (strlen($_POST['numder_passport']) < 6 or strlen($_POST['numder_passport']) > 6)
    {
       $error[] = "Введите 6 цифр номера паспорта!"; 
    }
     if (strlen($_POST['seria_passport']) < 4 or strlen($_POST['seria_passport']) > 4)
    {
       $error[] = "Введите 4 цифры серии паспорта!"; 
    }
    
    if (count($error))
   {
    
 	echo implode('<br />',$error);
     
   }
   else
   {  
  
  mysql_query("INSERT INTO data(application_number, division_UFC, details_of_payment, kbk,summ, payer_status, type_of_payment, payer_type, document_type, seria_passport, number, note,time)
						VALUES(
						
							'".$_POST['application_number']."',
							'".$_POST['UFC']."',
							'".$_POST['payment']."',
							'".$_POST['kbk']."',
							'".$_POST['summ']."',
                            '".$_POST['status']."',
                            '".$_POST['type_payment']."',
                            '".$_POST['status_bill_to']."',
                            '".$_POST['passport']."',
                            '".$_POST['seria_passport']."',
                            '".$_POST['numder_passport']."',
                            '".$_POST['other']."',
                            NOW()
                           ) ;");  
     echo "Ваш запрос обработан. Пожалуйста, обновите страницу!";
                                    
   };
                          
   /*echo ("INSERT INTO data(application_number, division_UFC, details_of_payment, kbk,summ, payer_status, type_of_payment, payer_type, document_type, seria_passport, number, note,date)
						VALUES(
						
							'".$_POST['application_number']."',
							'".$_POST['UFC']."',
							'".$_POST['payment']."',
							'".$_POST['kbk']."',
							'".$_POST['summ']."',
                            '".$_POST['status']."',
                            '".$_POST['type_payment']."',
                            '".$_POST['status_bill_to']."',
                            '".$_POST['passport']."',
                            '".$_POST['seria_passport']."',
                            '".$_POST['numder_passport']."',
                            '".$_POST['other']."'
                            NOW()
                           ) ;");*/

?>

