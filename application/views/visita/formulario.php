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
	<form id="contactform" class="form-signin" method="POST">
        <h2 class="form-signin-heading">Un agente lo atendera</h2>
		<h4>Antes favor llene el formulario para una mejor atención</h4>
        <label for="inputEmail" class="sr-only">Dirección de correo electrónico</label>
        <input name="correo" type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
        <label for="motivo" class="sr-only">Motivo de consulta</label>
        <textarea placeholder="Motivo de consulta" id="motivo" name="motivo" class="form-control" rows="3"></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Contactar</button>
		</form>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/chat/public/js/bootstrap.min.js"></script>
	<script src="/chat/public/js/jquery.form.min.js"></script>
	
	<script>
		$(document).ready(function() { 
			var options = { 
				target:        '#output1',   // target element(s) to be updated with server response 
				beforeSubmit:  showRequest,  // pre-submit callback 
				success:       showResponse  // post-submit callback
			}; 
		 
			// bind form using 'ajaxForm' 
			$('#contactform').ajaxForm(options);
			
			
		});
		// pre-submit callback 
		function showRequest(formData, jqForm, options) { 
			// formData is an array; here we use $.param to convert it to a string to display it 
			// but the form plugin does this for you automatically when it submits the data 
			var queryString = $.param(formData); 
		 
			// jqForm is a jQuery object encapsulating the form element.  To access the 
			// DOM element for the form do this: 
			// var formElement = jqForm[0]; 
		 
			alert('About to submit: \n\n' + queryString); 
		 
			// here we could return false to prevent the form from being submitted; 
			// returning anything other than false will allow the form submit to continue 
			return true; 
		} 
		 
		// post-submit callback 
		function showResponse(responseText, statusText, xhr, $form)  { 
			// for normal html responses, the first argument to the success callback 
			// is the XMLHttpRequest object's responseText property 
		 
			// if the ajaxForm method was passed an Options Object with the dataType 
			// property set to 'xml' then the first argument to the success callback 
			// is the XMLHttpRequest object's responseXML property 
		 
			// if the ajaxForm method was passed an Options Object with the dataType 
			// property set to 'json' then the first argument to the success callback 
			// is the json data object returned by the server 
		 
			alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
				'\n\nThe output div should have already been updated with the responseText.'); 
		} 
	</script>
</body>
</html>