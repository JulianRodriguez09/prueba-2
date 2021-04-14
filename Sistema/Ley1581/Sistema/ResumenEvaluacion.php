<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Ley1581</title>
    <link rel="stylesheet" type="text/css" href="../CSS/estilos.css"></link>
</head>
<body>


    
<section id="Containers">
    <form action='../index.php'>
   

        <h3>Resumen Evaluación</h3>
        <?php
            include_once "../Model/Conectar_database.php";
            $c1 = new Conectar_Database();
            $cc=$c1->getconection();
             //variables
            $idUsuario=$_REQUEST['id'];
            $fecha=$_REQUEST['fech'];

            $busqueda = "SELECT Pregunta , Respuesta, evaluar from Usuarios as u 
                        inner join EmpleadosEmpresa as e on u.IDUsuarios = e.IDUsuarios
                        inner join Empresas as Em on e.IDEmpresas = Em.IDEmpresas
                        inner join PreguntaRespuesta as pr on e.IDEmpleadosEmpresa = pr.IDEmpleadosEmpresa
                        inner join Pregunta as p on pr.IDPregunta = p.IDPregunta
                        inner join Respuesta as r on pr.IDRespuesta = r.IDRespuesta 
                        where e.IDEmpleadosEmpresa = '".$idUsuario."' and Fecha = '".$fecha."' ";
            $result = sqlsrv_query($cc,$busqueda);
            
           
        ?>
        <br>
        <table> 
				<tr> 
					
					<th> Pregunta </th>
					<th> Respuesta </th>
					<th> Evaluar </th>
					<th> Respuesta Correcta </th>
			   	</tr>
        <?php
             while($columna = sqlsrv_fetch_array($result)){
          
        ?>
            <tr> 
			   		
                       <td> <?php echo $columna['Pregunta'];?> </td>
                       <td> <?php echo $columna['Respuesta']; ?> </td>
                       <td> <?php  if($columna["evaluar"]=='Correcto'){
                                         echo"<img src='../img/chulo.png'></img>";
                                    }else{
                                        echo"<img src='../img/equis.png'></img>";
                                    }
                            ?>
                        <td> <?php if($columna['Pregunta'] =='¿Qué es ley 1581?'&$columna["Respuesta"]!="Ley de protección de datos personales"){
                                echo"Ley de protección de datos personales";
                            }elseif($columna['Pregunta'] =='¿Quién administra el registro nacional de Bases de Datos?'&$columna["Respuesta"]!="Súper Intendencia de industria y comercio"){
                                echo"Súper Intendencia de industria y comercio";
                            }elseif($columna['Pregunta'] =='¿Qué derechos regulan esta ley?'&$columna["Respuesta"]!="Todas las anteriores"){
                                echo"Todas las anteriores</img>";
                            }elseif($columna['Pregunta'] =='¿Qué es habeas data?'&$columna["Respuesta"]!="Derecho que tiene la persona a eliminar, editar o rectificar información   personal"){
                                echo"Derecho que tiene la persona a eliminar, editar o rectificar información   personal";
                            }elseif($columna['Pregunta'] =='¿Qué es un responsable?'&$columna["Respuesta"]!="Persona natural o jurídica que realiza tratamiento de datos de titulares"){
                                echo"Persona natural o jurídica que realiza tratamiento de datos de titulares";
                            }elseif($columna['Pregunta'] =='¿Qué es un titular?'&$columna["Respuesta"]!="Persona Natural dueña de los datos personales"){
                                echo"Persona Natural dueña de los datos personales";
                            }elseif($columna['Pregunta'] =='¿Qué son los datos personales semiprivados?'&$columna["Respuesta"]!="Son todos aquellos datos que cuyo conocimiento o divulgación puede interesar a un grupo de personas"){
                                echo"Son todos aquellos datos que cuyo conocimiento o divulgación puede interesar a un grupo de personas";
                            }elseif($columna['Pregunta'] =='¿Qué es una autorización de tratamiento?'&$columna["Respuesta"]!="Consentimiento que deben requerir los tramitadores, de la información personal del titular "){
                                echo"Consentimiento que deben requerir los tramitadores, de la información personal del titular ";
                            }elseif($columna['Pregunta'] =='¿Qué deben asegurar quiénes recolectan datos?'&$columna["Respuesta"]!="Que el ciudadano pueda actualizar rectificar o eliminar sus datos informáticos"){
                                echo"Que el ciudadano pueda actualizar rectificar o eliminar sus datos informáticos";
                            }elseif($columna['Pregunta'] =='¿Qué es un dato personal sensible?'&$columna["Respuesta"]!="Es aquel dato que por su especial protección puede afectar su intimidad o generar discriminación"){
                                echo"Es aquel dato que por su especial protección puede afectar su intimidad o generar discriminación";
                            }elseif($columna['Pregunta'] =='¿Qué son los datos personales públicos?'&$columna["Respuesta"]!="Son todos aquellos datos que las normas y a constitución han determinado como públicos"){
                                echo"Son todos aquellos datos que las normas y a constitución han determinado como públicos";
                            }elseif($columna['Pregunta'] =='¿Cuáles son los datos personales?'&$columna["Respuesta"]!="Dato personal privado y dato sensible"){
                                echo"Dato personal privado y dato sensible";
                            }elseif($columna['Pregunta'] =='¿Qué es un dato personal privado?'&$columna["Respuesta"]!="Son todos aquellos datos que solo son de interés del titular"){
                                echo"Son todos aquellos datos que solo son de interés del titular";
                            }else{
                                echo $columna['Respuesta'];   
                            } ?> </td>
                            
                       
            </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <input type="submit" value="Terminar">
    </form>
</section>
    
</body>
</html>