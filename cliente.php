<?php
include_once 'menu.php';
include_once 'conexion.php';
if(isset($_POST['registrar'])){
if(isset($_POST['nombre']) and isset($_POST['apellido1']) and isset($_POST['apellido2']) and isset($_POST['dni'])){
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$dni = $_POST['dni'];
$sql = "INSERT INTO cliente(nombre,apellido1,apellido2,dni)VALUES('$nombre','$apellido1','$apellido2','$dni');";
$resultado = $conexion->query($sql);
$nombre = "";
$apellido1 = "";
$apellido2 = "";
$dni = "";
}

}
if(isset($_POST['Actualizar'])){
$id = $_POST['codigo'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$dni = $_POST['dni'];
if($id !=""and $nombre !="" and $apellido1 != "" and $apellido2 != "" and $dni !=""){
$sql = "UPDATE cliente SET nombre='$nombre',apellido1='$apellido1',apellido2='$apellido2',dni='$dni' WHERE id = $id";
$resultado = $conexion->query($sql);
$nombre = "";
$apellido1 = "";
$apellido2 = "";
$dni = "";
}
}

if(isset($_POST['Borrar'])){
	if(isset($_POST['codigo'])){
$id = $_POST['codigo'];
$sql = "DELETE FROM cliente WHERE id = $id";
$resultado = $conexion->query($sql);
$id='';
}
}
?>

<div>
<table>
	<thead>
	<tr>
		<th><h2 align="center">Registrar Cliente</h2></th>
		<th><h2 align="center">Lista Cliente</h2></th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td>
		<form action="cliente.php" method="POST">
		<?php
		if(isset($_POST['nuevo']) or isset($_POST['registrar'])){
			?>
			<label>Nombre</label><br>
			<input type="text" name="nombre"><br><br>
			<label>Apellido Paterno</label><br>
			<input type="text" name="apellido1"><br><br>
			<label>Apellido Materno</label><br>
			<input type="text" name="apellido2"><br><br>
			<label>DNI</label><br>
			<input type="text" name="dni"><br><br>
			<?php
		}
		if(isset($_POST['Actualizar'])){
			?>
			<label>Nombre</label><br>
			<input type="text" name="nombre"><br><br>
			<label>Apellido Paterno</label><br>
			<input type="text" name="apellido1"><br><br>
			<label>Apellido Materno</label><br>
			<input type="text" name="apellido2"><br><br>
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
			<input type="text" name="apellido1"><br><br>
			<label>Apellido Materno</label><br>
			<input type="text" name="apellido2"><br><br>
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
					<th class="col">Apellido Paterno</th>
					<th class="col">Apelldio Materno</th>
					<th class="col">Dni</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql1="SELECT * FROM cliente";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {?>
					<tr>
					<td class="col"><?php echo $fila['id']; ?></td>
					<td class="col"><?php echo $fila['nombre']; ?></td>
					<td class="col"><?php echo $fila['apellido1']; ?></td>
					<td class="col"><?php echo $fila['apellido2']; ?></td>
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