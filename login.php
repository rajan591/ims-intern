<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management System </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->
	<style>
		.cat{
			color:"white";
		}
	</style>

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>PATAN E-LIBRARY</h1>

	<div class="container">

		<div class="login">
			<h2>Sign In</h2>
			<form action="login.php" method="post">
					<!-- code edited -->
				<!-- <div style="color:white">Select Department</div>
					<br>
				<select name="Category" Name="Department" id="Category" >
					<option value="GEN">BCA</option>
					<option value="OBC">CSIT</option>
					<option value="SC">BBS</option>
					<option value="ST">BBA</option>
				</select> -->

	<br>
				<input type="text" Name="RollNo" placeholder="Library ID" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Sign In">
				</form>
			</div>
			<p>Note:</p>
			<p>For login credential please contact<br> Patan Library Department</p>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Our Rules</h2>
		<br>
		<br>
		
			</div>
			<p>Carry your Library ID card with you when you enter the library.</p>
			<p>Do not take any book or other library material out of the library without following the borrowing procedures.
</p>
			<p>Make sure to return the borrowed items by the due date.
</p>
<p>Never write in books or cut pages out of them.
</p>
			<div class="clear"></div>
		</div>

	

	<div class="footer w3layouts agileits">
		<p> &copy; 2022 Patan Library  Login. All Rights Reserved </a></p>
		
	</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
//  $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";
 echo($sql);

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/login.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password or Department')</script>";
}
   

}


?>

</body>
<!-- //Body -->

</html>
