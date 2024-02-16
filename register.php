<?php 
if(!session_start())
{
	session_start();
}
include("include/config.php");

	if(isset($_POST['submit']))	
	{
		$query="select * from logindetails where email='".$_POST['email']."'";		
		$result = $conn->query($query);  		
		if($result->num_rows == 0)
		{
			$sql = "insert into logindetails(`username`, `email`, `password`) values('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."')";
			if ($conn->query($sql) === TRUE) 
			{
				$_SESSION['msg']="Registration successfull!";				
			}
			else {
				$_SESSION['msg']="Registration failed try after some time!". $conn->error;				    			
			}			
		}
		else
		{
			$_SESSION['msg']="";				
			?>
			<script>
				alert('This email is already registred with someother account!');
			</script>
			<?php
		}		
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> 
addEventListener("load", function() 
	{ 
		setTimeout(hideURLbar, 0); 
	}, false); 
	function hideURLbar(){ window.scrollTo(0,1); 
} 
</script>
<!-- Custom Theme files -->
<link href="scss/reg.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
<script>
function myFunction() {
  location.replace("index.php")
}

</script>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Service Directory SignUp</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST">
					<input class="text" type="text" name="username" placeholder="Name" required="required" style="margin-bottom: 30px">					
					<font color="red">Note:Your email will be your username</font>					
					<input class="text" type="email" name="email" placeholder="Email" required="required" style="margin-bottom: 30px">
					<input class="text" type="password" name="password" placeholder="Password" required="required">					
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="required">
							<span>I Agree To The Terms & Conditions</span>
						</label>						
					</div>
					<input type="submit" name="submit" value="SignUp">
					<input type="button" onclick="myFunction();" value="Home" formnovalidate="off">					
					<p> 
						<?php 
							if(isset($_SESSION['msg']))	
							{
								echo htmlentities($_SESSION['msg']);								
							}
						?>						
					</p>
				</form>			
			</div>
		</div>				
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>			
		</ul>
	</div>
	<!-- //main -->
</body>
</html>