<?php
session_start();
require('php-includes/conexion.php');
$user = mysqli_real_escape_string($con,$_POST['user']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$query = mysqli_query($con,"select * from administrador where usuario ='$user' and password ='$password'");
	if(mysqli_num_rows($query)>0){
		$_SESSION['userid']=$user;
		$_SESSION['id'] = session_id();
		$_SESSION['login_type'] = "user";
		
			echo '<script>alert("Acceso Correcto.");window.location.assign("home.php");</script>';
	}
		else{
			echo '<script>alert("usuario y/o contraseña incorrectos.");window.location.assign("index.php");</script>';
		}
		
		

?>