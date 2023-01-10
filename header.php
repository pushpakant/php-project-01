<?php include("dbconnect.php");
if(!isset($_SESSION['is_user_login']) || $_SESSION['is_user_login']== 0 )
{
    header('location:logout.php');
}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin-dashboard</title>
		<link href="style.css" type="text/css" rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/font-awesome.min.css">
	</head>
	<body class="image">
		<nav>
			<ul class="navbar-nav">
				<li class="nav-item"><a class="active" href="admin.php?c=null&e=null"  >Student Registration</a></li>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item"><a href="marks.php?c=null&n=null" >Enter marks</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item"><a href="search.php?n=null&n1=null&s=null" >Search</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li class="nav-item"><a href="logout.php" >Log out</a></li>
				<li class="nav-item" style="float:right"><a class="active" href="admin.php?c=null&e=null&n=null" ><?php echo  $_COOKIE['user'] ?></a></li>
			<ul>
		</nav>
		<br><br><br><br><br><br>
		 