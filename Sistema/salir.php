<?php
//este codigo sirve para cerrar la pagina
session_start();
session_destroy();
header('location: ../');
?>