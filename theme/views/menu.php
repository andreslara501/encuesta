<?php

?>
<style>
.lds-ripple {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #000;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}

</style>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ayuda para el cuestionario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <strong>Instrucciones:</strong>
                    <ul>
                        <li>No está permitido registrarse de nuevo con la misma dirección de correo electrónico.</li>
                        <li>Realice la valoración de una vez, sin interrupción.</li>
                    </ul>
                <strong>Divida 100 puntos</strong>
                <ul>
                    <li>Valorando cada aspecto, divida 100 puntos entre cuatro alternativas. Dele el mayor número de puntos a la alternativa que es más parecida a su organización y menos o ningún punto a la alternativa que es menos similar a su organización.</li>
                    <li>Asegúrese que el total es igual a 100 por cada elemento. La calculadora integrada le ayudará a dividir estos 100 puntos exactamente. Tiene que poner un valor en cada casilla. Si por ejemplo ha llenado 2 casillas con 50 puntos, deben poner un 0 a las otras 2 casillas.</li>
                </ul>
                <strong>Nota: </strong>Cuando vaya a puntuar las alternativas, siga su intuición, quédese con su primer instinto, generalmente es el correcto. No existen respuestas correctas o equivocadas para estos ítems, del mismo modo que no hay culturas correctas o erróneas.
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<div class="container">
    	    <div class="navbar-brand" href="#">
                <span><i class="fas fa-clock"></i> Encuesta OCAI</span>
            </div>
            <span class="navbar-text">
                <a href="/api/sesion/cerrar/" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-question-circle"></i> Ayuda</a>
                <a href="/api/sesion/cerrar/" class="btn btn-primary"><i class="fas fa-window-close"></i> Salir de la encuesta</a>
            </span>
	    </div>
	  </div>
    </nav>
