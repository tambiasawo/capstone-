// this file is used to connect to both the patient and doctor's db.
<?php

$doc_db = mysql_connect("localhost","wellbldw_TA","tc2b8iym",true) or die(mysql_error());
$pat_db = mysql_connect("localhost","wellbldw_JK","1qaz2wsx", true)or die(mysql_error());

mysql_select_db('wellbldw_patient_info',  $pat_db) or die(mysql_error());
mysql_select_db('wellbldw_doc',  $doc_db) or die(mysql_error());
?>
