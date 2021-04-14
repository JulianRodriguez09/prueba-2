<?php
	//session start se utiliza para poder identificar si existe un usuario en el aplicativo
	session_start();
	//Utilizar Modelo Conexion a la base de datos
				require_once "../../../Model/Conectar_database.php";
				$c1 = new Conectar_Database();
				$cc=$c1->getconection();
				//sentencias de SQL SERVER conteo de respuesta correctas
				$sqlcorrec=sqlsrv_query($cc,"SELECT COUNT(*)as Correcto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Correcto' and NombreEmpresa ='PALMERAS LA CAROLINA S.A'");
				//sentencias de SQL SERVER conteo de respuesta incorrectas
				$sqlincorrec=sqlsrv_query($cc,"SELECT COUNT(*)as Incorrecto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Incorrecto' and NombreEmpresa ='PALMERAS LA CAROLINA S.A'");
				//guardado de informacion recuperada en variables
				while($columna = sqlsrv_fetch_array($sqlcorrec))
				{
                    $correcto = $columna['Correcto'];
                     
				}
				while($columna = sqlsrv_fetch_array($sqlincorrec))
				{
					$incorrecto = $columna['Incorrecto'];
				}
				//formula para obtener porcentajes
                $suma=$correcto + $incorrecto;
                $porcentajexito1= $correcto * 100 / $suma;
                $porcentajefallo1= $incorrecto * 100 / $suma;

				$sqlcorrec1=sqlsrv_query($cc,"SELECT COUNT(*)as Correcto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Correcto' and NombreEmpresa ='AGROEXPORT DE COLOMBIA'");

				$sqlincorrec1=sqlsrv_query($cc,"SELECT COUNT(*)as Incorrecto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Incorrecto' and NombreEmpresa ='AGROEXPORT DE COLOMBIA'");

				while($columna = sqlsrv_fetch_array($sqlcorrec1))
				{
					$correcto1 = $columna['Correcto'];
				}
				while($columna = sqlsrv_fetch_array($sqlincorrec1))
				{
					$incorrecto1 = $columna['Incorrecto'];
				}
				$suma=$correcto1 + $incorrecto1;
                $porcentajexito2= $correcto1 * 100 / $suma;
                $porcentajefallo2= $incorrecto1 * 100 / $suma;

				$sqlcorrec2=sqlsrv_query($cc,"SELECT COUNT(*)as Correcto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Correcto' and NombreEmpresa ='ALIANZA ORIETAL S.A.'");

				$sqlincorrec2=sqlsrv_query($cc,"SELECT COUNT(*)as Incorrecto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Incorrecto' and NombreEmpresa ='ALIANZA ORIETAL S.A.'");

				while($columna = sqlsrv_fetch_array($sqlcorrec2))
				{
					$correcto2 = $columna['Correcto'];
				}
				while($columna = sqlsrv_fetch_array($sqlincorrec2))
				{
					$incorrecto2 = $columna['Incorrecto'];
				}
				$suma=$correcto2 + $incorrecto2;
                $porcentajexito3= $correcto2 * 100 / $suma;
                $porcentajefallo3= $incorrecto2 * 100 / $suma;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "includes/scripts2.php" ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Sistema Ley1581 | Graficos Generales</title>
	
</head>
<body>
<?php include "includes/header1.php" ?>
<!--section para alojar graficas-->
<section id="containers" >
		<form>
            <div style=' margin: 10px 0 0 35px;  float:left;'>
			<p style=' text-align: center; text-transform: uppercase;'> Respuestas Correctas e inconrrectas Palmeras la carolina s.a</p>
			
			<canvas id="myChart2" style='width: 500px; '> </canvas>
			
			<br>
			<script src="chart.js"></script>
			
			<script >
				
			var ctx2 = document.getElementById('myChart2').getContext('2d');
			var chart = new Chart(ctx2, {
				type: 'doughnut',
				data: 	
				{
					
							datasets: [{
								
								data: [<?php echo $correcto; ?>,<?php echo $incorrecto; ?>],
								backgroundColor: [ 'green','red']
								
							}],
							labels: [
								'Correcto',
								'incorrecto'
							]},
				options: {
					responsive:true,
                    maintainAspectRatio: false,
                    
				}                  
        
            });
            </script>
            
            </div>
            <div style="margin-top: 10px;  " >
                <p style='text-align:center; text-transform: uppercase;'>Porcentaje de exito</p>
                <br>
                <p style='text-align:center;'>En la Empresa Palmeras la Carolina S.A los evaluados <br> han tenido un exito del <?php echo round($porcentajexito2);?> % y un fallo del  <?php echo round($porcentajefallo2); ?> % <br>en las preguntas evaluadas. </p>
            </div>
		</form>
	</section>

	<section id='containers'>
	<form>
		<div style=' margin: 10px 0 0 10px;  float:left;'>
			<p style=' text-align: center; text-transform: uppercase;'> Respuestas Correctas e inconrrectas Agroexport de colombia s.a.s</p>
			
			<canvas id="myChart" style='width: 500px; '> </canvas>
			
			<br>
			<script src="chart.js"></script>
			
			<script >
				
			var ctx2 = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx2, {
				type: 'doughnut',
				data: 	
				{
					
							datasets: [{
								
								data: [<?php echo $correcto1; ?>,<?php echo $incorrecto1; ?>],
								backgroundColor: [ 'green','red']
								
							}],
							labels: [
								'Correcto',
								'incorrecto'
							]},
				options: {
					responsive:true,
					maintainAspectRatio: false,
					
				}
			});
			</script>
			</div>
			<div style="margin-top: 10px; " >
                <p style='text-align:center; text-transform: uppercase;'>Porcentaje de exito</p>
                <br>
                <p style='text-align:center;'>En la Empresa Agroexport de Colombia S.A.S los evaluados <br> han tenido un exito del <?php echo round($porcentajexito1);?> % y un fallo del  <?php echo round($porcentajefallo1); ?> % <br>en las preguntas evaluadas. </p>
            </div>
		</form>
	</section>

	<section id='containers'>
	<form>
	<div style=' margin: 10px 0 0 60px;  float:left;'>
		<p style=' text-align: center; text-transform: uppercase;'> Respuestas Correctas e inconrrectas Alianza orietal s.a</p>
			
			<canvas id="myChart3" style='width: 500px; '> </canvas>
			
			<br>
			<script src="chart.js"></script>
			
			<script >
				
			var ctx2 = document.getElementById('myChart3').getContext('2d');
			var chart = new Chart(ctx2, {
				type: 'doughnut',
				data: 	
				{
					
							datasets: [{
								
								data: [<?php echo $correcto2; ?>,<?php echo $incorrecto2; ?>],
								backgroundColor: [ 'green','red']
								
							}],
							labels: [
								'Correcto',
								'incorrecto'
							]},
				options: {
					responsive:true,
					maintainAspectRatio: false,
					
				}
			});
			</script>
			</div>
			<div style="margin-top: 10px; " >
                <p style='text-align:center; text-transform: uppercase;'>Porcentaje de exito</p>
                <br>
                <p style='text-align:center;'>En la Empresa Alianza Oriental S.A los evaluados <br> han tenido un exito del <?php echo round($porcentajexito3);?> % y un fallo del  <?php echo round($porcentajefallo3); ?> % <br>en las preguntas evaluadas. </p>
            </div>
		</form>
	</section>
	
	<?php include "includes/footer.php" ?>
</body>
</html>