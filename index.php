<?php include("dbconnect.php") ?>
<?php include("variables.php") ?>
<?php

		if(isset($_POST['login']))
		{
			$n=$_POST['user_type'];
			$uname=$_POST['uname'];
			$psw=$_POST['psw'];
			if($n=='admin')
			{
				$fetch = "SELECT id,user_id,password FROM admin WHERE user_id='$uname' and password='$psw'"; 		
				$m=mysqli_query($con,$fetch);
				$d=mysqli_fetch_array($m);
				if($d==false)
				{
					$pswerr="User name or password is incorrect";
				}
				else
				{
					$cookie_name = "user";
					$cookie_value = $uname;
					$_SESSION['is_user_login']=1;
					$_SESSION['user_id']=$d['id'];
					$_SESSION['user_name']=$d['user_id'];
					setcookie($cookie_name,$cookie_value,time()+(86400 * 30));
					header('location: admin.php?c=null&e=null&n=null&x='.$d1['id']);
				}
			}
			else
			{
				$fetch = "SELECT std_id, email, psw FROM studentdetails WHERE email='$uname' and psw='$psw'";
				$m=mysqli_query($con,$fetch);
				$d=mysqli_fetch_array($m);
				if($d==false)
				{
					$pswerr="User name or password is incorrect";
				}
				else
				{
					$cookie_name = "user";
					$cookie_value = $uname;
					$_SESSION['is_user_login']=1;
					$_SESSION['user_id']=$d['std_id'];
					$_SESSION['user_name']=$d['email'];
					setcookie($cookie_name,$cookie_value,);
					header("location: home.php?n=" .$d['std_id']);
				}
			}
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link href="style.css" type="text/css" rel='stylesheet'>
</head>
<body class="image">
<nav>
	<ul>
		<li> <a href="index.php" > Parul University</a></li>
	</ul>
</nav>
	<br>	
	<center>		
		<form method='POST' action='' >
		<div class="login">
			
			<table align="center">
				<thead>
					<tr>
						<th colspan = 2>Login<br><span class="err"><?php echo $pswerr; ?> </span></th>
					</tr>
				</thead>
				<td colspan=2 align="center">
				<span align="center">
				<select name='user_type' id='user_type'>
					<option value='admin'  >Admin</option>
					<option value='student' <?php if(isset($_POST['login']) && $n=='student') echo 'selected="selected"'; ?>>Student</option>"
				</select>
			
			</td>
				<tbody>
					<tr>
						<td>User Name</td>
						<td><input type = "text" name='uname' id='uname' value="<?php if(isset($_POST['login'])) echo $uname ?>"  placeholder='Enter your user name' ></td>
					</tr>
					<tr>
						<td></td>
						<td><span id="usermsg" style="color:red"><span></td>
					</tr>
					<tr>
						<label><td> Password</td>
						<td><input type = "password" name='psw' id='psw' placeholder='Enter your password' ></td>
						</label>
					<tr>
						<td></td>
						<td><span id="pswmsg" style="color:red"><span></td>
					</tr>
					</tr>
					<tr>
						<td>
						</td>
						<td>
							<input type="checkbox" onclick="showpsw()" >Show Password
						</td>
					</tr>
					<tr>
						<td colspan=2 align='center'><input type="submit" name="login" id="login" value='Log In' ></td>
				</tbody>
			</table>
			</div>
		</form>
	</center>
</body>
</html>
<script>
	var p = document.getElementById("psw");
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