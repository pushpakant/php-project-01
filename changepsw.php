<?php include("stdheader.php") ?>
<?php include("variables.php") ?>
<?php
	if(isset($_POST['submit']))
	{
		function ti($data)
			{
				$data=trim($data);
				return $data;
			}
		$dbpsw = $_SESSION['dbpsw']=$dis['psw'];
		$opsw=$_SESSION['opsw']=ti($_POST['opsw']);
		$psw=$_SESSION['psw']=ti($_POST['psw']);
		$cpsw=$_SESSION['cpsw']=ti($_POST['cpsw']);
		
		opswvalidation();
		pswvalidation();
		cpswvalidation();
	
	
		if($_SESSION['pswerr']=="" && $_SESSION['cpswerr']=="" && $_SESSION['opswerr']=="")
		{
			$updatep="UPDATE studentdetails SET psw='$psw' where std_id=$stdid";
			if(mysqli_query($con,$updatep))
			{
				header("location: changepsw.php?n=".$dis['std_id']."&n1=true&c=true");
			}
			else
			{
			mysqli_error($con);
			}
		}else
		{
			header("location: changepsw.php?n=".$dis['std_id']."&n1=true&c=false");
		}
	}
?>
<center>
	<form method="POST" action="changepsw.php?c=null&n=<?php echo $dis['std_id'] ?>&n1=null" >
		<div class="changepsd">
		<table>
			<thead>
				<tr>
					<th colspan=2>Change Password</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="opsw" id="opsw" />
					<br><span class="err"><?php echo $opswerr; ?> </span></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="psw" id="npsw" />
					<br><span class="err"><?php echo $pswerr; ?> </span></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cpsw" id="cpsw" />
					<br><span class="err"><?php echo $cpswerr; ?> </span></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<input type="submit" name="submit" id="submit" value="submit" />
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</form>
</center>

<?php 
	if(isset($_REQUEST['c']) && $_REQUEST['c']=='true')
	{ ?> 
	<script> alert("Password Changed Successfully"); </script>
<?php
	}
?>
	
<?php include("footer.php"); ?>