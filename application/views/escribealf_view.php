<!doctype html>
<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE 
?>

<?php
$id = $_GET['id'];
$act = $_GET['act'];
$_SESSION = $id;
$array = array(3, 10, 5, 7, 4, 1, 8, 9, 2, 6, 17, 22, 30, 44, 58, 71, 88,100, 108, 111, 200, 295, 300, 500, 600, 800, 1000, 3000, 5000, 7000, 11000, 1000000, 0,0);
$arrayLetras = array('e', 'l', 'f', 'n', 'b', 'v', 'q', 't', 's', 'x', 'a', 'i','p','k', 'h', 'w', 'y', 'd', 'g', 'j',
'm', 'r', 'u', 'z', 'o', 'c', 'Felicitaciones');
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
?>

<!-- Portfolio Grid Section -->
<header id="inicio">
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
     La modelo nos muestra una letra en lengua de señas, debajo hay una casilla donde debes escribir el número correcto, el que ella indica.

 </center>
 </h4>

</p>
</div>
     <?php
 }
 ?>



    <form class="" action="validationescribealf" method="post">
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
            <font color="#E11B2B" size="4px"><?php echo "¡Prueba con otra letra!"; ?></font><br><br>


            <a href="escribealf?id=<?php echo($act);?>&act=<?php echo($act);?>"><input type="button" name="name" class="btn btn-primary" value="Nuevamente" id="incorrecto"></a>
            <br>
            <?php
        }elseif ($id==941826) {
            ?>
            <br>
            <font color="#7DBC51" size="10px">¡ Correcto !</font><br><br>
            <font color="#7DBC51" size="4px">¡ Lo has hecho maravillosamente, presiona Continuar !</font><br><br>

            <a href="escribealf?id=<?php echo($act+1);?>&act=<?php echo($act+1);?>"><input type="button" class="btn btn-primary" name="name" value="Continuar" id="correcto"></a>
    <br>
            <?php
        }elseif ($arrayLetras[$act-1] == 'Felicitaciones') {
        ?>
        <br>

            <font color="#7DBC51" size="10px">¡ Felicitaciones, has terminado con éxito !</font><br>
   <p align="right" id="terminar">
    <a class="button white" href="escribe">Terminar</a>
  </p>      <br>
        <?php
        }
        else {
            ?>
            <center>
            <video id="demo" autoplay="autoplay" width="380" height="300" onclick="document.getElementById('demo').play()">
    <source src="<?php echo base_url()?>style/inicio/videos/alfabeto/<?php echo ($posLetra) ?>.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video><br>
<center>
            <input type="text" name="nombre" value="" autocomplete="off"><br><br>
            <input type="submit" name="name" class="btn btn-primary" value="Verificar" id="verificar">
            <button type="button" name="button" onclick="document.getElementById('demo').play()" class="btn btn-success" id="nuevamenteEscribe">Otra vez</button>
<?php
        }
         ?>
    </form>

</center>
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
        <a href="escribe"><font style="margin-left: 25%;
      color:white; "><span class="glyphicon glyphicon-arrow-left userColor"></span></font></a>

    </td>
    <td width="80%" align="center">
      <div class='titleBarra'><font style="margin-left: -25%;
      color:white; ">RESPONDER - ALFABETO</div></font> 
    </td>
    
  </tr>
</table>

</nav>

   

</body>
</html>

<style media="screen">
    .instrucciones{
        font-size: 100%;
        margin-top: -10%;
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