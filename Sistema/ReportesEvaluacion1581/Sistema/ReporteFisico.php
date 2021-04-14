<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts2.php" ?>
	<title>Sistema Ley1581 | Reporte Fisicas</title>
</head>

<body>
<?php include "includes/header1.php" ?>
<!--section para alojar formulario-->
    <section id="containers">
        <form action='buscar_reportefisico.php' method='get'><!--form para enviar informacion de input a busqueda-->
            <h1>Reportes Evaluaciones Fisicas </h1>
        
            <br>
            <input  type='date' name='fecha1'>
            <input  type='date' name='fecha2'>
            <input  type='text' name='busqueda' placeholder='BUSCAR'>
            <input  type='submit' name='BTN_BuscarReporteFisico' class='btn_serach1' value='Filtrar'>
	    </form>
    </section>
    <section id="containers">
    
	<form action='NuevaEvalucionFisica.php' ><!--form para abrir formulario de creacion de nueva evaluacion fisica-->
	<input  type='submit' class='btn_serach1' value='Nuevo'>
    
	
		<table> 
				<tr> 
					<th> Empresa </th>
					<th> Nombres </th>
					<th> Apellidos </th>
					<th> Correo </th>
					<th> Fecha realización evaluación </th>
					<th> Proceso</th>
					<th> Acción </th>
			   	</tr>
			<?php
			//paginador
			//sentencia SQL SERVER conteo evaluaciones existentes en la base de datos
			$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivos where IDTipoArchivosEmpresa = '7'");
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
			 $sleccionar = sqlsrv_query($cc,"SELECT u.IDUsuarios,em.NombreEmpresa,u.Nombres,u.Apellidos,u.Correo,a.Fecha,r.Rol 
											from Usuarios as u 
											inner join Roles as r 
											on u.IDRoles = r.IDRoles 
											inner join EmpleadosEmpresa as e 
											on u.IDUsuarios = e.IDUsuarios 
											inner join Empresas as em 
											on e.IDEmpresas = em.IDEmpresas
											inner join archivos as a
											on e.IDEmpleadosEmpresa = a.IDEmpleadosEmpresa 
											order by em.NombreEmpresa
											OFFSET $desde ROWS
                                            FETCH NEXT $por_pagina ROWS ONLY");
			 
			 while($columna = sqlsrv_fetch_array($sleccionar)){
			?>
			    <tr> 
					<td> <?php echo $columna['NombreEmpresa'];?> </td>
					<td> <?php echo $columna['Nombres'];?> </td>
					<td> <?php echo $columna['Apellidos']; ?> </td>
					<td> <?php echo $columna['Correo']; ?> </td>
					<td> <?php $date = $columna['Fecha'];
							   $result = $date->format('Y-m-d'); 
							   if($result){
								   echo $result;
							   } ?> </td>
					<td> <?php echo $columna['Rol']; ?> </td>
					<td> <a href='MostrarArchivo.php?id=<?php echo $columna['IDUsuarios'];?>&fech=<?php echo $result;?>' ><img class='photouser' src='img/archivo.png'> </a>  </td> 
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