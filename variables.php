<?php 

	$nameerror1="";
	$nameerror2="";
	$nameerror3="";
	$semerr="";
	$courseerr="";
	$emailerr="";
	$pswerr="";
	$opswerr="";
	$cpswerr="";
	$contacterr="";
	$profilepicerr="";
    $ostperr="";
    $javaerr="";
    $dserr="";
    $seerr="";
    $adbmserr="";
	$sem="";
	$course="";
	$email="";
	$psw="";
	$cpsw="";
	$contact="";
	$profilepic="";


	if(isset($_REQUEST['c']))
    {
    if($_REQUEST['c']=="null" || $_REQUEST['c']=="true" || $_REQUEST['c']=="edited" )
    {
        $_SESSION["sname"]=$_SESSION["fname"]=$_SESSION["srname"]=$_SESSION["sex"]=
        $_SESSION["email"]=$_SESSION["gender"]=$_SESSION["course"]= 
        $_SESSION["semester"]=$_SESSION['psw']=$_SESSION['cpsw']=$_SESSION['opsw']=$_SESSION['dbpsw']=
        $_SESSION['contact']=$_SESSION['profilepic']=$_SESSION["ostp"]=
        $_SESSION["java"]=$_SESSION["ds"]=$_SESSION["adbms"]=$_SESSION["se"]="";

        $_SESSION["snameerr"]=$_SESSION["fnameerr"]=$_SESSION['emailErr']=
		$_SESSION["srnameerr"]=$_SESSION["contacterr"]=$_SESSION["courseerr"]=
        $_SESSION['semerr']=$_SESSION['pswerr']=$_SESSION['cpswerr']=$_SESSION['opswerr']=
        $_SESSION['profilepicerr']=$_SESSION['adbmserr']=$_SESSION['ostperr']=
        $_SESSION['javaerr']=$_SESSION['dserr']=$_SESSION['seerr']="";
    }
    else if($_REQUEST['c']=="false" )
		{
			$nameerror1=$_SESSION['snameerr'];
			$nameerror2=$_SESSION['fnameerr'];
			$nameerror3=$_SESSION['srnameerr'];
			$semerr=$_SESSION['semerr'];
			$courseerr=$_SESSION['courseerr'];
			$emailerr=$_SESSION['emailErr'];
			$opswerr=$_SESSION['opswerr'];
			$pswerr=$_SESSION['pswerr'];
			$cpswerr=$_SESSION['cpswerr'];
			$contacterr=$_SESSION['contacterr'];
			$profilepicerr=$_SESSION['profilepicerr'];
			$ostperr=$_SESSION['ostperr'];
    		$javaerr=$_SESSION['javaerr'];
			$dserr=$_SESSION['dserr'];
			$seerr=$_SESSION['seerr'];
			$adbmserr=$_SESSION['adbmserr'];
		}
}

// FUNCTIONS

if($_SERVER['REQUEST_METHOD']=='POST')
			{
// Student name validation
function snamevalidation()
{
	if(empty($_POST['sname']))
	{
		$_SESSION['snameerr']="Enter first name";
	}
	else if(!preg_match("/^[a-zA-z]*$/",$_POST['sname']))
	{
		$_SESSION['snameerr']="Only letters are allowed";
	}
}

// father name validation
function fnamevalidation()
{
	if(empty($_POST['fname']))
	{
		$nameerror2=$_SESSION['fnameerr']="Enter father's name";
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$_POST['fname']))
	{
		$nameerror2=$_SESSION['fnameerr']="Only latters are allowed";
	}
}

function lnamevalidation()
{
	if(empty($_POST['srname']))
	{
		$nameerror3=$_SESSION['srnameerr']="Enter last name";
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$_POST['srname']))
	{
		$nameerror3=$_SESSION['srnameerr']="Only latters allowed";
	}
}
function semvalidation()
{
	if(empty($_POST['sem']))
	{
		$_SESSION['semerr']="Select Semester";
	}
}

function coursevalidation()
{
	if(empty($_POST['course']))
	{
		$_SESSION['courseerr']="Select course";
	}
}

