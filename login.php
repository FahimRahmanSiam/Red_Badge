<?php
 include "connect.php";
?>
<html>
<head>
	<title>The Red Badge</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include "navbar.php";?>	
    <div class="welcome">
			 Welcome to the Red badge 
		</div>

<?php
	$msg = '<h5 class="alert_msg margin_off"><strong>Sign in ! </strong>Please Sign in to access your account</h5>';
			
	if (loggedin() ) {
	header ("location: home.php");


if($Level == 'Admin'){
						echo '<script>window.location.href ="adminHome.php";</script>';
						exit();
						
					} else if($Level == 'Company'){
						echo '<script>window.location.href ="companyHome.php";</script>';
						exit();
						
					} else if($Level == 'Patient'){
						echo '<script>window.location.href ="patientHome.php";</script>';
						exit();
						
					}
	
	exit();
	}

	if (isset ($_POST['Signin'])) {
		$UserName = $_POST['Username_ict'];
		$Password = $_POST['password'];
		@$RememberMe = $_POST['rememberme'];
		
		if(empty($UserName) || empty($Password)){
			$msg = '<h5 align="center" class="alert_danger margin_off"><strong>Error ! </strong>Please fileup all fields</h5>';
		}

		if ($UserName && $Password) {
			$que = "SELECT * FROM user_account WHERE Email = '$UserName'";
			
			$SignIn = $con->query($que);
			
			if(!$SignIn->num_rows){
				
				$msg = '<h5 align="center" class="alert_danger margin_off"><strong>Error ! </strong>Invalid Username</h5>';
			}

			while ($row = $SignIn->fetch_object() ) {
				$tb_password = $row->Password;
				$User_Name = $row->Email;
				$UserLevel = $row->level;
				
				
				if ($Password==$tb_password) $LognInOk = TRUE;
				else $LognInOk = FALSE;

				if ($LognInOk == TRUE) {

					if ($RememberMe=="on") 
						setcookie("Username_ict", $UserName, time()+5184000);
					else if ($RememberMe=="") 
					$_SESSION['Username_ict']=$UserName;

					//header ("location: home.php");
					$msg = '<h5 align="center" class="alert_success margin_off"><strong>Success ! </strong>You are successfully signedin</h5>';
					
					if($UserLevel == 'Admin'){
						echo '<script>window.location.href ="adminHome.php";</script>';
						exit();
						
					} else if($UserLevel == 'Company'){
						echo '<script>window.location.href ="companyHome.php";</script>';
						exit();
						
					} else if($UserLevel == 'Patient'){
						echo '<script>window.location.href ="patientHome.php";</script>';
						exit();
						
					}
					

				} else 
					$msg = '<h5 align="center" class="alert_danger margin_off"><strong>Error ! </strong>Incorrect User Name or, Password</h5>';
				

			}
		} else
			
			$msg = '<h5 align="center" class="alert_danger margin_off"><strong>Error ! </strong>Please enter User Name and Password</h5>';
		
		
		
		
	} else {
		mysqli_error($con);
	}



	?>



<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
	<form class="box" action="" method="post">
       <h1 class="log">LOGIN</h1>
<?php echo $msg; ?>
        <input type="text" name="Username_ict" placeholder="E-mail or Phone">
       
        <input type="password" name="password" placeholder="Password">
        
		<input type="submit" name="Signin" value="Login">
		
		<input name="rememberme" type="hidden" id="checkbox_id" />
		
		<a  href="signup.php" style="font-size: 17px;  color: aqua;">Dont have an account ? click here</a>
		</form>

		

		

    
    <?php include "footer.html" ?>

</body>
</html>