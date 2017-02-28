<!doctype html>
<?php 
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE 
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE 
?>

<!-- Portfolio Grid Section -->
<header id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <span class="nameQue">¿Qué quieres aprender hoy?</span>
                    </div>
<br><br>
<table width="80%" align="center">

<div class="elmenu">
<tr>

<td>
<a href="audilearningnum?id=1&act=1"><img src="<?php echo base_url()?>style/inicio/img/numeronum.png" alt="botón para la acividad de respuesta correcta" width="100%" class="act2 imgHover"/></a>
</td>
<td>
<a href="audilearningalf?id=1&act=1"><img src="<?php echo base_url()?>style/inicio/img/alfabetoalf.png" alt="botón para la acividad de selección múltiple" width="100%" class="act3 imgHover"/></a>
</td>
<td>
<a href="audilearningali?id=1&act=1"><img src="<?php echo base_url()?>style/inicio/img/alimentos.png" alt="botón para la acividad de selección múltiple" width="100%" class="act3 imgHover"/></a>
</td>
<td>
<a href="audilearningobj?id=1&act=1"><img src="<?php echo base_url()?>style/inicio/img/objetos.png" alt="botón para la acividad de selección múltiple" width="100%" class="act3 imgHover"/></a>
</td>
<td>
<a href="audilearningani?id=1&act=1"><img src="<?php echo base_url()?>style/inicio/img/animales.png" alt="botón para la acividad de selección múltiple" width="100%" class="act3 imgHover"/></a>
</td>
</tr>
</table>
</div>
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


<body style="overflow-y:hidden">

    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">

<table border="0" width="100%">
  <tr>
  <td>
        <a href="<?php echo base_url()?>"><font style="margin-left: 25%;
      color:white; "><span class="glyphicon glyphicon-arrow-left userColor" width="100%"></span></font></a>

    </td>
    <td width="80%" align="center">
      <div class='titleBarra'><font style="margin-left: -25%;
      color:white; ">CATEGORÍAS</div></font> 
    </td>
    
  </tr>
</table>

</nav>

   

</body>
</html>

<style media="screen">
    .nameQue{
        font-size: 200%;
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
    .agradecimientos{
      margin-top: 5%;
    }
      hr {
    
    border: 1px dashed #278e79; 
  }
  .imgHover:hover{
  opacity: 0.3;
}
</style>