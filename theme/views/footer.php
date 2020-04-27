		<div id="page_footer">
			<!-- ** Jquery - otros -->
			<script src="/theme/libs/jquery/jquery.js"></script>
			<script src="/theme/libs/popper/popper.min.js"></script>
			<script src="/theme/libs/bootstrap/js/bootstrap.min.js"></script>

			<script src="/theme/js/basic.js"></script>

			<link rel="stylesheet" type="text/css" href="/theme/libs/notie/notie.min.css">
		    <script src="/theme/libs/notie/notie.min.js" type="text/javascript"></script>

			<script>
			$(document).ready(function(){
			    var path = "";

				var pasadas = 0;
				var posicion = 0;

			    $("#login_form").submit(function(e) {

			        var url = path + "/login/login_form/"; // the script where you handle the form input.

			        $.ajax({
			                type: "POST",
			                url: url,
			                data: $("#login_form").serialize(), // serializes the form's elements.
			                success: function(data){
			                    if(solo_numeros(data)==1){
			                        window.location.replace("/");
			                    }
			                    if(solo_numeros(data)==0){
			                        notie.alert({ time: 10, text: ':( parece que hay un error, el correo no está en la lista' })
			                    }
			                    if(solo_numeros(data)==2){
			                        notie.alert({ time: 10, text: 'Ya llenaste la encuesta' })
			                    }
			                }
			            });

			            e.preventDefault(); // avoid to execute the actual submit of the form.
			    });

			    function verificar_inicio(){
			        contrato = $("#contrato").val();
					genero	 = $("#genero").val();
					cargo	 = $("#cargo").val();
					area 	 = $("#area").val();

					console.log(contrato + " - " + genero + " - " + cargo + " - " + area);

			        if(solo_numeros(contrato) !=0 && solo_numeros(genero) !=0 && solo_numeros(cargo) !=0 && solo_numeros(area) !=0){
			            $("#continuar_inicio").show();
			        }else{
			            $("#continuar_inicio").hide();
			        }
			    }

			    $("#contrato").change(function(){
			        verificar_inicio();
			    });

				$("#genero").change(function(){
			        verificar_inicio();
			    });

				$("#cargo").change(function(){
			        verificar_inicio();
			    });

				$("#area").change(function(){
			        verificar_inicio();
			    });

			    $("#continuar_inicio").click(function(){
			        $("#seccion_1").fadeIn();
			        $("#bienvenido").hide();
					$(".esconder_deseada").hide();
			        $("#barra .progress-bar").animate({
			            width: "4%",
			        }).text("4%");

					posicion ++;
			    });


			    function verificar_porcentajes(this_objeto, tipo){
			        id_seccion = this_objeto.attr("id_seccion");
			        suma = 0;
			        $("#seccion_" + id_seccion + " .porcentaje_" + tipo).each(function(){
			            suma = suma + solo_numeros($(this).val());
			        });

			        resta = suma - solo_numeros(this_objeto.val());

			        if(suma > 100){
			            notie.alert({ time: 10, type:"error", text: ':( La suma total debe ser 100' });
			            this_objeto.val(0);
			            $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).text(resta);
			            $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).attr("suma", resta);
			        }else{
			            if(suma == 100){
			                $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).html(suma + " <i class=\"fas fa-check\" style=\"color: green\"></i>");
			                $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).attr("suma", suma);
			            }else{
			                $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).text(suma);
			                $("#seccion_" + id_seccion + " .suma_" + tipo + "_" + id_seccion).attr("suma", suma);
			            }
			        }

			        actual = $("#seccion_" + id_seccion + " .suma_actual_" + id_seccion).attr("suma");
			        deseado = $("#seccion_" + id_seccion + " .suma_deseado_" + id_seccion).attr("suma");

			        tiene_vacios = 0;

			        $("#seccion_" + id_seccion + " input").each(function(){
			            if(solo_numeros($(this).val()) == 0){
			                tiene_vacios = 1;
			            }
			        });

					if(pasadas==0){
						if(actual == 100){
								$("#seccion_" + id_seccion + " .continuar").show();
						}else{
							$("#seccion_" + id_seccion + " .continuar").hide();
						}
					}else{
						if(deseado == 100){
								$("#seccion_" + id_seccion + " .continuar").show();
						}else{
							$("#seccion_" + id_seccion + " .continuar").hide();
						}
					}
			    }

			    $(".pregunta .porcentaje_actual").change(function(){
			        verificar_porcentajes($(this), "actual");
			    }).keyup(function(){
			        verificar_porcentajes($(this), "actual");
			    });

			    $(".pregunta .porcentaje_deseado").change(function(){
			        verificar_porcentajes($(this), "deseado");
			    }).keyup(function(){
			        verificar_porcentajes($(this), "deseado");
			    });

			    $(".atras").click(function(){
					if(pasadas==0){
						id_seccion = $(this).attr("id_seccion");
				        id_seccion_back = solo_numeros(id_seccion) - 1;

				        progreso = posicion * 8;

				        $("#barra .progress-bar").animate({
				            width: progreso + "%",
				        }).text(progreso + "%");

				        if(id_seccion==1){
				            $("#seccion_" + id_seccion).fadeOut(function(){
				                $("#bienvenido").fadeIn();
				            });
				        }else{
				            $("#seccion_" + id_seccion).fadeOut(function(){
				                $("#seccion_" + id_seccion_back).fadeIn();
				            });
				        }
					}else{
						progreso = posicion * 8;
						$("#barra .progress-bar").animate({
				            width: progreso + "%",
				        }).text(progreso + "%");

						id_seccion = $(this).attr("id_seccion");
						if(id_seccion==1){
				        	id_seccion_back = 6;

				            $("#seccion_" + id_seccion).fadeOut(function(){
				                $("#seccion_" + id_seccion_back).fadeIn();
								$(".esconder_actual").show();
								$(".esconder_deseada").hide();
								$("#seccion_" + id_seccion_back + " .continuar").show();
								pasadas = 0;
								console.log(id_seccion);
				            });
				        }else{
							consolo.log(id_seccion_back + "----");
				            $("#seccion_" + id_seccion).fadeOut(function(){
								verificar_porcentajes($("#seccion_" + id_seccion), "actual");
				                $("#seccion_" + id_seccion_back).fadeIn();
				            });
				        }
					}

					posicion = posicion -1;
			    });

			    $(".continuar").click(function(){
			        id_seccion = $(this).attr("id_seccion");
			        id_seccion_next = solo_numeros(id_seccion) + 1;

					progreso = posicion * 8;

			        if(id_seccion_next!=7){
			            $("#seccion_" + id_seccion).fadeOut(function(){
			                $("#ok").fadeIn().fadeOut(function(){
			                    $("#seccion_" + id_seccion_next).fadeIn();
			                });
			            });

			            $("#barra .progress-bar").animate({
			                width: progreso + "%",
			            }).text(progreso + "%");
			        }else{
						if(pasadas==0){
							$("#seccion_6").fadeOut(function(){
								$("#ok").fadeIn().fadeOut(function(){
									$("#seccion_1").fadeIn();
								});
							});

							$("#barra .progress-bar").animate({
								width: progreso + "%",
							}).text(progreso + "%");

							$(".continuar").hide();
							$(".esconder_actual").hide();
							$(".esconder_deseada").show();

							pasadas ++;
						}else{
							$("#seccion_" + id_seccion).fadeOut(function(){
				                $("#enviando").fadeIn();
				            });

				            array_parametros = {
				                contrato : $("#contrato").val(),
								genero : $("#genero").val(),
								cargo : $("#cargo").val(),
								area : $("#area").val()
				            };
				            $('.porcentaje_actual').each(function(){
				                id_seccion = $(this).attr("id_seccion");
				                id_pregunta = $(this).attr("id_pregunta");

				                eval("array_parametros.actual_" + id_seccion + "_" + id_pregunta + " = '" + $(this).val() + "';");
				            });
				            $('.porcentaje_deseado').each(function(){
				                id_seccion = $(this).attr("id_seccion");
				                id_pregunta = $(this).attr("id_pregunta");

				                eval("array_parametros.deseado_" + id_seccion + "_" + id_pregunta + " = '" + $(this).val() + "';");
				            });

				            $.ajax({
				                    type: "POST",
				                    url: "/api/respuestas/nueva/",
				                    data: array_parametros, // serializes the form's elements.
				                    success: function(data){
				                        $("#enviando").hide(function(){
				                            $("#gracias").fadeIn();
				                        });

				                        $("#barra .progress-bar").animate({
				                            width: "100%",
				                        }).text("100%");
				                    }
				            });
						}
			        }

					posicion++;

			    });
			});

			//$('#source').quicksand( $('#destination li') );



			function money(num){
			    if(!isNaN(num)){
			        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
			        num = num.split('').reverse().join('').replace(/^[\.]/,'');
			        return "$"+num;
			    }else{
			        return "error";
			    }
			}

			function fecha_actual(){
			    var today = new Date();
			    var dd = today.getDate();

			    var mm = today.getMonth()+1;
			    var yyyy = today.getFullYear();
			    if(dd<10)
			    {
			        dd='0'+dd;
			    }

			    if(mm<10)
			    {
			        mm='0'+mm;
			    }
			    return dd + ' - ' + mm + ' - ' + yyyy;
			}

			function formatear_fecha(fecha){
			    fecha = fecha.replace(" ", "W3Schools");
			    fecha = fecha.split("-");
			    return fecha[2] + ' - ' + fecha[1] + ' - ' + fecha[0];
			}

			function solo_numeros(numero = 0){
			    numero = numero.replace(/\D/g,"");
			    if(numero == ""){
			        return 0;
			    }else{
			        return parseInt(numero);
			    }
			}
			</script>

		</div>
	</div>
</body>
</html>
