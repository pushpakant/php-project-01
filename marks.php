<?php include("header.php"); ?>
<?php include("variables.php"); ?>
<?php
	if(isset($_REQUEST['n']))
	{
	$id=$_REQUEST['n'];
	$fetch = "SELECT std_id,std_name,course,email,contact,gender,sem FROM studentdetails WHERE std_id=$id";			
	$m=mysqli_query($con,$fetch);
	$d1=mysqli_fetch_array($m);
		if($d1==false)
		{
			$s=1;
		}
		else 
		{
			$s=$d1['sem'];
		}
	}
?>
<center>
	<form method="POST" action="insert.php?c=null" enctype="multipart/form-data">
		<div class="marks">
		<table>
			<thead>
				<tr>
					<th colspan="2"> Enter Marks of students </th>
				</tr>
			</thead>
		
			<tbody>	
				<tr>		
					<td>Semester</td>
					<td>
						<select name="sem" onchange="location = this.value;" >
						<?php 
							if(($_REQUEST['n']=='null' || $_REQUEST['n']=='false')  && $_SESSION['semester']=='') 
							{ 
						?> 
								<option value=''> Select Semester </option>
						<?php 
								$fetch = "SELECT std_id,std_name,course,email,contact,gender,sem FROM studentdetails group by sem";			
								$m=mysqli_query($con,$fetch);
								while($d=mysqli_fetch_array($m))
								{
						?>
									<option value= "marks.php?c=null&n=<?php echo $d['std_id'] ?>"><?php echo $d['sem'] ?></option>
						<?php	
								}
							}
							else
							{ 
						?>
								<option> <?php echo $d1['sem'] ?> </option>
						<?php
							}
						$fetch = "SELECT std_id,std_name,course,email,contact,gender,sem FROM studentdetails where std_id != $id group by sem ";			
						$m=mysqli_query($con,$fetch);
						while($d=mysqli_fetch_array($m))
						{
						?>
							<option value= "marks.php?c=null&n=<?php echo $d['std_id'] ?>  " ><?php echo $d['sem'] ?></option>
						<?php
							
						}
						?>
						
						</select>
						<br><span class="err"><?php echo $semerr; ?> </span> 
						</td>
				</tr>
				<?php ?>
				<tr>
					<input type="hidden" name="sid" value="<?php if($_REQUEST['n']=='null' || $_REQUEST['n']=='false') echo 'null'; else echo $d1['std_id'] ?>"/>
					<td>Student name</td>
					<td>
						<select name="sname" onchange="location = this.value;" >
						<?php 
							if(($_REQUEST['n']=='null' || $_REQUEST['n']=='false') ) 
							{ 
						?> 
								<option value=''> Select Student name </option>
						<?php 
								$fetch = "SELECT std_id,std_name,course,email,contact,gender,sem FROM studentdetails ";			
								$m=mysqli_query($con,$fetch);
								while($d=mysqli_fetch_array($m))
								{
						?>
									<option value= "marks.php?c=null&n=<?php echo $d['std_id'] ?>  " ><?php echo $d['std_name'] ?></option>
						<?php	
								}
							}
							else
							{ 
						?>
								<option> <?php echo $d1['std_name'] ?> </option>
						<?php
							}
						$fetch = "SELECT std_id,std_name,course,email,contact,gender FROM studentdetails where std_id != $id and sem=$s";			
						$m=mysqli_query($con,$fetch);
						while($d=mysqli_fetch_array($m))
						{
						?>
							<option value= "marks.php?c=null&n=<?php echo $d['std_id'] ?>  " ><?php echo $d['std_name'] ?></option>
						<?php
							
						}
						?>
						
						</select>
						<br><span class="err"><?php echo $nameerror1; ?> </span> 
						</td>
				</tr>
				<tr>
					<td>Course</td>
					<td><input type="text" name="course" value="<?php echo $d1['course'] ?>" disabled /></td>
				</tr>
				<tr>
					<td>
						OSTP(PHP)
					</td>
					<td>
						<input type="number" name="ostp" id="ostp" value="<?php echo $_SESSION['ostp'] ?>"  />
						<br><span class="err"><?php echo $ostperr; ?> </span> 
					</td>
				</tr>
				<tr>
					<td>
						Java
					</td>
					<td>
						<input type="number" name="java" id="java" value="<?php echo $_SESSION['java'] ?>"  />
						<br><span class="err"><?php echo $javaerr; ?> </span> 
					</td>
				</tr>
				<tr>
					<td>
						Data Structure
					</td>
					<td>
						<input type="number" name="ds" id="ds"  value="<?php echo $_SESSION['ds'] ?>" />
						<br><span class="err"><?php echo $dserr; ?> </span> 
					</td>
				</tr>
				<tr>
					<td>
						Software Engineering
					</td>
					<td>
						<input type="number" name="se" id="se" value="<?php echo $_SESSION['se'] ?>"  />
						<br><span class="err"><?php echo $seerr; ?> </span> 
					</td>
				</tr>
				<tr>
					<td>
						ADBMS
					</td>
					<td>
						<input type="number" name="adbms" id="adbms"  value="<?php echo $_SESSION['adbms'] ?>" />
						<br><span class="err"><?php echo $adbmserr; ?> </span> 
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submitmarks" id="submitmarks" value="Submit" onclick="return checkmark()" /></td>
				</tr>
			</tbody>
		</table>
		</div>
	</form>
</center>
<?php 
 if($_REQUEST['n'] == "false")
 { ?>
	 <script> alert("Marks already Entered")</script>
	<?php	
 } else if($_REQUEST['n'] == "true")
 { ?>
	 <script> alert("Marks Entered Successfully")</script>
	<?php	
 }
 ?>
 <center>
	<div class="displaymarks">
		<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Course</th>
				<th>Semester</th>
				<th>OSTP</th>
				<th>JAVA</th>
				<th>DS</th>
				<th>SE</th>
				<th>ADBMS</th>
				<th colspan="2">ACTION</th>
			</tr>
		</thead>

		<?php
			$fetch = "SELECT r.sr_no,s.std_id,s.std_name,s.course,s.sem,r.ostp,r.java,r.ds,r.se,r.adbms FROM studentdetails s INNER JOIN studentresult r ON s.std_id = r.std_id ";			
			$m=mysqli_query($con,$fetch);
			while($d=mysqli_fetch_array($m))
			{
			?>
				<tbody>
				<tr>
					<td><?php echo $d['std_id'] ?> </td>
					<td><?php echo $d['std_name'] ?> </td>
					<td><?php echo $d['course'] ?> </td>
					<td><?php echo $d['sem'] ?> </td>
					<td><?php echo $d['ostp'] ?> </td>
					<td><?php echo $d['java'] ?> </td>
					<td><?php echo $d['ds'] ?> </td>
					<td><?php echo $d['se'] ?> </td>
					<td><?php echo $d['adbms'] ?> </td>
					<td><a href="editresult.php?c=null&edit=<?php echo $d['sr_no'] ?>  ">Edit</a></td>
					<td><a href="insert.php?del=<?php echo $d['std_id'] ?>  ">Delete</a></td>
				</tr>
				</tbody>
			<?php
			}
		?>
	</table>
	</div>
</center>
<?php include("footer.php") ?>