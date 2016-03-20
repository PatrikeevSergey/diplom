<?php
include('/bd_conect.php');
	$query=mysql_query("SELECT * FROM number;");
	$row=mysql_fetch_array($query);
?>