function emailvalidation()
{
	if (empty($_POST["email"])) {
		$_SESSION['emailErr'] = "Enter Email";
	  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	  {
		$_SESSION['emailErr'] = "Invalid email format";
	  }
}
function opswvalidation()
{
	if(empty($_POST["opsw"])) {
		$_SESSION['opswerr']= "Enter old password";
	  }
	else if($_SESSION['opsw'] != $_SESSION['dbpsw'])
	{
		$_SESSION['opswerr']="Password is incorrect";
	}
}
function pswvalidation()
{
	if (empty($_POST["psw"])) 
	{
		$_SESSION['pswerr'] = "Enter password";
	}
	else if (strlen($_POST["psw"]) < '8') {
		$_SESSION['pswerr'] = "Your Password Must Contain At Least 8 Characters!";
	}
	else if (!preg_match("#[a-z]+#",$_POST['psw']))
	{
		$_SESSION['pswerr'] = "Your Password Must Contain At least 1 Small Letter!";
	}
	else if(!preg_match("#[0-9]+#",$_POST['psw']) ||  !preg_match("#[A-Z]+#",$_POST['psw']) || !preg_match('/[\'^£$%&*()}.{@#~?><>,|=_+¬-]/', $_POST["psw"]) ) {
		$_SESSION['pswerr'] = "Your Password Must Contain At Least 1 Number! ,1 Capital Letter!, and 1 special character";
	}
}

function cpswvalidation()
{
	if (empty($_POST["cpsw"])) {
		$_SESSION['cpswerr'] = "Confirm your password";
	  }
	 else if ($_POST["cpsw"] != $_POST["psw"]) {
		$_SESSION['cpswerr'] = "Confirm password didn't match to password";		
	}
}
function contactvalidation()
{
	if(empty($_POST["contact"]))
			{
				$_SESSION['contacterr']="Enter contact number";
			}
			else if(!preg_match("#[0-9]#",$_POST['contact']))
			{
				$_SESSION['contacterr']="contact number should be of number";
			}
			else if (!preg_match("#[0-9]{10,10}#",$_POST['contact']))
			{
				$_SESSION['contacterr']="contact number should be of 10 digit";
			}
}
function profilepicvalidation()
{
	if(empty($_SESSION['profilepic']))
			{
				$_SESSION['profilepicerr']="choose profile picture";
			}
}
// marks validation
function ostpmarkvalidation()
{
	if(empty($_POST['ostp']))
				{
					$_SESSION['ostperr']="Enter marks";
				}
				else if($_POST['ostp']>100 || $_POST['ostp']<0)
				{
					$_SESSION['ostperr']="Marks should be in between 0 and 100";
				}
				

}
function javamarkvalidation()
{
	if(empty($_POST['java']))
				{
					$_SESSION['javaerr']="Enter marks";
				}
				else if($_POST['java']>100 || $_POST['java']<0)
				{
					$_SESSION['javaerr']="Marks should be in between 0 and 100";
				}
				

}
function dsmarkvalidation()
{
	if(empty($_POST['ds']))
				{
					$_SESSION['dserr']="Enter marks";
				}
				else if($_POST['ds']>100 || $_POST['ds']<0)
				{
					$_SESSION['dserr']="Marks should be in between 0 and 100";
				}
				

}
function semarkvalidation()
{
	if(empty($_POST['se']))
				{
					$_SESSION['seerr']="Enter marks";
				}
				else if($_POST['se']>100 || $_POST['se']<0)
				{
					$_SESSION['seerr']="Marks should be in between 0 and 100";
				}
				

}
function adbmsmarkvalidation()
{
	if(empty($_POST['adbms']))
				{
					$_SESSION['adbmserr']="Enter marks";
				}
				else if($_POST['adbms']>100 || $_POST['adbms']<0)
				{
					$_SESSION['adbmserr']="Marks should be in between 0 and 100";
				}
}
function mailer()
{
	$email=$_POST['email'];
    $psw=$_POST['psw'];
	require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'chandravadiakishan@gmail.com';                 // SMTP username
    $mail->Password = '123ZXCzxc!@#';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('chandravadiakishan@gmail.com', 'Admin');
    $mail->addAddress($email);     // Add a recipient

    $mail->addReplyTo('chandravadiakishan@gmail.com', 'Information');


    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Regestration in Parul University';
    $mail->Body    = 'Congratulation you have successfully registered in Parul University
						<br>your username is ::'. $email. '<br>
						password is ::'. $psw;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
	
}
}
?>