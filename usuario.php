<?php
include_once 'menu.php';
include_once 'conexion.php';
if(isset($_POST['registrar'])){
if(isset($_POST['nombre']) and isset($_POST['password']) and isset($_POST['dni']) and isset($_POST['dni'])){
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$dni = $_POST['dni'];
$sql = "INSERT INTO usuario(nombre,password,dni)VALUES('$nombre','$password','$dni');";
$resultado = $conexion->query($sql);
$nombre = "";
$password = "";
$dni = "";
}

}
if(isset($_POST['Actualizar'])){
$id = $_POST['codigo'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$dni = $_POST['dni'];
if($id !=""and $nombre !="" and $password != "" and $dni != ""){
$sql = "UPDATE usuario SET nombre='$nombre',password='$password',dni='$dni' WHERE id = $id";
$resultado = $conexion->query($sql);
$nombre = "";
$password = "";
$dni = "";
}
}

if(isset($_POST['Borrar'])){
	if(isset($_POST['codigo'])){
$id = $_POST['codigo'];
$sql = "DELETE FROM usuario WHERE id = $id";
$resultado = $conexion->query($sql);
$id='';
}
}
?>

<div>
<table>
	<thead>
	<tr>
		<th><h2 align="center">Registrar usuario</h2></th>
		<th><h2 align="center">Lista usuario</h2></th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td>
		<form action="usuario.php" method="POST">
		<?php
		if(isset($_POST['nuevo']) or isset($_POST['registrar'])){
			?>
			<label>Nombre</label><br>
			<input type="text" name="nombre"><br><br>
			<label>Apellido Paterno</label><br>
			<input type="text" name="password"><br><br>
			<label>DNI</label><br>
			<input type="text" name="dni"><br><br>
			<?php
		}
		if(isset($_POST['Actualizar'])){
			?>
			<label>Nombre</label><br>
			<input type="text" name="nombre"><br><br>
			<label>Apellido Paterno</label><br>
			<input type="text" name="password"><br><br>
			<label>DNI</label><br>
			<input type="text" name="dni"><br><br>
			<?php
		}
	if(isset($_POST['Borrar'])){?>
		<label>Codigo</label><br>
		<input type="text" name="codigo"><br><br>
		<button type="submit" name="nuevo">Nuevo</button>
	<?php
}else{
			if (isset($_POST['editar'])) {?>
			<label>Codigo</label><br>
			<input type="text" name="codigo"><br><br>
		<?php
		?>
			<label>Nombre</label><br>
			<input type="text" name="nombre"><br><br>
			<label>Apellido Paterno</label><br>
			<input type="text" name="password"><br><br>
			<label>DNI</label><br>
			<input type="text" name="dni"><br><br>
			<?php
		}
		if (isset($_POST['editar'])) {?>
			<button type="submit" name="Actualizar">Actualizar</button>
		<?php
		}
		else
		{
			?>
			<button type="submit" name="registrar">Registrar</button>
			<?php
		}
		?>
			<button type="submit" name="editar">editar</button>
			<?php
}
			?>
			<button type="submit" name="Borrar">Borrar</button>
		</form>
		</td>
		<td>
			<table>
				<thead>
					<tr>
					<th class="col">Codigo</th>
					<th class="col">Nombre</th>
					<th class="col">contraseña</th>
					<th class="col">Dni</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql1="SELECT * FROM usuario";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {?>
					<tr>
					<td class="col"><?php echo $fila['id']; ?></td>
					<td class="col"><?php echo $fila['nombre']; ?></td>
					<td class="col"><?php echo $fila['password']; ?></td>
					<td class="col"><?php echo $fila['dni']; ?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</td>
	</tbody>
</table>
</div>
</body>
</html>