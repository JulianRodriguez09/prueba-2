<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//sentencia SQL SERVER para reuperar informacion de las empresas existentes en base de datos
$seleccionarempresa=sqlsrv_query($cc,"SELECT IDEmpresas,NombreEmpresa from Empresas");
//codigo para registrar evaluacion fisica 
if(isset($_POST['REGISTRAR'])){
        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamaño = $_FILES['archivo']['size'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino ="archivos/".$nombre;
    if($nombre != ''){
        
        if(copy($ruta, $destino)){
            $empresa=$_POST['empresa'];
            $fecha = $_POST['Fecha'];
            $nombres=$_POST['Nombres'];
            $apellidos = $_POST['Apellidos'];
            $identificacion = $_POST['Identificacion'];
            $correo = $_POST['Correo'];
            $Rol = '3';
            $tipoarchivo = '7';
            $IdUsuario = 0;
            $Idempresaempleado = 0;
            $busqueda = "SELECT IDUsuarios FROM Usuarios WHERE Correo = '$correo'";  
            $result = sqlsrv_query($cc,$busqueda);
            while( $row = sqlsrv_fetch_array($result)){

                $IdUsuario = $row['IDUsuarios'];
                
            }
          
            if($IdUsuario == 0){
                $create=sqlsrv_query($cc,"INSERT into Usuarios (IDRoles,Nombres,Apellidos,Identificacion,Correo) 
                values ('".$Rol."','".$nombres."','".$apellidos."','".$identificacion."','".$correo."')");


                if($create == true){
                    $busqueda = "SELECT IDUsuarios FROM Usuarios ";
                    $result = sqlsrv_query($cc,$busqueda);

                    while( $row = sqlsrv_fetch_array($result) ) 
                    {
                    $IdUsuario = $row['IDUsuarios'];
                    
                    }
                    

                        $create1=sqlsrv_query($cc,"INSERT into EmpleadosEmpresa (IDEmpresas,IDUsuarios,IDEstados) 
                        values ('".$empresa."','".$IdUsuario."',1)");
                        
                         
                        if($create1 == true){
                        
                            $busquedaempleado = "SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa where IDUsuarios = '$IdUsuario' and IDEmpresas = '$empresa' ";
                            $result = sqlsrv_query($cc,$busquedaempleado);
        
                            while( $row = sqlsrv_fetch_array($result) ) 
                            {
                            $IdEmpleadoEmpresa = $row['IDEmpleadosEmpresa'];
                            
                            }
                            $insert=sqlsrv_query($cc,"INSERT INTO archivos (Titulo,NombreArchivo,TipoArchivo,Tamaño,IDEmpleadosEmpresa,Fecha,IDTipoArchivosEmpresa)
                                                  Values ('evaluacion de $nombres, $fecha','".$nombre."','".$tipo."','".$tamaño."','".$IdEmpleadoEmpresa."','".$fecha."','".$tipoarchivo."')");
                            if($insert == true){
                                echo "<script type='text/javascript'>
                                alert('se guardo correctamente la evaluacion');                                                                                           
                                </script>";
                                echo'<script>window.location="Lista_Usuarios.php"</script>';
                            }else{
                                echo "<script type='text/javascript'>
                            alert('error a la hora de registrar la evalaucion');                                                                                           
                            </script>";
                            echo'<script>window.location="ReporteFisico.php"</script>';
                            }
                        }
                    
                    
                }
                
                
            }else{  
                $busqueda = sqlsrv_query($cc,"SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa WHERE IDEmpresas = '$empresa' AND IDUsuarios = '$IdUsuario'");
                while( $row = sqlsrv_fetch_array($busqueda)){
        
                    $IdEE = $row["IDEmpleadosEmpresa"];
                    
                } 
               
                if(!$IdEE){
                    $create1=sqlsrv_query($cc,"INSERT into EmpleadosEmpresa (IDEmpresas,IDUsuarios,IDEstados) 
                    values ('".$empresa."','".$IdUsuario."',1)");

                    if($create1 == true){
                            $busquedaempleado = "SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa IDUsuarios = '$IdUsuario' and IDEmpresas = '$empresa' ";
                            $result = sqlsrv_query($cc,$busquedaempleado);
        
                            while( $row = sqlsrv_fetch_array($result) ) 
                            {
                            $IdEmpleadoEmpresa = $row['IDEmpleadosEmpresa'];
                            
                            }
                            $insert=sqlsrv_query($cc,"INSERT INTO archivos (Titulo,NombreArchivo,TipoArchivo,Tamaño,IDEmpleadosEmpresa,Fecha,IDTipoArchivosEmpresa)
                            Values ('evaluacion de $nombres, $fecha','".$nombre."','".$tipo."','".$tamaño."','".$IdEmpleadoEmpresa."','".$fecha."','".$tipoarchivo."')");
                        if($insert == true){
                            echo "<script type='text/javascript'>
                            alert('se guardo correctamente la evaluacion');                                                                                           
                            </script>";
                            echo'<script>window.location="Lista_Usuarios.php"</script>';
                        }else{
                            echo "<script type='text/javascript'>
                        alert('error a la hora de registrar la evalaucion');                                                                                           
                        </script>";
                        echo'<script>window.location="ReporteFisico.php"</script>';
                        }
                    }
                }else{
                    $busquedaempleado = "SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa where IDUsuarios = '$IdUsuario' and IDEmpresas = '$empresa' ";
                    $result = sqlsrv_query($cc,$busquedaempleado);
        
                    while( $row = sqlsrv_fetch_array($result) ) 
                    {
                    $IdEmpleadoEmpresa = $row['IDEmpleadosEmpresa'];
                            
                    }
                    
                    $insert=sqlsrv_query($cc,"INSERT INTO archivos (Titulo,NombreArchivo,TipoArchivo,Tamaño,IDEmpleadosEmpresa,Fecha,IDTipoArchivosEmpresa)
                    Values ('evaluacion de $nombres, $fecha','".$nombre."','".$tipo."','".$tamaño."','".$IdEmpleadoEmpresa."','".$fecha."','".$tipoarchivo."')");
                        
                        
                        if($insert == true){
                            echo "<script type='text/javascript'>
                            alert('se guardo correctamente la evaluacion');                                                                                           
                            </script>";
                            echo'<script>window.location="Lista_Usuarios.php"</script>';
                        }else{
                            echo "<script type='text/javascript'>
                        alert('error a la hora de registrar la evalaucion');                                                                                           
                        </script>";
                        echo'<script>window.location="ReporteFisico.php"</script>';
                        }
                }
                        
            }
        }else{
            echo "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts2.php" ?>
	<title>Sistema Ley1581 | Registrar Usuario</title>
</head>
<body>
<?php include "includes/header1.php" ?>
<!--section para alojar el formulario -->
    <section id="container">
		<form action='' method='POST' enctype='multipart/form-data'>
            <h3>Información del Usuario</h3>
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
            <input type='date' name='Fecha' >
            <input type='text' name='Nombres' placeholder='Nombres'  >
            <input type='text' name='Apellidos' placeholder='Apellidos' >
            <input type='number' name='Identificacion' placeholder='Identificación' >
            <input type='email' name='Correo' placeholder='Correo'>
            <input type='file' accept='.pdf' name='archivo' >
            <input type='submit' name='REGISTRAR' value='REGISTRAR'>
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>

