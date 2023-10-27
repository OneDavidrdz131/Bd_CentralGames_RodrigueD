<?php session_start(); ?>
<html>
<head>
	<title>Pagina principal</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		BIENVENIDO A CENTRAL GAMES<br>
		David Rodriguez Jurado
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM secion");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver y editar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='login.php'>Iniciar sesion</a> | <a href='register.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://onedavidrdz131.github.io/Ventas_de_videojuegos/" title="Tienda Video Games">David Rodriguez</a>
	</div>
</body>
</html>
