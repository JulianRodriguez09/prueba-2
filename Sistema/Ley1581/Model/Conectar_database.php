<?php
// este modelo se utiliza para realizar sentencias de conexion con PHP
require_once $_SERVER['DOCUMENT_ROOT'].("/SistemaProtecciondedatos/Sistema/Ley1581/Conexion/Config.php");

class Conectar_Database{
    
    private $servidor ;
    private $basededatos ;
    private $usuario ;
    private $password ;
    private $charset ;
    public $servername;
    public $connectioninfo;
    public $conn_sis;
    
    public function Conectar_Database()
	{

    $this->usuario = USER ;
	$this->password = PASSWORD;
    $this->servidor = HOST_NAME;
    $this->basededatos = DATABASE_NAME ;
    $this->charset = CHARSET; 

	}
    public function getconection() {

       
            
            $servername =$this->servidor;
            $connectioninfo = array("Database"=>$this->basededatos,"UID"=> $this->usuario,"PWD"=>$this->password, "CharacterSet"=>$this->charset);
            $conn_sis = sqlsrv_connect($servername, $connectioninfo);
            
            
           
            if($conn_sis){
                // echo"conexion exitosa";
                
            }else{
                echo"Fallo en la conexion";
                die(print_r(sqlsrv_errors(),true));
            }
        
    
        
        return $conn_sis;
        
    }
    
}

?>