<style>
body, html, #page_all{
    height: 100%;
    width: 100%;
}
#bod {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  height: 100%;
  width: 100%;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="number"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>

<div id="bod">
<form class="form-signin" id="login_form" method="post" >

  <h1 class="h3 mb-3 font-weight-normal">  <i class="fas fa-clock"></i> Ingrese su correo</a></h1>
  <p>Solo podrá hacer la encuesta una vez</p>
  <label for="inputEmail" class="sr-only">Correo</label>
  <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Correo" required autofocus>
  <br>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>


<p>Usuarios de prueba: <br> prueba1@prueba.com<br> prueba2@prueba.com<br> prueba3@prueba.com<br> prueba4@prueba.com<br> prueba5@prueba.com<br> prueba6@prueba.com<br> prueba7@prueba.com</p>

</form>
</div>
