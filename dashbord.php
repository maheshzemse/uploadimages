<?php

session_start();
include('connection.php');


if(!isset($_SESSION['username']))
{
	header('location:login.php');
}





$k=$_SESSION['username'];


$name="";
$size="";
if(isset($_POST['submit']))
{
	 $name=$_FILES['fname']['name'];
	
	 $size=$_FILES['fname']['size'];

	 $temploc=$_FILES['fname']['tmp_name'];

	 $err=$_FILES['fname']['error'];


	$folder='files/'.$name;

	move_uploaded_file($temploc,$folder);

 $sql="INSERT INTO upload (username,filescr)VALUES('$k','$folder') ";

    $res=mysqli_query($conn,$sql);
    

 if($res)
    {
	   //echo "data inserted";

      
      echo"<script>alert('Data inserted')</script>";
	  
    }
    else
    {
	    echo"<script>alert('Data not inserted')</script>";    

    }





}

?>




<!DOCTYPE html>
<html>
<head>
	<title>dashbord</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #EAFAF1">
<h5  class="text-center mt-3  ">Hello,<?php echo $_SESSION['username'] ?> Welcome to Dashbord  </h5> <hr>
<a style="float: right;" href="logout.php" class="btn btn-danger mr-3">LOGOUT</a>

<h5 class="text-center ml-5">PHP FILE SYSTEM TO UPLOAD IMAGES IN FOLDER</h5>



	
<table class="table mt-5 text-center table-bordered table-hover">
		<thead class="text-center bg-light">
			<tr>
				<th  scope="col">Folder Name </th>
				<th  scope="col">Files Names </th>
				<th  scope="col">Size </th>
				<th  scope="col">Upload Files </th>
				<th  scope="col">View uploaded Files </th>


			</tr>
		</thead>

					<tr>
						<td><?php echo $_SESSION['username'];?></td>
						<td><?php  echo $name;    ?></td>
						<td><?php  echo $size ;   ?>bytes</td>
						<td><a href="upload.php" class="btn btn-success"data-toggle="modal" data-target="#exampleModal1">Upload File</a></td>

          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Upload Files </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form method="POST" action=""enctype="multipart/form-data" >
        			<label>User</label>
        			<input type="text" readonly="" name="username" value="<?php echo $k;    ?>" ><br><br>
					<label>Select Image</label>
          			<input type="file" name="fname"><br><br>
          			<input type="submit" name="submit" value="Upload" class="btn btn-info "><br><br>
            </form>
      </div>
      <div class="modal-footer">
      	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  

        
     </div>
    </div>
  </div>
</div>

<td><a href="" class="btn btn-success"data-toggle="modal" data-target="#exampleModal2">View Files</a></td>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">View Files of folder :<?php echo $_SESSION['username'];?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php

      		$sql= "SELECT * FROM upload where username='$k'";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($res))
		{
		
		

?>
		<a href="delete.php?tid=<?php echo $row['id'] ?> ">
		<div class="text-center"><br>
		 <img src="<?php  echo $row['filescr'] ?> "height='150' width='150'>DELETE</a>
		 </div>

		
		<?php

        }

        ?>


      </div>
      <div class="modal-footer">
      	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  

        
     </div>
    </div>
  </div>
</div>


</tr>
</table>



<div>
	
</div>













</body>
</html>