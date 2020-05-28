<?php

include('connection.php');

session_start();






$err="";
$error="";

if(isset($_POST['submit']))
{

	if($_POST['username']=="" || $_POST['password']=="")

	{
		$error="You must filled username and password...!";

		echo "<script>alert('$error')</script>";
		//header('location:login.php');

	}
	else
	{	

		  $username=$_POST['username'];
		  $password=$_POST['password'];

		

		$query="SELECT * FROM user WHERE username='$username' and password='$password'";

			$data=mysqli_query($conn,$query);
		 	$res=mysqli_num_rows($data);
		 	



		 if($res==1)
		 {
		 	$_SESSION['username']=$username;
		 	
		 	echo"<script>alert('LOGIN SUCCESSFULLY')</script>";

		 	header('location:dashbord.php');
		 }
		 else
		 {
		 		//echo"<script>alert('Enter the correct Username & Password')</script>";
		 		//header('location:index.html');
		 	$err="Enter the correct Username & Password";

		 }

		//$row= mysqli_fetch_assoc($data);

	/*	if($row['username']==$username && $row['password']==$password)
		{
			echo"<script>alert('login successfully')</script>";
			
		}

		else
		{
			echo"<script>alert('login Failed,Please Enter the correct Username & Password')</script>";		
		}
		*/

	}
}

?>






<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #F2F3F4">


	<div class="container">
		<h1 class="ml-5 mt-5">LOGIN</h1>
		<div class="col-lg-5 " >

    <form method="POST">

	<div class="form-group ml-5">
    	<label >Username</label>
    	<input type="text"  name="username"class="form-control text-uppercase  "  placeholder="Enter the Username" autocomplete="off">
  	</div>

	<div class="form-group ml-5">
    	<label >Password</label>
    	<input type="Password"  name="password"class="form-control text-uppercase"  placeholder="Enter the Password">
    </div>


   	<input type="submit" name="submit" value="LOGIN" class="btn btn-info ml-5">
   	<a href="register.php" class="btn btn-info">SIGN UP</a>

	</form>


</div>
</div>
</body>
</html>







