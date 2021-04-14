<?php
//este modelo sirve para realizar la actualizacion de infromacion de cualquier usuario del rol evaluado
    require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Controlador/Controlador.php");
    class update_usuario{
        private $ID;
        private $empresa;
        private $empresa1;
        private $nombres;
        private $apellidos;
        private $identificacion;
        private $estado;
        private $Correo;
        public $update;
        public $update1;

        public function update_usuario($estado,$empresa,$empresa1,$nombres,$apellidos,$identificacion,$correo,$idusuario){
            $this->ID = $idusuario;
            $this->empresa = $empresa;
            $this->empresa1 = $empresa1;
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->identificacion = $identificacion;
            $this->Correo = $correo;
            $this->estado = $estado;
        }

        public function getupdate_usuario(){
            require_once "../../Model/Conectar_database.php";
            $c1 = new Conectar_Database();
            $cc=$c1->getconection();

            $update=sqlsrv_query($cc,"UPDATE Usuarios 
                                      SET Nombres = '".$this->nombres."',Apellidos = '".$this->apellidos."',Identificacion = '".$this->identificacion."',Correo ='".$this->Correo."'
                                      Where IDUsuarios = '".$this->ID."'");

            if($update){
                $update1 = sqlsrv_query($cc,"UPDATE EmpleadosEmpresa 
                                             SET IDEmpresas = '".$this->empresa."',IDEstados='".$this->estado."'
                                             where IDUsuarios = '".$this->ID."' and IDEmpresas = '".$this->empresa1."' ");
                
                if($update1){
                    echo "<script type='text/javascript'>
                    alert('usuario actualizado correctamente');                                                                                           
                    </script>";
                    echo'<script>window.location="../Lista_Usuarios.php"</script>';
                }
                
            }
        }
    }
?>