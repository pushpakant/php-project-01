<?php
if(isset($_REQUEST['n']) && $_REQUEST['n']!='MCA' && $_REQUEST['n']!='Msc(IT)')
{
    $id=$_REQUEST['n'];
}
							$f1 = "SELECT s.std_id,s.std_name,s.course,s.email,s.contact,s.gender,
									r.ostp,r.java,r.ds,r.se,r.adbms,r.total,r.percentage,r.class,r.result
									FROM   studentdetails s
									INNER JOIN studentresult r 
									ON s.std_id=r.std_id
									WHERE s.std_id=$id"; 
									$m=mysqli_query($con,$f1);
									$d1=mysqli_fetch_array($m);
						?>
			<br/><br/><br/>

<?php if($d1==false)
		{
	?>
<center>
	<h1 style="color:red; background:black">Result is not uploaded</h1>
</center>
	<?php
	}
	else
	{
	?>
<center>
	<div class="displayresult">
		<table border="1">
			<thead>
				<tr>
					<th colspan=2> <?php echo $d1['std_name'] ?> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Course</td>
					<td><input  type="text" disabled value="<?php echo $d1['course'] ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" disabled value="<?php echo $d1['email'] ?>"></td>
				</tr>
							<tr>
					<td>Contact</td>
					<td><input type="text" disabled  value="<?php echo $d1['contact'] ?>" /></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><input type="text" disabled  value="<?php echo $d1['gender'] ?>" /></td>
				</tr>
				<tr>
					<td>
						OSTP(PHP)
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['ostp'] ?>"   />
					</td>
				</tr>
				<tr>
					<td>
						Java
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['java'] ?>" />
					</td>
				</tr>
				<tr>
					<td>
						Data Structure
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['ds'] ?>" />
					</td>
				</tr>
				<tr>
					<td>
						Software Engineering
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['se'] ?>" />
					</td>
				</tr>
				<tr>
					<td>
						ADBMS
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['adbms'] ?>" />
					</td>
				</tr>
					<tr>
					<td>
						Total
					</td>
					<td>
						<input type="number" disabled  value="<?php echo $d1['total'] ?>" />
					</td>
				</tr>
					<tr>
					<td>
						Percentage
					</td>
					<td>
						<input type="text" disabled  value="<?php echo $d1['percentage'] . '%' ?>" />
					</td>
				</tr>
					<tr>
					<td>
						Class
					</td>
					<td>
						<input type="text" disabled  value="<?php echo $d1['class'] ?>" />
					</td>
				</tr>
					<tr>
					<td>
						Result
					</td>
					<td>
						<input type="text" disabled  value="<?php echo $d1['result'] ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
		}
	?>
</center>
