<?php
//este modelo sirve para realizar la creacion de un usuario nuevo
    require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Controlador/Controlador.php");

    class crear_usuario{
        private $Empresa;
        private $rol;
        private $nombres;
        private $apellidos;
        private $identificacion;
        private $correo;
        private $usuario;
        private $Contra;
        public $create;
        public $create1;
        public $busqueda;
        public $result;
        public $IdUsuario;

        public function crear_usuario($empresa,$rol,$nombres,$apellidos,$identificacion,$correo,$usuario,$contra){
            $this->Empresa = $empresa;
            $this->rol=$rol;
            $this->nombres =$nombres;
            $this->apellidos=$apellidos;
            $this->identificacion=$identificacion;
            $this->correo=$correo;
            $this->usuario=$usuario;
            $this->Contra =md5($contra);
            
        }

        public function getcrear_usuario(){
            require_once "../../Model/Conectar_database.php";
            $c1 = new Conectar_Database();
            $cc=$c1->getconection();
            $IdUsuario =0;
            $busqueda = "SELECT IDUsuarios FROM Usuarios WHERE Correo = '$this->correo'";  
            $result = sqlsrv_query($cc,$busqueda);
            while( $row = sqlsrv_fetch_array($result)){

                $IdUsuario = $row['IDUsuarios'];
                
            }
          
            if($IdUsuario == 0){
                $create=sqlsrv_query($cc,"INSERT into Usuarios (IDRoles,Nombres,Apellidos,Identificacion,Correo,Usuario,Contaseña) 
                values ('".$this->rol."','".$this->nombres."','".$this->apellidos."','".$this->identificacion."','".$this->correo."','".$this->usuario."','".$this->Contra."')");


                if($create == true){
                    $busqueda = "SELECT IDUsuarios FROM Usuarios ";
                    $result = sqlsrv_query($cc,$busqueda);

                    while( $row = sqlsrv_fetch_array($result) ) 
                    {
                    $IdUsuario = $row['IDUsuarios'];
                    
                    }
                    $create1=sqlsrv_query($cc,"INSERT into EmpleadosEmpresa (IDEmpresas,IDUsuarios,IDEstados) 
                    values ('".$this->Empresa."','".$IdUsuario."',1)");
                    if($create1){
                        echo "<script type='text/javascript'>
                        alert('usuario creado correctamente');                                                                                           
                        </script>";
                        echo'<script>window.location="../Lista_Usuarios.php"</script>';
                    }
                }
                
                
            }else{
               
                echo "<script type='text/javascript'>
                    alert('el usuario que intenta crear ya existe con este correo');                                                                                           
                    </script>";
                    echo'<script>window.location="../Registra_Usuario.php"</script>';

            }
              
        }
    }
?>