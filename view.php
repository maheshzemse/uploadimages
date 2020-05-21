<?php

session_start();

include('connection.php');

$k=$_SESSION['username'];





$sql= "SELECT * FROM upload where username='$k'";
		$res=mysqli_query($conn,$sql);
		
		$n=mysqli_num_rows($res);

		if($n==0)
		{
			echo"<script>alert('No records to display')</script>";
		}
		else
			{
				echo "";

			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>view</title>
</head>
<body>

<div class="container">
	<div class="table-responsive">

<table class="table table-bordered " >
		<thead>
			<tr>
				<!--<th  scope="col">Username </th>-->
				<th  scope="col">Files </th>
				
			</tr>
		</thead>

		<?php

			while($row=mysqli_fetch_assoc($res))
			{
				?>

					<tr>
						<!--<td>  <?php echo $k ;      ?> </td>-->
						
						<td>  <img src="<?php  echo $row['filescr'] ?> "height='100' width='100'></td>  

						
						
				<?php

			}

				?>


		</table>
	

</div>

</div>
















</body>
</html>





