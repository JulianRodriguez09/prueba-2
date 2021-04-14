<?php
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
	session_start();
	//Utilizamos Modelo de conexion a la base de datos
	require_once "../Model/Conectar_database.php";
	$c1 = new Conectar_Database();
	$cc=$c1->getconection();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "includes/scripts.php" ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Ley1581 | Inicio</title>
	
</head>
<body>
<?php include "includes/header.php" ?>
<!--section para mostrar al usuario los distintos apartados que existen en el aplicativo-->
<section id="containers" >
		<form> 
			<h3>sistema general protección de datos</h3>
			<p style='text-align:center; padding:10px;  font-size: 18pt;' ><strong> Ley 1581 de 2012 </strong></p>
			<p style='text-align:center; padding:10px;  font-size: 18pt;' ><strong>  decreto 1377 de 2013 </strong></p>
			<!-- este div se utiliza para que los apartados del aplicativo tengan un campo establecido-->
			<div style='text-align:center; padding:20px;'>
			<!--PHP para restringir el acceso a los apartados del aplicativo segun el tipo de usuario que ingreso al sistema-->
			<?php if( $_SESSION['rol'] =='SuperAdmin'){?><!--restriccion segun tippo de usuario-->

				<div style ='position:relative; text-align:center; display:inline-block;'>
					<a href="PoliticasGeneral.php"><img style ='width: 150px;'src='img/POLITICAS.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;'src='img/DOCUMENTACION.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px; 'src='img/auditoria.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="ReportesEvaluacion1581/"><img style ='width: 150px;'src='img/reportes.png'></a>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;  'src='img/capacitacion.png'></a>
				<div style ='position:relative; display:inline-block;'>
					<a href="Ley1581/" target="_blank"><img style ='width: 150px;'src='img/evaluacion.png'></a>
				</div>
				<?php

				}elseif($_SESSION['rol'] =='Admin'){ ?>

				<div style ='position:relative; text-align:center; display:inline-block;'>
					<a href="PoliticasGeneral.php"><img style ='width: 150px;'src='img/POLITICAS.png'></a>
				</div>
					
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;'src='img/documentacion.png'></a>
					
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px; 'src='img/auditoria.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="ReportesEvaluacion1581/"><img style ='width: 150px;'src='img/reportes.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;  'src='img/capacitacion.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="Ley1581/" target="_blank"><img style ='width: 150px;'src='img/evaluacion.png'></a>
				</div>


				
				<?php
				}else{
				?>
				<div style ='position:relative; text-align:center; display:inline-block;'>
					<a href="#"><img style ='width: 150px;'src='img/politicas.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;'src='img/documentacion.png'></a>
					
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px; 'src='img/auditoria.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;'src='img/reportes.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="#"><img style ='width: 150px;  'src='img/capacitacion.png'></a>
				</div>
				<div style ='position:relative; display:inline-block;'>
					<a href="Ley1581/" target="_blank"><img style ='width: 150px;'src='img/evaluacion.png'></a>
				</div>
				<?php
				}
				?>
			</div>
		</form>
	</section>
	
	<?php include "includes/footer.php" ?>
</body>
</html>

