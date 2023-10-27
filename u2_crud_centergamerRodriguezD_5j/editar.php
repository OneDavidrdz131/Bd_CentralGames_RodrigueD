<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nombre = $_POST['nombre'];
	$categoria = $_POST['categoria'];
	$desarrolladora = $_POST['desarrolladora'];	
	$lanzamiento = $_POST['lanzamiento'];
	$plataforma = $_POST['plataforma'];
	$narrativa = $_POST['narrativa'];
	$precio = $_POST['precio'];
	
	// checking empty fields
	if(empty($nombre) || empty($categoria) || empty($desarrolladora) || empty($lanzamiento) || empty($plataforma) || empty($narrativa) || empty($precio)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>llena el campo nombre.</font><br/>";
		}
		
		if(empty($categoria)) {
			echo "<font color='red'>llena el campo tipo.</font><br/>";
		}
		
		if(empty($desarrolladora)) {
			echo "<font color='red'>llena el campo acabado.</font><br/>";
		}	

		if(empty($lanzamiento)) {
			echo "<font color='red'>llena el campo distribuidor.</font><br/>";
		}	

		if(empty($plataforma)) {
			echo "<font color='red'>llena el campo precio.</font><br/>";
		}	

		if(empty($narrativa)) {
			echo "<font color='red'>llena el campo medidas.</font><br/>";
		}	

		if(empty($precio)) {
			echo "<font color='red'>llena el campo ancho.</font><br/>";
		}	
	} else {	
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE videogames SET nombre='$nombre', categoria='$categoria', desarolladora='$desarrolladora', fechalanzamiento='$lanzamiento', plataforma='$plataforma', narrativa='$narrativa', precio='$precio' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM videogames WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
	$categoria = $res['categoria'];
	$desarrolladora = $res['desarolladora'];
	$lanzamiento = $res['fechalanzamiento'];
	$plataforma = $res['plataforma'];
	$narrativa = $res['narrativa'];
	$precio = $res['precio'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver productos</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>categoria</td>
				<td><input type="text" name="categoria" value="<?php echo $categoria;?>"></td>
			</tr>
			<tr> 
				<td>desarrolladora</td>
				<td><input type="text" name="desarrolladora" value="<?php echo $desarrolladora;?>"></td>
			</tr>
			<tr> 
				<td>fechalanzamiento</td>
				<td><input type="text" name="lanzamiento" value="<?php echo $lanzamiento;?>"></td>
			</tr>
			<tr> 
				<td>plataforma</td>
				<td><input type="text" name="plataforma" value="<?php echo $plataforma;?>"></td>
			</tr>
			<tr> 
				<td>narrativa</td>
				<td><input type="text" name="narrativa" value="<?php echo $narrativa;?>"></td>
			</tr>
			<tr> 
				<td>precio</td>
				<td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
