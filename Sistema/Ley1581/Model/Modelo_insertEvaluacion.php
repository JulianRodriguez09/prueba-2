<?php
// este modelo se utiliza para realizar sentencias de SQL SEVER insertando la evaluacion del usuario con PHP
require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Ley1581/Controlador/Controlador.php");
class insert_evaluacion{
    private $R1;
    private $R2;
    private $R3;
    private $R4;
    private $R5;
    private $R6;
    private $R7;
    private $R8;
    private $R9;
    private $R10;
    private $R11;
    private $R12;
    private $R13;
    private $P1;
    private $P2;
    private $P3;
    private $P4;
    private $P5;
    private $P6;
    private $P7;
    private $P8;
    private $P9;
    private $P10;
    private $P11;
    private $P12;
    private $P13;
    private $fecha;
    private $empresaid;
    public $insert;
    public $insert1;
    public $insert2;
    public $insert3;
    public $insert4;
    public $insert5;
    public $insert6;
    public $insert7;
    public $insert8;
    public $insert9;
    public $insert10;
    public $insert11;
    public $insert12;
    public $insert13;

    public function insert_evaluacion($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$P11,$P12,$P13,$Fecha,$idempresa){
        $this->R1 = $R1;
        $this->R2 = $R2;
        $this->R3 = $R3;
        $this->R4 = $R4;
        $this->R5 = $R5;
        $this->R6 = $R6;
        $this->R7 = $R7;
        $this->R8 = $R8;
        $this->R9 = $R9;
        $this->R10 = $R10;
        $this->R11 = $R11;
        $this->R12 = $R12;
        $this->R13 = $R13;
        $this->P1 = $P1;
        $this->P2 = $P2;
        $this->P3 = $P3;
        $this->P4 = $P4;
        $this->P5 = $P5;
        $this->P6 = $P6;
        $this->P7 = $P7;
        $this->P8 = $P8;
        $this->P9 = $P9;
        $this->P10 = $P10;
        $this->P11 = $P11;
        $this->P12 = $P12;
        $this->P13 = $P13;
        $this->fecha = $Fecha;
        $this->empresaid = $idempresa;
    }
    
    public function getinsert_evaluacion(){
        require_once "Conectar_database.php";
        $c1 = new Conectar_Database();
        $cc=$c1->getconection();
        
        if($this->P1=='1'&$this->R1=='1'){
            $insert = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
            VALUES ('".$this->empresaid."','".$this->P1."','".$this->R1."','".$this->fecha."','Correcto')");
        }
        else{
            $insert = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
            VALUES ('".$this->empresaid."','".$this->P1."','".$this->R1."','".$this->fecha."','Incorrecto')");
        }
        if($insert == true){
            if($this->P2=='3'&$this->R2=='4'){
                $insert1 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P2."','".$this->R2."','".$this->fecha."','Correcto')");
            }else{
                $insert1 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P2."','".$this->R2."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert1 == true){
            if($this->P3=='2'&$this->R3=='16'){
                $insert2 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P3."','".$this->R3."','".$this->fecha."','Correcto')");
            }else{
                $insert2 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P3."','".$this->R3."','".$this->fecha."','Incorrecto')");
            }    
        }

        if($insert2 == true){
            if($this->P4=='5'&$this->R4=='6'){
                $insert3 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P4."','".$this->R4."','".$this->fecha."','Correcto')");
            }else{
                $insert3 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P4."','".$this->R4."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert3 == true){
            if($this->P5=='6'&$this->R5=='7'){
                $insert4 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P5."','".$this->R5."','".$this->fecha."','Correcto')");
            }else{
                $insert4 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P5."','".$this->R5."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert4 == true){
            if($this->P6=='4'&$this->R6=='5'){
                $insert5 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P6."','".$this->R6."','".$this->fecha."','Correcto')");
            }else{
                $insert5 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P6."','".$this->R6."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert5 == true){
            if($this->P7=='10'&$this->R7=='11'){
                $insert6 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P7."','".$this->R7."','".$this->fecha."','Correcto')");
            }else{
                $insert6 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P7."','".$this->R7."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert6 == true){
            if($this->P8=='8'&$this->R8=='9'){
                $insert7 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P8."','".$this->R8."','".$this->fecha."','Correcto')");
            }else{
                $insert7 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P8."','".$this->R8."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert7 == true){
            if($this->P9=='7'&$this->R9=='8'){
                $insert8 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P9."','".$this->R9."','".$this->fecha."','Correcto')");
            }else{
                $insert8 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P9."','".$this->R9."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert8 == true){
            if($this->P10=='13'&$this->R10=='14'){
                $insert9 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P10."','".$this->R10."','".$this->fecha."','Correcto')");
            }else{
                $insert9 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P10."','".$this->R10."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert9 == true){
            if($this->P11=='9'&$this->R11=='10'){
                $insert10 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P11."','".$this->R11."','".$this->fecha."','Correcto')");
            }else{
                $insert10 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P11."','".$this->R11."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert10 == true){
            if($this->P12=='11'&$this->R12=='12'){
                $insert11 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P12."','".$this->R12."','".$this->fecha."','Correcto')");
            }else{
                $insert11 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P12."','".$this->R12."','".$this->fecha."','Incorrecto')");
            }
        }

        if($insert11 == true){
            if($this->P13=='12'&$this->R13=='13'){
                $insert12 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P13."','".$this->R13."','".$this->fecha."','Correcto')");
            }else{
                $insert12 = sqlsrv_query($cc,"INSERT INTO PreguntaRespuesta (IDEmpleadosEmpresa,IDPregunta,IDRespuesta,Fecha,evaluar) 
                VALUES ('".$this->empresaid."','".$this->P13."','".$this->R13."','".$this->fecha."','Incorrecto')");
            }  
        }

        if($insert12 == true){
            echo "<script type='text/javascript'>
            alert('sus respuestas fueron enviadas exitosamente');                                                                                           
            </script>";
            echo'<script>window.location="../Sistema/ResumenEvaluacion.php?id='.$this->empresaid.'&fech='.$this->fecha.'";</script>';
        
        }else{
            echo "error";
        }
        
    }    
}
?>