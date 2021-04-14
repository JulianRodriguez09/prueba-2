<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
$busqueda=$_REQUEST['busqueda'];
$empresa =$_REQUEST['empresa'];
$buscar = sqlsrv_query($cc,"SELECT * FROM Empresas Where IDEmpresas = '$empresa'");
$empresas = sqlsrv_query($cc,"SELECT * FROM Empresas where IDEmpresas != '$empresa'");
while($columna = sqlsrv_fetch_array($buscar) ){
    $nombreempresa = $columna['NombreEmpresa'];
}
if($empresa != 'SELECCIONAR EMPRESA'&empty($busqueda)){
 $busqueda = '';
}elseif(!empty($busqueda)&$empresa =='SELECCIONAR EMPRESA'){
 $empresa= '';
}elseif($empresa == 'SELECCIONAR EMPRESA'&empty($busqueda)){
	header('location:PoliticasGeneral.php');
}
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Ley1581 | Politicas</title>
</head>

<body>
<?php include "includes/header.php" ?>
<!--section para alojar formulario-->
<section id="containers">
        <?php		
			if($_SESSION['rol'] == 'SuperAdmin'){
		?>
			<form action='buscar_politica.php' method='get'><!--form para enviar informacion de input a busqueda-->
            <h1>Politicas </h1>
        
            <br>
            <select name='empresa'>
			 <option><?php echo $nombreempresa;?></option>
			 <?php
			 	while($columna = sqlsrv_fetch_array($empresas) ){
			 ?>
			 	<option value='<?php echo $columna['IDEmpresas']; ?>'> <?php echo $columna['NombreEmpresa']; ?></option>
			 <?php
			 	}
			 ?>
			</select>
            <input  type='text' name='busqueda' placeholder='BUSCAR'value='<?php echo $busqueda?>'>
            <input  type='submit' name='BTN_Buscarpolitica' class='btn_serach1' value='Filtrar'>
	    </form>
		<?php 
			}else{
		?>
			<form action='buscar_politica.php' method='get'> <!--form para enviar informacion de input a busqueda-->
            <h1>Politicas </h1>
        
            <br>
				<input  type='text' name='busqueda' placeholder='BUSCAR' value='<?php echo $busqueda?>'>
            	<input  type='submit' name='BTN_Buscarpolitica' class='btn_serach1' value='Filtrar'>
	    	</form>
		<?php
			}
		?>
    </section>
    <section id="containers">
    
	<form action='NuevaPolitica.php' ><!--form para abrir formulario de creacion de nueva evaluacion fisica-->
	<input  type='submit' class='btn_serach1' value='Nuevo'>
    
	
		<table> 
				<tr> 
					<th> Empresa </th>
					<th> Nombre Archivo </th>
					<th> Titulo Archivo </th>
					<th> Fecha Ingreso Politica </th>
					<th> Fecha Termino Politica </th>
					<th> Version </th>
					<th> Acción </th>
			   	</tr>
			<?php
			if($_SESSION['rol'] == 'SuperAdmin'){
				//paginador
				//sentencia SQL SERVER conteo evaluaciones existentes en la base de datos
				$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivosempresa");
				$result_registre=sqlsrv_fetch_array($sqlregister);
				$totalregistro = $result_registre['totalregistro'];
				$por_pagina =15;
				if(empty($_GET['pagina'])){
					$pagina=1;
				}else{
					$pagina=$_GET['pagina'];
				}

				$desde = ($pagina-1 )*$por_pagina;
				$total_paginas= ceil($totalregistro/$por_pagina);
				//sentencia de SQL SERVER traer informacion de usuarios
				$sleccionar = sqlsrv_query($cc,"SELECT IDArchivoEmpresa, NombreEmpresa, NombreArchivoEmpresa, TituloArchivoEmpresa,FechaIngreso,FechaTermino, VersionArchivo
												from Empresas as e inner join archivosempresa as a 
												on e.IDEmpresas = a.IDEmpresas 
												order by e.NombreEmpresa,VersionArchivo desc
												OFFSET $desde ROWS
												FETCH NEXT $por_pagina ROWS ONLY");
			}else if($_SESSION['rol'] == 'Admin'&$_SESSION['empresa'] == 'ALIANZA ORIETAL S.A.'){
				//paginador
				//sentencia SQL SERVER conteo evaluaciones existentes en la base de datos
				$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivosempresa where IDEmpresas = '3'");
				$result_registre=sqlsrv_fetch_array($sqlregister);
				$totalregistro = $result_registre['totalregistro'];
				$por_pagina =15;
				if(empty($_GET['pagina'])){
					$pagina=1;
				}else{
					$pagina=$_GET['pagina'];
				}

				$desde = ($pagina-1 )*$por_pagina;
				$total_paginas= ceil($totalregistro/$por_pagina);
				//sentencia de SQL SERVER traer informacion de usuarios
				$sleccionar = sqlsrv_query($cc,"SELECT IDArchivoEmpresa, NombreEmpresa, NombreArchivoEmpresa, TituloArchivoEmpresa,FechaIngreso,FechaTermino, VersionArchivo
												from Empresas as e inner join archivosempresa as a 
												on e.IDEmpresas = a.IDEmpresas
												where a.IDEmpresas = '3' 
												order by e.NombreEmpresa,VersionArchivo desc
												OFFSET $desde ROWS
												FETCH NEXT $por_pagina ROWS ONLY");
			}else if($_SESSION['rol'] == 'Admin'&$_SESSION['empresa'] == 'PALMERAS LA CAROLINA S.A'){
				//paginador
				//sentencia SQL SERVER conteo evaluaciones existentes en la base de datos
				$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivosempresa where IDEmpresas = '1'");
				$result_registre=sqlsrv_fetch_array($sqlregister);
				$totalregistro = $result_registre['totalregistro'];
				$por_pagina =15;
				if(empty($_GET['pagina'])){
					$pagina=1;
				}else{
					$pagina=$_GET['pagina'];
				}

				$desde = ($pagina-1 )*$por_pagina;
				$total_paginas= ceil($totalregistro/$por_pagina);
				//sentencia de SQL SERVER traer informacion de usuarios
				$sleccionar = sqlsrv_query($cc,"SELECT IDArchivoEmpresa, NombreEmpresa, NombreArchivoEmpresa, TituloArchivoEmpresa,FechaIngreso,FechaTermino, VersionArchivo
												from Empresas as e inner join archivosempresa as a 
												on e.IDEmpresas = a.IDEmpresas
												where a.IDEmpresas = '1' 
												order by e.NombreEmpresa,VersionArchivo desc
												OFFSET $desde ROWS
												FETCH NEXT $por_pagina ROWS ONLY");
			}else if($_SESSION['rol'] == 'Admin'&$_SESSION['empresa'] == 'AGROEXPORT DE COLOMBIA'){
				//paginador
				//sentencia SQL SERVER conteo evaluaciones existentes en la base de datos
				$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivosempresa where IDEmpresas = '2'");
				$result_registre=sqlsrv_fetch_array($sqlregister);
				$totalregistro = $result_registre['totalregistro'];
				$por_pagina =15;
				if(empty($_GET['pagina'])){
					$pagina=1;
				}else{
					$pagina=$_GET['pagina'];
				}

				$desde = ($pagina-1 )*$por_pagina;
				$total_paginas= ceil($totalregistro/$por_pagina);
				//sentencia de SQL SERVER traer informacion de usuarios
				$sleccionar = sqlsrv_query($cc,"SELECT IDArchivoEmpresa, NombreEmpresa, NombreArchivoEmpresa, TituloArchivoEmpresa,FechaIngreso,FechaTermino, VersionArchivo
												from Empresas as e inner join archivosempresa as a 
												on e.IDEmpresas = a.IDEmpresas
												where a.IDEmpresas = '2' 
												order by e.NombreEmpresa,VersionArchivo desc
												OFFSET $desde ROWS
												FETCH NEXT $por_pagina ROWS ONLY");
			}
			 
			 while($columna = sqlsrv_fetch_array($sleccionar)){
			?>
			    <tr> 
					<td> <?php echo $columna['NombreEmpresa'];?> </td>
					<td> <?php echo $columna['NombreArchivoEmpresa'];?> </td>
					<td> <?php echo $columna['TituloArchivoEmpresa']; ?> </td>
				    <td> <?php $date = $columna['FechaIngreso'];
							   $result = $date->format('Y-m-d'); 
							   if($result){
								   echo $result;
							   } ?> </td>
					<td> <?php $datefinal = $columna['FechaTermino'];
								if($datefinal == true){
									$resultfinal = $datefinal->format('Y-m-d'); 
									if($resultfinal){
										echo $resultfinal;
									}
								}else{
									echo $columna['FechaTermino'];
								}
								 ?> </td>
					<td> <?php echo $columna['VersionArchivo']; ?> </td>
					
					<td> <a href='MostrarArchivoEmpresa.php?id=<?php echo $columna['IDArchivoEmpresa'];?>' ><img class='photouser' src='img/pdf-Logo.png'> </a>  </td> 
				</tr>

			<?php
			  }
			?>
		</table>
		<div class='paginador'>
			  <ul>
			  	<?php
                    if($pagina !=1){
                ?>
			  	<li><a href='?pagina=<?php echo 1;?>'>|<</a></li>
                <li><a href='?pagina=<?php echo $pagina - 1;?>'><<</a></li>
				<?php
					}
                    for($i=1; $i<=$total_paginas; $i++){
                        if($i == $pagina){
                            echo "<li class='pageselected'>".$i."</a></li>";
                        }else{
                            echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
                        }
                       
					}
					if($pagina !=$total_paginas){
                ?>
				<li><a href='?pagina=<?php echo $pagina + 1;?>'>>></a></li>
				<li><a href='?pagina=<?php echo $total_paginas;?>'>>|</a></li>
				<?php
                    }
                ?>		  
			  </ul>
		</div>
	</form>
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>