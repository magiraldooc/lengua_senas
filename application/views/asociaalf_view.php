<!doctype html>
<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE 
?>

<?php
$id = $_GET['id'];
$act = $_GET['act'];
$arrayLetras = array('e', 'l', 'f', 'n', 'b', 'v', 'q', 't', 's', 'x', 'a', 'i','p','k', 'h', 'w', 'y', 'd', 'g', 'j',
'm', 'r', 'u', 'z', 'o', 'c', 'Felicitaciones');
$posLetra1 = $arrayLetras[$act-1];
$posLetra2 = $arrayLetras[$act];
$posLetra3 = $arrayLetras[$act+1];


if($id=='941826'){
  $posLetra = 'bien';
}

elseif($id=='475869'){
  $posLetra = 'mal';
}
else{
  $posLetra = $arrayLetras[$act-1];
}


$asocia1 = rand(-1, 1);
$asocia2 = rand(-1, 1);
$asocia3 = rand(-1, 1);
while ($asocia1 == $asocia2 or $asocia2 == $asocia3 or $asocia1 == $asocia3) {
  $asocia2 = rand(-1, 1);
  $asocia3 = rand(-1, 1);
}
$buena1 = $arrayLetras[$act+$asocia1];
$buena2 = $arrayLetras[$act+$asocia2];
$buena3 = $arrayLetras[$act+$asocia3];
 ?>

<!-- Portfolio Grid Section -->
<header id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">             
                   
  <?php if ($id == '1') { ?>
<div class="instrucciones">
<p>
  <h1><center><font color="#7DBC51" class="instrucciones">Instrucciones:</font></center></h1>
  <br>
  <h4>
    <center>
    Cada modelo muestra una opción, en este caso una letra (a,b,c), al frente se muestran unas casillas con unas opciones de respuesta,
    debes (dar click) sobre la modelo para activar la seña, si conoces la letra del alfabeto que ella emite, ve a las casillas del frente correspondiente
    y coloca la letra de la opción correcta.<br><br>
  </center>
  </h4>

</p>
</div>
    <?php
  }
  ?>
  <p align="center">
  <?php
  if ($id==475869) {
    ?>
    <br>
    <center>
      <font color="#E11B2B" size="10px">¡ Incorrecto !</font><br><br>
      <font color="#E11B2B" size="4px">¡ Estuviste cerca, intenta emparejarlo de otra manera, presiona el botón nuevamente !</font><br>
    <br>
    <a href="asociaalf?id=<?php echo($act);?>&act=<?php echo($act);?>"><input type="button" name="name" value="nuevamente" class="btn btn-primary" id="incorrecto"></a>
    <br><br><br>
    </center>
    <?php
  }elseif ($id==941826) {
    ?>
    <br>
    <center>
    <font color="#7DBC51" size="10px">¡ Correcto !</font><br><br>
    <font color="#7DBC51" size="4px">¡ Lo has hecho maravillosamente, presiona continuar !</font><br>

    <br>
    <a href="asociaalf?id=<?php echo($act+2);?>&act=<?php echo($act+2);?>"><input type="button" name="name" value="continuar" class="btn btn-primary" id="correcto"></a>
    <br><br><br>
    </center>
    <?php
  }elseif ($arrayLetras[$act-1] == 'Felicitaciones' or $buena1 == 'Felicitaciones' or $buena2 == 'Felicitaciones' or $buena3 == 'Felicitaciones') {
  ?>
  <center>
    <div id="animation0" onclick="PrestartAnimation('bien', 0, 0)" ></div>

  <br>

    <font color="#7DBC51" size="10px">¡ Felicitaciones, has terminado con éxito !</font><br>
<br>
<p align="right">
  <a class="button white" href="asocia">Terminar</a>
</p>    <br>
  </center>
  <?php
  }
   ?>
 </p>

 <?php

