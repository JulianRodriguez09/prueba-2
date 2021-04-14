<nav>
			<ul>
				<li><a href="../">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<?php if($_SESSION['rol'] =='Admin'){?> <!--restriccion segun tippo de usuario-->
							<li><a href="Sistema/Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }elseif($_SESSION['rol'] =='SuperAdmin'){?>
							<li><a href="Sistema/Registra_Usuario.php">Nuevo Usuario</a></li>
							<li><a href="Sistema/Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }?>
					</ul>
				</li>
				 <li class="principal">
					<a href="#">Reportes</a>
					<ul>
						<?php if($_SESSION['rol'] =='Admin'){?><!--restriccion segun tippo de usuario-->
							<?php if($_SESSION['empresa'] == 'PALMERAS LA CAROLINA S.A'){?>
								<li><a href="Sistema/ReportePalmeras.php">Reportes Evaluaciones Palmeras La Carolina</a></li>
								<li><a href="Sistema/ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }elseif($_SESSION['rol'] =='Admin'&$_SESSION['empresa'] == 'AGROEXPORT DE COLOMBIA'){?>
								<li><a href="Sistema/ReporteAgroexport.php">Reportes Evaluaciones Agroexport de Colombia</a></li>
								<li><a href="Sistema/ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }elseif($_SESSION['rol'] =='Admin'&$_SESSION['empresa'] == 'ALIANZA ORIETAL S.A.'){?>
								<li><a href="Sistema/ReporteAlianza.php">Reportes Evaluaciones Alianza Oriental</a></li>
								<li><a href="Sistema/ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }?>
						<?php }elseif($_SESSION['rol'] =='SuperAdmin'){?>
							<li><a href="Sistema/ReportePalmeras.php">Reportes Evaluaciones Palmeras La Carolina</a></li>
							<li><a href="Sistema/ReporteAgroexport.php">Reportes Evaluaciones Agroexport de Colombia</a></li>
							<li><a href="Sistema/ReporteAlianza.php">Reportes Evaluaciones Alianza Oriental</a></li>
							<li><a href="Sistema/ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
						<?php }?>
						
					</ul>
				</li>
				<li class="principal">
					<a href="Sistema/GraficaGeneral.php">Graficos</a>
				</li> 
				<li class="principal">
					<a href="Sistema/ResumenPorAño.php">Resumen Anual</a>
				</li> 
			</ul>
		</nav>