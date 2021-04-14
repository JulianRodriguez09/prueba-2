<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//Restriccion para apartado de la pagina
if( $_SESSION['empresa'] != 'PALMERAS LA CAROLINA S.A'&$_SESSION['rol'] !='SuperAdmin'){
	echo "<script type='text/javascript'>
    alert('si usted no es un usuario super administrador o usuario de PALMERAS LA CAROLINA S.A no tiene acceso a esta opcion, sera redireccionado al inicio');                                                                                           
    </script>";
    echo'<script>window.location="../"</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts2.php" ?>
	<title>Sistema Ley1581 | Reporte Palmeras</title>
</head>

<body>
<?php include "includes/header1.php" ?>
<!--section para apartar formulario-->
    <section id="containers">
        <?php
         //guardado de informacion resividad en variables
            $busqueda=$_REQUEST['busqueda'];
            $fech=$_REQUEST['fecha1'];
            $fech1=$_REQUEST['fecha2'];
            
            if(empty($fech)||empty($fech1)){
                $fech='';
                $fech1=''; 
            
            }elseif(empty($busqueda)){
                $busqueda ='';
            }
            
        ?>
        <form action='buscar_reportefisico.php' method='get'><!--form para enviar informacion diligenciada en input-->
            <h1>Reportes Evaluaciones Fisicas </h1>
        
            <br>
            <input  type='date' name='fecha1' value='<?php echo $fech; ?>'>
            <input  type='date' name='fecha2' value='<?php echo $fech1; ?>'>
            <input  type='text' name='busqueda'  value='<?php echo $busqueda?>' placeholder='BUSCAR'>
            <input  type='submit' name='BTN_BuscarReporteFisico' class='btn_serach1' value='Filtrar'>
	    </form>
    </section>

    <section id="containers">   
	<form action='NuevaEvalucionFisica.php' method=''>
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
            //setencia SQL SERVER para contar los usuarios existentes en base de datos restringiendo la busqueda
			$sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from archivos a
                                            inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa
                                            inner join Usuarios as u on e.IDUsuarios = u.IDUsuarios
                                            where 
                                            (Nombres LIKE '%$busqueda%' or Apellidos LIKE '%$busqueda%' and Fecha >= '$fech' and Fecha <='$fech1'
                                            OR Nombres LIKE '%$busqueda%' or Apellidos LIKE '%$busqueda%'
                                            OR  Fecha >= '$fech' and Fecha <='$fech1')
                                           ");
            
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
			//sentencia SQL SERVER para traer informacion de los usuarios que coincidan con la informacion buscada
			if($busqueda == ''&$fech ==''&$fech1 ==''){
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

            }elseif($busqueda !=''&$fech==''&$fech1==''){
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
											where  
                                            (Nombres LIKE '%$busqueda%' or Apellidos LIKE '%$busqueda%') 
											order by em.NombreEmpresa
											OFFSET $desde ROWS
                                            FETCH NEXT $por_pagina ROWS ONLY");

            }elseif($busqueda ==''&$fech!=''&$fech1!=''){
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
											where (Fecha >= '$fech' and Fecha <='$fech1') 
											order by em.NombreEmpresa
											OFFSET $desde ROWS
                                            FETCH NEXT $por_pagina ROWS ONLY");

            }elseif($busqueda !=''&$fech!=''&$fech1!=''){
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
											where Fecha >= '$fech' and Fecha <='$fech1' 
                                            and (Nombres LIKE '%$busqueda%' or Apellidos LIKE '%$busqueda%')
											order by em.NombreEmpresa
											OFFSET $desde ROWS
                                            FETCH NEXT $por_pagina ROWS ONLY");
            }
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
                      <li><a href='?fecha1=".$fech."&fecha2=".$fech."&busqueda=".$busqueda."&BTN_BuscarReportePalmeras=Filtrar&pagina=<?php echo 1;?>'>|<</a></li>
                    <li><a href='?fecha1=".$fech."&fecha2=".$fech."&busqueda=".$busqueda."&BTN_BuscarReportePalmeras=Filtrar&pagina=<?php echo $pagina - 1;?>'><<</a></li>
                    <?php
                        }
                        for($i=1; $i<=$total_paginas; $i++){
                            if($i == $pagina){
                                echo "<li class='pageselected'>".$i."</a></li>";
                            }else{
                                echo "<li><a href='?fecha1=".$fech."&fecha2=".$fech."&busqueda=".$busqueda."&BTN_BuscarReportePalmeras=Filtrar&pagina=".$i."'>".$i."</a></li>";
                            }
                           
                        }
                        if($pagina !=$total_paginas){
                    ?>
                    <li><a href='?fecha1=".$fech."&fecha2=".$fech."&busqueda=".$busqueda."&BTN_BuscarReportePalmeras=Filtrar&pagina=<?php echo $pagina + 1;?>'>>></a></li>
                    <li><a href='?fecha1=".$fech."&fecha2=".$fech."&busqueda=".$busqueda."&BTN_BuscarReportePalmeras=Filtrar&pagina=<?php echo $total_paginas;?>'>>|</a></li>
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