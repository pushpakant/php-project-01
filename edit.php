
<?php include("header.php") ?>
<?php include("variables.php") ?>
<?php 
	if(isset($_REQUEST['edit']))
	{
		$id=$_REQUEST['edit'];
		$fetch = "SELECT * FROM studentdetails WHERE std_id=$id";			
		$m=mysqli_query($con,$fetch);
		$d=mysqli_fetch_array($m);
	}
?>
<?php
if(isset($_POST['update']))
{
	function ti($data)
	{
		$data=trim($data);
		return $data;
	}
		$sname=$_SESSION["sname"]=ti($_POST['sname']);
		$fname=$_SESSION["fname"]=$_POST['fname'];
		$srname=$_SESSION["srname"]=$_POST['srname'];
		$sem=$_SESSION["sem"]=$_POST['sem'];
		$course=$_SESSION["course"]=$_POST['course'];
		$email=$_SESSION["email"]=$_POST['email'];
		$contact=$_SESSION["contact"]=$_POST['contact'];
		$gender=$_SESSION["sex"]=$_POST['sex'];
		if($_FILES['profilepic']['name']!=null) 
		{
			 $profilepic=$_SESSION["profilepic"]=$_FILES['profilepic']['name'];
		}
		else
		{
			$profilepic=$d['profilepic'];
		}
		$tpath=$_FILES['profilepic']['tmp_name'];
		$upload_path='image/'.$profilepic;
		move_uploaded_file($tpath,$upload_path);
		
		snamevalidation();
		fnamevalidation();
		lnamevalidation();
		semvalidation();
		coursevalidation();
		emailvalidation();
		contactvalidation();

		  	if($_SESSION['snameerr']=="" && $_SESSION['fnameerr']=="" && $_SESSION['srnameerr']=="" && $_SESSION['semerr']==""
			  && $_SESSION['courseerr']=="" && $_SESSION['emailerr']=="" &&
			  $_SESSION['contacterr']=="")
		  	{
				
					$update="UPDATE studentdetails 
					SET 
					std_name='$sname',
					father_name='$fname',
					surname='$srname',
					course='$course',
					email='$email',
					contact='$contact',
					gender='$gender',
					profilepic='$profilepic'
					WHERE std_id=$id";					
				if(mysqli_query($con,$update))
				{
				header('location: admin.php?c=edited&e=null');
				}
				else
				{
				echo mysqli_error($con);
				}
			}
			else
			{
				
				header('location: edit.php?c=false&edit='.$d['std_id']);
				}
}
?>

<center>
<form method="POST" action="edit.php?c=null&edit=<?php echo $d['std_id'] ?>" enctype="multipart/form-data"> 
	<div class="editform">
	<table border="1">	
		<thead>
			<tr>
				<th colspan="2">Update Form</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td> First Name</td>
					<td> <input type="text" name="sname" id="sname"  value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["sname"]; else echo $d['std_name']; ?>" placeholder="Enter Student Name"  >
					<br><span class="err"><?php echo $nameerror1; ?> </span></td>
				</tr>
				<tr>
					<td> Last name</td>
					<td> <input type="text" name="srname" id="srname"  value="<?php  if(($_REQUEST['c']=='false'))  echo $_SESSION["srname"]; else echo $d['surname'] ?>" placeholder="Enter Student Name"  >
					<br> <span class="err"><?php echo $nameerror3; ?> </span></td>	
				</tr>
				<tr>
					<td> Father's Name</td>
					<td> <input type="text" name="fname" id="fname"  value="<?php  if(($_REQUEST['c']=='false'))  echo $_SESSION["fname"]; else echo $d['father_name'] ?>" placeholder="Enter Student Name"  >
					<br><span class="err"><?php echo $nameerror2; ?> </span> </td>
				</tr>
				<tr>
						<td class="uinput"> Semester</td>
						<td>
							<select name="sem" id="sem">
								<option  value="1" <?php if( $d['sem']==1) echo 'selected="selected"';?>>1</option>
								<option  value="2" <?php if( $d['sem']==2) echo 'selected="selected"';?>>2</option>
								<option  value="3" <?php if( $d['sem']==3) echo 'selected="selected"';?>>3</option>
								<option  value="4" <?php if( $d['sem']==4) echo 'selected="selected"';?>>4</option>
							</select>
							<br><span class="err"><?php echo $semerr; ?> </span> 
						</td>
					</tr>
				<tr>
				<td> Course</td>
				<td><select name="course" id="course" >
						<option  value="MCA" <?php if( $d['course']=='MCA') echo 'selected="selected"';?>>MCA</option>
						<option  value="Msc(IT)" <?php if( $d['course']=='Msc(IT)') echo 'selected="selected"';?> >Msc(IT)</option>
						</select>
						<br><span class="err"><?php echo $courseerr; ?> </span>
				</td>
				</tr>
				<tr>
					<td> Email</td>
					<td> <input type="text" name="email" id="email" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["email"]; else echo $d['email'] ?>"  placeholder="Enter Student email"  >
					<br><span class="err"><?php echo $emailerr; ?> </span></td>
				</tr>
				<tr>
					<td> Contact</td>
					<td> <input type="text" name="contact" id="contact" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION['contact']; else echo $d['contact'] ?>" placeholder ="Enter Student mobile number"  >
					<br><span class="err"><?php echo $contacterr; ?> </span></td>
				</tr>
				<tr>
					<td> Gender</td>
					<td> <input type="radio" name="sex" id="sex" value="Male" <?php if($_SESSION["sex"]=='Male') echo 'checked'; else if ($d['gender']=='Male' && $_SESSION["sex"]=='') echo 'checked'; ?>>Male 
					&nbsp;&nbsp;&nbsp; <input type="radio" name="sex" id="sex" value="Female" <?php if($_SESSION["sex"]=='Female') echo 'checked'; else if ($d['gender']=='Female' && $_SESSION["sex"]=='' ) echo 'checked'; ?>>Female</td>
				</tr>
				<tr>
				<td><input type="file" name="profilepic" id="profilepic" title="<?php echo $d['profilepic'] ?>"></td>
				<td><img src='image/<?php echo $d['profilepic'] ?>' width=100px height=100px></td>
			</tr>
				<tr>
				<td colspan="2" align="center"><input type="submit" name="update" id="update" value="Update"></td>
				</tr>
			</tbody>
	</table>
	</div>
</form>



<?php include("footer.php") ?>