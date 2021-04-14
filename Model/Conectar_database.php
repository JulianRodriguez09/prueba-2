<?php
//este modelo sirve para realizar la conexion a la base de datos 
require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Conexion/Config.php");

class Conectar_Database{
    
    private $hostname = HOST_NAME;
    private $database = DATABASE_NAME;
    private $user = USER;
    private $password = PASSWORD;
    private $charset = CHARSET;
    private $conexion;
    
    
    function getconection() {

       
            
            $this->servername =$this->hostname;
            $this->connectioninfo = array("Database"=>$this->database,"UID"=> $this->user,"PWD"=>$this->password, "CharacterSet"=>$this->charset);
            $this->conn_sis = sqlsrv_connect($this->servername, $this->connectioninfo);
            
            
           
            if($this->conn_sis){
               // echo"conexion exitosa";
                
            }else{
                echo"Fallo en la conexion";
                die(print_r(sqlsrv_errors(),true));
            }
        
           
        
        return $this->conn_sis;
        //sqsrv_close($this->conn_sis);
        
    }
    
}

?>