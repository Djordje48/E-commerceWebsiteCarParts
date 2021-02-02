<?php 

session_start();


$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'userregistration');



$name=$_POST['user'];
$emaill=$_POST['email'];
$pass=$_POST['password'];
$s=" select * from loginreg where username = '$name' && email='$emaill' && password='$pass' ";



$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num==1){
	echo"Username Already Taken";
}else{
	$reg="insert into loginreg(username,email,password) values('$name','$emaill','$pass')";
	mysqli_query($con,$reg);
	echo"Registration Successful";
}

?>