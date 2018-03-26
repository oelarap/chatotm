<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CHAT MBA::SESIONES ABIERTAS</title>
	<link rel="stylesheet" href="/chat/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/chat/public/css/custom.css">
</head>
<body>
	<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CHAT MBA::SESIONES ABIERTAS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">SESIONES</a></li>
              </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="/chat/index.php/operador/cerrarsesion">CERRAR SESION</a></li>
			  </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
	
	<div style="height:130px;"></div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
          <?php foreach ($sesiones as $sesion): ?>
              <div class="col-lg-4">
                  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2><?php echo $sesion['correo']; ?></h2>
                  <p><?php echo $sesion['motivo']?></p>
                  <p><?php echo $sesion['fechaInicio']?></p>
                  <p><a class="btn btn-default" target="_blank" href="/chat/index.php/operador/chat/<?php echo $sesion["anio"] ?>/<?php echo $sesion["id"] ?>/" role="button">Entrar al chat &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
          <?php endforeach; ?>
      </div><!-- /.row -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Arriba</a></p>
        <p>&copy; 2018 MBA UCN</p>
      </footer>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/chat/public/js/bootstrap.min.js"></script>
</body>
</html>