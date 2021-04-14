<?php
    require_once('../Fpdf/fpdf.php');
    require_once('../../../Model/ModelGenerarReporteAlianza.php');
    include_once "../includes/functions.php";
    class PDF extends Fpdf
    {
        public function Header()
        {
            //Logo
            $this->Image('../img/AlianzaOriental.jpeg',30,10,10);
            //Arial bold 15
            $this->SetFont('Arial','I',15);
            //Movernos a la derecha
            $this->Cell(67);
            //Titulo
            $this->SetY(13);
            $this->SetX(80);
            $this->Cell(50,10,utf8_decode('Reporte Evaluación Alianza oriental S.A'),0,0,'C');
            //Descripción PDF
            $this->SetFont('Arial','I',11);
            $this->SetY(25);
            $this->SetX(80);
            $this->Cell(50,10,utf8_decode('Este reporte de evaluación'),0,0,'C'); 
            $this->SetY(32);
            $this->SetX(80);
            $this->Cell(50,10,' de la empresa Alianza oriental S.A' ,0,0,'C');
            $this->SetY(40);
            $this->SetX(80); 
            $this->Cell(50,10,'fue expedido el dia '.fechaC().'' ,0,0,'C');

            $this->SetFont('Arial','B',12);
            $this->SetY(50);
            $this->SetX(90);
            $this->SetFont('Arial','I',12);
            
            $this->Cell(30,10,utf8_decode('"Conceptos básicos de la protección de datos - Ley 1581 de 2012 y decreto 1377 de 2013".'),10,1,'C',0);
            //Salto de línea
            $this->Ln(89);
            $this->SetFont('Arial','B',12);
            $this->SetY(60);
            $this-> Cell(30,7,"Evaluado:",10,1,'L',0);
			$this->SetY(65);
		    
			$this->Cell(30,7,utf8_decode("Cédula:"),10,1,'L',0);

			$this->SetY(70);
		    
			$this->Cell(30,7,utf8_decode("Fecha Realización evaluación:"),10,1,'L',0);

            $this->Ln(25);
            
            $this->SetFont('Arial','B',12);

			$this->SetY(80);
			$this->SetX(10);
						            
									
			$this->Cell(62.5,7,"Pregunta",1,0,'C',0);
			$this->Cell(106.5,7,"Respuesta",1,0,'C',0);
			$this->Cell(22,7,"Evaluar",1,1,'C',0);

			
        }

       
		function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
 
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(). '/{nb}',0,0,'C');
        }
        
    }

        $pdf=new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',6.5);

        require_once "../../../../Model/Conectar_database.php";
        $c1 = new Conectar_Database();
        $cc=$c1->getconection();

       
        $resultado1= sqlsrv_query($cc,$reporte);
        
        //tabla Pregunta y respuesta
        while($columna = sqlsrv_fetch_array($resultado1))
        {	           
			$pdf->Cell(62.5,6,utf8_decode($columna["Pregunta"]),1,0,'L');
            $pdf->Cell(106.5,6,utf8_decode($columna["Respuesta"]),1,0,'L');
            if($columna["evaluar"]=='Correcto'){
                $pdf->SetTextColor(0,255,0);
                $pdf->Cell(22,6,$columna["evaluar"],1,1,'C');
                $pdf->SetTextColor(0,0,0);
            }else{
                $pdf->SetTextColor(194,8,8);
                $pdf->Cell(22,6,$columna["evaluar"],1,1,'C');
                $pdf->SetTextColor(0,0,0);
            }
        }
      
        

        $resultado2= sqlsrv_query($cc,$reporte1);
        
        //encabezado Nombre,Identificacion y fecha
        $pdf->SetFont('Arial','',12);
		while($columna = sqlsrv_fetch_array($resultado2))
		{
			$pdf->SetY(60.5);
			$pdf->SetX(28);
			$pdf->Cell(3);

			$pdf->Cell(30,6,utf8_decode($columna["Nombres"]).' '.utf8_decode($columna["Apellidos"]),2,6,'L',0);						
        }
        
        $resultado3= sqlsrv_query($cc,$reporte2);
		while($columna = sqlsrv_fetch_array($resultado3))
		{
			$pdf->SetY(65.5);
			$pdf->SetX(26);
			$pdf->Cell(30,6,number_format($columna["Identificacion"]),2,0,'L',0);
        }
        
        $resultado4= sqlsrv_query($cc,$reporte3	);
		while($columna	 = sqlsrv_fetch_array($resultado4))
		{
            $date = $columna['Fecha'];
            $result = $date->format('Y-m-d');
                            
		    $pdf->SetY(70.5);
			$pdf->SetX(72);
			$pdf->Cell(45,6,$result,2,0,'L',0);
        }

        $resultado5= sqlsrv_query($cc,$reporte4	);
		while($columna	 = sqlsrv_fetch_array($resultado5))
		{
            $pdf->SetY(175);
            $pdf->SetFont('Arial','I',12);
			$correctas = $columna["Correctas"];
            $porcentaje = $correctas * 100 / 13;
			$pdf->Cell(30,6,'el evaluado a obtenido '. $columna["Correctas"]. ' respuestas correctas de 13 posibles, '.number_format($porcentaje).'% de las respuestas son correctas' ,2,0,'L');
        }
        
        $pdf->Cell(20,50,utf8_decode('')); 
		$pdf->Output();
?>