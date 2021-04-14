<?php
//esto sirve para iniciar una secion si eta no se sierra la pagina seguira abierta
	session_start();
	//Utilizar modelo para conectar base de datos 
	require_once "../../Model/Conectar_database.php";
	$c1 = new Conectar_Database();
	$cc=$c1->getconection();
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "Sistema/includes/scripts.php" ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Sistema Ley1581 | Inicio</title>
	
</head>
<body>
<?php include "Sistema/includes/header.php" ?>
<?php 
$fecha = date('Y');
//de esta forma traemos informacion necesaria para realizar graficos
//evaluaciones palmeras
	//Enero
	
	$palmerasenero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1'");
	while( $row = sqlsrv_fetch_array($palmerasenero) ) 
	{
	$digitalpalmerasenero = $row['EvaluacionDigital'];
	$fisicapalmerasenero= $row['EvaluacionFisica'];
	}
	$sumpalmerasenero = $fisicapalmerasenero + $digitalpalmerasenero;
	//Febreo
	$palmerasfebrero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2'");
	while( $row = sqlsrv_fetch_array($palmerasfebrero) ) 
	{
	$digitalpalmerasfebrero = $row['EvaluacionDigital'];
	$fisicapalmerasfebrero= $row['EvaluacionFisica'];
	}
	$sumpalmerasfebrero = $fisicapalmerasfebrero + $digitalpalmerasfebrero;

	//Marzo
	$palmerasMarzo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3'");
	while( $row = sqlsrv_fetch_array($palmerasMarzo) ) 
	{
	$digitalpalmerasMarzo = $row['EvaluacionDigital'];
	$fisicapalmerasMarzo= $row['EvaluacionFisica'];
	}
	$sumpalmerasMarzo = $fisicapalmerasMarzo + $digitalpalmerasMarzo;

	//Abril
	$palmerasAbril = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4'");
	while( $row = sqlsrv_fetch_array($palmerasAbril) ) 
	{
	$digitalpalmerasAbril = $row['EvaluacionDigital'];
	$fisicapalmerasAbril= $row['EvaluacionFisica'];
	}
	$sumpalmerasAbril = $fisicapalmerasAbril + $digitalpalmerasAbril;

	//Mayo
	$palmerasMayo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5'");
	while( $row = sqlsrv_fetch_array($palmerasMayo) ) 
	{
	$digitalpalmerasMayo = $row['EvaluacionDigital'];
	$fisicapalmerasMayo= $row['EvaluacionFisica'];
	}
	$sumpalmerasMayo = $fisicapalmerasMayo + $digitalpalmerasMayo;

	//Junio
	$palmerasJunio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6'");
	while( $row = sqlsrv_fetch_array($palmerasJunio) ) 
	{
	$digitalpalmerasJunio = $row['EvaluacionDigital'];
	$fisicapalmerasJunio= $row['EvaluacionFisica'];
	}
	$sumpalmerasJunio = $fisicapalmerasJunio + $digitalpalmerasJunio;

	//Julio
	$palmerasJulio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7'");
	while( $row = sqlsrv_fetch_array($palmerasJulio) ) 
	{
	$digitalpalmerasJulio = $row['EvaluacionDigital'];
	$fisicapalmerasJulio= $row['EvaluacionFisica'];
	}
	$sumpalmerasJulio = $fisicapalmerasJulio + $digitalpalmerasJulio;

	//Agosto
	$palmerasAgosto = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8'");
	while( $row = sqlsrv_fetch_array($palmerasAgosto) ) 
	{
	$digitalpalmerasAgosto = $row['EvaluacionDigital'];
	$fisicapalmerasAgosto= $row['EvaluacionFisica'];
	}
	$sumpalmerasAgosto = $fisicapalmerasAgosto + $digitalpalmerasAgosto;

	//Septiembre
	$palmerasSeptiembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9'");
	while( $row = sqlsrv_fetch_array($palmerasSeptiembre) ) 
	{
	$digitalpalmerasSeptiembre = $row['EvaluacionDigital'];
	$fisicapalmerasSeptiembre= $row['EvaluacionFisica'];
	}
	$sumpalmerasSeptiembre = $fisicapalmerasSeptiembre + $digitalpalmerasSeptiembre;

	//Octubre
	$palmerasOctubre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10'");
	while( $row = sqlsrv_fetch_array($palmerasOctubre) ) 
	{
	$digitalpalmerasOctubre = $row['EvaluacionDigital'];
	$fisicapalmerasOctubre= $row['EvaluacionFisica'];
	}
	$sumpalmerasOctubre = $fisicapalmerasOctubre + $digitalpalmerasOctubre;

	//Noviembre
	$palmerasNoviembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11'");
	while( $row = sqlsrv_fetch_array($palmerasNoviembre) ) 
	{
	$digitalpalmerasNoviembre = $row['EvaluacionDigital'];
	$fisicapalmerasNoviembre= $row['EvaluacionFisica'];
	}
	$sumpalmerasNoviembre = $fisicapalmerasNoviembre + $digitalpalmerasNoviembre;

	//Diciembre
	$palmerasDiciembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 1 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12'");
	while( $row = sqlsrv_fetch_array($palmerasDiciembre) ) 
	{
	$digitalpalmerasDiciembre = $row['EvaluacionDigital'];
	$fisicapalmerasDiciembre= $row['EvaluacionFisica'];
	}
	$sumpalmerasDiciembre = $fisicapalmerasDiciembre + $digitalpalmerasDiciembre;
	//Evaluaciones Agroexport
	//Enero
	$agroexpoEnero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1'");
	while( $row = sqlsrv_fetch_array($agroexpoEnero) ) 
	{
	$digitalagroexpoEnero = $row['EvaluacionDigital'];
	$fisicaagroexpoEnero= $row['EvaluacionFisica'];
	}
	$sumagroexpoEnero = $fisicaagroexpoEnero + $digitalagroexpoEnero;
	//Febrero
	$agroexportFebrero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2'");
	while( $row = sqlsrv_fetch_array($agroexportFebrero) ) 
	{
	$digitalagroexpoFebrero = $row['EvaluacionDigital'];
	$fisicaagroexpoFebrero= $row['EvaluacionFisica'];
	}
	$sumagroexpoFebrero = $fisicaagroexpoFebrero + $digitalagroexpoFebrero;

	//Marzo
	$agroexpoMarzo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3'");
	while( $row = sqlsrv_fetch_array($agroexpoMarzo) ) 
	{
	$digitalagroexpoMarzo = $row['EvaluacionDigital'];
	$fisicaagroexpoMarzo= $row['EvaluacionFisica'];
	}
	$sumagroexpoMarzo = $fisicaagroexpoMarzo + $digitalagroexpoMarzo;

	//Abril
	$agroexpoAbril = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4'");
	while( $row = sqlsrv_fetch_array($agroexpoAbril) ) 
	{
	$digitalagroexpoAbril = $row['EvaluacionDigital'];
	$fisicaagroexpoAbril= $row['EvaluacionFisica'];
	}
	$sumagroexpoAbril = $fisicaagroexpoAbril + $digitalagroexpoAbril;

	//Mayo
	$agroexpoMayo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5'");
	while( $row = sqlsrv_fetch_array($agroexpoMayo) ) 
	{
	$digitalagroexpoMayo = $row['EvaluacionDigital'];
	$fisicaagroexpoMayo= $row['EvaluacionFisica'];
	}
	$sumagroexpoMayo = $fisicaagroexpoMayo + $digitalagroexpoMayo;

	//Junio
	$agroexpoJunio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6'");
	while( $row = sqlsrv_fetch_array($agroexpoJunio) ) 
	{
	$digitalagroexpoJunio = $row['EvaluacionDigital'];
	$fisicaagroexpoJunio= $row['EvaluacionFisica'];
	}
	$sumagroexpoJunio = $fisicaagroexpoJunio + $digitalagroexpoJunio;

	//Julio
	$agroexpoJulio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7'");
	while( $row = sqlsrv_fetch_array($agroexpoJulio) ) 
	{
	$digitalagroexpoJulio = $row['EvaluacionDigital'];
	$fisicaagroexpoJulio= $row['EvaluacionFisica'];
	}
	$sumagroexpoJulio = $fisicaagroexpoJulio + $digitalagroexpoJulio;

	//Agosto
	$agroexpoAgosto = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8'");
	while( $row = sqlsrv_fetch_array($agroexpoAgosto) ) 
	{
	$digitalagroexpoAgosto = $row['EvaluacionDigital'];
	$fisicaagroexpoAgosto= $row['EvaluacionFisica'];
	}
	$sumagroexpoAgosto = $fisicaagroexpoAgosto + $digitalagroexpoAgosto;

	//Septiembre
	$agroexpoSeptiembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9'");
	while( $row = sqlsrv_fetch_array($agroexpoSeptiembre) ) 
	{
	$digitalagroexpoSeptiembre = $row['EvaluacionDigital'];
	$fisicaagroexpoSeptiembre= $row['EvaluacionFisica'];
	}
	$sumagroexpoSeptiembre = $fisicaagroexpoSeptiembre + $digitalagroexpoSeptiembre;

	//Octubre
	$agroexpoOctubre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10'");
	while( $row = sqlsrv_fetch_array($agroexpoOctubre) ) 
	{
	$digitalagroexpoOctubre = $row['EvaluacionDigital'];
	$fisicaagroexpoOctubre= $row['EvaluacionFisica'];
	}
	$sumagroexpoOctubre = $fisicaagroexpoOctubre + $digitalagroexpoOctubre;

	//Noviembre
	$agroexpoNoviembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11'");
	while( $row = sqlsrv_fetch_array($agroexpoNoviembre) ) 
	{
	$digitalagroexpoNoviembre = $row['EvaluacionDigital'];
	$fisicaagroexpoNoviembre= $row['EvaluacionFisica'];
	}
	$sumagroexpoNoviembre = $fisicaagroexpoNoviembre + $digitalagroexpoNoviembre;

	//Diciembre
	$agroexpoDiciembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 2 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12'");
	while( $row = sqlsrv_fetch_array($agroexpoDiciembre) ) 
	{
	$digitalagroexpoDiciembre = $row['EvaluacionDigital'];
	$fisicaagroexpoDiciembre= $row['EvaluacionFisica'];
	}
	$sumagroexpoDiciembre = $fisicaagroexpoDiciembre + $digitalagroexpoDiciembre;

	//Alianza
	//Enero
	$alianzaEnero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '1'");
	while( $row = sqlsrv_fetch_array($alianzaEnero) ) 
	{
	$digitalalianzaEnero = $row['EvaluacionDigital'];
	$fisicaalianzaEnero= $row['EvaluacionFisica'];
	}
	$sumalianzaEnero = $fisicaalianzaEnero + $digitalalianzaEnero;

	//Febrero
	$alianzaFebrero = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '2'");
	while( $row = sqlsrv_fetch_array($alianzaFebrero) ) 
	{
	$digitalalianzaFebrero = $row['EvaluacionDigital'];
	$fisicaalianzaFebrero= $row['EvaluacionFisica'];
	}
	$sumalianzaFebrero = $fisicaalianzaFebrero + $digitalalianzaFebrero;

	//Marzo
	$alianzaMarzo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '3'");
	while( $row = sqlsrv_fetch_array($alianzaMarzo) ) 
	{
	$digitalalianzaMarzo = $row['EvaluacionDigital'];
	$fisicaalianzaMarzo= $row['EvaluacionFisica'];
	}
	$sumalianzaMarzo = $fisicaalianzaMarzo + $digitalalianzaMarzo;

	//Abril
	$alianzaAbril = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '4'");
	while( $row = sqlsrv_fetch_array($alianzaAbril) ) 
	{
	$digitalalianzaAbril = $row['EvaluacionDigital'];
	$fisicaalianzaAbril= $row['EvaluacionFisica'];
	}
	$sumalianzaAbril = $fisicaalianzaAbril + $digitalalianzaAbril;

	//Mayo
	$alianzaMayo = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '5'");
	while( $row = sqlsrv_fetch_array($alianzaMayo) ) 
	{
	$digitalalianzaMayo = $row['EvaluacionDigital'];
	$fisicaalianzaMayo= $row['EvaluacionFisica'];
	}
	$sumalianzaMayo = $fisicaalianzaMayo + $digitalalianzaMayo;

	//Junio
	$alianzaJunio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '6'");
	while( $row = sqlsrv_fetch_array($alianzaJunio) ) 
	{
	$digitalalianzaJunio = $row['EvaluacionDigital'];
	$fisicaalianzaJunio= $row['EvaluacionFisica'];
	}
	$sumalianzaJunio = $fisicaalianzaJunio + $digitalalianzaJunio;

	//Julio
	$alianzaJulio = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '7'");
	while( $row = sqlsrv_fetch_array($alianzaJulio) ) 
	{
	$digitalalianzaJulio = $row['EvaluacionDigital'];
	$fisicaalianzaJulio= $row['EvaluacionFisica'];
	}
	$sumalianzaJulio = $fisicaalianzaJulio + $digitalalianzaJulio;

	//Agosto
	$alianzaAgosto = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '8'");
	while( $row = sqlsrv_fetch_array($alianzaAgosto) ) 
	{
	$digitalalianzaAgosto = $row['EvaluacionDigital'];
	$fisicaalianzaAgosto= $row['EvaluacionFisica'];
	}
	$sumalianzaAgosto = $fisicaalianzaAgosto + $digitalalianzaAgosto;

	//Septiembre
	$alianzaSeptiembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '9'");
	while( $row = sqlsrv_fetch_array($alianzaSeptiembre) ) 
	{
	$digitalalianzaSeptiembre = $row['EvaluacionDigital'];
	$fisicaalianzaSeptiembre= $row['EvaluacionFisica'];
	}
	$sumalianzaSeptiembre = $fisicaalianzaSeptiembre + $digitalalianzaSeptiembre;

	//Octubre
	$alianzaOctubre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '10'");
	while( $row = sqlsrv_fetch_array($alianzaOctubre) ) 
	{
	$digitalalianzaOctubre = $row['EvaluacionDigital'];
	$fisicaalianzaOctubre= $row['EvaluacionFisica'];
	}
	$sumalianzaOctubre = $fisicaalianzaOctubre + $digitalalianzaOctubre;

	//Noviembre
	$alianzaNoviembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '11'");
	while( $row = sqlsrv_fetch_array($alianzaNoviembre) ) 
	{
	$digitalalianzaNoviembre = $row['EvaluacionDigital'];
	$fisicaalianzaNoviembre= $row['EvaluacionFisica'];
	}
	$sumalianzaNoviembre = $fisicaalianzaNoviembre + $digitalalianzaNoviembre;

	//Diciembre
	$alianzaDiciembre = sqlsrv_query($cc,"SELECT COUNT(*)as EvaluacionDigital,(SELECT COUNT(*)
							from archivos as a 
							inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa= e.IDEmpleadosEmpresa
							where  IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12')as EvaluacionFisica
							from PreguntaRespuesta as p 
							inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
							 where IDPregunta = 1 and IDEmpresas = 3 and Year(Fecha) = '$fecha' and MONTH(Fecha) = '12'");
	while( $row = sqlsrv_fetch_array($alianzaDiciembre) ) 
	{
	$digitalalianzaDiciembre = $row['EvaluacionDigital'];
	$fisicaalianzaDiciembre= $row['EvaluacionFisica'];
	}
	$sumalianzaDiciembre = $fisicaalianzaDiciembre + $digitalalianzaDiciembre;

	$sqlcorrec2=sqlsrv_query($cc,"SELECT COUNT(*)as Correcto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Correcto' and YEAR(Fecha)='$fecha' ");

				$sqlincorrec2=sqlsrv_query($cc,"SELECT COUNT(*)as Incorrecto from PreguntaRespuesta as p 
											inner join EmpleadosEmpresa as e on p.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
											inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
											Where evaluar ='Incorrecto' and YEAR(Fecha)='$fecha' ");

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
<!--section para alojar las graficas-->
<section id="containers" >
		<form> 
		<div style=' margin: 10px 0 0 35px;  float:left;'>
		<p style=' text-align: center; text-transform: uppercase;'> Evaluaciones realizadas en el del año <?php echo $fecha?> </p>
			<canvas id="evaluadosChart" width="700px" ></canvas>
			<script src="Sistema/chart.js"></script>
			<script>
				var evaluadosCanvas = document.getElementById("evaluadosChart");

				Chart.defaults.global.defaultFontFamily = "Lato";
				Chart.defaults.global.defaultFontSize = 18;

				var EvaluadosPalmerasData = {
				label: 'Evaluados Palmeras',
				data: [<?php echo $sumpalmerasenero; ?>,<?php echo $sumpalmerasfebrero; ?>,<?php echo $sumpalmerasMarzo; ?>,<?php echo $sumpalmerasAbril; ?>,<?php echo $sumpalmerasMayo; ?>,<?php echo $sumpalmerasJunio; ?>,<?php echo $sumpalmerasJulio; ?>,<?php echo $sumpalmerasAgosto; ?>,<?php echo $sumpalmerasSeptiembre; ?>,<?php echo $sumpalmerasOctubre; ?>,<?php echo $sumpalmerasNoviembre; ?>,<?php echo $sumpalmerasDiciembre; ?>],
				backgroundColor: 'rgba(0, 99, 132, 0.6)',
				borderWidth: 0,
				yAxisID: "y-axis-palmeras"
				};

				var EvaluadosAgroexportData = {
				label: 'Evaluados Agroexport',
				data: [<?php echo $sumagroexpoEnero; ?>, <?php echo $sumagroexpoFebrero; ?>,<?php echo $sumagroexpoMarzo; ?>,<?php echo $sumagroexpoAbril; ?>,<?php echo $sumagroexpoMayo; ?>,<?php echo $sumagroexpoJunio; ?>,<?php echo $sumagroexpoJulio; ?>,<?php echo $sumagroexpoAgosto; ?>,<?php echo $sumagroexpoSeptiembre; ?>,<?php echo $sumagroexpoOctubre; ?>,<?php echo $sumagroexpoNoviembre; ?>,<?php echo $sumagroexpoDiciembre; ?>],
				backgroundColor: 'rgba(99, 132, 0, 0.6)',
				borderWidth: 0,
				yAxisID: "y-axis-agroexport"
				};

				var EvaluadosAlianzaData = {
				label: 'Evaluados Alianza',
				data: [<?php echo $sumalianzaEnero; ?>,<?php echo $sumalianzaFebrero; ?>,<?php echo $sumalianzaMarzo; ?>,<?php echo $sumalianzaAbril; ?>,<?php echo $sumalianzaMayo; ?>,<?php echo $sumalianzaJunio; ?>,<?php echo $sumalianzaJulio; ?>,<?php echo $sumalianzaAgosto; ?>,<?php echo $sumalianzaSeptiembre; ?>,<?php echo $sumalianzaOctubre; ?>,<?php echo $sumalianzaNoviembre; ?>,<?php echo $sumalianzaDiciembre; ?>],
				backgroundColor: 'rgba(63, 63, 191, 0.6)',
				borderWidth: 0,
				yAxisID: "y-axis-alianza"
				};

				var mesesData = {
				labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
				datasets: [EvaluadosPalmerasData, EvaluadosAgroexportData,EvaluadosAlianzaData]
				};

				var chartOptions = {
				scales: {
					xAxes: [{
					barPercentage: 1,
					categoryPercentage: 0.6
					}],
					yAxes: [{
					id: "y-axis-palmeras"
					}, {
					id: "y-axis-agroexport"
					}, {
					id: "y-axis-alianza"
					}]
				}
				};

				var barChart = new Chart(evaluadosCanvas, {
				type: 'bar',
				data: mesesData,
				options: chartOptions
				});
			</script>
		</div>
		<div style="margin-top: 10px; " >
		<p style='text-align:center; text-transform: uppercase; '>Explicación gráficas</p>
                <br>
                <p style ='letter-spacing: 1px; '>En estas gráficas se muestra el numero de evaluados mensualmente y cuantas preguntas fueron contestadas correcta e incorrectamente en el año <?php echo $fecha ?> .</p>
				<br>
				<p style ='letter-spacing: 1px;'>Para ver el resumen general de exito en las evaluaciones ingrese <a href='GraficaGeneral.php'>aquí </a> ó diríjase en la parte superior en el apartado graficos. </p>
				<br>
				<p style ='letter-spacing: 1px; '>Si quiere un resumen de un año en especifico ingrese <a href='ResumenPorAño.php'>aquí </a> ó diríjase en la parte superior en el apartado resumen anual. </p>
				<br>
				<p style='text-align:center;'><img src="../img/PLC.jpeg" > <img style='margin: -5px auto;  width: 200px; height: 70px;'src="../img/Agroexport.jpeg" > <img src="../img/AlianzaOriental.jpeg" ></p>
		</div>
		<div style=' margin: 10px 0 0 35px;  float:left;'>
        <p style=' text-align: center; text-transform: uppercase;'> Respuestas Correctas e inconrrectas evaluacion digital del año <?php echo $fecha?> </p>
        <canvas id="myChart3" style='width: 700px; '> </canvas>
			
			<br>
			<script src="Sistema/chart.js"></script>
			
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
		</form>
	</section>
	
	<?php include "Sistema/includes/footer.php" ?>
</body>
</html>

