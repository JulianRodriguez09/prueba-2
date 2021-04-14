<?php
// Utilizar Modelo de Conexion
  include_once "functions.php";
  session_start();
  $IdEmpresa = $_SESSION['id'];
// Utilizar Funcion de Fecha
  require_once "../Model/Conectar_database.php";
  $c1 = new Conectar_Database();
  $cc=$c1->getconection();
// Alerta para saber si falta alguna pregunta por responder
  $alert = '<p class="msg_error">no olvide seleccionar todas sus respuestas </p>';

  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- este meta sirve para que la pagina sea responsive -->
    <title>Evaluacion Palmeras La Carolina</title>
    <link rel="stylesheet" type="text/css" href="CSS/estiles.css"></link>
    <link rel="icon" type="image/jpeg" href="../img/PLC.jpeg" />
</head>
<body>

<!-- section lo utilizamos como formulario para enviar informacion al controlador -->
    <section id='Container'>
        <form method='POST' action='../Controlador/Controlador.php'><!-- form que envia la información diligenciada en el formulario hacia un controlador -->
            <!-- input para enviar información al controlador de forma oculta -->
            <input type="hidden" name="Fecha" Value="<?php echo fechaC(); ?>">
            <input type="hidden" name="empresa" Value="<?php echo $IdEmpresa;?>">
            <div class="alert"> <?php echo $alert;?> </div> <!-- div para que aparezcan las alertas de error -->
            <h3> PALMERAS LA CAROLINA SA<br> Evaluacion Ley 1581 </h3>
           
            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '1' "; //sentencia de SQL SERVER traer informacion de las preguntas
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta1" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta, Respuesta FROM Respuesta Where IDRespuesta = '22' or IDRespuesta = '1' or IDRespuesta = '23' ORDER BY IDRespuesta DESC "; //sentencia de SQL SERVER traer informacion de las respuestas 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta1" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '3' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta2" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '4' or IDRespuesta = '24' or IDRespuesta = '25' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta2" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '2' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta3" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '16' or IDRespuesta = '2' or IDRespuesta = '3' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta3" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '5' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta4" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '1' or IDRespuesta = '6' or IDRespuesta = '15' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta4" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '6' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta5" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '15' or IDRespuesta = '6' or IDRespuesta = '7' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta5" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '4' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta6" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '5' or IDRespuesta = '2' or IDRespuesta = '7' ORDER BY IDRespuesta DESC "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta6" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '10' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta7" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '11' or IDRespuesta = '10' or IDRespuesta = '12' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta7" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '8' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta8" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '9' or IDRespuesta = '21' or IDRespuesta = '16' ORDER BY Respuesta"; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta8" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '7' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta9" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '8' or IDRespuesta = '6' or IDRespuesta = '16' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta9" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '13' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta10" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '14' or IDRespuesta = '13' or IDRespuesta = '15' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta10" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '9' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta11" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '10' or IDRespuesta = '11' or IDRespuesta = '13' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta11" value="<?php echo $row['IDRespuesta']; ?>"required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '11' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta12" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '12' or IDRespuesta = '20' or IDRespuesta = '16' ORDER BY Respuesta "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta12" value="<?php echo $row['IDRespuesta']; ?>"required ><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>

            <?php
                $busqueda = "SELECT IDPregunta,Pregunta FROM Pregunta Where IDPregunta = '12' ";
                $result = sqlsrv_query($cc,$busqueda);
                while( $row = sqlsrv_fetch_array($result)){
            ?>
                    <fieldset>
                        <legend ><?php echo $row["Pregunta"]; ?></legend>
                        <input type="hidden" name="Pregunta13" value='<?php echo $row["IDPregunta"]; ?>'>
                        <br>
                            <?php
                             $busqueda = "SELECT IDRespuesta,Respuesta FROM Respuesta Where IDRespuesta = '12' or IDRespuesta = '13' or IDRespuesta = '15' "; 
                                    $result = sqlsrv_query($cc,$busqueda);
                                 while( $row = sqlsrv_fetch_array($result)){
                            ?>        
                                    <label><input type="radio" name="Respuesta13" value="<?php echo $row['IDRespuesta']; ?>" required><?php   echo $row["Respuesta"];;?></label><br>
                            <?php           
                            }
                            ?>
                            
                           

                    </fieldset>
            <?php     
                }  
            ?>
            
            <input type="submit"  name="BTN_Evaluacion" Value="Enviar">
        </form>
    </section>

</body>
</html>