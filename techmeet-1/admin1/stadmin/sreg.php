<?php
include '../dbconnect.php';

$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$desg=$_POST['designation'];

$sql="INSERT INTO `staff` (`staff_id`, `username`, `password`, `name`, `desg`, `image`, `gmail`, `mobile`, `linkedin`, `status`, `event-id`) VALUES (NULL, '$username', '$password', '$name', '$desg', '', '$email', '', '', 'requested', NULL);";

$result=mysqli_query($con,$sql);
if(isset($result)){
    $session['lmsg']='Registered successfully';
    header('Location:register.php');
}
?>