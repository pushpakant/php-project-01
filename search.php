<?php include('header.php') ?>
<?php include("variables.php"); ?>
<?php 
	if(isset($_REQUEST['n1']) && isset($_REQUEST['n']) && isset($_REQUEST['s']))
	{
		$id=$_REQUEST['n1'];
		$course=$_REQUEST['n'];
		$sem=$_REQUEST['s'];
	}
?>
<center>
	<form method="POST" action="">
		<div class="srh">
			<table>
				<thead>
					<tr>
						<th colspan=2>Serch Student Information</th>
					</tr>
				</thead>
				<tbody>
			
					<tr>
						<td>Course</td>
						<td>
							<select onchange="location = this.value;" >
							<?php 
								if($_REQUEST['n']=='null') 
								{ 
							?>
									<option value='0'> Select Course </option>
							<?php
										$fetch = "SELECT distinct course FROM studentdetails";			
										$m=mysqli_query($con,$fetch);
										while($d=mysqli_fetch_array($m))
										{
							?>
											<option value= "search.php?n=<?php echo $d['course'] ?>&s=null&n1=null"><?php echo $d['course'] ?>  </option>
							<?php
										}
								}else 
								{ 
							?>
											<option value="search.php?n=<?php echo $course ?>&s=null&n1=null"> <?php echo $_REQUEST['n'] ?> </option>
							<?php
											$fetch = "SELECT distinct course FROM studentdetails where course != '$course' ";			
											$m=mysqli_query($con,$fetch);
											while($d=mysqli_fetch_array($m))
											{
							?>
											<option value= "search.php?n=<?php echo $d['course'] ?>&s=null&n1=null"><?php echo $d['course'] ?>  </option>
							<?php
											}
								}
							?>
							</select>
						</td>
					</tr>			
					<tr>		
						<td>Semester</td>
						<td>
							<select onchange="location = this.value;" >
						<?php 
								if($sem=='null' ) 
								{ 
						?> 
									<option> Select Semester </option>
						<?php 
									$fetch = "SELECT DISTINCT sem FROM studentdetails";			
									$m=mysqli_query($con,$fetch);
									while($d=mysqli_fetch_array($m))
									{
						?>
									<option value= "search.php?n=<?php echo $course ?>&s=<?php echo $d['sem'] ?>&n1=null" ><?php echo $d['sem'] ?></option>
						<?php	
									}
								}
								else
								{ 
						?>
									<option value="search.php?n=<?php echo $course ?>&s=<?php echo $sem ?>&n1=null"> <?php echo $sem ?> </option>
						<?php
									$fetch = "SELECT DISTINCT sem FROM studentdetails where sem != $sem";			
									$m=mysqli_query($con,$fetch);
									while($d=mysqli_fetch_array($m))
									{
						?>
									<option value="search.php?n=<?php echo $course ?>&s=<?php echo $d['sem'] ?>&n1=null" ><?php echo $d['sem'] ?></option>
						<?php	
									}
								}
						?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Student name</td>
						<td>
							<select  onchange="location = this.value;" >
						<?php 
							if($id=='null')
							{
						?>
								<option value='0'> Select Student name </option>
						<?php									
									$fet = "SELECT std_id,std_name FROM studentdetails WHERE course='$course' and sem='$sem'";			
									$f=mysqli_query($con,$fet);										
									while($d=mysqli_fetch_array($f))
								{
						?>
									<option value= "search.php?n=<?php echo $course ?>&s=<?php echo $sem ?>&n1=<?php echo $d['std_id'] ?>"><?php echo $d['std_name'] ?></option>
						<?php 
								}
							}else
							{
								$fet = "SELECT std_id,std_name,course FROM studentdetails WHERE course='$course' and sem='$sem' and std_id != $id";
								$feth = "SELECT std_name FROM studentdetails WHERE course='$course' and sem='$sem' and std_id = $id";
								$f1=mysqli_query($con,$feth);
								$fa=mysqli_query($con,$fet);
								$dd=mysqli_fetch_array($f1);
						?>
									<option value= "search.php?n=<?php echo $course ?>&s=<?php echo $sem ?>&n1=<?php echo $id ?>" ><?php echo $dd['std_name'] ?> </option>
						<?php
								while($da=mysqli_fetch_array($fa))
								{								
						?>
								<option value= "search.php?n=<?php echo $course ?>&s=<?php echo $sem ?>&n1=<?php echo $da['std_id'] ?>"><?php echo $da['std_name'] ?>  </option>
						<?php 
								}
							}
						?>	
							</select>
						</td>
					</tr>
					<tr>
						<td colspan=2 align="center">
							<input type="submit" name="search" value="Search" onclick=" return check()"  />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
</center>

			
	<script>
		var a= document.getElementById("course");
		var b= document.getElementById("sname");
		function check()
		{
			if(a.value=='select course')
			{
				alert('Course is not selected');
				return false;
			}
			else if(b.value=='select name')
			{
				alert('Name is not selected');
				return false;
			}
			else
			{
			return true;
			}
		}
	</script>
	<?php
	if(isset($_POST['search']))
	{
		 include('result.php');
	} ?>
<?php include('footer.php') ?>