if ($arrayLetras[$act-1] != 'Felicitaciones' and $buena1 != 'Felicitaciones' and $buena2 != 'Felicitaciones' and $buena3 != 'Felicitaciones' and $id!=475869 and $id!=941826 ) {

?>
<form class="" action="validationasociaalf" method="post">

<table width="100%">
  <tr>
    <td>
      <h1><strong>&nbsp;&nbsp;a)</strong></h1>

    </td>
    <td>

     <video id="demo1" autoplay="autoplay" width="380" height="300" onclick="document.getElementById('demo1').play()">
    <source src="<?php echo base_url()?>style/inicio/videos/alfabeto/<?php echo ($posLetra1) ?>.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video>
    </td>
    <td>
      <input type="text" id="option1" class="form-control" name="option1" value="" min="0" title="Respuesta incorrecta" required="required" autocomplete="off"><br>
      <font size="5%"><strong><?php echo $buena1; ?></strong></font>


    </td>
  </tr>
  <tr>
    <td>
      <h1><strong>&nbsp;&nbsp;b)</strong></h1>

    </td>
    <td>

      <video id="demo2" autoplay="autoplay" width="380" height="300" onclick="document.getElementById('demo2').play()">
    <source src="<?php echo base_url()?>style/inicio/videos/alfabeto/<?php echo ($posLetra2) ?>.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video>

    </td>
    <td>
      <input type="text" id="option2" class="form-control" name="option2" value="" min="0" title="Respuesta incorrecta" required="required" autocomplete="off"><br>
      <font size="5%"><strong><?php echo $buena2; ?></strong></font>

    </td>
  </tr>
  <tr>
    <td>
      <h1><strong>&nbsp;&nbsp;c)</strong></h1>

    </td>
    <td>

      <video id="demo3" autoplay="autoplay" width="380" height="300" onclick="document.getElementById('demo3').play()">
    <source src="<?php echo base_url()?>style/inicio/videos/alfabeto/<?php echo ($posLetra3) ?>.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video>
      <?php
      $ani = 2; ?>
    </td>
    <td>
      <input type="text" id="option3" class="form-control" name="option3" value="" min="0" title="Respuesta incorrecta" required="required" autocomplete="off"><br>
      <font size="5%"><strong><?php echo $buena3; ?></strong></font>
    </td>
  </tr>
</table>
<?php
$posicionEnArregloValor1 = array_search($buena1, $arrayLetras);
$posicionEnArregloValor2 = array_search($buena2, $arrayLetras);
$posicionEnArregloValor3 = array_search($buena3, $arrayLetras);

if ($posicionEnArregloValor1 == $act-1) {
  $letraCorrecta1='a';
}
elseif ($posicionEnArregloValor1 == $act) {
  $letraCorrecta1='b';
}
else {
  $letraCorrecta1='c';
}

if ($posicionEnArregloValor2 == $act-1) {
  $letraCorrecta2='a';
}
elseif ($posicionEnArregloValor2 == $act) {
  $letraCorrecta2='b';
}
else {
  $letraCorrecta2='c';
}
if ($posicionEnArregloValor3 == $act-1) {
  $letraCorrecta3='a';
}
elseif ($posicionEnArregloValor3 == $act) {
  $letraCorrecta3='b';
}
else {
  $letraCorrecta3='c';
}

$arrayoptions = array($letraCorrecta1,$letraCorrecta2,$letraCorrecta3);
 ?>
<center>

    <input type="hidden" name="page" value="<?php echo $id; ?>">
    <input type="hidden" name="correctLetra1" value="<?php echo $letraCorrecta1; ?>">
    <input type="hidden" name="correctLetra2" value="<?php echo $letraCorrecta2; ?>">
    <input type="hidden" name="correctLetra3" value="<?php echo $letraCorrecta3; ?>">

    <?php
    if ($id==475869) {
      ?>
      <br><br>
      <a href="asociaalf?id=<?php echo($act);?>&act=<?php echo($act);?>"><input type="button" name="name" value="nuevamente" class="btn btn-primary" id="incorrecto"></a>
      <br><br>
      <?php
    }elseif ($id==941826) {
      ?>
      <br>
      <a href="asociaalf?id=<?php echo($act+2);?>&act=<?php echo($act+2);?>"><input type="button" name="name" value="continuar" class="btn btn-primary" id="correcto"></a>
      <br><br>
      <?php
    }elseif ($arrayLetras[$act-1] == 'Felicitaciones') {
    ?>
    <br>

    <font color="green">Felicitaciones</font><br>

    <p align="right">
      <a class="button white" href="asocia">Terminar</a>
    </p>
        <?php
    }
    else {
      ?>
      <br>
      <br>
      <p>
        <input type="submit" name="name" value="Verificar" class="btn btn-primary" id="verificar">


      <br>
      <br>
<?php
    }
     ?>
  </form>
  <?php
  }
   ?>
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
        <a href="asocia"><font style="margin-left: 25%;
      color:white; "><span class="glyphicon glyphicon-arrow-left userColor" width="100%"></span></font></a>

    </td>
    <td width="80%" align="center">
      <div class='titleBarra'><font style="margin-left: -25%;
      color:white; ">ASOCIAR - ALFABETO</div></font> 
    </td>
    
  </tr>
</table>

</nav>

   

</body>
</html>

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