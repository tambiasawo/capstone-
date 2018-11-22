<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
    header("Location: profile_pat.php");
} 
$res=mysql_query("SELECT * FROM users WHERE user_id= ".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$lastid = $userRow['userid'];
$pname= $userRow['name'];
$uname= $userRow['username'];
$doc = $userRow['DoctorsName'];
$email = $userRow['email'];
include('upload5.php');
$obj_image = new Image();
if(@$_POST['Submit'])  
{       
	$hno = mysql_real_escape_string($_POST['healthno']);
	//$ecg = mysql_real_escape_string($_POST['ECG']);
	if($hno == '')
	 {
	                echo "<script language='javascript' type='text/javascript'>
			alert('Please Enter your Health Insurance Number');
			</script>";
         }
         else{
	$obj_image->healthno=str_replace("'","''", $_POST['healthno']); //1st healthno is name of column
	$obj_image->image=str_replace("'","''", $_POST['ECG']);
	$obj_image->insert_into_image();
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>WellNode2-Personal </title>
        <link rel="stylesheet" type="text/css" href="stylesheet/normalize.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/typography.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/unsemantic-grid-responsive-tablet.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/style.css">
        <link rel="stylesheet" type="text/css" href="stylenow.css">
        <link rel="stylesheet" href="stylesheet/font-awesome.min.css">
        <script src="javascript/jquery-1.12.1.min.js"></script>
        <script src="javascript/main.js"></script>
        <script src="javascript/processing.min.js"></script>
<body>
       <div class='header-wrap'>
            <div class='header grid-container'>
                <div class='logo grid-30'>
                    <img src="images1/wellnode.png">
                </div>
                <div class="greeting-message grid-40 push-20"><p><?php echo $userRow['username']; ?></p></div>
                <nav class = 'login-nav grid-10'>
                    <ul>
                        <!-- all your login menu here -->
                        <li id='login'>
                            <a id="login-trigger" href="index.php"><p>Sign Out</p></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <br>
            <div class="info grid-100">
            	<center> <h1>Upload Medical Information</h1></center>
            </div>
  <br><br><br><br><br>

<font size = "4">
<center>
<div id="login-form">
<form method = "POST" enctype = "multipart/form-data">
<input type="text" id = "doc1" size = "35" name="healthno" placeholder="Enter your Health Insurance Number"/>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;<p><input type="file" name="ECG"> </p>
<br>
<input type="submit" name="Submit" style="background-color:#ff3333; color:black; border-radius:30px; width: 180px; height: 30px; font-size: large" value = "Upload">


</form>
</center>
</font>



<div class=last-footer>
            <div class="grid-container">
                <p id="leftp">HEART CONDITION MONITORING SYSTEM</p>
                <p class='direct' id="rightp"><a href='profile_pat.php'>Home Page</a></p>
            </div>
        </div>
 </body>
</html>

     