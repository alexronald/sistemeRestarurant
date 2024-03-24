<?php
session_start();
include("conexion.php");
if(isset($_POST["login"])){
$loginNombre=$_POST['usuario'];
$loginPassword=$_POST['contrasena'];

$consulta="SELECT*FROM usuario WHERE nombre='$loginNombre' AND password='$loginPassword'";
$resultado=$conexion->query($consulta);
$row=$resultado->fetch_assoc();
	$userok=$row["nombre"];
	$passok=$row["password"];

if($loginNombre!="" && $loginPassword!=""){
	if($loginNombre==$userok && $loginPassword==$passok){
	$_SESSION["logueado"]=TRUE;
	header("location:cliente.php");
	exit();
	}
}
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<form method="POST" action="index.php">
<h1 align="center">SISTEME PARA RESTARUANT</h1>
<div align="center">
<table width="300" border="8">
<tr valign="middle" bordercolor="#ffffff">
<td>
	<img src="img/contr.png">
</td>
<td align="center" bordercolor="#aa55ff" background="img.jpg">
<blockquote><br>
<h4>Usuario:</h4>
<form action="index.php" method="POST">
<input type="text" name="usuario"><br><br>
<h4>Contraseña:</h4>
<input type="password" name="contrasena"><br><br>
<button name="login" type="submit" style="background-color:#2b2b2b;">iniciar sesion</button><br>
</form>
</blockquote>
</td>
</tr>
</table>
</body>
</html>
