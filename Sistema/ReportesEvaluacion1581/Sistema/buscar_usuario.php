<?php
//Utilizar Modelo Conexion a la base de datos
require_once "../../../Model/Conectar_database.php";
$c1 = new Conectar_Database();
$cc=$c1->getconection();
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
$busqueda=$_REQUEST['busqueda'];
        if(empty($busqueda)){
            header('location:Lista_Usuarios.php');
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts2.php" ?>
	<title>Sistema Ley1581 | Lista Usuarios</title>
</head>

<body >
<?php include "includes/header1.php" ?>
    
<!--section para apartar formulario-->
    <section id='containers'>
        <form action='../../pruebaexcel.php'> 
            <h1>Lista Usuarios </h1>
            <input type='submit' value='Excel'> 
        </form>
    </section>

    <section id="containers" >
    
	<form action='buscar_usuario.php' method='get'  ><!--form para enviar informacion diligenciada en input-->
            
                <input  type='submit' name='BTN_Buscar' value='Filtrar' class='btn_serach'>
                <input  type='text' name='busqueda' placeholder='BUSCAR' class='form_search' value='<?php echo $busqueda;?>' >
            
		<table > 
				<tr> 
                    <th> Empresa </th>
					<th> Nombres </th>
                    <th> Apellidos </th>
                    <th> Identificacion </th>
					<th> Correo </th>
					<th> Rol</th>
                    <th> Estado</th>
					<th> Acción </th>
			   	</tr>
            <?php
            
            //paginador
            $sqlregister=sqlsrv_query($cc,"SELECT COUNT(*)as totalregistro from EmpleadosEmpresa as e 
                                           inner join Usuarios as u on e.IDUsuarios = u.IDUsuarios 
                                           inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas
                                           inner join Roles as r on u.IDRoles = r.IDRoles
                                           where (Nombres LIKE '%$busqueda%'
                                           or    Apellidos LIKE '%$busqueda%'
                                           or    Identificacion LIKE '%$busqueda%'
                                           or    Correo LIKE '%$busqueda%'
                                           or    NombreEmpresa LIKE '%$busqueda%'
                                           or    Rol LIKE '%$busqueda%')");

            $result_registre=sqlsrv_fetch_array($sqlregister);
            $totalregistro = $result_registre['totalregistro'];
            $por_pagina = 15;
            if(empty($_GET['pagina'])){
                $pagina=1;
            }else{
                $pagina=$_GET['pagina'];
            }

            $desde = ($pagina-1 ) * $por_pagina;
            $total_paginas= ceil($totalregistro/$por_pagina);
            //sentencia SQL SERVER para traer informacion de los usuarios que coincidan con la informacion buscada
			 $sleccionar = sqlsrv_query($cc,"SELECT NombreEmpresa as Empresa,Nombres, Apellidos, Identificacion, Correo, Rol,u.IDUsuarios,TipoEstado  from Usuarios as u 
                                            inner join Roles as r on u.IDRoles = r.IDRoles 
                                            inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios 
                                            inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
                                            inner join Estados as es on e.IDEstados = es.IDEstados 
                                            where (Nombres LIKE '%$busqueda%'
                                                    or    Apellidos LIKE '%$busqueda%'
                                                    or    Identificacion LIKE '%$busqueda%'
                                                    or    Correo LIKE '%$busqueda%'
                                                    or    NombreEmpresa LIKE '%$busqueda%'
                                                    or    Rol LIKE '%$busqueda%')
                                            order by r.IDRoles 
                                            OFFSET $desde ROWS
                                            FETCH NEXT $por_pagina ROWS ONLY ");
            
			 
			 while($columna = sqlsrv_fetch_array($sleccionar)){
			?>
			    <tr> 
                    <td> <?php echo $columna['Empresa'];?> </td>
					<td> <?php echo $columna['Nombres'];?> </td>
                    <td> <?php echo $columna['Apellidos']; ?> </td>
                    <td> <?php echo $columna['Identificacion']; ?> </td>
					<td> <?php echo $columna['Correo']; ?> </td>
					<td> <?php echo $columna['Rol']; ?> </td>
                    <td> <?php echo $columna['TipoEstado']; ?> </td>
                    <?php
                    if($_SESSION['rol'] =='SuperAdmin'){
                    ?> 
                        <?php
                        if($columna['Rol'] =='Admin'){
                        ?>
                            <td><a style="color: blue; " href='ActualizarUsuarioAdmin.php?id=<?php echo $columna['IDUsuarios'];?>'>Editar </a>
                            |
                            <a style="color: red; " href='EliminarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Eliminar </a>
                        <?php
                            }elseif($columna['Rol'] =='Evaluado'){
                        ?>
                            <td><a style="color: blue; " href='ActualizarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Editar </a>
                            |
                            <a style="color: red; " href='EliminarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Eliminar </a>
                        <?php
                        }else{
                        ?>
                            <td> <!-- td vacio-->
                        <?php
                        }
                        ?>
                         
                    <?php   
                    }elseif($_SESSION['rol'] =='Admin'){
                    ?>   
                       <?php
                        if($columna['Rol'] =='Admin'){
                        ?>
                            <td><a style="color: blue; " href='ActualizarUsuarioAdmin.php?id=<?php echo $columna['IDUsuarios'];?>'>Editar </a>
                            |
                            <a style="color: red; " href='EliminarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Eliminar </a>
                        <?php
                            }elseif($columna['Rol'] =='Evaluado'){
                        ?>
                            <td><a style="color: blue; " href='ActualizarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Editar </a>
                            |
                            <a style="color: red; " href='EliminarUsuario.php?id=<?php echo $columna['IDUsuarios'];?>'>Eliminar </a>
                        <?php
                        }else{
                        ?>
                            <td> <!-- td vacio-->
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?> 

                         
                        
                    </td>
				</tr>

			<?php
			  }
			?>
		</table>
        <div class='paginador'>
			  <ul>
                <?php
                    if($pagina !=1){
                ?>
			   	<li><a href='?BTN_Buscar=Filtrar&busqueda=<?php echo $busqueda;?> &pagina=<?php echo 1;?>'>|<</a></li>
                <li><a href='?BTN_Buscar=Filtrar&busqueda=<?php echo $busqueda;?> &pagina=<?php echo $pagina - 1;?>'><<</a></li>
                <?php
                    }
                    for($i=1; $i<=$total_paginas; $i++){
                        if($i == $pagina){
                            echo "<li class='pageselected'>".$i."</a></li>";
                        }else{
                            echo "<li><a href='?BTN_Buscar=Filtrar&busqueda=".$busqueda."&pagina=".$i."'>".$i."</a></li>";
                        }
                       
                    }
                    if($pagina !=$total_paginas){
                ?>
                
				<li><a href='?BTN_Buscar=Filtrar&busqueda=<?php echo $busqueda;?> &pagina=<?php echo $pagina + 1;?>'>>></a></li>
                <li><a href='?BTN_Buscar=Filtrar&busqueda=<?php echo $busqueda;?> &pagina=<?php echo $total_paginas;?>'>>|</a></li>
                <?php
                    }
                ?>		  
			  </ul>
		</div>
	</form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>