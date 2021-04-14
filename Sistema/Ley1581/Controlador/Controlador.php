<!DOCTYPE html>
<html lang="es">
<head>
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css"></link>
</head>
<body>
    <!-- este controlador sirve para resivir la informacion de los inputs y enviarlos a modelos -->
    <!-- form que retornan la informacion a los distinos formularios existentes -->
    <form action="../index.php" method="POST">
    <form action="../Sistema/EvaluacionPalmeras.php" method="POST">
    <form action="../Sistema/EvaluacionAgroexport.php" method="POST">
    <form action="../Sistema/EvaluacionAlianza.php" method="POST">
        <?php
            if (isset($_POST['BTN_Ingreso'])){  //esta sentencia sirve para saver que boton sea presionado para traer la información
                    //guardado de informacion resividad de los formularios en variables
                    $Empresa = $_POST['Empresa'];
                    $Nombre = $_POST['Nombres'];
                    $Apellidos = $_POST['Apellidos'];
                    $Identificacion = $_POST['Identificacion'];
                    $Correo = $_POST['Correo'];
                    $EmpresaID = 0;
                    $RolID = 3;
                    $EstadoID = 1;
                   
                    switch($Empresa){
                        case 'Palmeras':
                            $EmpresaID = 1;
                            break;
                        case 'Agroexport':
                            $EmpresaID = 2;
                            break;
                        case 'Alianza':
                            $EmpresaID = 3;
                            break;  
                        default:
                            $EmpresaID = 0; 
                        break; 
                    }
                    // sirve para enviar y resivir informacion al modelo especificado
                    require_once '../Model/Modelo_insertUsuario.php'; 
                    $M = new insert_usuario($EmpresaID,$Nombre,$Apellidos,$Identificacion,$Correo,$RolID,$EstadoID);
                    $l =$M->getinsert_usuario();
                

                    

                }elseif(isset($_POST['BTN_Evaluacion'])){ //esta sentencia sirve para saver que boton sea presionado para traer la información
                        //guardado de informacion resividad de los formularios en variables
                        $R1= $_POST['Respuesta1'];
                        $R2= $_POST['Respuesta2'];
                        $R3= $_POST['Respuesta3'];
                        $R4= $_POST['Respuesta4'];
                        $R5= $_POST['Respuesta5'];
                        $R6= $_POST['Respuesta6'];
                        $R7= $_POST['Respuesta7'];
                        $R8= $_POST['Respuesta8'];
                        $R9= $_POST['Respuesta9'];
                        $R10= $_POST['Respuesta10'];
                        $R11= $_POST['Respuesta11'];
                        $R12= $_POST['Respuesta12'];
                        $R13= $_POST['Respuesta13'];
                        $P1=$_POST['Pregunta1'];
                        $P2=$_POST['Pregunta2'];
                        $P3=$_POST['Pregunta3'];
                        $P4=$_POST['Pregunta4'];
                        $P5=$_POST['Pregunta5'];
                        $P6=$_POST['Pregunta6'];
                        $P7=$_POST['Pregunta7'];
                        $P8=$_POST['Pregunta8'];
                        $P9=$_POST['Pregunta9'];
                        $P10=$_POST['Pregunta10'];
                        $P11=$_POST['Pregunta11'];
                        $P12=$_POST['Pregunta12'];
                        $P13=$_POST['Pregunta13'];
                        $Fecha=$_POST['Fecha'];
                        $idempresa =$_POST['empresa'];

                        // sirve para enviar y resivir informacion al modelo especificado
                        require_once '../Model/Modelo_insertEvaluacion.php';
                        $M = new insert_evaluacion($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,$P12,$P13,$Fecha,$idempresa);
                        $l =$M->getinsert_evaluacion();
                       
                }elseif(isset($_POST['BTN_EvaluacionAgro'])){ //esta sentencia sirve para saver que boton sea presionado para traer la información
                        //guardado de informacion resividad de los formularios en variables
                        $R1= $_POST['Respuesta1'];
                        $R2= $_POST['Respuesta2'];
                        $R3= $_POST['Respuesta3'];
                        $R4= $_POST['Respuesta4'];
                        $R5= $_POST['Respuesta5'];
                        $R6= $_POST['Respuesta6'];
                        $R7= $_POST['Respuesta7'];
                        $R8= $_POST['Respuesta8'];
                        $R9= $_POST['Respuesta9'];
                        $R10= $_POST['Respuesta10'];
                        $R11= $_POST['Respuesta11'];
                        $R12= $_POST['Respuesta12'];
                        $R13= $_POST['Respuesta13'];
                        $P1=$_POST['Pregunta1'];
                        $P2=$_POST['Pregunta2'];
                        $P3=$_POST['Pregunta3'];
                        $P4=$_POST['Pregunta4'];
                        $P5=$_POST['Pregunta5'];
                        $P6=$_POST['Pregunta6'];
                        $P7=$_POST['Pregunta7'];
                        $P8=$_POST['Pregunta8'];
                        $P9=$_POST['Pregunta9'];
                        $P10=$_POST['Pregunta10'];
                        $P11=$_POST['Pregunta11'];
                        $P12=$_POST['Pregunta12'];
                        $P13=$_POST['Pregunta13'];
                        $Fecha=$_POST['Fecha'];
                        $idempresa =$_POST['empresa'];

                        // sirve para enviar y resivir informacion al modelo especificado
                        require_once '../Model/Modelo_insertEvaluacion.php';
                        $M = new insert_evaluacion($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,$P12,$P13,$Fecha,$idempresa);
                        $l =$M->getinsert_evaluacion();
                   

                }elseif(isset($_POST['BTN_EvaluacionAli'])){ //esta sentencia sirve para saver que boton sea presionado para traer la información

                        //guardado de informacion resividad de los formularios en variables
                        $R1= $_POST['Respuesta1'];
                        $R2= $_POST['Respuesta2'];
                        $R3= $_POST['Respuesta3'];
                        $R4= $_POST['Respuesta4'];
                        $R5= $_POST['Respuesta5'];
                        $R6= $_POST['Respuesta6'];
                        $R7= $_POST['Respuesta7'];
                        $R8= $_POST['Respuesta8'];
                        $R9= $_POST['Respuesta9'];
                        $R10= $_POST['Respuesta10'];
                        $R11= $_POST['Respuesta11'];
                        $R12= $_POST['Respuesta12'];
                        $R13= $_POST['Respuesta13'];
                        $P1=$_POST['Pregunta1'];
                        $P2=$_POST['Pregunta2'];
                        $P3=$_POST['Pregunta3'];
                        $P4=$_POST['Pregunta4'];
                        $P5=$_POST['Pregunta5'];
                        $P6=$_POST['Pregunta6'];
                        $P7=$_POST['Pregunta7'];
                        $P8=$_POST['Pregunta8'];
                        $P9=$_POST['Pregunta9'];
                        $P10=$_POST['Pregunta10'];
                        $P11=$_POST['Pregunta11'];
                        $P12=$_POST['Pregunta12'];
                        $P13=$_POST['Pregunta13'];
                        $Fecha=$_POST['Fecha'];
                        $idempresa =$_POST['empresa'];

                        // sirve para enviar y resivir informacion al modelo especificado
                        require_once '../Model/Modelo_insertEvaluacion.php';
                        $M = new insert_evaluacion($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,$P12,$P13,$Fecha,$idempresa);
                        $l =$M->getinsert_evaluacion();
                }

        ?>
    </form>
    </form>
    </form>
    </form>
</body>
</html>