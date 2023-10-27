<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM videogames WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Agregar nuevo dato</a> | <a href="logout.php">cerrar sesion</a>
	<h1>Tabla VideoJuegos</h1>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>NombreJuego</td>
			<td>categoria</td>
			<td>desarrolladora</td>
			<td>lanzamiento</td>
			<td>plataforma</td>
			<td>narrativa</td>
			<td>precio</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['categoria']."</td>";
			echo "<td>".$res['desarolladora']."</td>";	
			echo "<td>".$res['fechalanzamiento']."</td>";
			echo "<td>".$res['plataforma']."</td>";
			echo "<td>".$res['narrativa']."</td>";
			echo "<td>".$res['precio']."</td>";
			echo "<td><a href=\"editar.php?id=$res[id]\">Editar</a> | <a href=\"borrar.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
