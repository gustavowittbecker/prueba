<!DOCTYPE html>
<!--ejer de encriptación hecho con ajax-->
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script src="../jquery.js"></script>


<script>

	/*El metodo click() registra un event handler cuando el evento click ocurre */
	$(document).ready(function() {
		$("#trigger" ).click(function() {
			$("#resultado").empty(); //vacia el cuadro de resultado.
			$("#resultado").addClass("estiloRecibiendo"); //le cambia provisoriamente el estilo al cuadro de resultado
			$("#resultado").html("<h2>Esperando respuesta ..</h2>");//Escribe mensaje provisorio
			$("#estado").empty();
			$("#estado").append("<h2>Esperando Respuesta .. ");
			$.ajax({
			type:"post", 
			url: "./respuesta.php", 
			data: { clave: $("#clave").val()},
			success: function(respuestaDelServer,estado) {
				//la funcion de callback lleva 3 argumentos opcionales en ese orden
				//En el evento success se aplica una funci�n
				//de call back que ser� ejecutada cuando el requerimiento ajax se halla completado.
				$("#resultado").removeClass("estiloRecibiendo");
				$("#resultado").html("<h1>Resultado: </h1><h4>"+respuestaDelServer+"</h4>"); //adiciona data al contenido del div
				$("#estado").empty();
				$("#estado").append("<h4>Estado del requerimiento: "+estado+"</h4>");
			}
	
			}); //cierra ajax
		}); //cierra click
	}); //cierra ready
	
</script>



<style>


div#contenedor {
	width:90%;
	height:600px;
	background-color:lightblue;
	margin:auto;
}


div#entrada {
	float:left;
	margin:auto;
	width:30%;
	height:300px;
	background-color:#999999;
	padding:5px;
	box-sizing:border-box;
}

div#trigger {
	float:left;
	font-size:14px;
	padding:10px;
	width:30%;
	height:300px;
	background-color:blue;
	color:#FFFFFF;
	cursor:pointer;
	box-sizing:border-box;
}

div#trigger:hover {
	background-image:url(./flecha.png);
	background-repeat:no-repeat;
	background-position:center center;
}

div#resultado {
	float:left;
	background-color:yellow;
	width:40%;
	height:300px;
	padding:1%;
	box-sizing:border-box;
}


div#estado {
	margin:0;
	background-color:#444444;
	width:30%;
	height:300px;
	padding:1%;
	box-sizing:border-box;
}


div.estiloRecibiendo {
	background-color:red;
}

div.limpiaFloats {
	clear:both;
}
	
</style>
	
	
</head>
	
<body>
	<div id="contenedor">
	
		<div id="entrada">
			<h1>Dato de entrada:</h1>
			<input id="clave" name="clave" type="text">
		</div>
	
		<div id="trigger">
			<h1>Encriptar</h1>
		</div>
		<div id="resultado">
			<h1>Resultado:</h1>
		</div>
	
	
		<div class="limpiaFloats"></div>
	
	
		<div id="estado">
			<h2>Estado del requerimiento:</h2>
		</div>
	
		<div class="limpiaFloats"></div>
	
	</div><!--cierra contenedor-->
	
	
	
	
	
	</body>

</html>

