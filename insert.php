<?php include("header.php") ?>
<?php include("variables.php") ?>
<?php		
	if(isset($_POST['submit']))
	{
			function ti($data)
			{
				$data=trim($data);
				return $data;
			}
			$sname=$_SESSION["sname"]=ti($_POST['sname']);
			$fname=$_SESSION["fname"]=ti($_POST['fname']);
			$srname=$_SESSION["srname"]=ti($_POST['srname']);
			$course=$_SESSION['course']=ti($_POST['course']);
			$sem=$_SESSION["semester"]=ti($_POST['sem']);
			$email=$_SESSION["email"]=ti($_POST['email']);
			$psw=$_SESSION['psw']=ti($_POST['psw']);
			$cpsw=$_SESSION['cpsw']=ti($_POST['cpsw']);
			$contact=$_SESSION['contact']=ti($_POST['contact']);
			$gender=$_SESSION['gender']=ti($_POST['sex']);

			if($_SESSION['profilepic']!="") { $profilepic=$_SESSION['profilepic']; } 
			else { $profilepic=$_SESSION['profilepic']=$_FILES['profilepic']['name']; } 
			
			$tpath=$_FILES['profilepic']['tmp_name'];
			$upload_path='image/'.$profilepic;
			move_uploaded_file($tpath,$upload_path);
			
			snamevalidation();
		//	fnamevalidation();
			lnamevalidation();
			semvalidation();
			coursevalidation();
			emailvalidation();
			pswvalidation();
			cpswvalidation();
			contactvalidation();
			profilepicvalidation();

			if($_SESSION['snameerr']==""  && $_SESSION['srnameerr']=="" && $_SESSION['semerr']==""
				&& $_SESSION['courseerr']=="" && $_SESSION['emailerr']=="" && $_SESSION['pswerr']=="" && $_SESSION['cpswerr']=="" 
				&& $_SESSION['contacterr']=="" && $_SESSION['profilepicerr']=="" )
			{		
					$ftch="SELECT email from studentdetails WHERE email='$email'";
					$e=mysqli_query($con,$ftch);
					$ee=mysqli_fetch_array($e);
					if($ee==true)
					{
						header('location: admin.php?c=null&e=false');
					}
					else 
					{

						$sql="INSERT INTO studentdetails (std_name,father_name,surname,course,email,psw,contact,gender,sem,profilepic,std_status) 
						VALUES ('$sname','$fname','$srname','$course','$email','$psw','$contact','$gender','$sem','$profilepic','Active')";
						if(mysqli_query($con,$sql))	
						{
							
							mailer(); 
						
							header('location:admin.php?c=true&e=null');
						}
						else
						{
							echo mysqli_error($con);
						}
					}	
			}
			else
			{
				header('location: admin.php?c=false&e=null');
			}		
	}
?>
<?php

	if(isset($_POST['submitmarks']))
		{
			$sname=$_SESSION["sname"]=$_POST['sname'];
			$sem=$_SESSION["semester"]=$_POST['sem'];
			$std_id=$_POST['sid'];
			$ostp=$_SESSION["ostp"]=$_POST['ostp'];
			$java=$_SESSION["java"]=$_POST['java'];
			$ds=$_SESSION["ds"]=$_POST['ds'];
			$se=$_SESSION["se"]=$_POST['se'];
			$adbms=$_SESSION["adbms"]=$_POST['adbms'];
			snamevalidation();
			semvalidation();
			ostpmarkvalidation();
			javamarkvalidation();
			dsmarkvalidation();
			semarkvalidation();
			adbmsmarkvalidation();

			if($_SESSION['adbmserr']=="" && $_SESSION['ostperr']=="" && $_SESSION['javaerr']=="" &&
				$_SESSION['dserr']=="" && $_SESSION['seerr']=="" && $_SESSION['snameerr']=="" && $_SESSION['semerr']=="") 
			{
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
				}
				else
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
					header('location: marks.php?c=null&n=true');
					}
					else
					{
					echo mysqli_error($con);
					}	
				}
				else
				{
					header('location: marks.php?c=null&n=false');
				}
			}
			else
			{
				header("location: marks.php?c=false&n=".$std_id);
			}	
		}
?>

<?php
	if(isset($_REQUEST['status']))
	{
		$id=$_REQUEST['status'];
		$location=$id-1;
		$fetch = "SELECT std_id,std_name,course,email,contact,gender,sem,profilepic,std_status FROM studentdetails where std_id=$id";			
		$m=mysqli_query($con,$fetch);
		$d=mysqli_fetch_array($m);
		if($d['std_status']=='Active')
		{
			$del="UPDATE studentdetails SET std_status='Deactive' WHERE std_id=$id";
		}
		else
		{
			$del="UPDATE studentdetails SET std_status='Active' WHERE std_id=$id";
		}
			if(mysqli_query($con,$del))
			{
				header('location: admin.php?c=null&e=null#'.$location);
			}
			else
			{
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