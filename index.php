//HomePage: Consists of the sign in page and register page
<?php
session_start();
include_once 'dbconnect.php';

   
    $doc = mysql_real_escape_string($_POST['doc']);


if(isset($_POST['Submit']) && ($doc!= '')){

    $email = mysql_real_escape_string($_POST['Email']);
    $upass = mysql_real_escape_string($_POST['Password']);
    $res1=mysql_query("SELECT * FROM usersdoc WHERE email='$email'", $doc_db);
    $row1=mysql_fetch_array($res1, MYSQL_ASSOC);
     
    if($row1['password']==md5($upass))
    {
        $_SESSION['user'] = $row['id'];
        header("Location: doc_home.php");
    }
    else
    {
        ?>
        <script>alert('Wrong details');</script>
        <?php
    }
     

}
else if(isset($_POST['Submit']) && ($doc== '')) {

    $email = mysql_real_escape_string($_POST['Email']);
    $upass = mysql_real_escape_string($_POST['Password']);
    $res=mysql_query("SELECT * FROM users WHERE email='$email'", $pat_db);
    $row=mysql_fetch_array($res, MYSQL_ASSOC);
     
    if($row['password']==md5($upass))
    {
        $_SESSION['user'] = $row['user_id'];
        header("Location: profile_pat.php");
    }
    else
    {
        ?>
        <script>alert('Wrong details');</script>
        <?php
    }
     
}

else if(isset($_POST['new']))
{
	$uname = mysql_real_escape_string($_POST['usname']);
	$email = mysql_real_escape_string($_POST['uemail']);
	$upass = md5(mysql_real_escape_string($_POST['upword']));
	$upass2 = md5(mysql_real_escape_string($_POST['confirm--upword']));
	$DOB = mysql_real_escape_string($_POST['dob']);
	$name = mysql_real_escape_string($_POST['Fname']);
	$docname = mysql_real_escape_string($_POST['doctname']);
	$patid =  mysql_real_escape_string($_POST['healthno']);
	$gender = $_POST['gender'];
	
	if($gender ==''){?>
		<script>alert('Please choose your gender');</script>        
	<?php
	}
	else{
	if($upass==$upass2){
	  if(mysql_query("INSERT INTO users(username,email,password,DOB,name,DoctorsName,healthno,Gender)VALUES('$uname','$email','$upass','$DOB', '$name','$docname','$patid', '$gender')"))
	{
         
?>
        <script>alert('Successfully Registered!');</script>
<?php
		 
	}
	else {
	?>
	 <script>alert('Username already exists! Please choose another Username');</script>
	<?php  
  }
  }
	else{
?>
<script>alert('Passwords do not match!');</script>
<?php
}	
}
}
else if(isset($_POST['RegD'])){
        $uname = mysql_real_escape_string($_POST['Username']);
	$email = mysql_real_escape_string($_POST['EmailD']);
	$upass1 = md5(mysql_real_escape_string($_POST['PasswordD']));
	$name = mysql_real_escape_string($_POST['FullName']);
	$upass2 = md5(mysql_real_escape_string($_POST['confirmpasswordD']));

	if($upass1==$upass2){
		if(mysql_query("INSERT INTO usersdoc(name,email,password,username) VALUES('$name','$email','$upass1','$uname')",$doc_db))
	{
	?>
        <script>alert('You have been Successfully Registered');</script>
        <?php
	}
	else // if unsuccessfully reg
	{
	  $res3 = mysql_query ("SELECT `username`, `email` FROM `usersdoc`", $doc_db);
	   while($user1=mysql_fetch_array($res3)){
	   	$un = $user1['username'];
	   	$ue = $user1['email'];
	   	if($uname==$un){
	   	?>
        <script>alert('Username already exists. Please choose another username');</script>
        <?php
        }
            
        else if($email==$ue){
        	  	?>
        <script>alert('Email Address already exists. Please choose another Email Address');</script>
        <?php
	}
	}
}
}

else{
?>
        <script>alert('Passwords do not Match');</script>
        <?php
}
}

else{}


