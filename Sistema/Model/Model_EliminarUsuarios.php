<?php
//este modelo sirve para realizar la eliminacion de un usuario (el usuario no se elimina de la base de datos solo se deja en un estado de inactividad)
    require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Controlador/Controlador.php");
    class delete_usuario{
        private $ID;
        private $empresa1;
       
        public $update;
       

        public function delete_usuario($empresa1,$idusuario){
            $this->ID = $idusuario;
            $this->empresa1 = $empresa1;
           
           
        }

        public function getdelete_usuario(){
            require_once "../../Model/Conectar_database.php";
            $c1 = new Conectar_Database();
            $cc=$c1->getconection();

                $update1 = sqlsrv_query($cc,"UPDATE EmpleadosEmpresa 
                                             SET IDEstados = 2
                                             where IDUsuarios = '".$this->ID."' and IDEmpresas = '".$this->empresa1."' ");
                
                if($update1){
                    echo "<script type='text/javascript'>
                    alert('usuario eliminado correctamente');                                                                                           
                    </script>";
                    echo'<script>window.location="../Lista_Usuarios.php"</script>';
                }
                
            
        }
    }
?>