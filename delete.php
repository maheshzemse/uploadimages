<?php

include('connection.php');
session_start();





$id=$_GET['tid'];


$sql= "DELETE FROM upload WHERE id='$id'";

$res=mysqli_query($conn,$sql);

if($res)
{
	header('location:dashbord.php');
}
else
{
	echo "Unable to delete";
}












?>