<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
//por medio de esta variable guardamos el id del usuario que deseamos actualizar
$idusuario = $_REQUEST['id'];
//Sentencia SQL SERVER para traer información especifica del usuario
$selectusuario= sqlsrv_query($cc,"SELECT u.IDUsuarios,Nombres,Apellidos,Identificacion,Correo,NombreEmpresa,ee.IDEmpresas,es.IDEstados,TipoEstado 
                                  from USuarios as u 
                                  inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios 
                                  inner join Empresas as ee on e.IDEmpresas = ee.IDempresas
                                  inner join Estados as es on e.IDEstados = es.IDEstados
                                  where u.IDUsuarios = '".$idusuario."'");
//guardar la informacion del usuario en variables
while($columna = sqlsrv_fetch_array($selectusuario)){
    $idUsuario = $columna['IDUsuarios'];
    $nombres = $columna['Nombres'];
    $apellidos = $columna['Apellidos'];
    $Identificacion = $columna['Identificacion'];
    $correo = $columna['Correo'];
    $empresa = $columna['NombreEmpresa'];
    $idempresa = $columna['IDEmpresas'];
    $idestado = $columna['IDEstados'];
    $estado = $columna['TipoEstado'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts.php" ?>
	<title>Ley1581 | Actualizar Usuario</title>
</head>
<body>
<?php include "includes/header.php" ?>
<!-- este section lo utilizamos para alojar el formulario de recuperacioón este mismo al darle al boton enviara la informacion recuperada con los cambios realizados-->
    <section id="container">
		<form action='Controlador/Controlador.php' method='POST'><!--este form lo utilizamos para enviar al controlador la informacion que se encuentra en los input-->
            <h3>Información Usuario</h3>
            <select name='empresa'>
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
            <select name='estado'>
                <option value="<?php echo $idestado ?>"><?php echo $estado ?></option>
                <?php
                    $busqueda = sqlsrv_query($cc,"SELECT IDEstados,TipoEstado From Estados where IDEstados <> '".$idestado."' ");
                    while($columna = sqlsrv_fetch_array($busqueda)){
                ?>
                    <option value="<?php echo $columna['IDEstados'] ?>"><?php echo $columna['TipoEstado'] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type='hidden' name='idusuario' value="<?php echo $idUsuario; ?>" required>
            <input type='hidden' name='Empresa1' value="<?php echo $idempresa; ?>" required>
            <input type='text' name='Nombres' placeholder='Nombres' value="<?php echo $nombres; ?>" required >
            <input type='text' name='Apellidos' placeholder='Apellidos' value="<?php echo $apellidos; ?>" required>
            <input type='text' name='Identificacion' placeholder='Identificación' value="<?php echo $Identificacion; ?>" required>
            <input type='email' name='Correo' placeholder='Correo' value="<?php echo $correo; ?>" required>
            <input type='password' name='Contraseña' placeholder='Contraseña' required>             
            <input type="submit"  name="BTN_ActualizarUsuarioAdmin" value="ACTUALIZAR">
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>