<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//script para restringir acceso al apartado
if( $_SESSION['rol'] !='SuperAdmin'){
	echo "<script type='text/javascript'>
    alert('si usted no es un usuario super administrador no tiene acceso a esta opcion, sera redireccionado al inicio');                                                                                           
    </script>";
    echo'<script>window.location="../"</script>';
}
$selectusuario= sqlsrv_query($cc,"SELECT IDRoles,Rol from Roles   ");
$seleccionarempresa=sqlsrv_query($cc,"SELECT IDEmpresas,NombreEmpresa from Empresas");
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
<!--section para alojar formulario de registro usuario-->
    <section id="container">
		<form action='Controlador/Controlador.php' method='POST'><!--frm para enviar informacion del formaulario a controlador-->
            <h3>Información del Usuario</h3>
            <select name='rol'>
                <option>Seleccione un rol</option>
                <?php
                    while($columna = sqlsrv_fetch_array($selectusuario)){
                ?>
                    <option value ='<?php echo $columna['IDRoles']; ?>'><?php echo $columna['Rol'] ;?></option>
                <?php   
                    }
                ?>
                
            </select>
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
            <input type='text' name='Nombres' placeholder='Nombres' required >
            <input type='text' name='Apellidos' placeholder='Apellidos'required >
            <input type='number' name='Identificacion' placeholder='Identificación'required >
            <input type='email' name='Correo' placeholder='Correo'required>
            <input type='text' name='Usuario' placeholder='Usuario'>
            <input type='password' name='Contraseña' placeholder='Contraseña'>
            <input type="submit"  name="BTN_Registrar" value="REGISTRAR">
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>

