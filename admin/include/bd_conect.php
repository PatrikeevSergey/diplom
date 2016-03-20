<?php

	$host='localhost';
	$user='user_payments';
	$pasw='1234567890';
	$db='payments';

  $connection=mysql_connect($host,$user,$pasw);
if(!$connection||!mysql_select_db($db,$connection))
{
	exit(mysql_error());
}
/*else{
	echo ("соединение создано!");
}*/
?>