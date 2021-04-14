<?php
// este modelo se utiliza para realizar sentencias de SQL SERVER y con ellas insertar el evaluado en la base de datos
require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Ley1581/Controlador/Controlador.php");


class insert_usuario{

    private $empresa;
    private $nombre;
    private $apellido;
    private $identificacion;
    private $correo;
    private $rol;
    private $estado;
    public $busqueda;
    public $result;
    public $IdUsuario;
    public $sqlinsert;
    public $insertar1;
    public $busquedaempresa;
    public $IdEE1;
    public  $busqueda1;
    public $IdEE;
    public $busquedaemple;
    public $IdEE2;

    public function insert_usuario($EmpresaID,$Nombre,$Apellidos,$Identificacion,$Correo,$RolID,$EstadoID){
        $this->empresa = $EmpresaID;
        $this->nombre = $Nombre;
        $this->apellido = $Apellidos;
        $this->identificacion = $Identificacion;
        $this->correo = $Correo;
        $this->rol = $RolID;
        $this->estado = $EstadoID;
    }

    public function getinsert_usuario(){
        require_once "Conectar_database.php";
        $c1 = new Conectar_Database();
        $cc=$c1->getconection();
        $busqueda = "SELECT IDUsuarios FROM Usuarios WHERE  Correo = '$this->correo'";  
        $result = sqlsrv_query($cc,$busqueda);
        
        while( $row = sqlsrv_fetch_array($result)){

            $IdUsuario = $row["IDUsuarios"];
            
        }
       
        if(!$IdUsuario){
            
            $sqlinsert =sqlsrv_query($cc,"INSERT INTO Usuarios (IDRoles,Nombres,Apellidos,Identificacion,Correo) VALUES ('".$this->rol."','".$this->nombre."','".$this->apellido."','".$this->identificacion."','".$this->correo."')");
             
            $busqueda = "SELECT IDUsuarios FROM Usuarios ";
            $result = sqlsrv_query($cc,$busqueda);

            while( $row = sqlsrv_fetch_array($result) ) 
            {
               $IdUsuario = $row['IDUsuarios'];
               
            }

            if($sqlinsert == true)
            {
                $insertar1 = sqlsrv_query($cc, "INSERT INTO EmpleadosEmpresa (IDEmpresas,IDUsuarios,IDEstados) VALUES ('".$this->empresa."','".$IdUsuario."','".$this->estado."')");  

                $busquedaempresa = sqlsrv_query($cc,"SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa WHERE IDEmpresas = '$this->empresa' AND IDUsuarios = '$IdUsuario'");
                while( $row = sqlsrv_fetch_array($busquedaempresa)){
        
                    $IdEE1 = $row["IDEmpleadosEmpresa"];
                    
                }
                if($insertar1 == true)
                {
                    session_start();
                    $_SESSION['id']=  $IdEE1;
                   
                    if($this->empresa == '1'){
                       
                        header("Location:../Sistema/EvaluacionPalmeras.php");
                     }elseif($this->empresa == '2'){
                        
                        header("Location:../Sistema/EvaluacionAgroexport.php");
                     }else{
                        
                        header("Location:../Sistema/EvaluacionAlianza.php");
                     }

                }
            }
        }elseif($IdUsuario){

            $busqueda1 = sqlsrv_query($cc,"SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa WHERE IDEmpresas = '$this->empresa' AND IDUsuarios = '$IdUsuario'");
            while( $row = sqlsrv_fetch_array($busqueda1)){
    
                $IdEE = $row["IDEmpleadosEmpresa"];
                
            }
        
            if($IdEE){
                session_start();
                $_SESSION['id']= $IdEE;

                if($this->empresa == '1'){
                   
                    header("Location:../Sistema/EvaluacionPalmeras.php");
                 }elseif($this->empresa == '2'){
                    
                     header("Location:../Sistema/EvaluacionAgroexport.php");
                 }else{
                    
                    header("Location:../Sistema/EvaluacionAlianza.php");
                 }
                 
             }elseif(!$IdEE)
             {            
                     $insertar1 = sqlsrv_query($cc,"INSERT INTO EmpleadosEmpresa (IDEmpresas,IDUsuarios,IDEstados) VALUES ('".$this->empresa."','".$IdUsuario."','".$this->estado."')");
                     $busquedaemple = sqlsrv_query($cc,"SELECT IDEmpleadosEmpresa FROM EmpleadosEmpresa WHERE IDEmpresas = '$this->empresa' AND IDUsuarios = '$IdUsuario'");
                        while( $row = sqlsrv_fetch_array($busquedaemple)){
                
                            $IdEE2 = $row["IDEmpleadosEmpresa"];
                            
                        }
                     if($insertar1 == true)
                     {
                        session_start();
                        $_SESSION['id']=  $IdEE2;

                         if($this->empresa == '1'){
                            
                             header("Location:../Sistema/EvaluacionPalmeras.php");
                         }elseif($this->empresa == '2'){
                            
                             header("Location:../Sistema/EvaluacionAgroexport.php");
                         }else{
                            
                             header("Location:../Sistema/EvaluacionAlianza.php");
                         }
                     } 
             }
        }


    }
}
?>