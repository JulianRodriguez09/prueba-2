<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//sentencia SQL SERVER para reuperar informacion de las empresas existentes en base de datos
$seleccionarempresa=sqlsrv_query($cc,"SELECT IDEmpresas,NombreEmpresa from Empresas");
//codigo para registrar evaluacion fisica 
if(isset($_POST['REGISTRAR'])){
        $empresa = $_POST['empresa'];
        $version = $_POST['version'];
        $fecha = $_POST['Fecha'];
        $tipoarchivo = '1';
        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamaño = $_FILES['archivo']['size'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino ="../archivosempesa/Politicas/Palmeras/".$nombre;
        $destino1 ="../archivosempesa/Politicas/Agroexport/".$nombre;
        $destino2 ="../archivosempesa/Politicas/Alianza/".$nombre;
        if($empresa == '1'){
            if($nombre != ''){
        
                if(copy($ruta, $destino)){
                    $buscarempresa = sqlsrv_query($cc,"SELECT NombreEmpresa From Empresas Where IDEmpresas = $empresa ");
                    while($columnaempresa = sqlsrv_fetch_array($buscarempresa)){
                        $NombreEmpresa = $columnaempresa['NombreEmpresa'];
                    }
                    $buscarnombre = sqlsrv_query($cc,"SELECT * FROM archivosempresa where NombreArchivoEmpresa = '$nombre' or (NombreArchivoEmpresa = '$nombre' and IDEmpresas = '$empresa') or (VersionArchivo = '$version' and IDEmpresas = '$empresa')");
                    while($columnanombreempresa = sqlsrv_fetch_array($buscarnombre)){
                        $idarchivoempresa = $columnanombreempresa['IDArchivoEmpresa'];
                    }
        
                    if($idarchivoempresa == false){
                        $buscar = sqlsrv_query($cc,"SELECT * FROM archivosempresa where IDEmpresas = '$empresa' and FechaTermino is null ");           
                        while($columna = sqlsrv_fetch_array($buscar)){
                            $idarchivo = $columna['IDArchivoEmpresa'];
                            $versionactual= $columna['VersionArchivo'];
                        }
                        
                        if($idarchivo == false){
                            
                            $insert=sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                            Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                            
                            if($insert == true){
                            echo "<script type='text/javascript'>
                            alert('el archivo de politica se guardo correctamente');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            }else{
                            echo "<script type='text/javascript'>
                            alert('error a la hora de registrar el archivo');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            } 
                            
                        }else{
                        
                            $actualizar = sqlsrv_query($cc,"UPDATE archivosempresa SET FechaTermino ='$fecha' WHERE IDArchivoEmpresa = '$idarchivo' ");
                            
                            if($actualizar == true){
                            
                                $insert = sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                                                Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                                if($insert == true){
                                    echo "<script type='text/javascript'>
                                    alert('version anterior actualizada, nueva version agregada ');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }else{
                                    echo "<script type='text/javascript'>
                                    alert('error a la hora de registrar el archivo');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }
                            
                            }
                        }
                    }else{
                                echo "<script type='text/javascript'>
                                alert('error: el archivo o versión de esta politica ya existe.');                                                                                           
                                </script>";
                                echo'<script>window.location="PoliticasGeneral.php"</script>';
                    }         
                             
                    
                }else{
                    echo "error";
                }
            }
        }elseif($empresa == '2'){
            if($nombre != ''){
        
                if(copy($ruta, $destino1)){
                    $buscarempresa = sqlsrv_query($cc,"SELECT NombreEmpresa From Empresas Where IDEmpresas = $empresa ");
                    while($columnaempresa = sqlsrv_fetch_array($buscarempresa)){
                        $NombreEmpresa = $columnaempresa['NombreEmpresa'];
                    }
                    $buscarnombre = sqlsrv_query($cc,"SELECT * FROM archivosempresa where NombreArchivoEmpresa = '$nombre' or (NombreArchivoEmpresa = '$nombre' and IDEmpresas = '$empresa') or (VersionArchivo = '$version' and IDEmpresas = '$empresa')");
                    while($columnanombreempresa = sqlsrv_fetch_array($buscarnombre)){
                        $idarchivoempresa = $columnanombreempresa['IDArchivoEmpresa'];
                    }
        
                    if($idarchivoempresa == false){
                        $buscar = sqlsrv_query($cc,"SELECT * FROM archivosempresa where IDEmpresas = '$empresa' and FechaTermino is null ");           
                        while($columna = sqlsrv_fetch_array($buscar)){
                            $idarchivo = $columna['IDArchivoEmpresa'];
                            $versionactual= $columna['VersionArchivo'];
                        }
                        
                        if($idarchivo == false){
                            
                            $insert=sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                            Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                            
                            if($insert == true){
                            echo "<script type='text/javascript'>
                            alert('el archivo de politica se guardo correctamente');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            }else{
                            echo "<script type='text/javascript'>
                            alert('error a la hora de registrar el archivo');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            } 
                            
                        }else{
                        
                            $actualizar = sqlsrv_query($cc,"UPDATE archivosempresa SET FechaTermino ='$fecha' WHERE IDArchivoEmpresa = '$idarchivo' ");
                            
                            if($actualizar == true){
                            
                                $insert = sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                                                Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                                if($insert == true){
                                    echo "<script type='text/javascript'>
                                    alert('version anterior actualizada, nueva version agregada ');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }else{
                                    echo "<script type='text/javascript'>
                                    alert('error a la hora de registrar el archivo');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }
                            
                            }
                        }
                    }else{
                                echo "<script type='text/javascript'>
                                alert('error: el archivo o versión de esta politica ya existe.');                                                                                           
                                </script>";
                                echo'<script>window.location="PoliticasGeneral.php"</script>';
                    }         
                             
                    
                }else{
                    echo "error";
                }
            }
        }elseif($empresa == '3'){
            if($nombre != ''){
        
                if(copy($ruta, $destino2)){
                    $buscarempresa = sqlsrv_query($cc,"SELECT NombreEmpresa From Empresas Where IDEmpresas = $empresa ");
                    while($columnaempresa = sqlsrv_fetch_array($buscarempresa)){
                        $NombreEmpresa = $columnaempresa['NombreEmpresa'];
                    }
                    $buscarnombre = sqlsrv_query($cc,"SELECT * FROM archivosempresa where NombreArchivoEmpresa = '$nombre' or (NombreArchivoEmpresa = '$nombre' and IDEmpresas = '$empresa') or (VersionArchivo = '$version' and IDEmpresas = '$empresa')");
                    while($columnanombreempresa = sqlsrv_fetch_array($buscarnombre)){
                        $idarchivoempresa = $columnanombreempresa['IDArchivoEmpresa'];
                    }
        
                    if($idarchivoempresa == false){
                        $buscar = sqlsrv_query($cc,"SELECT * FROM archivosempresa where IDEmpresas = '$empresa' and FechaTermino is null ");           
                        while($columna = sqlsrv_fetch_array($buscar)){
                            $idarchivo = $columna['IDArchivoEmpresa'];
                            $versionactual= $columna['VersionArchivo'];
                        }
                        
                        if($idarchivo == false){
                            
                            $insert=sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                            Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                            
                            if($insert == true){
                            echo "<script type='text/javascript'>
                            alert('el archivo de politica se guardo correctamente');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            }else{
                            echo "<script type='text/javascript'>
                            alert('error a la hora de registrar el archivo');                                                                                           
                            </script>";
                            echo'<script>window.location="PoliticasGeneral.php"</script>';
                            } 
                            
                        }else{
                        
                            $actualizar = sqlsrv_query($cc,"UPDATE archivosempresa SET FechaTermino ='$fecha' WHERE IDArchivoEmpresa = '$idarchivo' ");
                            
                            if($actualizar == true){
                            
                                $insert = sqlsrv_query($cc,"INSERT INTO archivosempresa (IDEmpresas,IDTipoArchivosEmpresa,TituloArchivoEmpresa,NombreArchivoEmpresa,TipoArchivoEmpresa,TamañoArchivoEmpresa,FechaIngreso,VersionArchivo)
                                                Values ('".$empresa."','".$tipoarchivo."','POLITICA $NombreEmpresa  $fecha','".$nombre."','".$tipo."','".$tamaño."','".$fecha."','".$version."')");
                                if($insert == true){
                                    echo "<script type='text/javascript'>
                                    alert('version anterior actualizada, nueva version agregada ');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }else{
                                    echo "<script type='text/javascript'>
                                    alert('error a la hora de registrar el archivo');                                                                                           
                                    </script>";
                                    echo'<script>window.location="PoliticasGeneral.php"</script>';
                                }
                            
                            }
                        }
                    }else{
                                echo "<script type='text/javascript'>
                                alert('error: el archivo o versión de esta politica ya existe.');                                                                                           
                                </script>";
                                echo'<script>window.location="PoliticasGeneral.php"</script>';
                    }         
                             
                    
                }else{
                    echo "error";
                }
            }
        }
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Sistema Ley1581 | Registrar Politica</title>
</head>
<body>
<?php include "includes/header.php" ?>
<!--section para alojar el formulario -->
    <section id="container">
		<form action='' method='POST' enctype='multipart/form-data'>
            <h3>Información de Politicas</h3>
            
            <select name='empresa'>
                <option>Seleccione una empresa</option>
                <?php
                    while($columna1 = sqlsrv_fetch_array($seleccionarempresa)){
                ?>
                    <option value ='<?php echo $columna1['IDEmpresas']; ?>'><?php echo $columna1['NombreEmpresa'] ;?></option>
                <?php   
                    }
                ?>
                
            </select>
            <input type='text' name='version' placeholder='version' required>
            <input type='date' name='Fecha' required>
            <input type='file' accept='.pdf' name='archivo' required >
            <input type='submit' name='REGISTRAR' value='REGISTRAR'>
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>

