<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE ?>
 <!-- Header -->
<header id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <span class="name">Elige una de las siguientes actividades</span>
                    </div>
<br>
<table width="56%" align="center">

<div class="elmenu">
<tr>

<td>
<a href="index.php/asocia"><img src="<?php echo base_url()?>style/inicio/img/asociar.png" alt="botón para la acividad de respuesta correcta" width="120%" class="act2 imgHover"/></a>
</td>
<td>
<a href="index.php/elige"><img src="<?php echo base_url()?>style/inicio/img/seleccionmultiple.png" alt="botón para la acividad de selección múltiple" width="120%" class="act3 imgHover"/></a>
</td>
<td>
<a href="index.php/escribe"><img src="<?php echo base_url()?>style/inicio/img/respuestacorrecta.png" alt="botón para la acividad de respuesta correcta" width="120%" class="act2 imgHover"/></a>
</td>
<td>
<a href="index.php/categorias"><img src="<?php echo base_url()?>style/inicio/img/audilearning.png" alt="botón para la acividad de preguntas complejas" width="120%" class="act4 imgHover"/></a>
</td>
</tr>
</table>
</div>
<hr>

<div class="agradecimientos" align="center">
<table width="70%">
<tr>
<td>
<img src="<?php echo base_url()?>style/inicio/img/universidadunalmanizales.png" width="100px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/colciencias.png" width="250px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/minieducacion.png" width="150px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/medellin.png" width="80px">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/logogaia.gif" width="80px">
</td>
</tr>
</table>
    
<font color="green" size="2" class="mensaje">Agradecimientos especiales a la Fundación HETAH por brindar parte del material educativo y la Asociación de Sordos ASORCAL por apoyar en la construcción del material mediante los modelos lingüísticos</font><br>
    <br>
    <table width="30%">
<tr>
<td>
<img src="<?php echo base_url()?>style/inicio/img/hetah.png" width="80px" class="hetah">
</td>
<td>
<img src="<?php echo base_url()?>style/inicio/img/asorcal.png" width="80px" class="hetah">
</td>
</tr>
</table>
    <br>


</div>

                </div>
            </div>
        </div>
</header>

</html>

<style media="screen">
    .name{
        font-size: 200%;
        margin-top: -6%;
        margin-bottom: -1%;
    }
    .elmenu{
        margin-top: -2%;
    }
    .mensaje{
        margin-top: -50%;
    }
    .hetah{
        margin-top: -1%;
    }
      hr { 
    border: 1px dashed #278e79; 
  }
  .imgHover:hover{
  opacity: 0.3;
}
</style>