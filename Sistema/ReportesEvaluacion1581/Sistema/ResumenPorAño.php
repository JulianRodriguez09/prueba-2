<?php
//session start se utiliza para poder identificar si existe un usuario en el aplicativo
session_start();
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<?php include "includes/scripts2.php" ?>
	<title>Sistema Ley1581 | Resusmen Por Año</title>
</head>
<body>
<?php include "includes/header1.php" ?>
<?php 
// guardado de año actual en variable 
$fecha = date('Y'); 
?>
<!--section donde se aloja formulario-->
    <section id="container">
		<form action='GraficaAnual.php' method='POST' enctype='multipart/form-data'><!--form para enviar informacion diligenciada en en el formulario-->
            <h3>Resumen Anual</h3>
            <p style='text-align:Center; font-size: 13pt; padding:10px;'> Porfavor seleccione el año que dese visualizar</p>
            <select name="year">
                      <option value="0">Año</option>
                      <?php  for($i=2020;$i<=$fecha;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
                    </select>
            <input type='submit' name='Btn_siguiente' value='Siguiente'>
        </form>
        
	</section>
	<?php include "includes/footer.php" ?>
</body>
</html>