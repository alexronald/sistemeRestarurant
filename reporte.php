<?php
include_once 'conexion.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
	{
		function Header()
		{
	        $this->SetFont('Arial','B',12);
	        $this->Cell(70);
	        $this->Cell(50,10, 'SISTEMA PARA RESTAURANT',0,1,'C');
			$this->Cell(70);
			$this->setDrawColor(53,73,224);
			$this->setFillColor(53,73,224);
			$this->Cell(25);
			$this->Rect(20,20,170,1,'FD');
			//$this->Cell(150,1,'',1,1,'C');
	        $this->Ln(10);
			$this->setDrawColor(0,0,0);
			//$this->Image('img/img1.jpg', 30, 10, 20 );
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
			$pdf = new PDF();
			$pdf->AddPage();
			$pdf->AliasNbPages();
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De camarero',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(20);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(25,10,'Nombre',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Paterno',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Materno',1,0,'C',0);
            $pdf->cell(35,10,'DNI',1,1,'C');
				$sql1="SELECT * FROM camarero";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(20);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(25,6,$fila['nombre'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido1'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido2'],1,0,'C',0);
					$pdf->cell(35,6,$fila['dni'],1,1,'C',0);
				}
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De Usuario',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(40);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(25,10,'Nombre',1,0,'C',0);
            $pdf->cell(40,10,'Contraseña',1,0,'C',0);
            $pdf->cell(35,10,'DNI',1,1,'C');

            $sql1="SELECT * FROM usuario";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(40);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(25,6,$fila['nombre'],1,0,'C',0);
					$pdf->cell(40,6,$fila['password'],1,0,'C',0);
					$pdf->cell(35,6,$fila['dni'],1,1,'C',0);
				}
			
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De Cliente',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(20);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(25,10,'Nombre',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Paterno',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Materno',1,0,'C',0);
            $pdf->cell(35,10,'DNI',1,1,'C');

            $sql1="SELECT * FROM cliente";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(20);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(25,6,$fila['nombre'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido1'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido2'],1,0,'C',0);
					$pdf->cell(35,6,$fila['dni'],1,1,'C',0);
				}

			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De Cosinero',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(20);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(25,10,'Nombre',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Paterno',1,0,'C',0);
            $pdf->cell(40,10,'Apellido Materno',1,0,'C',0);
            $pdf->cell(35,10,'DNI',1,1,'C');

            $sql1="SELECT * FROM cosinero";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(20);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(25,6,$fila['nombre'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido1'],1,0,'C',0);
					$pdf->cell(40,6,$fila['apellido2'],1,0,'C',0);
					$pdf->cell(35,6,$fila['dni'],1,1,'C',0);
				}
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De Mesa',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(35);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(60,10,'Nº Max Comensale',1,0,'C',0);
            $pdf->cell(40,10,'ubicacion',1,1,'C',0);

            $sql1="SELECT * FROM mesa";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(35);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(60,6,$fila['numMaxComensale'],1,0,'C',0);
					$pdf->cell(40,6,$fila['ubicacion'],1,1,'C',0);
				}
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60);
			$pdf->Cell(70,15, 'Reporte De Factura',1,0,'C');
			$pdf->Ln(20);
            $pdf->Cell(30);
			$pdf->cell(20,10,'codigo',1,0,'C');
            $pdf->cell(25,10,'id cliente',1,0,'C',0);
            $pdf->cell(40,10,'id camarero',1,0,'C',0);
            $pdf->cell(25,10,'id mesa',1,0,'C',0);
            $pdf->cell(35,10,'fecha',1,1,'C');

            $sql1="SELECT * FROM factura";
				$resultado = $conexion->query($sql1);
				while($fila = $resultado->fetch_assoc()) {
					$pdf->Cell(30);
					$pdf->cell(20,6,$fila['id'],1,0,'C',0);
					$pdf->cell(25,6,$fila['idcliente'],1,0,'C',0);
					$pdf->cell(40,6,$fila['idcamarero'],1,0,'C',0);
					$pdf->cell(25,6,$fila['idmesa'],1,0,'C',0);
					$pdf->cell(35,6,$fila['fecha'],1,1,'C',0);
				}
            $pdf->Output();
?>