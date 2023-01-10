
<?php 
	if(isset($_POST['Create'])) {
		$cookieName = $_POST['cName'];
		$cookieValue = $_POST['cValue'];
		setcookie($cookieName, $cookieValue, time() + 3600);
	} else {
		echo "Something went wrong";
	}
?>

<?php 
		$cName = $_POST['cName'];
		if(!isset($_COOKIE[$cName])){
			echo "No cookie found";
		} else {
			echo $_COOKIE[$cName];
		}	
	
?>

<?php
	if(isset($_POST["delete"])) {
		$cName = $_POST['cName'];
		if(!isset($_COOKIE[$cName])){
			echo "No cookie found";
		} else {
			setcookie($cName);
			echo "Cookie deleted successfully";
		}	
	} else {
		echo "Something went wrong";
	}	
?>