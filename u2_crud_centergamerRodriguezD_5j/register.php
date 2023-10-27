<html>
<head>
	<title>Registrar</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	if($usuario == "" || $contrasena == "" || $nombre == "" || $correo == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Regresa</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO sesion(nombre, correo, usuario, contrasena) VALUES('$nombre', '$correo', '$usuario', md5('$contrasena'))")
			or die("Could not execute the insert query.");
			
		echo "Registro exitosamente";
		echo "<br/>";
		echo "<a href='login.php'>Iniciar sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrar</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Nombre Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
