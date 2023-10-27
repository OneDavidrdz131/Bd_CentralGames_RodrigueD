<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$nombre = $_POST['nombre'];
	$categoria = $_POST['categoria'];
	$desarrolladora = $_POST['desarrolladora'];
	$lanzamiento = $_POST['lanzamiento'];
	$plataforma = $_POST['plataforma'];
	$narrativa = $_POST['narrativa'];
	$precio = $_POST['precio'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nombre) || empty($categoria) || empty($desarrolladora) || empty($lanzamiento) || empty($plataforma) || empty($narrativa) || empty($precio)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>completa el campo nombre.</font><br/>";
		}
		
		if(empty($categoria)) {
			echo "<font color='red'>completa el campo tipo.</font><br/>";
		}
		
		if(empty($desarrolladora)) {
			echo "<font color='red'>completa el campo acabado.</font><br/>";
		}

		if(empty($lanzamiento)) {
			echo "<font color='red'>completa el campo distribuidor.</font><br/>";
		}
		if(empty($plataforma)) {
			echo "<font color='red'>completa el campo precio.</font><br/>";
		}
		if(empty($narrativa)) {
			echo "<font color='red'>completa el campo medidas.</font><br/>";
		}
		if(empty($precio)) {
			echo "<font color='red'>completa el campo ancho.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO videogames(nombre, categoria, desarolladora, fechalanzamiento, plataforma, narrativa, precio, login_id) VALUES('$nombre','$categoria','$desarrolladora','$lanzamiento','$plataforma','$narrativa','$precio','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
