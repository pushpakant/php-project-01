<?php include("dbconnect.php") ?>
<?php
if(!isset($_SESSION['is_user_login']) || $_SESSION['is_user_login']== 0 )
{
    header('location:logout.php');
}
?>
<?php 
	$stdid=$_REQUEST['n'];
	$detail="SELECT * from studentdetails WHERE std_id=$stdid";
	$q=mysqli_query($con,$detail);
	$dis=mysqli_fetch_array($q);
?>

<html>
	<head>
		<title>Student-Home</title>
		<link href="style.css" rel='stylesheet'>
	</head>
	<body class="image">
		<nav>
		<ul>
			<li><a href="home.php?n=<?php echo $dis['std_id']?>" >Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
			<li><a href="stdhome.php?n=<?php echo $dis['std_id']?>" >Result</a></li>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
			<li><a href="changepsw.php?n=<?php echo $dis['std_id']?>&n1=null&c=null">Change password</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li><a href="logout.php" >Log out</a></li>
			<div class="profile">
				<li><img  src='image/<?php echo $dis['profilepic'] ?>' height=62 width=62></li>
				<li><a href="home.php?n=<?php echo  $dis['std_id'] ?>" class=" active"><?php echo  $dis['std_name']." ".$dis['surname'] ?></a></li>
			<div>
		</ul>
		</nav>
		<br><br><br><br><br><br>
