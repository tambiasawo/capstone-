<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();

include_once 'dbconnect.php';
if(isset($_SESSION['user'])!="")
{
	//header("Location: addDoc.php");
}
$res1 = mysql_query ("SELECT * FROM `users` WHERE user_id= ".$_SESSION['user'], $pat_db);
if(isset($_POST['btn-signup']))
{
	$doc1 = mysql_real_escape_string($_POST['doc1']);
	 
	while($user1=mysql_fetch_array($res1)){	
		$db_doc1 = $user1['DoctorsName'];
		//echo $user1['user_id'];
		$db_doc2 = $user1['doctor1'];
		
		if(($doc1==$db_doc1 ))
		{
		?>
        	<script>alert('You already have this doctor assigned to you');</script>
        	<?php
		}
		else if($doc1==''){ ?>
			        	<script>alert('Please enter in a practitioners name');</script>
						<?php
		}
		else if(($doc1 != '') && ($doc1!=$db_doc1)) {
				
		$update = mysql_query("UPDATE users SET doctor1 = '$doc1' WHERE user_id= ".$_SESSION['user'])or die (mysql_error());
				
				if($update){?>
				<script>alert('Your have updated your list of practitioners');</script>
						<?php
		}
					
	}		
		else { 
   	}       
      }     	
}	
echo $db_doc1;
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

        <br>
            <div class="info grid -10">
            	<center> <h1>Add a New Health Practitioner</h1></center>
            </div>
  <br><br><br><br><br>
  
<div class="info grid -80">
<div id="login-form">
<form method="post" onsubmit = "return delete_doc()">

<table align="center" width="30%" border="0">
<tr>
<td><input type="text" id = "doc1" name="doc1" placeholder="New Doctor "/></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" style="background-color:red; color:black; border-radius:10px;">Add</button></td>
</tr>
</table>

</form>
<br><br><br>
<h3><p> &nbsp;&nbsp;Note: Clicking the 'ADD' button will delete your previous added health practitioner</p></h3>
</div>
</div>


            <div class=last-footer>
               <div class="grid-container">
                <p id="leftp">HEART CONDITION MONITORING SYSTEM</p>
                <p class='direct' id="rightp"><a href='profile_pat.php'>Home Page</a></p>
            </div>
        </div>
    </body>
</html>
    </body>
</html>


