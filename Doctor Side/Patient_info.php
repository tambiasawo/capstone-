// this file lets a patient view their profile after registration 

<!DOCTYPE html><html><head><title>Wellnode2</title><meta http-equiv="Content-type" content="text/html;charset=UTF-8" /><meta name="viewport" content="width=800" /><meta name="description" content="" /><meta name="generator" content="EverWeb 1.9.5 (1495)" /><meta name="buildDate" content="Thursday, March 3, 2016" /><link rel="canonical" href="style.css" />
<meta property="og:url" content="http://" /><meta property="og:title" content="Wellnode2!"/><meta property="og:type" content="website" /> <link rel="stylesheet" type="text/css" href="style.css" /><script type="text/javascript" src="ew_js/imageCode.js"></script><style type="text/css">
scroll down to the end

a img {border:0px;}body {background-color: #F9F1E3;margin: 0px auto;}div.container {margin: 0px auto; width:1580px;height: 1301px;background-color: #FFFFFF;}.shape_0 {background-color:#ff3333;}</style></head><body><div class="shadow"><div class="container"><header></header><div class="content"><div style="position:relative"><div class="shape_0" style="left:0px;top:0px;width:1580px;height:112px;z-index:0;position:absolute;"><div style="margin-top: 31px ">

<p style="line-height:40px;text-align:left;margin-top:0px;margin-bottom:15.625px;"><div id ="header"><font size = "10"; weight="700"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Information Page</strong></p></div></div></div></div></font>
<br><br><br>

<div id="header">
    <div id="right">
        <div id="content">
            <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out Here</a>
        </div>
    </div>
</div>
<br><br><br><br>
<style>
.small{
width:600px;
height:400px;
}
.big{
	position:absolute;
	width: 0px;
	transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	z-index:10;
}

.small:hover + .big{
	width:900px;
	left:0px

</style>
</head>
<body>

<?php
include_once 'dbconnect.php';

$pkey = mysql_real_escape_string($_GET['name']);
$res2= mysql_query("SELECT * FROM `users` WHERE `name` = '$pkey'");
$userRow2=mysql_fetch_array($res2);
$hno = $userRow2['healthno'];


$res1= mysql_query("SELECT * FROM `consult` WHERE `healthno` = '$hno'");

?>

<br>
<br>
&nbsp;&nbsp;&nbsp;<font size="5"> Name: <?php echo $userRow2['name'];?></p><br>
&nbsp;&nbsp;&nbsp;DOB:  <?php echo $userRow2['DOB'];?></p><br>
&nbsp;&nbsp;&nbsp;Email Address: <?php echo $userRow2['email'];?></p><br>
&nbsp;&nbsp;&nbsp;Health Insurance No. <?php echo $hno;?></p><br>
&nbsp;&nbsp;&nbsp;Gender:  <?php echo $userRow2['Gender'];?></p><br>


<center>

<table width = "80%" border ="1">

<tr><strong><font size="5"><center>Medical Information</center> </strong></tr>
<tr>
<th style= "text-align:center" style="width:40%">Date Modified</th>
<th style= "text-align:center" style="width:20%">Measurements</th>
</tr>
<?php

while($userRow1=mysql_fetch_array($res1))

{
?>

<tr>    

		<td style= "text-align:center" style="width:200%"><?php echo $userRow1['Date'];?></td>
			
		
		<td style= "text-align:center"><img class = "small" src ="images/<?php echo $userRow1['MEDICALINFO']; ?>">
		<img class = "big" src ="images/<?php echo $userRow1['MEDICALINFO']; ?>"></td>
</tr>

<?php
error_reporting(E_ERROR | E_PARSE);
}
?>

</table>
</center>
<br>
<br>
<br>

<div id="footer">
HEART CONDITION MONITORING SYSTEM  <a href="doc_home.php">Back to Profile Page</a>
</div>
