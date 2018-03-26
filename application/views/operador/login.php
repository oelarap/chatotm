<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CHAT MBA::INICIAR SESIÓN OPERADOR</title>
	<link rel="stylesheet" href="/chat/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/chat/public/css/login.css">
</head>
<body>
	<div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Porfavor ingrese con su correo y contraseña</h2>
        <label for="inputEmail" class="sr-only">Dirección de correo electrónico</label>
        <input name="correo" type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required="" autofocus="" value="<?php echo $usuario; ?>" />
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
          <?php echo $error; ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/chat/public/js/bootstrap.min.js"></script>
</body>
</html>