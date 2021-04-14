<?php
// esto sirve para tener la fecha actual 
date_default_timezone_set('America/Bogota');

function fechaC(){
    $mes = array("","01",
                    "02",
                    "03",
                    "04",
                    "05",
                    "06",
                    "07",
                    "08",
                    "09",
                    "10",
                    "11",
                    "12",);
    return date('Y')."-".$mes[date('n')]."-".date('d');
}
?>