<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include_once 'dbconnect.php';
 
if(!isset($_SESSION['user']))
{
    header("Location: personal_pat2.php");
    
}

$res=mysql_query("SELECT * FROM `users` WHERE user_id=".$_SESSION['user'], $pat_db) ;
$userRow=mysql_fetch_array($res);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>WellNode2-Personal </title>
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
                <div class="greeting-message grid-40 push-20"><p><span><?php echo $userRow['username']; ?></span></p></div>
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

        <div class='profile-wrapper grid-container'>
            <div class="info grid-100">
            	<h3>Personal Information</h3>
            </div>

         
            <?php
                 if($userRow['Gender'] == 'Male'){?>
                 <div class='profiled grid-100'>
                <img  class='grid-20 push-40' id="profile-picture" src="images/male.png">
                </div>
               <?php
               }
                else {?>
                 <div class='profiled grid-100'>
                <img  class='grid-20 push-40' id="profile-picture" src="images/female.png">
                </div>
<?php
}
?>
           
   <font size = "4">
            <div class='table grid-100'>
		<table>
                
                <tr>
                    <td>Name: </td>
                    <td><?php echo $userRow['name'];?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $userRow['username'];?></td>
                </tr>
                <tr>
                    <td>Email Address: </td>
                    <td><?php echo $userRow['email'];?></td>
                </tr>
                <tr>
                    <td>D.O.B</td>
                    <td><?php echo $userRow['DOB'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $userRow['Gender'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $userRow['Gender'];?></td>
                </tr>
               <tr>
                    <td>Health Insurance No.</td>
                    <td><?php echo $userRow['healthno'];?></td>
                </tr>
                <tr>
                <td>Current Health Practitioner(s)</td> 
                <td><?php echo $userRow['DoctorsName'];?><br> <?php echo  $userRow['doctor1'];?>
                </td>
                </tr>
            </table>
            </div>
<br><br>
<p align = "center"> Password Not Shown Due to Confidentiality Reasons. Please Refer to User Manual for More Information</p>
</font >
        </div>



        <div class=last-footer>
            <div class="grid-container">
                <p id="leftp">HEART CONDITION MONITORING SYSTEM</p>
                <p class='direct' id="rightp"><a href='profile_pat.php'>Home Page</a></p>
            </div>
        </div>
    </body>
</html>






 