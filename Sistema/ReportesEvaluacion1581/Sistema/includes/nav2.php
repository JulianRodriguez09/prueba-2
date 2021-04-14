<nav>
			<ul>
				<li><a href="../../">Inicio</a></li>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<?php if($_SESSION['rol'] =='Admin'){?><!--restriccion segun tippo de usuario-->
							<li><a href="Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }elseif($_SESSION['rol'] =='SuperAdmin'){?>
							<li><a href="Registra_Usuario.php">Nuevo Usuario</a></li>
							<li><a href="Lista_Usuarios.php">Lista de Usuarios</a></li>
						<?php }?>
					</ul>
				</li>
				 <li class="principal">
					<a href="#">Reportes</a>
					<ul>
						<?php if($_SESSION['rol'] =='Admin'){?><!--restriccion segun tippo de usuario-->
							<?php if($_SESSION['empresa'] == 'PALMERAS LA CAROLINA S.A'){?>
								<li><a href="ReportePalmeras.php">Reportes Evaluaciones Palmeras La Carolina</a></li>
								<li><a href="ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }elseif($_SESSION['rol'] =='Admin'&$_SESSION['empresa'] == 'AGROEXPORT DE COLOMBIA'){?>
								<li><a href="ReporteAgroexport.php">Reportes Evaluaciones Agroexport de Colombia</a></li>
								<li><a href="ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }elseif($_SESSION['rol'] =='Admin'&$_SESSION['empresa'] == 'ALIANZA ORIETAL S.A.'){?>
								<li><a href="ReporteAlianza.php">Reportes Evaluaciones Alianza Oriental</a></li>
								<li><a href="ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
							<?php }?>
						<?php }elseif($_SESSION['rol'] =='SuperAdmin'){?>
							<li><a href="ReportePalmeras.php">Reportes Evaluaciones Palmeras La Carolina</a></li>
							<li><a href="ReporteAgroexport.php">Reportes Evaluaciones Agroexport de Colombia</a></li>
							<li><a href="ReporteAlianza.php">Reportes Evaluaciones Alianza Oriental</a></li>
							<li><a href="ReporteFisico.php">Reportes Evaluaciones Fisicas</a></li>
						<?php }?>
						
					</ul>
				</li>
				<li class="principal">
					<a href="GraficaGeneral.php">Graficos</a>
				</li> 
				<li class="principal">
					<a href="ResumenPorAño.php">Resumen Anual</a>
				</li> 
			</ul>
</nav>