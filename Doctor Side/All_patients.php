<!DOCTYPE html>
<html>
    <head>
        <title>WellNode Medical Data Storage</title>
        <link rel="stylesheet" type="text/css" href="stylesheet/normalize.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/typography.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/unsemantic-grid-responsive-tablet.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/style.css">
        <link rel="stylesheet" href="stylesheet/font-awesome.min.css">
        <script src="javascript/jquery-1.12.1.min.js"></script>
        <script src="javascript/main.js"></script>
        <script src="javascript/processing.min.js"></script>
    <body>
        <div class='header-wrap'>
            <div class='header grid-container'>
                <div class='logo grid-30'>
                    <img src="images1/wellsnode_logo.png">
                </div>
                <div class="greeting-message grid-40 push-20"><p>Welcome <span><?php echo $userRow['username']; ?></span></p></div>
                              <nav class = 'login-nav grid-10'>
                    <ul>
                        
                        <li id='login'>
                            <a id="login-trigger" href="index.php"><p>Sign Out</p></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="profile-wrapper grid-container">
       <center>
      <br><br><br><br>
           <strong> Click to View all your Patients </strong>
<br>
<br>
<a href = "VIEW.php">
<button type = "submit" name = "view" style="background-color:red; color:black; border-radius:30px; width: 200px; height: 30px; font-size: large;">View all</button></a>
  <br><br><br><br><br>
            </center>    
       </div>
     </div>    
     
<div class = "canvas">
               <canvas data-processing-sources="javascript/ecgline.pde" tabindex="0" id="__processing1" width="1200" height="200" style="image-rendering: -webkit-optimize-contrast !important;"></canvas>
           </div>
   </div>
   
   <div class=last-footer>
            <div class="grid-container">
                <p id="leftp">HEART CONDITION MONITORING SYSTEM</p>
                <p class='direct' id="rightp"><a href='doc_home.php'>Home Page</a></p>
            </div>
        </div>
        
    </body>
</html>





<?php
include_once 'dbconnect.php';
error_reporting(E_ALL ^ E_WARNING);
session_start();
 
if(isset($_SESSION['user'])!="")
{
    header("Location: all.php");
}

$res=mysql_query("SELECT * FROM `usersdoc` WHERE id=".$_SESSION['user'], $doc_db);
$userRow=mysql_fetch_array($res);
$docName = $userRow['name'];

if(@$_POST['view']) {
$res1= mysql_query("SELECT `name`,`healthno` FROM `users` WHERE `DoctorsName` LIKE '%$docName%'", $pat_db);

while ($userRow1=mysql_fetch_array($res1))
{
$count=mysql_num_rows($res1);
?>
<ul>

		    <?php echo '<div id = "content">'?> <a href= "patientinfob.php?name=<?php echo $userRow1['name'];?>"><?php echo $userRow1['name'];?></a></div><br>

 
<?php
	
	}
 
?>

</ul>
</br></br>
<strong><font size ="4"> You have a total of <?php echo $count ?> patients. </strong></font>
<br>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
	
}
 
?>
