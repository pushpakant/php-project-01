<?php include("dbconnect.php") ?>
<?php include("header.php") ?>
<?php 
	if($_REQUEST['edit'])
	{
		$id=$_REQUEST['edit'];
		$fetch = "SELECT std_id, std_name,father_name,surname,course, email, contact, gender,profilepic FROM studentdetails WHERE std_id=$id";			
		$m=mysqli_query($con,$fetch);
		$d=mysqli_fetch_array($m);
	}
?>

<center>
<form method="POST" action="edit.php?edit=<?php echo $d['std_id'] ?>&x=<?php echo  $dis['id'] ?>" enctype="multipart/form-data"> 
	<div class="editform">
	<table border="1">	
		<thead>
			<tr>
				<th colspan="2">Update Form</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td> Student Name</td>
					<td> <input type="text" name="sname" id="sname"  value="<?php echo $d['std_name'] ?>" placeholder="Enter Student Name" required></td>
				</tr>
				<tr>
					<td> Father's Name</td>
					<td> <input type="text" name="fname" id="fname"  value="<?php echo $d['father_name'] ?>" placeholder="Enter Student Name" required></td>
				</tr>
				<tr>
					<td> Surname</td>
					<td> <input type="text" name="srname" id="srname"  value="<?php echo $d['surname'] ?>" placeholder="Enter Student Name" required></td>
				</tr>
				<?php
				if($d['course']=='MCA')
				{
			?>
				<tr>
				<td> Course</td>
				<td><select name="course" id="course" >
						
						<option  value="MCA">MCA</option>
						<option  value="Msc(IT)">Msc(IT)</option>
						</select>
				</td>
				</tr>
				<?php
				}else {
				?>
				<tr>
				<td> Course</td>
				<td><select name="course" id="course" >
						<option  value="Msc(IT)">Msc(IT)</option>
						<option  value="MCA">MCA</option>
						</select>
				</td>
				</tr>
				<?php
				}
				?>
				
				<tr>
					<td> Email</td>
					<td> <input type="email" name="email" id="email" value="<?php echo $d['email'] ?>"  placeholder="Enter Student email" required></td>
				</tr>
				<tr>
					<td> Contact</td>
					<td> <input type="text" name="contact" id="contact" value="<?php echo $d['contact'] ?>" placeholder ="Enter Student mobile number" required></td>
				</tr>
				<?php 
				if($d['gender']=='Male')
				{
					?>
				<tr>
					<td> Gender</td>
					<td> <input type="radio" name="sex" id="sex" value="Male" checked>Male &nbsp;&nbsp;&nbsp; <input type="radio" name="sex" id="sex" value="Female">Female</td>
				</tr>
				<?php
				}else
				{
				?>
				<tr>
					<td> Gender</td>
					<td> <input type="radio" name="sex" id="sex" value="Male" >Male &nbsp;&nbsp;&nbsp; <input type="radio" name="sex" id="sex" value="Female" checked>Female</td>
				</tr>
				<?php
				}
				?>
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

<?php
if(isset($_POST['update']))
{
	
	$sname=$_POST['sname'];
	$fname=$_POST['fname'];
	$srname=$_POST['srname'];
	$course=$_POST['course'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$gender=$_POST['sex'];
	$profilepic=$_FILES['profilepic']['name'];
		$tpath=$_FILES['profilepic']['tmp_name'];
		$upload_path='image/'.$profilepic;
		move_uploaded_file($tpath,$upload_path);
		if($profilepic==null)
		{
	$update="UPDATE studentdetails 
			SET 
			std_name='$sname',
			father_name='$fname',
			surname='$srname',
			course='$course',
			email='$email',
			contact='$contact',
			gender='$gender'
			WHERE std_id=$id";
		}
		else
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
		}	
	if(mysqli_query($con,$update))
	{
		header('location: admin.php?c=edited&e=null&x='.$dis['id']);
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>


<?php include("footer.php") ?>