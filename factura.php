<?php
include_once 'menu.php';
include_once 'conexion.php';
if(isset($_POST['registrar'])){
if(isset($_POST['idcliente']) and isset($_POST['idcamarero']) and isset($_POST['idmesa']) and isset($_POST['fecha'])){
$idcliente = $_POST['idcliente'];
$idcamarero = $_POST['idcamarero'];
$idmesa = $_POST['idmesa'];
$fecha = $_POST['fecha'];
$sql = "INSERT INTO factura(idcliente,idcamarero,idmesa,fecha)VALUES('$idcliente','$idcamarero','$idmesa','$fecha');";
$resultado = $conexion->query($sql);
$idcliente = "";
$idcamarero = "";
$idmesa = "";
$fecha = "";
}

}
if(isset($_POST['Actualizar'])){
$id = $_POST['codigo'];
$idcliente = $_POST['idcliente'];
$idcamarero = $_POST['idcamarero'];
$idmesa = $_POST['idmesa'];
$fecha = $_POST['fecha'];
if($id !=""and $idcliente !="" and $idcamarero != "" and $idmesa != "" and $fecha !=""){
$sql = "UPDATE factura SET idcliente='$idcliente',idcamarero='$idcamarero',idmesa='$idmesa',fecha='$fecha' WHERE id = $id";
$resultado = $conexion->query($sql);
$idcliente = "";
$idcamarero = "";
$idmesa = "";
$fecha = "";
}
}

if(isset($_POST['Borrar'])){
	if(isset($_POST['codigo'])){
$id = $_POST['codigo'];
$sql = "DELETE FROM factura WHERE id = $id";
$resultado = $conexion->query($sql);
$id='';
}
}
?>

<div>
<table>
	<thead>
	<tr>
		<th><h2 align="center">Registrar factura</h2></th>
		<th><h2 align="center">Lista factura</h2></th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td>
		<form action="factura.php" method="POST">
		<?php
		if(isset($_POST['nuevo']) or isset($_POST['registrar'])){
			?>
			<label>Codigo cliente</label><br>
			<input type="text" name="idcliente"><br><br>
			<label>Codigo camarero</label><br>
			<input type="text" name="idcamarero"><br><br>
			<label>codigo mesa</label><br>
			<input type="text" name="idmesa"><br><br>
			<label>fecha</label><br>
			<input type="date" name="fecha"><br><br>
			<?php
		}
		if(isset($_POST['Actualizar'])){
			?>
			<label>Codigo cliente</label><br>
			<input type="text" name="idcliente"><br><br>
			<label>Codigo camarero</label><br>
			<input type="text" name="idcamarero"><br><br>
			<label>Codigo mesa</label><br>
			<input type="text" name="idmesa"><br><br>
			<label>fecha</label><br>
			<input type="date" name="fecha"><br><br>
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
			<label>Codigo cliente</label><br>
			<input type="text" name="idcliente"><br><br>
			<label>Codigo camarero</label><br>
			<input type="text" name="idcamarero"><br><br>
			<label>Codigo mesa</label><br>
			<input type="text" name="idmesa"><br><br>
			<label>fecha</label><br>
			<input type="date" name="fecha"><br><br>
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
					<th class="col">Codigo cliente</th>
					<th class="col">Codigo camarero</th>
					<th class="col">Codigo mesa</th>
					<th class="col">fecha</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql1="SELECT * FROM factura";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {?>
					<tr>
					<td class="col"><?php echo $fila['id']; ?></td>
					<td class="col"><?php echo $fila['idcliente']; ?></td>
					<td class="col"><?php echo $fila['idcamarero']; ?></td>
					<td class="col"><?php echo $fila['idmesa']; ?></td>
					<td class="col"><?php echo $fila['fecha']; ?></td>
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