<?php include("header.php") ?> 
<?php include("variables.php") ?>
					<?php
						$id=$_REQUEST['edit'];
						$fetch = "SELECT sr_no,std_id,ostp,java,ds,se,adbms FROM studentresult WHERE sr_no=$id";			
						$m=mysqli_query($con,$fetch);
						$d=mysqli_fetch_array($m);
					?>
		<?php
		
		if(isset($_POST['updateResult']))
			{
				$id=$_REQUEST['edit'];
				$ostp=$_SESSION["ostp"]=$_POST['ostp'];
				$java=$_SESSION["java"]=$_POST['java'];
				$ds=$_SESSION["ds"]=$_POST['ds'];
				$se=$_SESSION["se"]=$_POST['se'];
				$adbms=$_SESSION["adbms"]=$_POST['adbms'];
				ostpmarkvalidation();
				javamarkvalidation();
				dsmarkvalidation();
				semarkvalidation();
				adbmsmarkvalidation();

				if($_SESSION['adbmserr']=="" && $_SESSION['ostperr']=="" && $_SESSION['javaerr']=="" &&
					$_SESSION['dserr']=="" && $_SESSION['seerr']=="") 
				{
				
					$total=$ostp+$java+$ds+$se+$adbms;
					$percent=($total*100)/500;
					if($percent>=70)
					{
						$class="Distiction";
					}
					else if($percent>=60 && $percent<70)
					{
						$class="First class";
					}
					else if($percent>=50 && $percent<60)
					{-
						$class="Pass class";
					}else
					{
						$class="Fail";
					}
					
					if($percent>=50)
					{
						$result="Pass";
					}
					else
					{
						$result="Fail";
					}
				
					$mrk="UPDATE studentresult  
						SET ostp='$ostp', java='$java', ds='$ds', se='$se',adbms='$adbms',total='$total',
						percentage='$percent',class='$class',result='$result' WHERE sr_no = $id ";
	
					if(mysqli_query($con,$mrk))
					{
					header("location: marks.php?c=null&n=null");
					}
					else
					{
					echo mysqli_error($con);
					}	
				}
				else 
				{
					header("location: editresult.php?c=false&edit=".$id);
				}	
			}
			
	?>
<center>
	<form method="POST" action="editresult.php?c=null&edit=<?php echo $d['sr_no'] ?>" enctype="multipart/form-data">
		<div class="editform">
		<table border="1">
			<thead>
				<tr>
					<th colspan="2"> Enter Marks of students </th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td>Sr_no</td>
					<td><input  type="number" name="sid" value="<?php echo $d['sr_no'] ?>" disabled></td>
				</tr>
				<tr>
					<td>OSTP</td>
					<td><input type="number" name="ostp" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["ostp"]; else echo $d['ostp'] ?>">
					<br><span class="err"><?php echo $ostperr; ?> </span></td>
				</tr>
				<tr>
					<td>Java</td>
					<td><input type="number" name="java" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["java"]; else echo $d['java'] ?>" />
					<br><span class="err"><?php echo $javaerr; ?> </span></td>
				</tr>
				<tr>
					<td>
						DS
					</td>
					<td>
						<input type="number" name="ds" id="ds" value="<?php if(($_REQUEST['c']=='false'))   echo $_SESSION["ds"]; else echo $d['ds'] ?>" />
						<br><span class="err"><?php echo $dserr; ?> </span></td>
				</tr>
				<tr>
					<td>
						Software Engineering
					</td>
					<td>
						<input type="number" name="se" id="se" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["se"]; else echo $d['se'] ?>" />
						<br><span class="err"><?php echo $seerr; ?> </span></td>
				</tr>
				<tr>
					<td>
						ADBMS
					</td>
					<td>
						<input type="number" name="adbms" id="adbms" value="<?php if(($_REQUEST['c']=='false'))  echo $_SESSION["adbms"]; else echo $d['adbms'] ?>"/>
						<br><span class="err"><?php echo $adbmserr; ?> </span></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="updateResult" id="submitmarks" value="Submit" /></td>
				</tr>
			</tbody>
		</table>
		</div>
	</form>
</center>

<?php include("footer.php") ?>