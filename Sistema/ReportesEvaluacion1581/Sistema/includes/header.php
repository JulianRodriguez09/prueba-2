<?php

if(empty( $_SESSION['active'] ))
{
    header('location: ../');
}
?>
<header>
        <div class="header">
			
            <h1>Sistema Reportes</h1>
            
			<div class="optionsBar">
            <p> <?php echo fechaC(); ?></p>
				<span>|</span>
                <span ><?php echo $_SESSION['usuario']  ?></span>
                <span>|</span>
                <span ><?php echo $_SESSION['rol']  ?></span>
                <span>|</span>
                <span ><?php echo $_SESSION['empresa']  ?></span>
				<a href="../Usuario.php?id=<?php echo $_SESSION['usuario']?>"><img class="photouser" src="../img/user.png" alt="Usuario"></a>
				<a href="../salir.php"><img class="close" src="../img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
        </div>
       <?php include "nav.php"?>
</header>