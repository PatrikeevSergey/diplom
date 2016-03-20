<?php
include("bd_conect.php");
$query=mysql_query("SELECT * FROM data;");
$row=mysql_fetch_array($query);
do
{
	echo '<tr>';
	echo '<td>' .$row['time'].'</td>';
	echo '<td>' .$row['application_number'].'</td>';
	echo '<td>' .$row['division_UFC']. '</td>';
	echo '<td>' .$row['details_of_payment']. '</td>';
	echo '<td>' .$row['kbk']. '</td>';
	echo '<td>' .$row['summ']. '</td>';
	echo '<td>' .$row['payer_status']. '</td>';
    echo '<td>' .$row['type_of_payment']. '</td>';
    echo '<td>' .$row['payer_type']. '</td>';
    echo '<td>' .$row['document_type']. '</td>';
    echo '<td>' .$row['seria_passport']. '</td>';
    echo '<td>' .$row['number']. '</td>';
    echo '<td>' .$row['note']. '</td>';
		
}
while ($row=mysql_fetch_array($query));

       
       
?>