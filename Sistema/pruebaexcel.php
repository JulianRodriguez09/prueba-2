<?php
    include "includes/functions.php";
    $fecha = fechaC();

    header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
    header('Content-Disposition: attachment; filename="Usuarios Ley1581 '.$fecha.'.xls"');
    require_once "../Model/Conectar_database.php";
     $c1 = new Conectar_Database();
    $cc=$c1->getconection();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table border='1' cellpadding='2' caellspacing='0' width='100%'>
        <caption> Usuarios Base de Datos Ley 1581 <?php echo $fecha; ?> </caption>
        <tr> 
                    <th> Empresa </th>
					<th> Nombres </th>
                    <th> Apellidos </th>
                    <th> Identificacion </th>
					<th> Correo </th>
					<th> Rol</th>
                    <th> Estado</th>
		</tr>
    <?php
     $sleccionar = sqlsrv_query($cc,"SELECT NombreEmpresa as Empresa,Nombres, Apellidos, Identificacion, Correo, Rol,u.IDUsuarios,TipoEstado  from Usuarios as u 
     inner join Roles as r on u.IDRoles = r.IDRoles 
     inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios 
     inner join Empresas as ee on e.IDEmpresas = ee.IDEmpresas 
     inner join Estados as es on e.IDEstados = es.IDEstados 
     where Identificacion !=0 and Identificacion !=1
     order by NombreEmpresa 
     ");


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
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
