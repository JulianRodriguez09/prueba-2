<?php
//modelo para actualizar usuario ingresado en el sistema
    require_once $_SERVER['DOCUMENT_ROOT'].("/ReportesEvaluacion1581/Sistema/Controlador/Controlador.php");

    class update_usuario{
        private $ID;
        private $Contra;
        public $update;

        public function update_usuario($id,$contra){
            $this->ID = $id;
            $this->Contra =md5($contra);
        }

        public function getupdate_usuario(){
            require_once "../../Model/Conectar_database.php";
            $c1 = new Conectar_Database();
            $cc=$c1->getconection();

            $update=sqlsrv_query($cc,"UPDATE Usuarios SET Contaseña = '".$this->Contra."' Where IDUsuarios = '".$this->ID."'");

            if($update){
                echo "<script type='text/javascript'>
                alert('usuario actualizado correctamente');                                                                                           
                </script>";
                echo'<script>window.location="../"</script>';
                
            }
        }
    }
?>