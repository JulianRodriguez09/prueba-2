<?php
//este modelo sirve para realizar la actualizacion de informacion del usuario que ingreso al sistema
    require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Controlador/Controlador.php");

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