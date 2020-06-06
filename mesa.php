<?php
include_once 'menu.php';
include_once 'conexion.php';
if(isset($_POST['registrar'])){
if(isset($_POST['numMaxComensale']) and isset($_POST['ubicacion'])){
$numMaxComensale = $_POST['numMaxComensale'];
$ubicacion = $_POST['ubicacion'];
$sql = "INSERT INTO mesa(numMaxComensale,ubicacion)VALUES('$numMaxComensale','$ubicacion');";
$resultado = $conexion->query($sql);
$numMaxComensale = "";
$ubicacion = "";
}

}
if(isset($_POST['Actualizar'])){
$id = $_POST['codigo'];
$numMaxComensale = $_POST['numMaxComensale'];
$ubicacion = $_POST['ubicacion'];
if($id !=""and $numMaxComensale !="" and $ubicacion != ""){
$sql = "UPDATE mesa SET numMaxComensale='$numMaxComensale',ubicacion='$ubicacion' WHERE id = $id";
$resultado = $conexion->query($sql);
$numMaxComensale = "";
$ubicacion = "";
}
}

if(isset($_POST['Borrar'])){
	if(isset($_POST['codigo'])){
$id = $_POST['codigo'];
$sql = "DELETE FROM mesa WHERE id = $id";
$resultado = $conexion->query($sql);
$id='';
}
}
?>

<div>
<table>
	<thead>
	<tr>
		<th><h2 align="center">Registrar mesa</h2></th>
		<th><h2 align="center">Lista mesa</h2></th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td>
		<form action="mesa.php" method="POST">
		<?php
		if(isset($_POST['nuevo']) or isset($_POST['registrar'])){
			?>
			<label>numMaxComensale</label><br>
			<input type="text" name="numMaxComensale"><br><br>
			<label>ubicacion</label><br>
			<input type="text" name="ubicacion"><br><br>
			<?php
		}
		if(isset($_POST['Actualizar'])){
			?>
			<label>numero Maximo de Comensale</label><br>
			<input type="text" name="numMaxComensale"><br><br>
			<label>ubicacion</label><br>
			<input type="text" name="ubicacion"><br><br>
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
			<label>numMaxComensale</label><br>
			<input type="text" name="numMaxComensale"><br><br>
			<label>ubicacion</label><br>
			<input type="text" name="ubicacion"><br><br>
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
					<th class="col">numero Maximo de Comensale</th>
					<th class="col">ubicacion</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql1="SELECT * FROM mesa";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {?>
					<tr>
					<td class="col"><?php echo $fila['id']; ?></td>
					<td class="col"><?php echo $fila['numMaxComensale']; ?></td>
					<td class="col"><?php echo $fila['ubicacion']; ?></td>
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