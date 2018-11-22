<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include_once 'dbconnect.php';
 
if(!isset($_SESSION['user']))
{
    header("Location: profile_pat.php");   
}
$res=mysql_query("SELECT * FROM `users` WHERE user_id=".$_SESSION['user'], $pat_db) ;
$userRow=mysql_fetch_array($res);
?>

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
                    <img src="images1/wellnode.png">
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
  <br>
            <div class="options grid-100">
                <div  id='signup' class='grid-25 mobile-grid-100'>
                    <i class="fa fa-info fa-5x"></i>
                  <h4></i> View</h4>
                    <p>Personal Information</p>
                    <div class='readmore-button'><p><a href="personal_pat2.php"> <i class="fa fa-hand-stop-o plus"></i></a></p></div>
                </div>
                <div id='login' class='grid-25 mobile-grid-100'>
                    <i class="fa fa-folder-open fa-5x"></i>
                    <h4><i class="fa fa-upload upload"></i>Upload</h4>
                    <p>Medical Information</p>
                   <div class='readmore-button'><p><a href="upload_info.php"> <i class="fa fa-hand-stop-o plus"></i></a></p>                   
                </div>
          </div>
                 <div id='patient' class='grid-25 mobile-grid-100'>
                    <i class="fa fa-user-md fa-5x"></i>
                    <h4> </i> Add/Remove</h4>
                    <p>A Practitioner</p>
                    <div class='readmore-button'><p><a href="addDoc.php"> <i class="fa fa-hand-stop-o plus"></i></a></p></div>
         </div>
       </div>
     </div>
   </div>
    </body>
</html>