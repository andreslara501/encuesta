<?php date_default_timezone_set('America/Bogota'); ?>

<?php

	if(isset($_SESSION['usuario'])){
		$result = $this -> db
						-> where("correo='" . $_SESSION['usuario'] . "'")
						-> get("usuario");
		$row = $result -> row_array();

		if(!is_null($row)){

		}else{
			echo
			"<script>
				window.location.replace('/admin/');
			</script>";
			exit("no se pudo abrir el archivo");
		}
	}else{
		echo
		"<script>
			window.location.replace('/admin/');
		</script>";
		exit("no se pudo abrir el archivo");
	}

?>

<div id="page_content" class=" bg-light">
	<!-- ## Clear -->
	<div class="container">
		<br>
		<div id="barra" class="progress" style="height: 20px;">
			<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
		</div>
		<br>
		<?php
			foreach ($secciones as $seccion){
				echo "
					<div class=\"card\" style=\"display:none\"  id_seccion=\"{$seccion["id"]}\" id=\"seccion_{$seccion["id"]}\">
						<div class=\"card-header bg-primary text-white\">
					    	{$seccion["descripcion"]}
					  	</div>
					  	<ul class=\"list-group list-group-flush seccion\">";

						echo "
							<li class=\"list-group-item   text-muted\">
								<span class=\"esconder_actual\">
								<strong>¡Recuerde!</strong>
								El instrumento evalúa las seis secciones dos veces (cultura actual y deseada).<br><br>
								<strong>En esta sección usted evaluará la Cultura Actual.</strong>
								Cada sección no debe superar los 100 puntos.  Dele el mayor número de puntos a la alternativa que es más parecida a su organización y menos o ningún punto (cero) a la alternativa que es menos parecida a su organización.
								</span>

								<span class=\"esconder_deseada\">
								<strong>En esta sección usted evaluará la Cultura Deseada. </strong>
								Evalúe a su organización pensando en ¿Cómo preferiría que se situara en 5 años con el fin de tener éxito?, ¿Qué organización tiene en mente?<br><br>
								<strong>¡Recuerde!</strong>
								Cada sección no debe superar los 100 puntos.  Dele el mayor número de puntos a la alternativa que representa su mayor preferencia y menos o ningún punto (cero) a la alternativa que es menos preferida para usted.

								</span>
							</li>";

						echo "
							<li class=\"list-group-item  d-none d-sm-block\">
								<div class=\"row\">
									<div class=\"col\">

									</div>
									<div class=\"col\">
										<div class=\"row\">
											<div class=\"col text-center esconder_actual\">
												<small class=\"form-text text-muted text-center\">Actual</small>
											</div>
											<div class=\"col text-center esconder_deseada\">
												<small class=\"form-text text-muted text-center\">Deseada</small>
											</div>
										</div>
									</div>
								</div>
							</li>

							<div class=\"card-footer\">
								<div class=\"row\">
									<div class=\"col text-muted\">
										Los totales deben ser 100 para pasar a la siguiente sección:
									</div>
									<div class=\"col-sm d-sm-none\">
										<div class=\"row\">
											<div class=\"col text-center esconder_actual\" suma=\"0\">
												Actual
											</div>
											<div class=\"col text-center esconder_deseada\" suma=\"0\">
												Deseada
											</div>
										</div>
									</div>
									<div class=\"col-sm\">
										<div class=\"row\">
											<div class=\"col text-center suma_actual_{$seccion["id"]} esconder_actual\" suma=\"0\">
												0
											</div>
											<div class=\"col text-center suma_deseado_{$seccion["id"]} esconder_deseada\" suma=\"0\">
												0
											</div>
										</div>
									</div>
								</div>
							</div>

							";

							if(isset($preguntas[$seccion["id"]])){
								foreach ($preguntas[$seccion["id"]] as $pregunta){
									echo "
										<li class=\"list-group-item pregunta\" id=\"pregunta_{$pregunta["id"]}\">
											<div class=\"row\">
												<div class=\"col-sm\">
													<span class=\"badge badge-primary\">{$pregunta["id"]}</span>
													 {$pregunta["descripcion"]}
												</div>
												<div class=\"col-sm\">
													<div class=\"row\">
														<div class=\"col-12 text-center esconder_actual\">
															<input class=\"form-control porcentaje_actual\" type=\"text\" min=\"1\" max=\"100\" id=\"porcentaje_actual_{$pregunta["id"]}\" id_pregunta=\"{$pregunta["id"]}\" id_seccion=\"{$seccion["id"]}\" value=\"0\" autocomplete=\"off\" maxlength=\"3\" size=\"3\" style=\"width: 60px; display: inline-block\"/>
															<small class=\"d-sm-none form-text text-muted text-center\">Actual</small>
														</div>
														<div class=\"col-12 text-center esconder_deseada\">
															<input class=\"form-control porcentaje_deseado\" type=\"text\" min=\"1\" max=\"100\" id=\"porcentaje_deseado_{$pregunta["id"]}\" id_pregunta=\"{$pregunta["id"]}\" id_seccion=\"{$seccion["id"]}\" value=\"0\" autocomplete=\"off\" maxlength=\"3\" size=\"3\" style=\"width: 60px; display: inline-block\"/>
															<small class=\"d-sm-none form-text text-muted text-center\">Deseada</small>
														</div>
													</div>
												</div>
											</div>
										</li>";
								}
							}
							echo "
								<div class=\"card-footer\">
									<div class=\"row\">
										<div class=\"col text-muted\">
											Los totales deben ser 100 para pasar a la siguiente sección:
										</div>
										<div class=\"col-sm d-sm-none\">
											<div class=\"row\">
												<div class=\"col text-center esconder_actual\" suma=\"0\">
													Actual
												</div>
												<div class=\"col text-center esconder_deseada\" suma=\"0\">
													Deseada
												</div>
											</div>
										</div>
										<div class=\"col-sm\">
											<div class=\"row\">
												<div class=\"col text-center suma_actual_{$seccion["id"]} esconder_actual\" suma=\"0\">
													0
												</div>
												<div class=\"col text-center suma_deseado_{$seccion["id"]} esconder_deseada\" suma=\"0\">
													0
												</div>
											</div>
										</div>
									</div>

									<br>

									<div class=\"row\">
										<div class=\"col\">
											<button class=\"atras btn btn-info btn-block\" type=\"submit\" id_seccion=\"{$seccion["id"]}\">Atrás</button>
										</div>
										<div class=\"col-sm\">
											<button class=\"continuar btn btn-success btn-block\" type=\"submit\" id_seccion=\"{$seccion["id"]}\" style=\"display:none\">Continuar</button>
										</div>
									</div>
								</div>
								";
				echo "
					  	</ul>
					</div>";
			}
		?>
		<div id="bienvenido" class="card">
			<div class="card-header">
		    	MODELO DE VALORES COMPETITIVOS - CULTURA ORGANIZACIONAL - OCAI - DESARROLLADA POR CAMERON Y QUINN 2006
		  </div>
		  <div class="card-body">
			<div id="universidades" class="text-center">
	  			<img src="/theme/img/terminos.jpg">
	  		</div>
			<br>
		    <h5 class="card-title">Inicio de cuestionario</h5>
			<p class="card-text">Para iniciar, selecciona la siguiente información:</p>
			<div>
				<div class="row">
					<div class="col-sm">
						<span style="color:red">* <span style="color:black">Antigüedad</span></span>
						<select class="form-control" id="contrato">
							<option value="0">Seleccione un tipo de contrato</option>
							<option value="1">Menos de 6 meses</option>
							<option value="2">6 meses a 1 año</option>
							<option value="3">1 año a 3 años</option>
							<option value="4">Más de 3 años</option>
						</select>
						<br>
					</div>

					<div class="col-sm">
						<span style="color:red">* <span style="color:black">Género</span></span>
						<select class="form-control" id="genero">
							<option value="0">Seleccione su género</option>
							<option value="1">Mujer</option>
							<option value="2">Hombre</option>
						</select>
						<br>
					</div>
				</div>

				<div class="row">
					<div class="col-sm">
						<span style="color:red">* <span style="color:black">Cargo directivo</span></span>
						<select class="form-control" id="cargo">
							<option value="0">Seleccione cargo directivo</option>
							<option value="1">Sí</option>
							<option value="2">No</option>
						</select>
						<br>
					</div>

					<div class="col-sm">
						<span style="color:red">* <span style="color:black">Área</span></span>
						<select class="form-control" id="area">
							<option value="0">Seleccione área</option>
							<option value="1">Administrativa</option>
							<option value="2">Docencia</option>
						</select>
						<br>
					</div>
				</div>
			</div>
			<br>
		    <button id="continuar_inicio" class="btn btn-success btn-block" style="display:none">Continuar</button>
		  </div>
		</div>

		<div id="ok" class="text-center" style="display:none">
			<i class="fas fa-check" style="color: green; font-size: 200px;"></i>
		</div>
		<div id="enviando" class="text-center" style="display:none">
			<style>
				.spinner {
				  width: 40px;
				  height: 40px;
				  background-color: #000;

				  margin: 100px auto;
				  -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
				  animation: sk-rotateplane 1.2s infinite ease-in-out;
				}

				@-webkit-keyframes sk-rotateplane {
				  0% { -webkit-transform: perspective(120px) }
				  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
				  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
				}

				@keyframes sk-rotateplane {
				  0% {
				    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
				    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg)
				  } 50% {
				    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
				    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg)
				  } 100% {
				    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
				    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
				  }
				}
			</style>
			<h3>Enviando encuesta, espera... ¡NO CIERRES LA VENTANA!</h3>
			<div class="spinner"></div>
		</div>
		<div id="gracias" class="text-center" style="display:none">
			<i class="fas fa-hand-peace " style="color: blue; font-size: 200px;"></i>
			<br><br>
			<h1>¡Gracias por tu colaboración!</h1>
			<p>La encuesta terminó, ya puedes salir ;)</p>
		</div>
		<br>
		<div class="text-muted text-center" style="font-size: 8px;">
			<img src="/theme/img/universidades.jpg">
			<br>
			<span>
				Diseño y desarrollo web: <a href="axul.co">axul.co</a><br>
				Tabuló: Mauricio Erazo
			</span>
		</div>
	</div>
</div>
