<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//guardar informacion de usuarios en variables 
$idarchivo=$_REQUEST['id'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Sistema Ley1581 | Reporte Fisicas</title>
</head>

<body>
<?php include "includes/header.php" ?>
    <!--de esta forma se uestra el archivo que este guardado en base de datos-->
	<form >
			<?php			
			//sentencia SQL SERVER para reuperar el archivo seleccionado
			 $sleccionar = sqlsrv_query($cc,"SELECT * FROM archivosempresa as a 
                                        inner join Empresas as e on a.IDEmpresas = e.IDEmpresas  
                                        where a.IDArchivoEmpresa = '$idarchivo' ");
                if($columna = sqlsrv_fetch_array($sleccionar)){
                    if($columna['NombreArchivoEmpresa']== ''){
			?>
                    <p> NO existe el archivo </p>
			<?php  }else{?>
				<!--con iframe se muestran los archivos de forma automaica-->
                <iframe src='../archivosempesa/<?php echo $columna['NombreArchivoEmpresa']?>' width="100%" height="570"></iframe>
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