?>
<!DOCTYPE html>
<html>
     <head>
        <title>wellNode2</title>
        <link rel="stylesheet" type="text/css" href="stylesheet/normalize.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/typography.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/unsemantic-grid-responsive-tablet.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/style.css">
        <script src="javascript/jquery-1.12.1.min.js"></script>
        <link href = "stylesheet/jquery-ui-min.css" rel = "stylesheet">
        <script src = "http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="javascript/main.js"></script>
        <script src="javascript/processing.min.js"></script>
        <script>
         $(function() {
            $( "#tabs" ).tabs();
         });
      </script>
      </head>
    <body>
        <div class='header-wrap'>
            <div class='header grid-container'>
                <div class='logo grid-60'>
                    <img src="images1/wellnode.png">
                </div>
                 <nav class = 'login-nav grid-30'>
                    <ul>
                        <!-- all your login menu here -->
                        <li id='login'>
                            <a id="login-trigger" href="#"><p>Log in</p></a>
                            <div id="login-content">
                                <form method = "POST">
                                  <fieldset id="inputs">
                                    <input id="username" type="email" name="Email" placeholder="Your email address" required>   
                                    <input id="password" type="password" name="Password" placeholder="Password" required>
                                  </fieldset>
                                  <fieldset id="actions">
                                    
                                    <label><input type="checkbox" name ="doc"/>&nbsp;Health Practitioner?</label>
                                    <label><input type="checkbox" checked="checked"> Keep me signed in?</label>
                                    <input type="submit" name ="Submit" id="submit" value="Log in">
                                  </fieldset>
                                </form>
                            </div>  
                        </li>
                        
                        <li id='signup'>
                            <a id="signup-trigger" href="#"><p>Sign up</p></a>
                            <div id="signup-content">
                               <div id="tabs">
                                  <ul class="ju">
                                    <li><a href="#tabs-1">Patient</a>
                                    </li>
                                    <li><a href="#tabs-2">Health Practitioner</a>
                                    </li>
                                  </ul>
                                  <div id="tabs-1">
                                    <form method = "POST">
                                      <br>
                                      <fieldset id="inputs">
                                        <input id="fullname" type="text" name="Fname" placeholder="Your Full Name" required>
                                        <input id="username" type="text" name="usname" placeholder="Desired Username" required>
                                        <input id="email" type="email" name="uemail" placeholder="Your email address" required>
                                        <input id="password" type="password" name="upword" placeholder="Password" required>
                                        <input id="conpassword" type="password" name="confirm--upword" placeholder="Confirm Password" required>
                                        <input id="doctor_name" type="name" name="doctname" placeholder="Doctor's Name" id="doctor" required>
                                        <input id="doctor_name" type="date" name="dob" placeholder="Date of Birth" id="dob" required>
                                        <input id="healthcardnumber" type="number" name="healthno" placeholder="Health Card Number" id="card" required>
                                        <p>Gender:<br></p>
                                        <p><input type="radio" name="gender" id = "g1" value= "Male" />Male</p>
                                        <p><input type="radio" name="gender" id = "g2" value= "Female" />Female</p>
                                      </fieldset>
                                      <fieldset id="actions">
                                        <label>
                                          <input type="checkbox" checked="checked"> Keep me signed in?</label>
                                        <input type="submit" name = "new" id="submit" value="Register">
                                      </fieldset>
                                    </form>
                                  </div>
                                  <div id="tabs-2">
                                    <form method = POST>
                                      <br>
                                      <fieldset id="inputs">
                                        <input id="fullname" type="text" name="FullName" placeholder="Your Full Name" required>
                                        <input id="username" type="text" name="Username" placeholder="Desired Username" required>
                                        <input id="email" type="email" name="EmailD" placeholder="Your Email Address" required>
                                        <input id="password" type="password" name="PasswordD" placeholder="Password" required>
                                        <input id="conpassword" type="password" name="confirmpasswordD" placeholder="Confirm Password" required>
                                      </fieldset>
                                      <fieldset id="actions">
                                        <label>
                                          <input type="checkbox" checked="checked"> Keep me signed in?</label>
                                        <input type="submit" id="submit" name = "RegD" value="Register">
                                      </fieldset>
                                    </form>
                                  </div>
                                </div>
                            </div>  
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class='jumbotron-wrap'>
            <div class='jumbotron grid-container'>
                <div class='quote grid-40'>
                <p align = "left">A Health Practitioner-Patient Interaction Site</p>
            </div>
                <img src="images/steroids-9.jpg">
            </div>
        </div>
        <div class='footer-wrap'>
            <div class="grid-container">
                <canvas class="grid-container" data-processing-sources="javascript/ecgline.pde" tabindex="0" id="__processing1" style="image-rendering: -webkit-optimize-contrast !important;"></canvas>
            </div>
        </div>
        
         
    </body>
</html>