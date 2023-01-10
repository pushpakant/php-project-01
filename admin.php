<?php include("header.php") ; ?>
<?php include("variables.php"); ?>
<?php if($_REQUEST['c']=="true")
		{
		?>
			<script> alert("Registered Successfully")</script>
		

		<?php	
		}
		if($_REQUEST['e']=="false")
		{
		?>
			<script> alert("email is already exist")</script>
		<?php	
		}	
?>
<center>
<form method="POST" action="insert.php?c=null" enctype="multipart/form-data"> 
	<div class="regform">
	<table>	
		<thead>
			<tr>
				<th colspan="2">Student Regestration Form</th>
			</tr>
			</thead>
			<tbody>
					<tr>
						<td class="uinput"> First Name</td>
						<td> <input  type="text" name="sname" id="sname" value="<?php echo $_SESSION['sname'] ?>" placeholder="Enter student name" >*
						<br><span class="err"><?php echo $nameerror1; ?> </span> </td>
					</tr>
					<tr>
						<td class="uinput"> Last name</td>
						<td> <input type="text" name="srname" id="srname"  value="<?php echo $_SESSION['srname'] ?>" placeholder="Enter student's lastname" >
						<br> <span class="err"><?php echo $nameerror3; ?> </span> </td>
					</tr>
					<tr>
						<td class="uinput">  Father's Name</td>
						<td> <input type="text" name="fname" id="fname" value="<?php echo $_SESSION['fname'] ?>"  placeholder="Enter student's father's  name" >
						<br><span class="err"><?php echo $nameerror2; ?> </span> </td>
					</tr>
					<tr>
						<td class="uinput"> Course</td>
						<td>
							<select name="course" id="course">
								<option value=''>Select course</option>
								<option  value="MCA" <?php if(isset($_SESSION['course']) && $_SESSION['course']=='MCA') echo 'selected="selected"';?>>MCA</option>
								<option  value="Msc(IT)" <?php if(isset($_SESSION['course']) && $_SESSION['course']=="Msc(IT)") echo 'selected="selected"';?> >Msc(IT)</option>
							</select>
							<br><span class="err"><?php echo $courseerr; ?> </span>
						</td>
					</tr>
					<tr>
						<td class="uinput"> Semester</td>
						<td>
							<select name="sem" id="sem">
								<option value=''>Select Semester</option>
								<option  value="1" <?php if($_SESSION['semester']==1) echo 'selected="selected"';?>>1</option>
								<option  value="2" <?php if($_SESSION['semester']==2) echo 'selected="selected"';?>>2</option>
								<option  value="3" <?php if($_SESSION['semester']==3) echo 'selected="selected"';?>>3</option>
								<option  value="4" <?php if($_SESSION['semester']==4) echo 'selected="selected"';?>>4</option>
							</select>
							<br><span class="err"><?php echo $semerr; ?> </span> 
						</td>
					</tr>
					<tr>
					<td class="uinput"> Email</td>
					<td> <input type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Enter Student email" />
					<br><span class="err"><?php echo $emailerr; ?> </span> </td>
				</tr>
				<tr>
					<td class="uinput"> Password</td>
					<td> <input type="password" name="psw" id="psw" value="<?php echo $_SESSION['psw'] ?>" placeholder="Enter Password" >
					<br><span class="err"><?php echo $pswerr; ?> </span>
					</td>
				</tr>
				<tr>
					<td class="uinput"> Confirm Password</td>
					<td> <input type="password" name="cpsw" id="cpsw" value="<?php echo $_SESSION['cpsw'] ?>" placeholder="confirm Password" >
					<br><span class="err"><?php echo $cpswerr; ?> </span></td>
				</tr>
				<tr>
					<td class="uinput"> Contact</td>
					<td> <input type="text" name="contact" id="contact" value="<?php echo $_SESSION['contact'] ?>" placeholder ="Enter Student mobile number" >
					<br><span class="err"><?php echo $contacterr; ?> </span></td>
				</tr>
				<tr>
					<td class="uinput"> Gender</td>
					<td > <input type="radio" name="sex" id="sex" value="Male" checked>  Male  <input type="radio" name="sex" id="sex" value="Female">Female</td>
				</tr>
				<tr>
					<td class="uinput">Profile Picture</td>
					<td ><div class="uploadpic"><input type="file" name="profilepic" id="profilepic"  ></div>
					<span class="err"><?php echo $profilepicerr; ?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td><?php if($_SESSION['profilepic']!="") { ?> <img src="image/<?php echo $_SESSION['profilepic'] ?>" style="margin :10px"height=100px width=100px> <?php } ?></td>
				</tr>
				<tr>
				<td colspan="2" align="center" ><input type="submit" name="submit" id="submit" value="Register" onclick="return check()"></td>
				</tr>
			</tbody>
	</table>
	</div>
</form>
<div id=0>
<br>
	<div class="stdetails">
	<table border="1">
		<thead>
			<tr >
			<th colspan=11 style="background-color:#068a9c ;color:blanchedalmond">Regestered Students</th>
			</tr>	
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Course</th>
				<th>Semester</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Gender</th>
				<th>profilepic</th>
				<th>status</th>
				<th colspan=2>Action</th>
			</tr>
		</thead>
		<?php
			$fetch = "SELECT std_id,std_name,father_name,surname,course,email,contact,gender,sem,profilepic,std_status FROM studentdetails";			
			$m=mysqli_query($con,$fetch);
			while($d=mysqli_fetch_array($m))
			{
			?>
				<tbody>
				<tr>
					<td id=<?php echo $d['std_id'] ?>><?php echo $d['std_id'] ?> </td>
					<td><?php echo $d['std_name']." ".$d['father_name']." ".$d['surname'] ?> </td>
					<td><?php echo $d['course'] ?> </td>
					<td><?php echo $d['sem'] ?> </td>
					<td><?php echo $d['email'] ?> </td>
					<td><?php echo $d['contact'] ?> </td>
					<td><?php echo $d['gender'] ?> </td>
					<td><img src='image/<?php echo $d['profilepic'] ?>' height=100 width=100></td>
					<?php
						if($d['std_status']=='Active')
						{
					?>
						<td style="color:green"><b><?php echo $d['std_status'] ?></b> </td>
					<?php
						}
						else
						{
					?>
						<td style="color:red"><b><?php echo $d['std_status'] ?></b> </td>
						<?php
						}
					?>
						<td>
						<form method='post' action="edit.php?c=null&edit=<?php echo $d['std_id'] ?> ">
							<input class='btn' type='submit' value='Edit'>
						</form>	
						
					<?php
						if($d['std_status']=='Active')
						{
					?>
						<td>
						<form method='post' id="statuschange" action="insert.php?status=<?php echo $d['std_id'] ?> ">
							<input class='btn2' type='submit' value='Deactivate'>
						</form>
						</td>		
					<?php
						}
						else
						{
					?>
						<td>
						<form method='post' id="statuschange" action="insert.php?status=<?php echo $d['std_id'] ?> ">
							<input class='btn1' type='submit' value='Activate'>
						</form>
						</td>
					<?php
						}
					?>					
				</tr>
				</tbody>
			<?php
			}
		?>
	</table>
	</div>
</center>
<?php include("footer.php") ?>