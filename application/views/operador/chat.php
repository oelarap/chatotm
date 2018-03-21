<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/chat/public/css/chat.css">
</head>
<body>

<h2>Chat Messages</h2>

<div id="contenedor_chat">
	<div class="container">
	  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
	  <p>Hello. How are you today?</p>
	  <span class="time-right">11:00</span>
	</div>

	<div class="container darker">
	  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
	  <p>Hey! I'm fine. Thanks for asking!</p>
	  <span class="time-left">11:01</span>
	</div>

	<div class="container">
	  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
	  <p>Sweet! So, what do you wanna do today?</p>
	  <span class="time-right">11:02</span>
	</div>

	<div class="container darker">
	  <img src="/w3images/avatar_g2.jpg" alt="Avatar" style="width:100%;">
	  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
	  <span class="time-left">11:05</span>
	</div>
</div>
<div>
	<form>
		<input style="width:100%;margin-top:10px;" type="text"/>
	</form>
</div>

<script src="/chat/public/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	var direccionActual = 0;
	function DesplegarNuevoMensaje(direccion, mensaje, hora){
		if(direccion == 1){
			if(direccionActual != direccion){
				
			}	
			$("#contenedor_chat").append('<div class="container darker"><img src="/w3images/avatar_g2.jpg" alt="Avatar" style="width:100%;"><p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p><span class="time-left">11:05</span></div>');
		}
		if(direccion == 2){
			$("#contenedor_chat").append('<div class="container"><img class="right" src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;"><p>Sweet! So, what do you wanna do today?</p><span class="time-right">11:02</span></div>');
		}
	}

	function HaLlegadoMensaje(){
		var audio = new Audio('/chat/public/sonidos/nmensaje.mp3');
		audio.play();
		var objDiv = document.getElementById("contenedor_chat");
		objDiv.scrollTop = objDiv.scrollHeight;
	}
</script>
</body>
</html>