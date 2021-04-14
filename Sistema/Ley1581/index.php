<?php
// esta alerta aparece en el formulario al no seleccionar una empresa
 $alert = '<p class="msg_error">no olvide seleccionar empresa </p>';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- este meta sirve para que la pagina sea responsive -->
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css"></link>
    <title>Evaluación Ley1581</title>
    
</head>
<body>


<!-- este section es el fomulario para regisstrarse como evaluado  -->
<section id="Container">
    <form method="POST" action="Controlador/Controlador.php"> <!-- form que envia la información diligenciada en el formulario hacia un controlador -->
    
    <fieldset ><!-- sirve para crear un recuadro al rededor de  distintas etiquetas con un titulo   -->
                <legend class='mayus'>Advertencia</legend> <!-- titulo del fieldset  -->
                <!-- etiquetas dentro del fielset -->
                <label><p>A todo empleado, proveedor o  cliente que ingrese a este sitio se les notifica que se necesitaran los siguientes datos personales que seran guardados en una base de datos protejida.
                     <br> Se les garantiza que ningun administrador de este sistema o cualquier persona responsable de su informacion pueda divulgar su informacion o utilizarla con fines agenos al estudio de la evaluacion.<br>
                     Recuerde que al darle al boton siguiente usted autoriza el tratamiento de sus datos. </p></label> 
    </fieldset>
    <!-- formulario para crear usuario evaluado  -->
    <h3>¿A que empresa pertenece usted como empleado,cliente o proveedor?</h3>
    <div class="alert"> <?php echo  $alert ;  ?> </div>
        <fieldset>
            <legend class='mayus'>Elija una Empresa </legend>
            <br>
                <label><input type="radio" name="Empresa" value="Palmeras" required><img src="img/PLC.jpeg" ></img></label>
            <label><input type="radio" name="Empresa" value="Agroexport" required><img src="img/Agroexport.jpeg" ></img></label>   
            <label><input type="radio" name="Empresa" value="Alianza" required><img src="img/Alianza Oriental.jpeg" ></img></label>
       </fieldset>

       <fieldset id="field1">
            <legend class='mayus'>Ingrese su datos personales</legend>
                <label><input type="text" name="Nombres" id='Nombres' placeholder="Nombres" required></label>
                <label><input type="text" name="Apellidos" id='Apellidos' placeholder="Apellidos" required></label>
                <label><input type="number" name="Identificacion" id='Identificacion ' placeholder="Identificacion" required></label>
                <label><input type="email" name="Correo" id='Correo' placeholder="Correo" required></label>    
       </fieldset>
       

       <input type="submit"  name="BTN_Ingreso" Value="Siguiente">
    </form>
</section>
    
</body>
</html>