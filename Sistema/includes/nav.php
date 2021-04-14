<nav>

			<ul>
				<li><a href="../">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<?php if($_SESSION['rol'] =='Admin'){?>
							<li><a href="Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }elseif($_SESSION['rol'] =='SuperAdmin'){?>
							<li><a href="Registra_Usuario.php">Nuevo Usuario</a></li>
							<li><a href="Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }?>
					</ul>
				</li>
			</ul>
</nav>