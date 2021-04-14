<?php
//Utilizar modelo para conectar base de datos 
 require_once "Model/Conectar_database.php";
 $c1 = new Conectar_Database();
 $cc=$c1->getconection();
//Alerta en caso de algun error
$alert="";
//esto sirve para iniciar una secion si eta no se sierra la pagina seguira abierta
session_start();
 if(!empty( $_SESSION['active'] ))
 {
     header('location: Sistema/');
 }else{

//codigo PHP ára compara la informacion diligenciada con la infomacion existente en la base de datos
 if(!empty($_POST))
 {
    if(empty($_POST['Usuario']) || empty($_POST['Contraseña']))
    {
     $alert="<p class='alert msg_error'>Ingrese sus datos para ingresar </p>";
    }else{
        
         $user = $_POST['Usuario'];
         $pas = md5($_POST['Contraseña']);
         $empresa = $_POST['Empresa'];

         switch($empresa){
            case '1':
                $EmpresaID = 'PALMERAS LA CAROLINA S.A';
                break;
            case '2':
                $EmpresaID = 'AGROEXPORT DE COLOMBIA';
                break;
            case '3':
                $EmpresaID = 'ALIANZA ORIETAL S.A.';
                break;  
            default:
                $EmpresaID = ''; 
            break; 
        }
        
         $loginn = "SELECT NombreEmpresa as Empresa, Nombres, Apellidos, Rol, Usuario FROM Roles as r INNER JOIN 
                                         Usuarios as u on r.IDRoles = u.IDRoles INNER JOIN
                                         EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios INNER JOIN
                                         Empresas as em on e.IDEmpresas = em.IDEmpresas
                                         WHERE Usuario = '".$user."' and Contaseña = '".$pas."'  and NombreEmpresa = '".$EmpresaID."' and IDEstados = 1 ";
          $result=sqlsrv_query($cc,$loginn);

          $data = sqlsrv_fetch_array($result);
        // en esta parte se envian datos de seccion es decir los datos del usuario que ingesa al sistema 
         if($data)
         {
            $_SESSION['active'] = true;
            $_SESSION['nombre'] = $data['Nombres'];
            $_SESSION['apellido'] = $data['Apellidos'];
            $_SESSION['rol'] = $data['Rol'];
            $_SESSION['empresa'] = $data['Empresa'];
            $_SESSION['usuario'] = $data['Usuario'];
            header('location: Sistema/');         
            
         }else{
         // alerta en caso de error    
             $alert="<p class='alert msg_error'>usuario o contraseña  son Incorrectos, o su usuario no pertenece a la empresa seleccionada</p>";
             session_destroy();
         }
     }
 }
 }
?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login | Sistema Ley 1581</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Meta para que la pagina sea responsiva-->
    </head>
    <body>
    <!-- section utilizado para alojar informacion del sistema-->
    <section id="containers" >
		<form> 
			<h3>sistema general proteccion de datos</h3>
			<p > Ley 1581 de 2012 y decreto 1377 de 2013" </p>
			
            </form>
    </section>
    <!-- section utilizado para alojar el formulario de ingreso-->
        <section id="container">
            <form action="" method="POST"><!--este form sirve para recargar la pagina enviando la informacoon del usuario-->
                <h3>Iniciar Sesión</h3>
                
                <img src="img/login.png" alt="Login">
          
                <input type="text" name="Usuario" placeholder="Usuario" >
                <input type="password" name="Contraseña" placeholder="Contraseña" >
                
                <?php 
                
                $selecciona = "SELECT IDEMpresas,NombreEmpresa FROM Empresas ";//ssentencia SQL SERVER para traer informacion de las empresas existentes e base de datos
                $resultado2 = sqlsrv_query($cc,$selecciona);
                
                ?>

                <select name="Empresa" >
                <option >Seleccione Empresa</option>
                        <?php 
                        while($columna = sqlsrv_fetch_array($resultado2)){
                            

                            echo"<option value=".$columna['IDEMpresas']." > ".$columna['NombreEmpresa']." </option>";
                            
                    
                        }
                        ?>
                </select>
                <p ><?php echo "$alert" ?></p>
                <input type="submit" value="INGRESAR">  
            </form>
        </section>
    </body>
</html>