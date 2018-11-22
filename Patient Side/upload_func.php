<?php
include_once 'dbconnect.php';

class Image
{
var
	$image_id,
	$healthno,
	$image;
	function insert_into_image()
	{
             if(($_FILES["ECG"]))
		{
			$TEMPNAME3 = $_FILES["ECG"]["tmp_name"];
			$origname3 = $_FILES["ECG"]["name"];
			$size3 = ($_FILES["ECG"]["size"]/5242880). "MB<br>";
			$type3 = $_FILES["ECG"]["type"];
			$image3 = $_FILES["ECG"]["name"];
			move_uploaded_file($_FILES["ECG"]["tmp_name"], "images/".$_FILES["ECG"]["name"]);			
		}
                if($size3 ==0) {
                       echo "<script language='javascript' type='text/javascript'>
			alert('Please Select your Medical Information');
			</script>";
                   }
		
		else if(mysql_query("insert into consult(healthno,MEDICALINFO)VALUES ('$this->healthno','$image3')") or die (mysql_error()))
		{
			echo "<script language='javascript' type='text/javascript'>
			alert('Medical Information uploaded');
			</script>";
		}
		else
		{
			echo "<script language='javascript' type='text/javascript'>
			alert('Medical Information not uploaded');
			</script>";
		}
		
		
	}
	/*
	function get_all_image_list()
	{
		$query = "SELECT * FROM image_table";
		$result = mysql_query($query);
		
		return $result;
	
		
	}
	*/
}
?>