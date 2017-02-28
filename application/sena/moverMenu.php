<?php
	function listarLengua($ruta){
		$dh = opendir($ruta); $dir = array(); $archivos = array();
		while (($file = readdir($dh)) !== false) {
			if ($file!="." && $file!="..") {
				if (strpos($file,".")===false) {
					$lista=listarLengua($ruta."/".$file);
					$dir[$file]=$lista;
				}else{ array_push($dir, $file); }
			}
		}
		closedir($dh);
		return $dir;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aprendiendo Lenga de Señas Colombiana</title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<!-- Estas librerias son utilizadas para el movimiento de la imagen-->

	<style type="text/css">
		#animation0 {
            background-image: url("../lengua/conector_espera.jpg");
            background-repeat: no-repeat; height: 192px;  width: 260px;
            background-size: 100%;
            -webkit-border-radius: 1000px;
            -moz-border-radius: 1000px;
            border-radius: 1000px;
            border: 4px solid #2c3e50;

        }
#animation1, #animation2, #animation3, #animation4, #animation5, #animation6, #animation7, #animation8, #animation9, #animation10, #animation11, #animation12, #animation13, #animation14, #animation15{
            background-image: url("../lengua/conector_espera.jpg");
            background-repeat: no-repeat; height: 192px;  width: 260px;
            background-size: 100%;
            -webkit-border-radius: 1000px;
            -moz-border-radius: 1000px;
            border-radius: 1000px;
            border: 4px solid white;
        }

	</style>
	<script type="text/javascript">
		var tamImagen = 189; var velocidadSignos = 100; var globalInterval = null; var frames = 13;
		var num="numeros"; var barra = "/"; var abc = "alfabeto"; var baseUrl = "../lengua/";
		var tiempoEntreSignos = velocidadSignos*11; var entreSignos; var extension=".jpg";
		numeroTexto = ['cero','uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez',
		'once','doce','trece','catorce','quince','dieciseis','diecisiete','dieciocho','diecinueve',
		'veinte','treinta','cuarenta','cincuenta','sesenta','setenta','ochenta','noventa','cien',
		'ciento', 'doscientos', 'trecientos', 'cuatrocientos', 'quinientos', 'seiscientos',
		'setecientos', 'ochocientos', 'novecientos', 'mil', 'dosmil', 'tresmil', 'cuatromil', 'cincomil',
		'millones', 'millon', 'miles'];
		var startScene = function (dirImag) {
			var frame = 0;
			var div = document.getElementById("animation"+an);
			div.style.backgroundImage  = "url('"+baseUrl+dirImag+"')";
			var interval = null;
			var intervalFunction = function () {
				var frameOffset = (++frame % frames) * -tamImagen;
				div.style.backgroundPosition = "0px " + frameOffset + "px";
				if(frame === frames){ clearInterval(interval);}
			};
			interval = setInterval(intervalFunction, velocidadSignos);
			return interval;
		}
		function PrestartAnimation(palabras, i, ani){
			an = ani;
					startAnimation(palabras, i);

		}

		function startAnimation(palabras, i) {
			if(globalInterval){ clearInterval(globalInterval);}
			var arrayImages = <?php echo json_encode(listarLengua('lengua'));?>;

			var palabra=palabras.split(" ");

			var tam=palabra.length;

			var posicionveinti = 0;
			var bandera = 0;
			var porcionanterior = '';

			while (bandera < tam) {
				var porcion = palabra[bandera].substring(0, 6);
				if (porcion == 'veinti') {
					porcion = 'veinte';
						posicionveinti = bandera;
						var porcionfinal = palabra[posicionveinti].substring(6);
						if (porcionanterior != ''){
							palabraTexto = porcionanterior+' '+porcion+' '+porcionfinal;
							var palabra=palabraTexto.split(" ");
						}
						else {
							palabraTexto = porcion+' '+porcionfinal;
							var palabra=palabraTexto.split(" ");
						}
				}
				else {
					if (porcionanterior != ''){
						porcionanterior = porcionanterior+' '+palabra[bandera];
					}
					else{
						porcionanterior = palabra[bandera];
					}
				}
				bandera = bandera + 1;
			}
			//Se valida si es un número entre veintiuno y veintinueve
			var y = palabra.indexOf('y');
			if (y != -1) {
				palabra.splice(y,1);
				var tamano=palabra.length;
			}

			var mil = palabra.indexOf('mil');
			if (mil != -1 && mil != 0) {
					milAnterior = mil-1;
					var existenciademil = numeroTexto.indexOf(palabra[milAnterior]);
					if (existenciademil != -1) {
						palabra[mil] = 'miles';
					}
			}

			//hay que validar que la palabra si tiene una seña, las palabras "me", "de", no las tienen.
			// Funciona para palabras con interpretación por ejemplo: alma, venana.
			var dirImag=buscarPalabra(arrayImages, palabra[i]);

			if (dirImag!="") {

				globalInterval = startScene(dirImag);
				if (i<tam){ entreSignos = setTimeout(
					function(){
						j=i+1;
						startAnimation(palabras,j);
					},velocidadSignos*11);
				}
			}else{
				//esto hay que revisarlo, rompe la secuencia de interpretación

					var fruits = palabra.toString();
					var res = fruits.replace(" ", ",");
					var palabra=res.split(" ");
					var tamfri=palabra.length;

						alfabeto(palabra[i],i);
			}

		}
var banderita = 0;
		function alfabeto(palabra,i){

			if(globalInterval){ clearTimeout(globalInterval); }
			var tam=palabra.length;
			var dirImag=abc+barra+palabra[i]+extension;

			if (dirImag!="") {
				globalInterval = startScene(dirImag);

				if (banderita == 0){ entreSignos = setTimeout(
					function(){
						j=i+1;
						alfabeto(palabra,j);
					},velocidadSignos*11);
					banderita = 1;

				}
			}
		}
		function buscarPalabra(arrayImages, palabra){
			if (isNaN(palabra) ){//identificara si texto es numero || esNumero(palabra)) {
				var a = numeroTexto.indexOf(palabra);
				if (a != -1) {
					var buscar = 'numeros';
				}

			}else{
				var buscar = num;

				palabra = numTexto(palabra);

			}



			var datos = arrayImages[buscar];
			var respuesta="";

			for (var i = 0; i < datos.length; i++) {
				if (datos[i]==palabra+extension) {
					respuesta=buscar+barra+datos[i];
				};
			};
			return respuesta;
		}

		function numTexto(numero){
			//falta validar esta función, y falta hacer una funcion que determine qu ela palabra "uno" hace referencia a un numero
			numero = parseInt(numero);
			var respuesta = numero;

			if (numero>20) {
				respuesta = 20 + ((numero/10)-2);
			}
			return numeroTexto[respuesta];
		}

	</script>
	<!-- Estas librerias son utilizadas para el control de velocidad-->
	<link rel="stylesheet" href="<?php echo base_url()?>style/inicio/css/jquery-ui.css">
	<script type="text/javascript" src="<?php echo base_url()?>style/inicio/js/jquery-ui.js"></script>
	<script type="text/javascript">
		//Manejo de los controles
		$(function() {
			$( "#slider" ).slider({
				value:100,
				min: 0,
				max: 200,
				step: 5,
				slide: function( event, ui ) {
					velocidadSignos = 200-(ui.value);
				}
			});
		});
	</script>
</head>
<body>
	
</body>
</html>
