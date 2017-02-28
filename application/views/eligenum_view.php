<!doctype html>
<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE 
?>

<?php
$id = $_GET['id'];
$act = $_GET['act'];
$_SESSION = $id;
$felicitaciones = false;
$array = array(3, 10, 5, 7, 4, 1, 8, 9, 2, 6, 17, 22, 30, 50, 40, 70, 200, 100, 80, 400, 500, 600, 800, 1000, 3000, 5000, 7000, 11000, 1000000, 0,0);
$arrayLetras = array('tres', 'diez', 'cinco', 'siete', 'cuatro', 'uno', 'ocho', 'nueve', 'dos', 'seis', 'diecisiete', 'veintidos','treinta','cincuenta', 'cuarenta', 'setenta', 'doscientos', 'cien', 'ochenta', 'cuatrocientos', 'quinientos', 'seiscientos', 'ochocientos','mil', 'tresmil', 'cincomil', 'siete mil', 'once mil', 'millon', 'Felicitaciones');
$pos = $array[$act-1];
$posLetra = $arrayLetras[$act-1];

if($id=='941826'){
  $posLetra = 'bien';
}

elseif($id=='475869'){
  $posLetra = 'mal';
  $posCorrecto = $arrayLetras[$act-1];

}
else{
  $posLetra = $arrayLetras[$act-1];
}

$asocia1 = rand(-1, 2);
  $asocia2 = rand(-1, 2);
  $asocia3 = rand(-1, 2);
  $asocia4 = rand(-1, 2);
  while ($asocia1 == $asocia2 or $asocia1 == $asocia3 or $asocia1 == $asocia4 or $asocia2 == $asocia3 or $asocia2 == $asocia4 or $asocia3 == $asocia4) {
    $asocia2 = rand(-1, 2);
    $asocia3 = rand(-1, 2);
    $asocia4 = rand(-1, 2);
  }
  $buena1 = $arrayLetras[$act+$asocia1];
  $buena2 = $arrayLetras[$act+$asocia2];
  $buena3 = $arrayLetras[$act+$asocia3];
  $buena4 = $arrayLetras[$act+$asocia4];

?>

<!-- Portfolio Grid Section -->
<header id="inicio" class="contenido">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php
 if ($id == '1') {
   ?>

<div class="instrucciones">
<p align="center">
 <h1><center><font color="#7DBC51">Instrucciones:</font></center></h1>
 <br>
 <h4>
   <center>
   La modelo nos muestra un número en lengua de señas, debajo de ella se muestran unas opciones de respuesta, selecciona la opción correcta, la que ella nos indica.

 </center>
 </h4>

</p>
</div>
<style type="text/css">
	
	.contenido{
		margin-top: 0%;
	}
</style>
   <?php
 }

 ?>
<br>
<center>

<?php
  $pos
?>

  <form class="" action="validationeligenum" method="post">
    <input type="hidden" name="page" value="<?php echo $id; ?>">
    <input type="hidden" name="correct" value="<?php echo $pos; ?>">
    <input type="hidden" name="correctLetra" value="<?php echo $posLetra; ?>">


    <?php

    if ($id==475869) {
      ?>
      <br>
      <font color="#E11B2B" size="10px">¡ Incorrecto !</font><br>
      <br>
      <?php
      $first = substr($posCorrecto,0,2);    // devuelve "f"
       ?>
      <font color="#E11B2B" size="4px"><?php echo "¡Debe ser otro número!"; ?></font><br><br>

      <a href="eligenum?id=<?php echo($act);?>&act=<?php echo($act);?>"><input type="button" class="btn btn-primary" name="name" value="Nuevamente" id="incorrecto"></a>
      <br>

      <?php
    }elseif ($id==941826) {
      ?>
      <br>
      <font color="#7DBC51" size="10px">¡ Correcto !</font><br><br>
      <font color="#7DBC51" size="4px">¡ Lo has hecho maravillosamente, presiona Continuar !</font><br><br>

  <br>
      <a href="eligenum?id=<?php echo($act+1);?>&act=<?php echo($act+1);?>"><input type="button" class="btn btn-primary" name="name" value="Continuar" id="correcto"></a>
  <br>
      <?php
    }elseif ($buena1 == 'Felicitaciones' or $buena2 == 'Felicitaciones' or $buena3 == 'Felicitaciones' or $buena4 == 'Felicitaciones') {
      $felicitaciones = true;
    ?>
    <br>

      <font color="#7DBC51" size="10px">¡ Felicitaciones, has terminado con éxito !</font><br>
  <br>
  <p align="right" id="terminar">
    <a class="button white" href="elige">Terminar</a>
  </p>      <br>
    <?php
    }
    else {
      ?>
      <br>
      <div class="" align="center" width="20%">
<video id="demo" autoplay="autoplay" width="380" height="300" onclick="document.getElementById('demo').play()">
    <source src="<?php echo base_url()?>style/inicio/videos/numeros/<?php echo ($posLetra) ?>.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video>
<table>

  <tr>
    <td>
      <font size="6px">
  <strong>a)</strong> 
      </font>
    </td>
    <td>
      <input type="radio" style="width:30px;height:30px" name="CorrectOption" value="<?php echo $buena1; ?>">

      <label for="CorrectOption">
        <font size="6px"><?php echo $buena1; ?></font>
      </label>

    </td>
  </tr>
  <tr>
    <td>
      <font size="6px">
      <strong>b)</strong>
      </font>
    </td>
    <td>
      <input type="radio" style="width:30px;height:30px" name="CorrectOption" value="<?php echo $buena2; ?>">
      <label for="CorrectOption">
        <font size="6px"><?php echo $buena2; ?></font>
      </label>
