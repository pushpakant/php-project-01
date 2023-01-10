<!DOCTYPE html>
<?php include("dbconnect.php") ?>
<html>
<head>
	<title>Student-Log in</title>
	<link href="style.css" type="text/css" rel='stylesheet'>
</head>
<body class="image">
<nav align="right" >
	<ul>
		<li> <a href="index.php"> Admin-Login</a></li>
	</ul>
</nav>
	<br>	
<div align="right"></div>
<center>
		<form method='POST' action='' onsubmit='return checkcredintial()' >
		<div class="login">
			<table>
				<thead>
					<tr>
						<th colspan = 2>Student Login</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Email</td>
						<td><input type = "text" name='email' id='email' placeholder='Enter your Email' required></td>
					</tr>
					<tr>
						<label><td> Password</td>
						<td><input type = "password" name='upsw' id='upsw' placeholder='Enter your password' required></td></label>
					</tr>
					<tr>
						<td>
						</td>
						<td>
							<input type="checkbox" onclick="showpsw()" >Show Password
						</td>
					</tr>
					<tr>
						<td colspan=2 align='center'><input type="submit" name="login" id="login" value='Log In'  ></td>
					</tr>
				</tbody>
			</table>
			</div>
		</form>
</center>
</body>
</html>


<script>
	var p = document.getElementById("upsw");
	function showpsw()
	{
		if(p.type=="password")
		{
			p.type= "text";
		}
		else
		{
			p.type= "password";
		}
	}
</script>

<?php
	if(isset($_POST['login']))
	{
		$email=$_POST['email'];
		$psw=$_POST['upsw'];
		$fetch = "SELECT std_id, email, psw FROM studentdetails WHERE email='$email' and psw='$psw'";			
		$m=mysqli_query($con,$fetch);
		$d=mysqli_fetch_array($m);
		if($d==false)
			{
			?>
				<script> alert("user id or password is incorrect"); </script>
			<?php
				exit;
			}
		else
			{
				header("location: home.php?n=" .$d['std_id']);
			}
	}
	
?>






