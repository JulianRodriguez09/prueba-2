<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
    <!-- este controlador sirve para resivir la informacion de los inputs y enviarlos a modelos -->
    <!-- form que retornan la informacion a los distinos formularios existentes -->
    <form action="../Usuario.php" method="POST">
    <form action="../Registra_Usuario.php" method="POST">
    <form action="../ActualizarUsuario.php" method="POST">
    
        <?php
            if (isset($_POST['BTN_Actualizar'])){ //esta sentencia sirve para saver que boton sea presionado para traer la información
                //guardado de informacion resividad de los formularios en variables
                $id = $_POST['idusuario'];
                $contra = $_POST['Contraseña'];
                
                // sirve para enviar y resivir informacion al modelo especificado
                require_once '../Model/Model_ActualizarUsuario.php';
                $M = new update_usuario($id,$contra);
                $l =$M->getupdate_usuario();

            }elseif(isset($_POST['BTN_Registrar'])){//esta sentencia sirve para saver que boton sea presionado para traer la información
                //guardado de informacion resividad de los formularios en variables
                $empresa =$_POST['empresa'];
                $rol =$_POST['rol'];
                $nombres=$_POST['Nombres'];
                $apellidos=$_POST['Apellidos'];
                $identificacion=$_POST['Identificacion'];
                $correo=$_POST['Correo'];
                $usuario=$_POST['Usuario'];
                $contra=$_POST['Contraseña'];
                // sirve para enviar y resivir informacion al modelo especificado
                require_once '../Model/Model_RegistrarUsuario.php';
                $M = new crear_usuario($empresa,$rol,$nombres,$apellidos,$identificacion,$correo,$usuario,$contra);
                $l =$M->getcrear_usuario();

            }elseif(isset($_POST['BTN_ActualizarUsuario'])){//esta sentencia sirve para saver que boton sea presionado para traer la información
                //guardado de informacion resividad de los formularios en variables
                $idusuario=$_POST['idusuario'];
                $empresa =$_POST['empresa'];
                $nombres=$_POST['Nombres'];
                $apellidos=$_POST['Apellidos'];
                $identificacion=$_POST['Identificacion'];
                $correo=$_POST['Correo'];
                $empresa1=$_POST['Empresa1'];
                $estado=$_POST['estado'];
                // sirve para enviar y resivir informacion al modelo especificado
                require_once '../Model/Model_Actualizarusuarios.php';
                $M = new update_usuario($estado,$empresa,$empresa1,$nombres,$apellidos,$identificacion,$correo,$idusuario);
                $l =$M->getupdate_usuario();

            }elseif(isset($_POST['BTN_Eliminar'])){//esta sentencia sirve para saver que boton sea presionado para traer la información
                //guardado de informacion resividad de los formularios en variables
                $idusuario=$_POST['idusuario'];
                $empresa1=$_POST['Empresa1'];
                // sirve para enviar y resivir informacion al modelo especificado
                require_once '../Model/Model_EliminarUsuarios.php';
                $M = new delete_usuario($empresa1,$idusuario);
                $l =$M->getdelete_usuario();
            }elseif(isset($_POST['BTN_ActualizarUsuarioAdmin'])){
                //guardado de informacion resividad de los formularios en variables
                $idusuario=$_POST['idusuario'];
                $empresa =$_POST['empresa'];
                $nombres=$_POST['Nombres'];
                $apellidos=$_POST['Apellidos'];
                $identificacion=$_POST['Identificacion'];
                $correo=$_POST['Correo'];
                $empresa1=$_POST['Empresa1'];
                $estado=$_POST['estado'];
                $contra =$_POST['Contraseña'];
                // sirve para enviar y resivir informacion al modelo especificado
                require_once '../Model/Model_ActualizarusuariosAdmin.php';
                $M = new update_usuario($contra,$estado,$empresa,$empresa1,$nombres,$apellidos,$identificacion,$correo,$idusuario);
                $l =$M->getupdate_usuario();

            }

        ?>
    </form>
    </form>
    </form>
    
</body>
</html>
