<?php
include("bd_conect.php");

 $error = array();
  	if(!(isset( $_POST['UFC']) && $_POST['UFC']!='')) 
 		$error[] = "������� ��� �� ���������� �������!";
 	if(!(isset( $_POST['kbk']) && $_POST['kbk']!='')) 
 		$error[] = "������� ��� ��������� �������������";
 	if (!(isset( $_POST['payment']) && $_POST['payment']!=''))
 		$error[] = "������� ���������� �������!";
 	if (!(isset( $_POST['summ']) && $_POST['summ']!=''))
 		$error[] = "������� �����!";
 	if (!(isset( $_POST['status']) && $_POST['status']!=''))
 		$error[] = "������� ������!";
 	if (!(isset( $_POST['type_payment']) && $_POST['type_payment']!=''))
 		$error[] = "������� ��� �������!";
 	if (!(isset( $_POST['status_bill_to']) && $_POST['status_bill_to']!=''))
 		$error[] = "������� ��� �����������!";
 	if (!(isset( $_POST['passport']) && $_POST['passport']!=''))
 		$error[] = "������� ��� ���������!";
    if (!(isset( $_POST['seria_passport']) && $_POST['seria_passport']!=''))
        $error[] = "������� 4 ���� ����� ��������!";
 	if (!(isset( $_POST['numder_passport']) && $_POST['numder_passport']!=''))
 		$error[] = "������� 6 ����� ������ ��������!";
    if (strlen($_POST['kbk']) < 20 or strlen($_POST['kbk']) > 20)
    {
       $error[] = "��� ��������� �������������  ������ �������� �� 20 ����!"; 
    } 
    if (strlen($_POST['numder_passport']) < 6 or strlen($_POST['numder_passport']) > 6)
    {
       $error[] = "������� 6 ���� ������ ��������!"; 
    }
     if (strlen($_POST['seria_passport']) < 4 or strlen($_POST['seria_passport']) > 4)
    {
       $error[] = "������� 4 ����� ����� ��������!"; 
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
     echo "��� ������ ���������. ����������, �������� ��������!";
                                    
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

