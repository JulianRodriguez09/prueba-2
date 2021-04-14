<?php
//Utilizamos Modelo de conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
session_start();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
//guardar id del Usuario en una variable
$usuario = $_REQUEST['id'];
//Sentencia SQL SERVER para recuperar informacion de un usuario especifico
$selectusuario= sqlsrv_query($cc,"SELECT IDUsuarios,Nombres,Apellidos,Identificacion,Correo,Usuario from USuarios where Usuario = '".$usuario."'");
//guardar informacion de usuario en variables
while($columna = sqlsrv_fetch_array($selectusuario)){
    $idUsuario = $columna['IDUsuarios'];
    $nombres = $columna['Nombres'];
    $apellidos = $columna['Apellidos'];
    $Identificacion = $columna['Identificacion'];
    $correo = $columna['Correo'];
    $usuario = $columna['Usuario'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Ley1581 | Usuario</title>
</head>
<body>
<?php include "includes/header.php" ?>
<!--section para formulario en este se obtiene informacion y se envia-->
    <section id="container">
		<form action='Controlador/Controlador.php' method='POST'><!--form para enviar informacion diligenciada en el formulario hacia un controlador-->
            <h3>Informción Usuario</h3>
            <input type='hidden' name='idusuario' value="<?php echo $idUsuario; ?>" readonly onmousedown="return false;">
            <input type='text' name='Nombres' placeholder='Nombres' value="<?php echo $nombres; ?>" readonly onmousedown="return false;" >
            <input type='text' name='Apellidos' placeholder='Apellidos' value="<?php echo $apellidos; ?>" readonly onmousedown="return false;">
            <input type='text' name='Identificacion' placeholder='Identificación' value="<?php echo $Identificacion; ?>" readonly onmousedown="return false;">
            <input type='email' name='Correo' placeholder='Correo' value="<?php echo $correo; ?>" readonly onmousedown="return false;">
            <input type='text' name='Usuario' placeholder='Usuario' value="<?php echo $usuario; ?>" readonly onmousedown="return false;">
            <input type='password' name='Contraseña' placeholder='Contraseña'  required >
            <input type="submit"  name="BTN_Actualizar" value="ACTUALIZAR">
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>

