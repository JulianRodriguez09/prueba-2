<?php
    //este modelo se utiliza para realizar sentencias de SQL SERVER para traer informacion de los usuarios y asi poder generar reportes en PDF
    //variables
    $idUsuario=$_REQUEST['id'];
    $fecha=$_REQUEST['fech'];
    //codigo sql
    $reporte="SELECT NombreEmpresa as Empresa, Nombres, Apellidos, Pregunta , Respuesta , Fecha,evaluar from Usuarios as u 
            inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios
            inner join Empresas as Em on e.IDEmpresas = Em.IDEmpresas
            inner join PreguntaRespuesta as pr on e.IDEmpleadosEmpresa = pr.IDEmpleadosEmpresa
            inner join Pregunta as p on pr.IDPregunta = p.IDPregunta
            inner join Respuesta as r on pr.IDRespuesta = r.IDRespuesta 
            where IDEstados = 1 and u.IDUsuarios = '".$idUsuario."' and Fecha = '".$fecha."' and NombreEmpresa = 'AGROEXPORT DE COLOMBIA'";

    $reporte1="SELECT Nombres,Apellidos FROM Usuarios   where IDUsuarios = '".$idUsuario."'  ";
    $reporte2="SELECT Identificacion FROM Usuarios   where  IDUsuarios = '".$idUsuario."' ";
    $reporte3="SELECT Fecha FROM PreguntaRespuesta as pr 
                inner join EmpleadosEmpresa as e 
                on pr.IDEmpleadosEmpresa = e.IDEmpleadosEmpresa 
                inner join Usuarios as u on e.IDUsuarios = u.IDUsuarios  
                where Fecha = '".$fecha."' and IDPregunta = 1 and u.IDUsuarios = '".$idUsuario."'  ";
        $reporte4="SELECT COUNT(*)as Correctas from Usuarios as u 
        inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios
        inner join Empresas as Em on e.IDEmpresas = Em.IDEmpresas
        inner join PreguntaRespuesta as pr on e.IDEmpleadosEmpresa = pr.IDEmpleadosEmpresa
        inner join Pregunta as p on pr.IDPregunta = p.IDPregunta
        inner join Respuesta as r on pr.IDRespuesta = r.IDRespuesta 
        where IDEstados = 1 and u.IDUsuarios = '".$idUsuario."' and Fecha = '".$fecha."' and NombreEmpresa = 'AGROEXPORT DE COLOMBIA' and evaluar = 'Correcto'";
?>