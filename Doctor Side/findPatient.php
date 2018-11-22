<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include_once 'dbconnect.php';
 
if(isset($_SESSION['user'])!="")
{
    header("Location: find.php");
}

$res=mysql_query("SELECT * FROM `usersdoc` WHERE id=".$_SESSION['user'], $doc_db) ;
$userRow=mysql_fetch_array($res);
$lastid = $userRow['id'];
$docName = $userRow['name'];
?>
<!DOCTYPE html><html><head><title>Wellnode2</title><meta http-equiv="Content-type" content="text/html;charset=UTF-8" /><meta name="viewport" content="width=800" /><meta name="description" content="" /><meta name="generator" content="EverWeb 1.9.5 (1495)" /><meta name="buildDate" content="Thursday, March 3, 2016" /><link rel="canonical" href="style.css" />
<meta property="og:url" content="http://" /><meta property="og:title" content="Wellnode2!"/><meta property="og:type" content="website" /> <link rel="stylesheet" type="text/css" href="style.css" /><script type="text/javascript" src="ew_js/imageCode.js"></script><style type="text/css">
scroll down to the end

a img {border:0px;}body {background-color: #F9F1E3;margin: 0px auto;}div.container {margin: 0px auto; width:1580px;height: 1301px;background-color: #FFFFFF;}.shape_0 {background-color:#ff3333;}</style></head><body><div class="shadow"><div class="container"><header></header><div class="content"><div style="position:relative"><div class="shape_0" style="left:0px;top:0px;width:1580px;height:112px;z-index:0;position:absolute;"><div style="margin-top: 31px ">

<p style="line-height:40px;text-align:left;margin-top:0px;margin-bottom:15.625px;"><div id ="header"><font size = "10"; weight="700"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Find a Patient</strong></p></div></div></div></div></font>
<br><br><br>

<div id="header">
    <div id="right">
        <div id="content">
            Hi <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out Here</a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<strong>Search By Name</strong>
<div class ="search">
	<form method = "post">
	<input type = "text" name = "search" size = "50" height = "100" placeholder ="Enter Name Here"/>
	<input type = "submit" style="background-color:red; color:black; border-radius:30px; width: 180px; height: 30px; font-size: large" value = "Find Patient" />
	</form>
<br>

<?php
$output='';
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	if ($searchq !=''){
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	//$res2= mysql_query("SELECT `DATE` FROM `consult` WHERE `DATE` LIKE '%$searchq%'", $pat_db);
	$res1= mysql_query("SELECT * FROM `users` WHERE `name` LIKE '%$searchq%'", $pat_db);

	$count = mysql_num_rows($res1);
	if($count==0)
	{
		$output = "No name like that";
	}
	else
	{	
		while($row=mysql_fetch_array($res1)) {
			$name = $row['name'];
			$doc = $row['DoctorsName'];
                        $doc2 = $row['doctor1'];
			//$res2= mysql_query("SELECT `name` FROM `users` WHERE `healthno`" = $healthno);
			//while($row=mysql_fetch_array($res2))
			if(($doc==$docName)||($doc2==$docName)){ ?>
		    <?php echo '<div>'?> <a href= "patientinfob.php?name=<?php echo $row['name'];?>"><?php echo $name?></a></div>
			<?php
			
			}
			else
				$output= "You cannot view this patient's profile because you are not the assigned health practitioner.";
		
		}
		}
	   }
		
	}
	
  


//$res3= mysql_query("SELECT  FROM `consult` WHERE `healthno` = ".$_GET['healthno']);

print ("$output");

?> 
<br>
<br>
<strong>Search By Date</strong>
<div class ="search">
	<form method = "post">
	<input type = "text" name = "searchD" size = "50" placeholder ="Enter Date Information was uploaded in YYYY-MM-DD format"/>
	<input type = "submit" style="background-color:red; color:black; border-radius:30px; width: 180px; height: 30px; font-size: large" value = "Find Patient" />
	</form>


<br>
<?php

$output='';
if(isset($_POST['searchD'])){
	$searchq = $_POST['searchD'];
	if ($searchq !=''){
	$res2= mysql_query("SELECT * FROM `consult` WHERE `DATE` LIKE '%$searchq%'", $pat_db);
	//$res1= mysql_query("SELECT * FROM `users` WHERE `name` LIKE '%$searchq%'", $pat_db);

	$count = mysql_num_rows($res2);
	if($count==0)
	{
		$output = "No Entry for this date. Try another date";
	}
	else
	{	
		while($row=mysql_fetch_array($res2)) {
			$date = $row['Date'];
			$hno = $row['healthno'];
			$medinfo= $row['MEDICALINFO'];
			$res3= mysql_query("SELECT `DoctorsName` FROM `users` WHERE `healthno` LIKE '%$hno%'");
			
			while($row1=mysql_fetch_array($res3)){
				$doc = $row1['DoctorsName'];
			  if($doc==$docName){ ?>
		    <?php echo '<div>'?> <a href= "patientinfoc.php?Date=<?php echo $date;?>"><?php echo $date?></a></div>
			<?php
			
			}
			else
				$output= "You are not a doctor to this patient. Hence, you cannot view her information";
		}
		}
	}
	}

}

//$res3= mysql_query("SELECT  FROM `consult` WHERE `healthno` = ".$_GET['healthno']);

print ("$output");

?> 
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class=last-footer>
            <div class="grid-container">
                <p id="leftp">HEART CONDITION MONITORING SYSTEM</p>
                <p class='direct' id="rightp"><a href='profile_pat.php'>Home Page</a></p>
            </div>
        </div>
</body>
</html>