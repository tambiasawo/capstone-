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

print ("$output");