</label>
    </td>
  </tr>
  <tr>
    <td>
      <font size="6px">
        <strong>c)&nbsp;&nbsp;&nbsp;</strong>
      </font>
    </td>
    <td>
      <input type="radio" style="width:30px;height:30px" name="CorrectOption" value="<?php echo $buena3; ?>">

      <label for="CorrectOption">
        <font size="6px"><?php echo $buena3; ?></font>
      </label>    </td>
  </tr>
  <tr>
    <td>
      <font size="6px">
        <strong>d)</strong>
      </font>
    </td>
    <td>
      <input type="radio" style="width:30px;height:30px" name="CorrectOption" value="<?php echo $buena4; ?>">

      <label for="CorrectOption">
        <font size="6px"><?php echo $buena4; ?></font>
      </label>    </td>
  </tr>
</table>
<br>
      </div>
      <input type="submit" name="name" value="Verificar" id="verificar" class="btn btn-primary">
      <button type="button" name="button" class="btn btn-success" onclick="document.getElementById('demo').play()" id="nuevamenteEscribe">Otra vez</button>
<?php
    }
     ?>
  </form>

</center>
</p>

</div>
</p>
<hr>

<div class="agradecimientos" align="center">
<table width="70%">
<tr>
<td>
<img src="<?php echo base_url()?>style/inicio/img/universidadunalmanizales.png" width="90px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/colciencias.png" width="240px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/minieducacion.png" width="140px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/medellin.png" width="70px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/logogaia.gif" width="70px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/hetah.png" width="80px" class="hetah"></td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/asorcal.png" width="80px" class="hetah">
</td>
</tr>
</table>


</div>

                </div>
            </div>
        </div>
</header>


<body id="inicio">

    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">

<table border="0" width="100%">
  <tr>
  <td>
        <a href="elige"><font style="margin-left: 25%;
      color:white; "><span class="glyphicon glyphicon-arrow-left userColor" width="100%"></span></font></a>

    </td>
    <td width="80%" align="center">
      <div class='titleBarra'><font style="margin-left: -25%;
      color:white; ">ELEGIR - NÚMEROS</div></font> 
    </td>
    
  </tr>
</table>

</nav>

   

</body>
</html>
<?php
 if ($id == '1' or $id == '941826' or $id == '475869' or $felicitaciones == true) {
 	?>
<style type="text/css">
	.contenido{
		margin-top: 0%;
	}
</style>
 	<?php
 }else{
 	?>
<style type="text/css">
	.contenido{
		margin-top: -12%;
	}
</style>
 	<?php
 }
?>
<style media="screen">
	
    .instrucciones{
        font-size: 100%;
        margin-top: -7%;
    }
    .hetah{
        margin-top: -1%;
    }
    .agradecimientos{
      margin-top: 5%;
    }
      hr {
    
    border: 1px dashed #278e79; 
  }
</style>