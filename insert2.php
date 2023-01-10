<?php include("dbconnect.php") ?>
<?php
	if(isset($_POST['submit']))
	{
		$sname=$_POST['sname'];
		$course=$_POST['course'];
		$email=$_POST['email'];
		$psw=$_POST['psw'];
		$contact=$_POST['contact'];
		$gender=$_POST['sex'];
		$sql="INSERT INTO studentdetails (std_name,course,email,psw,contact,gender) 
				VALUES ('$sname','$course','$email','$psw','$contact','$gender')";
		
		if(mysqli_query($con,$sql))
		{
			header('location: admin.php');
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>
<?php
		
	if(isset($_POST['submitmarks']))
		{
			$std_id=$_POST['sid'];
			$course=$_POST['course'];
			$ostp=$_POST['ostp'];
			$java=$_POST['java'];
			$ds=$_POST['ds'];
			$se=$_POST['se'];
			$adbms=$_POST['adbms'];
			$total=$ostp+$java+$ds+$se+$adbms;
			$percent=($total*100)/500;
			if($percent>=70)
			{
				$class="Distiction";
			}
			else if($percent>=60 && $percent<70)
			{
				$class="First class";
			}
			else if($percent>=50 && $percent<60)
			{-
				$class="Pass class";
			}else
			{
				$class="Fail";
			}
			
			if($percent>=50)
			{
				$result="Pass";
			}
			else
			{
				$result="Fail";
			}
			$chk = "SELECT * FROM studentresult WHERE std_id = $std_id";
			$p = mysqli_query($con,$chk);
			$k = mysqli_fetch_array($p);
			
			if($k[std_id] == null)
			{
				$mrk="INSERT INTO studentresult (std_id, course,ostp,java,ds,se,adbms,total,percentage,class,result) 
					VALUES('$std_id','$course','$ostp','$java','$ds','$se','$adbms','$total','$percent','$class','$result') ";

				if(mysqli_query($con,$mrk))
				{
				header("location: marks.php?n=null");
				}
				else
				{
				echo mysqli_error($con);
				}	
			}
			else
			{
				header("location: marks.php?n=false");
			}
		}
?>

<?php
	if($_REQUEST['delete'])
	{
		$id=$_REQUEST['delete'];
		$del="DELETE FROM studentdetails WHERE std_id=$id";
		if(mysqli_query($con,$del))
		{
			header('location: admin.php');
		}
		else{
			echo mysqli_error($con);
		}
	}
?>


<?php
	if($_REQUEST['del'])
	{
		$id=$_REQUEST['del'];
		$del="DELETE FROM studentresult WHERE std_id=$id";
		if(mysqli_query($con,$del))
		{
			header('location: marks.php?n=null');
		}
		else{
			echo mysqli_error($con);
		}
	}
?>