<?php
include('connection.php');



$error="";


if(isset($_POST['submit']))
{
      if($_POST['username']=="" || $_POST['password']=="" || $_POST['cpassword']=="" )

	{
		$error="You must filled all data...!";
    echo "<script>alert('$error') </script";
	}
	else
  {

     $username=$_POST['username'];
     $password=$_POST['password'];
     $cpassword=$_POST['cpassword'];
     $email=$_POST['email'];

     $sqlchk="select * from user where username='$username'";
     $reschk=mysqli_query($conn,$sqlchk);
     $nchk=mysqli_num_rows($reschk);

     if($nchk==0)
     {


    if($password==$cpassword)
     {

    $sql="INSERT INTO user (username,password,email) VALUES('$username','$password','$email') ";

    $res=mysqli_query($conn,$sql);


    if($res)
    {
	   //echo "data inserted";

      
      echo"<script>alert('Data inserted')</script>";
	   header('location:login.php');
    }
    else
    {
	    echo"<script>alert('Data not inserted')</script>";    

    }

    }
    else
    {
            echo"<script>alert('password doest match')</script>";    
    }
  }
  else
  {
      echo"<script>alert('Username already exist!!!')</script>";}

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
    <h1 class="ml-5 mt-5">SIGN UP</h1>
    <div class="col-lg-5 " >

    <form method="POST">

  <div class="form-group ml-5">
      <label >Username</label>
      <input type="text"  name="username"class="form-control  text-uppercase"  placeholder="Enter the Username"autocomplete="off">
    </div>

  <div class="form-group ml-5">
      <label >Password</label>
      <input type="Password"  name="password"class="form-control"  placeholder="Enter the Password">
    </div>

     <div class="form-group ml-5">
      <label > Confirm Password</label>
      <input type="Password"  name="cpassword"class="form-control"  placeholder="Enter the Password">
    </div>

    <div class="form-group ml-5">
      <label > Email</label>
      <input type="text"  name="email"class="form-control"  placeholder="Enter the Email Id"autocomplete="off">
    </div>




    <input type="submit" name="submit" value="SIGN UP" class="btn btn-primary ml-5">

  </form>


</div>
</div>
</body>
</html>




