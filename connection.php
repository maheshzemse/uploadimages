<?php




$db_host = "localhost";
$db_user = "root";
$db_password ="";
$db_name ="upload";


$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);

if($conn)
{
	//echo"";
	//echo "<script>alert('database connection done!!!')</script>";

}
else
{
echo "<script>alert('database connection Failed!!!')</script>";
}
