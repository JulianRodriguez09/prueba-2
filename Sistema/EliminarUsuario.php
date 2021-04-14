<?php
//Utilizamos Modelo de conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//recuperacion del id del usuario que se desea eliminar
$idusuario = $_REQUEST['id'];
//sentencia SQL SERVER para traer la informacion del usuario
$selectusuario= sqlsrv_query($cc,"SELECT u.IDUsuarios,Nombres,Apellidos,Identificacion,Correo,NombreEmpresa,ee.IDEmpresas 
                                  from USuarios as u 
                                  inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios 
                                  inner join Empresas as ee on e.IDEmpresas = ee.IDempresas 
                                  where u.IDUsuarios = '".$idusuario."'");
//guardado de la informacion recuperada en variables
while($columna = sqlsrv_fetch_array($selectusuario)){
    $idUsuario = $columna['IDUsuarios'];
    $nombres = $columna['Nombres'];
    $apellidos = $columna['Apellidos'];
    $Identificacion = $columna['Identificacion'];
    $correo = $columna['Correo'];
    $empresa = $columna['NombreEmpresa'];
    $idempresa = $columna['IDEmpresas'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Ley1581 | Eliminar Usuario</title>
</head>
<body>
<?php include "includes/header.php" ?>
<!--section para alojar formulario de eliminacion de usuario-->
    <section id="container">
		<form action='Controlador/Controlador.php' method='POST'><!--form necesario para enviar informacion a un controlador-->
            <h3>Información Usuario</h3>
            <p style='text-align: center;'>¿seguro que desea eliminar este usuario?</p>
            <select name='empresa' readonly onmousedown="return false;">
                <option value="<?php echo $idempresa ?>"><?php echo $empresa ?></option>
                <?php
                    $busqueda = sqlsrv_query($cc,"SELECT IDEmpresas,NombreEmpresa From Empresas where IDEmpresas <> '".$idempresa."' ");
                    while($columna = sqlsrv_fetch_array($busqueda)){
                ?>
                    <option value="<?php echo $columna['IDEmpresas'] ?>"><?php echo $columna['NombreEmpresa'] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type='hidden' name='idusuario' value="<?php echo $idUsuario; ?>" readonly onmousedown="return false;">
            <input type='hidden' name='Empresa1' value="<?php echo $idempresa; ?>" readonly onmousedown="return false;">
            <input type='text' name='Nombres' placeholder='Nombres' value="<?php echo $nombres; ?>" readonly onmousedown="return false;" >
            <input type='text' name='Apellidos' placeholder='Apellidos' value="<?php echo $apellidos; ?>" readonly onmousedown="return false;">
            <input type='text' name='Identificacion' placeholder='Identificación' value="<?php echo $Identificacion; ?>" readonly onmousedown="return false;">
            <input type='email' name='Correo' placeholder='Correo' value="<?php echo $correo; ?>" readonly onmousedown="return false;">            
            <input type="submit"  name="BTN_Eliminar" value="Eliminar">
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>