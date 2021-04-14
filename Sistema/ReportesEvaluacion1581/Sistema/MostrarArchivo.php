<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//guardar informacion de usuarios en variables 
$idUsuario=$_REQUEST['id'];
$fecha=$_REQUEST['fech'];
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
    <!--de esta forma se uestra el archivo que este guardado en base de datos-->
	<form >
			<?php			
			//sentencia SQL SERVER para reuperar el archivo seleccionado
			 $sleccionar = sqlsrv_query($cc,"SELECT * FROM archivos as a 
                                        inner join EmpleadosEmpresa as e on a.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa 
                                        inner join Usuarios as u on e.IDUsuarios = u.IDUsuarios 
                                        where u.IDUsuarios = '$idUsuario' and Fecha = '$fecha' ");
                if($columna = sqlsrv_fetch_array($sleccionar)){
                    if($columna['NombreArchivo']== ''){
			?>
                    <p> NO existe el archivo </p>
			<?php  }else{?>
				<!--con iframe se muestran los archivos de forma automaica-->
                <iframe src='archivos/<?php echo $columna['NombreArchivo']?>' width="100%" height="570"></iframe>
            <?php                    
                    }
			?>
			<?php                    
                }
			?>
		</table>
	</form>
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>