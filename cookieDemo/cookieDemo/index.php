
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cookie Demo</title>
</head>
<body>
	<div align="center">
		<form action="insert.php" method="post" align="center">
			<label for="cName">Enter Cookie Name: </label>
			<input type="text" id="cName" name="cName" />
			<label for="cValue">Enter Cookie Value: </label>
			<input type="text" id="cValue" name="cValue" />
			<input type="submit" name="Create" value="Create Cookie" />
		</form>
		<br>
		<br>
		<br>
		<div align="center">
			<form action="insert.php" method="POST" >
				<label for="cName">Enter Cookie Name: </label>
				<input type="text" id="cName" name="cName" />
				<input type="submit" name="cValue" value="Cookie Value" />
			</form>
		</div>
		<br>
		<br>
		<br>
		<div align="center">
			<form action="insert.php" method="POST" >
				<label for="cName">Enter Cookie Name: </label>
				<input type="text" id="cName" name="cName" />
				<input type="submit" name="delete" value="Delete Cookie" />
			</form>
		</div>
	</div>
</body>
</html>


