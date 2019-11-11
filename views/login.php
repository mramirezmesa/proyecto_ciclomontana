<!--=====================================
FORMULARIO DE INGRESO
======================================-->
<div class="background-login">
  <form method="post" id="login" action="index.php?controller=Front&action=login">
    <img src="views/img/logo.png" class="img-responsive imagen loginimg"  alt="Responsive image">
    <h1 id="titulologin">Acceso al Panel de Control</h1>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="material-icons">person</i>
      </span>
      <div class="form-line">
        <input type="text" class="form-control" name="user" placeholder="Ingrese su Usuario" required autofocus>
      </div>
    </div>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="material-icons">lock</i>
      </span>
      <div class="form-line">
        <input type="password" class="form-control" name="pass" placeholder="Ingrese su Contraseña" required>
      </div>
    </div>
    <?php
    if (isset($fallo))
    {
      echo '<div class="alert alert-danger" role="alert">Usuario o Contraseña no validos</div>';
    }
    if (isset($exit))
    {
      echo '<div class="alert alert-success" role="alert">Haz cerrado sesión con éxito!!</div>';
    }
    ?>
    <input class="form-control login btn bg-teal" type="submit" value="Ingresar">
  </form>
</div>
<!--====  Fin de FORMULARIO DE INGRESO  ====-->