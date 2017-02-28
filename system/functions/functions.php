<?php
/** Se establece la conexión con la base de datos invocando la función conexión dentro del archivo functions.php incluido en el head.php**/

function conexion(){


$postgreSQL = pg_connect("host=localhost port=5432 dbname=lsc user=postgres password=administrador");
return $postgreSQL;

}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsEvaluationRealizados($activity, $user, $postgreSQL){
	$sql1 = "SELECT * FROM userevaluation, evaluation, itembyactivity where evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation and responseuser != '0'";
    $exe1 = pg_query($postgreSQL,$sql1);
    $num_rows1 = pg_num_rows($exe1);

    $sql2 = "SELECT * FROM userevaluationb, evaluation, itembyactivity where evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluationb.iduser = $user and userevaluationb.idevaluation = evaluation.idevaluation and responsea != '0' and responseb != '0' and responsec != '0' ";
    $exe2 = pg_query($postgreSQL,$sql2);
    $num_rows2 = pg_num_rows($exe2);

    $num_rows = $num_rows1 + $num_rows2;
    return $num_rows;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsEvaluationPorRealizar($activity, $user, $postgreSQL){
    $numRows1 = numItemsEvaluationPorRealizarA($activity, $user, $postgreSQL);
    $numRows2 = numItemsEvaluationPorRealizarB($activity, $user, $postgreSQL);

    return $numRows1 + $numRows2;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsEvaluationPorRealizarA($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM item, image, audiobyitem, userevaluation, evaluation, itembyactivity, sign where responseuser = '0' and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluation.iduser = $user and sign.item = item.idItem and userevaluation.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsEvaluationPorRealizarB($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM item, image, audiobyitem, userevaluationb, evaluation, itembyactivity, sign where responsea = '0' and responseb = '0' and responsec = '0' and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluationb.iduser = $user and sign.item = item.idItem and userevaluationb.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}

function sqlUserActividade($activity, $user, $postgreSQL){
    $sql = "SELECT count(*) as total FROM userevaluationb, evaluation, itembyactivity where userevaluationb.iduser = $user and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and userevaluationb.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $fetch = pg_fetch_array($exe);
    $total = $fetch['total'];
    return $total;
}

function createValidateUser($activity, $user, $postgreSQL){
    $validacion = sqlUserActividade($activity, $user, $postgreSQL);
    if ($validacion == 0) {
        createItemPerformedUser($postgreSQL, $activity, $user);
        createUserEvaluation( $postgreSQL, $activity, $user);
        createUserEvaluationb( $postgreSQL, $activity, $user);
    }
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsEvaluationBPorRealizar($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM userevaluationb, evaluation, itembyactivity where responsea = '0' and responseb = '0' and responsec = '0' and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluationb.iduser = $user and userevaluationb.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numBuenas($activity, $user, $postgreSQL){
	$num_rowsA = numBuenasEvaA($activity, $user, $postgreSQL);
	$num_rowsB = numBuenasEvaB($activity, $user, $postgreSQL);
    return $num_rowsA + $num_rowsB;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numBuenasEvaA($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM userevaluation, evaluation, itembyactivity where userevaluation.responseuser = userevaluation.responsecorrect and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numBuenasEvaB($activity, $user, $postgreSQL){
	$sql = "SELECT * from userevaluationb, evaluation, itembyactivity, item where userevaluationb.idevaluation = evaluation.idevaluation and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and userevaluationb.responsea = item.itemesp and userevaluationb.responseb = item.itempor and userevaluationb.responsec = item.itemeng and itembyactivity.activity = $activity and userevaluationb.iduser = $user";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numMalas($activity, $user, $postgreSQL){
	$num_rowsA = numMalasEvaA($activity, $user, $postgreSQL);
	$num_rowsB = numMalasEvaB($activity, $user, $postgreSQL);
    return $num_rowsA + $num_rowsB;
}

/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numMalasEvaA($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM userevaluation, evaluation, itembyactivity where userevaluation.responseuser != userevaluation.responsecorrect and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}


/** -------------------------------------------
|  numItemsEvaluationRealizados() --> Se usa para conocer si una evaluación fue terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numMalasEvaB($activity, $user, $postgreSQL){
	$sql = "SELECT * from userevaluationb, evaluation, itembyactivity, item where userevaluationb.idevaluation = evaluation.idevaluation and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and userevaluationb.responsea != item.itemesp and userevaluationb.responseb != item.itempor and userevaluationb.responsec != item.itemeng and itembyactivity.activity = $activity and userevaluationb.iduser = $user";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}
/** -------------------------------------------
|  numItemsRealizadosMenu() --> Se usa para conocersi una actividad fu terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numItemsRealizados($activity, $user, $postgreSQL){
    echo($activity);
	$sql = "SELECT * FROM itembyactivity, itemperformeduser where itembyactivity.iditembyactivity = itemperformeduser.iditembyactivity and itembyactivity.activity = $activity and itemperformeduser.iduser = $user and itemperformeduser.realizado = 0";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);
    return $num_rows;
}


/** -------------------------------------------
|  numItemsRealizadosMenu() --> Se usa para conocersi una actividad fu terminada, devolviendo el número de items |faltantes.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function numActividadesRealizadas($category, $user, $postgreSQL){

    // Primero se valida que no falten actividades por crear a este usuario, si es así automaticamente se retorna 1 es decir que aún falta por realizar actividades, de lo contrario, si ya se crearon todas las actividades, se verifica si realizó todos los ítems.

    $sql1 ="SELECT distinct(idActivity) FROM activity where category = $category and activity.idActivity NOT IN (SELECT distinct(activity.idActivity) FROM category, activity, itembyactivity, itemperformeduser, evaluation, userevaluationb where category.idCategory = $category and category.idCategory = activity.category and activity.idActivity = itembyactivity.activity and itembyactivity.iditembyactivity = itemperformeduser.iditembyactivity and itemperformeduser.iduser = $user and itembyactivity.iditembyactivity = evaluation.activityitem and evaluation.idevaluation = userevaluationb.idevaluation and userevaluationb.iduser = itemperformeduser.iduser)";
    $exe1 = pg_query($postgreSQL,$sql1);
    $num_rows1 = pg_num_rows($exe1);

    if ($num_rows1 > 0) {
        $return = 1;
    }
    else{
	$sql = "SELECT * FROM category, activity, itembyactivity, itemperformeduser, evaluation, userevaluationb where category.IdCategory = $category and category.IdCategory = activity.category and activity.idActivity = itembyactivity.activity and itembyactivity.iditembyactivity = itemperformeduser.iditembyactivity and itemperformeduser.iduser = $user and itembyactivity.iditembyactivity = evaluation.activityitem and evaluation.idevaluation = userevaluationb.idevaluation and responsea = '0' and responseb = '0' and responsec = '0' and userevaluationb.iduser = itemperformeduser.iduser";
    $exe = pg_query($postgreSQL,$sql);
    $num_rows = pg_num_rows($exe);

    if ($num_rows > 0) {
         $return = 1;
    }
    else{
        $return = 0;
    }
    }

    return $return;
}


/** -------------------------------------------
|  listarItems() --> Se usa listar los items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function listarItems($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM itemperformeduser, itembyactivity, item, sign, image, audiobyitem where realizado = 0 and iduser = $user and itembyactivity.activity = $activity and itemperformeduser.iditembyactivity = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and item.idItem = sign.item and sign.item = image.item and sign.item = audiobyitem.item order by itembyactivity.item limit 5";
	$exe = pg_query($postgreSQL,$sql);
	return $exe;
}


function validaRepeat($activity, $user, $postgreSQL, $puntaje){
    if ($puntaje < 70) {
       restartEvaluation($activity, $user, $postgreSQL);
       restartActivity($activity, $user, $postgreSQL);
    }
    header("location: menu");
}
/** -------------------------------------------
|  listarItems() --> Se usa listar los items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function listarItemsEvaluation($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM item, image, audiobyitem, userevaluation, evaluation, itembyactivity where responseuser = '0' and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation limit 5";
	$exe = pg_query($postgreSQL,$sql);
	return $exe;
}



/** -------------------------------------------
|  listarItems() --> Se usa listar los items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function listarItemsEvaluationB($activity, $user, $postgreSQL){
	$sql = "SELECT * FROM item, image, audiobyitem, userevaluationb, evaluation, itembyactivity, sign where responsea = '0' and responseb = '0' and responsec = '0' and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluationb.iduser = $user and sign.item = item.idItem and userevaluationb.idevaluation = evaluation.idevaluation limit 5";
	$exe = pg_query($postgreSQL,$sql);
	return $exe;
}

/** -------------------------------------------
|  totalItemsActividad() --> Se usa para conocer el total de items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/
function totalItemsActividad($activity, $postgreSQL){
	$sql = "SELECT count(*) as totalitems from itembyactivity where activity = $activity";
	$exe = pg_query($postgreSQL,$sql);
    $fetch = pg_fetch_array($exe);
    return $fetch['totalitems'];
}

/** -------------------------------------------
|  totalItemsActividad() --> Se usa para conocer el total de items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/
function totalItemsEvaluation($user, $activity, $postgreSQL){
	$sql1 = "SELECT * FROM item, image, audiobyitem, userevaluation, evaluation, itembyactivity where evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluation.idevaluation = evaluation.idevaluation and userevaluation.iduser = $user";
	$exe1 = pg_query($postgreSQL,$sql1);
	$numRows1 = pg_num_rows($exe1);

    $sql2 = "SELECT * from userevaluationb, evaluation, itembyactivity, item where userevaluationb.idevaluation = evaluation.idevaluation and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and itembyactivity.activity = $activity and userevaluationb.iduser = $user" ;
	$exe2 = pg_query($postgreSQL,$sql2);
	$numRows2 = pg_num_rows($exe2);

    $total =  $numRows1 + $numRows2;

    return $total;
}

/** -------------------------------------------
|  listarItems() --> Se usa listar los items realizados en una actividad por un usuario específico.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/
function totalItemsRealizadosActividad($activity, $user,$postgreSQL){
	$sql = "SELECT count(*) as realizados FROM itembyactivity, itemperformeduser WHERE activity = $activity and itembyactivity.iditembyactivity = itemperformeduser.iditembyactivity and realizado = 1 and itemperformeduser.iduser = $user";
	$exe = pg_query($postgreSQL,$sql);
    $fetch = pg_fetch_array($exe);
    return $fetch['realizados'];
}


/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function porcentajeAvanceActividad($totalItemsRealizados, $totalItems){
	if ($totalItemsRealizados != 0) {
		$porcentajeAvance = ($totalItemsRealizados * 100) / $totalItems;
		return $porcentajeAvance;
	}
	else {
		return 0;
	}
	
}


/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function puntaje($buenas, $total){
	$puntaje = ($buenas / $total)*100;
		return $puntaje;
	}


/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function restartEvaluation($activity, $user, $postgreSQL){
	restartEvaluationA($activity, $user, $postgreSQL);
	restartEvaluationB($activity, $user, $postgreSQL);
	}

/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function restartEvaluationA($activity, $user, $postgreSQL){
    $consulta="SELECT * FROM item, image, audiobyitem, userevaluation, evaluation, itembyactivity where evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itembyactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation";
        $exe = pg_query($postgreSQL,$consulta);
        $update = pg_num_rows($exe);
        
    while($update = pg_fetch_array($exe)){
        echo($update['iduser']);
        $sql = "UPDATE userevaluation set responseuser = '0' where idevaluation = ".$update['idevaluation']." and iduser = ".$update['iduser']."";
        $exesql = pg_query($postgreSQL,$sql);
    }
        
    
	}

/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function restartEvaluationB($activity, $user, $postgreSQL){
	$consulta="SELECT * from item, image, audiobyitem, userevaluationb, evaluation, itembyactivity where evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itembyactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluationb.iduser = $user and userevaluationb.idevaluation = evaluation.idevaluation";
        $exe = pg_query($postgreSQL,$consulta);
        $update = pg_num_rows($exe);
        
    while($update = pg_fetch_array($exe)){
        echo($update['iduser']);
        $sql = "UPDATE userevaluationb set responsea = '0', responseb = '0', responsec = '0' where idevaluation = ".$update['idevaluation']." and iduser = ".$update['iduser']."";
        $exesql = pg_query($postgreSQL,$sql);
    }

	}


	/** -------------------------------------------
|  porcentajeAvanceActividad() --> Se usa para calcular el porcentaje de avance de un usuario en una actividad específica.
|----- Param ----- 
| $totalItemsRealizados: total items realizados por el usuario
| $totalItems: total items de la actividad
|---------------------------------------------- **/
function restartActivity($activity, $user, $postgreSQL){
	$consulta="SELECT * from itemperformeduser, itembyactivity, item, sign, image, audiobyitem where iduser = $user and itembyactivity.activity = $activity and itemperformeduser.iditembyactivity = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and item.idItem = sign.item and sign.item = image.item and sign.item = audiobyitem.item";
        $exe = pg_query($postgreSQL,$consulta);
        $update = pg_num_rows($exe);
        
    while($update = pg_fetch_array($exe)){
        echo($update['iduser']);
        $sql = "UPDATE itemperformeduser set realizado = '0' where iditembyactivity = ".$update['iditembyactivity']." and iduser = ".$update['iduser']."";
        $exesql = pg_query($postgreSQL,$sql);
    }
	}


	/** -------------------------------------------
|  listarItems() --> Se usa listar los items de una actividad específica.
|----- Param ----- 
| $activity: Id de la actividad a consultar
| $user: Id del user que realiza la actividad
| $postgreSQL: Conexion a la base de datos
|---------------------------------------------- **/

function insertResponsesEvaluacionB($activity, $user, $postgreSQL, $espanol0, $portugues0, $english0, $espanol1, $portugues1, $english1, $espanol2, $portugues2, $english2, $espanol3, $portugues3, $english3, $espanol4, $portugues4, $english4){
    $espanol0 = utf8_encode($espanol0);
    $espanol1 = utf8_encode($espanol1);
    $espanol2 = utf8_encode($espanol2);
    $espanol3 = utf8_encode($espanol3);
    $espanol4 = utf8_encode($espanol4); 
    $portugues0 = utf8_encode($portugues0);
    $portugues1 = utf8_encode($portugues1);
    $portugues2 = utf8_encode($portugues2);
    $portugues3 = utf8_encode($portugues3);
    $portugues4 = utf8_encode($portugues4); 
    $english0 = utf8_encode($english0);
    $english1 = utf8_encode($english1);
    $english2 = utf8_encode($english2);
    $english3 = utf8_encode($english3);
    $english4 = utf8_encode($english4); 

for ($i=0; $i < 5; $i++) { 

	$sql = "SELECT * from item, image, audiobyitem, userevaluationb, evaluation, itembyactivity, sign where responsea = '0' and responseb = '0' and responsec = '0' and evaluation.activityitem = itembyactivity.iditembyactivity AND itembyactivity.activity = $activity and item.idItem = itemByactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and userevaluationb.iduser = $user and sign.item = item.idItem and userevaluationb.idevaluation = evaluation.idevaluation limit 1 offset 0";
	$exe = pg_query($postgreSQL,$sql);
	$fetch = pg_fetch_array($exe);
if ($fetch['idevaluation'] != null) {

if ($i == 0) {
	$update = "UPDATE userevaluationb set responsea = '$espanol0', responseb = '$portugues0', responsec = '$english0' where userevaluationb.idevaluation = $fetch[idevaluation] and userevaluationb.iduser = $fetch[iduser]";
	$exeUPD = pg_query($postgreSQL,$update);
}
elseif ($i == 1) {
	$update = "UPDATE userevaluationb set responsea = '$espanol1', responseb = '$portugues1', responsec = '$english1' where userevaluationb.idevaluation = $fetch[idevaluation] and userevaluationb.iduser = $fetch[iduser]";
	$exeUPD = pg_query($postgreSQL,$update);
}
elseif ($i == 2) {
	$update = "UPDATE userevaluationb set responsea = '$espanol2', responseb = '$portugues2', responsec = '$english2' where userevaluationb.idevaluation = $fetch[idevaluation] and userevaluationb.iduser = $fetch[iduser]";
	$exeUPD = pg_query($postgreSQL,$update);
}
elseif ($i == 3) {
	$update = "UPDATE userevaluationb set responsea = '$espanol3', responseb = '$portugues3', responsec = '$english3' where userevaluationb.idevaluation = $fetch[idevaluation] and userevaluationb.iduser = $fetch[iduser]";
	$exeUPD = pg_query($postgreSQL,$update);
}
else{
	$update = "UPDATE userevaluationb set responsea = '$espanol4', responseb = '$portugues4', responsec = '$english4' where userevaluationb.idevaluation = $fetch[idevaluation] and userevaluationb.iduser = $fetch[iduser]";
	$exeUPD = pg_query($postgreSQL,$update);
}

}	
}

	
}

function userId($postgreSQL, $nombre, $sena){
    $sql = "SELECT iduser from users where userName = '$nombre' and userPassword = '$sena'";
    $exeql = pg_query($postgreSQL,$sql);
    $count = pg_num_rows($exeql);
    $fetch = pg_fetch_array($exeql);
    if ($count == 1) {
        return $fetch['iduser'];
    }else{
        return 0;
    }
}

function userName($postgreSQL, $nombre, $sena){
    $sql = "SELECT nombre from users where userName = '$nombre' and userPassword = '$sena'";
    $exeql = pg_query($postgreSQL,$sql);
    $count = pg_num_rows($exeql);
    $fetch = pg_fetch_array($exeql);
    return $fetch['nombre'];
}

function createUser($postgreSQL, $name, $nameUser, $password){
    $sql = "insert into users values (default, '$name', '$nameUser', '$password');";
    $exeql = pg_query($postgreSQL,$sql);

}

function createItemPerformedUser($postgreSQL, $activity, $iduser){
    $sql = "SELECT * FROM itembyactivity where activity = $activity";
    $exeql = pg_query($postgreSQL,$sql);
    while ($fetch = pg_fetch_array($exeql)){
        $sql2 = "SELECT * FROM itemperformeduser where iduser = 1 and iditembyactivity = $fetch[iditembyactivity]";
        $exeql2 = pg_query($postgreSQL,$sql2);
        $fetch2 = pg_fetch_array($exeql2);

        //Si ya existe el mismo item creado para el mismo usuario, entonces no lo crea de nuevo
        $sqlv = "SELECT * FROM itemperformeduser where iduser = $iduser and iditembyactivity = $fetch2[iditembyactivity]";
        $exeqlv = pg_query($postgreSQL,$sqlv);
        $exeqlvnr = pg_num_rows($exeqlv);
        // si no está creado el item para ese usuario, lo crea
        if ($exeqlvnr == 0) {
            $sql2 = "INSERT INTO itemperformeduser (iduser, iditembyactivity, realizado)values ($iduser, $fetch2[iditembyactivity], 0)";
        $exeql2 = pg_query($postgreSQL,$sql2);
        }
        
    }
}
function createUserEvaluation($postgreSQL, $activity, $iduser){
    

    $sql = "SELECT * FROM itembyactivity where activity = $activity";
    $exeql = pg_query($postgreSQL,$sql);
    while ($fetch = pg_fetch_array($exeql)){
        $sql2 = "SELECT * FROM userevaluation, evaluation where userevaluation.idevaluation = evaluation.idevaluation and evaluation.activityitem = $fetch[iditembyactivity] and userevaluation.iduser = 1";
        $exeql2 = pg_query($postgreSQL,$sql2);
        $exeql2nr = pg_num_rows($exeql2);
        $fetch2 = pg_fetch_array($exeql2);
        if ($exeql2nr != 0){

            //Si ya existe el mismo item creado para el mismo usuario, entonces no lo crea de nuevo
        $sqlv = "SELECT * FROM userevaluation where iduser = $iduser and idevaluation = $fetch2[idevaluation]";
        $exeqlv = pg_query($postgreSQL,$sqlv);
        $exeqlvnr = pg_num_rows($exeqlv);

        // si no está creado el item para ese usuario, lo crea
        if ($exeqlvnr == 0) {

        $sql2 = "INSERT INTO userevaluation (iduser,idevaluation,opca,opcb,opcc,responsecorrect,responseuser) values ($iduser, $fetch2[idevaluation], '$fetch2[opca]', '$fetch2[opcb]', '$fetch2[opcc]', '$fetch2[responsecorrect]', '0')";
        $exeql2 = pg_query($postgreSQL,$sql2);
    }
    }
    }
}

function createUserEvaluationb($postgreSQL, $activity, $iduser){

    $sql = "SELECT * FROM itembyactivity where activity = $activity";
    $exeql = pg_query($postgreSQL,$sql);

    while ($fetch = pg_fetch_array($exeql)){
        echo($fetch['iditembyactivity']);
        $sql2 = "SELECT * FROM userevaluationb, evaluation where userevaluationb.idevaluation = evaluation.idevaluation and evaluation.activityitem = $fetch[iditembyactivity] and userevaluationb.iduser = 1";

        $exeql2 = pg_query($postgreSQL,$sql2);
        $exeql2nr = pg_num_rows($exeql2);
        $fetch2 = pg_fetch_array($exeql2);
        
        if ($exeql2nr != 0){
        $sqlv = "SELECT * FROM userevaluationb where iduser = $iduser and idevaluation = $fetch2[idevaluation]";
        $exeqlv = pg_query($postgreSQL,$sqlv);
        $exeqlvnr = pg_num_rows($exeqlv);

        // si no está creado el item para ese usuario, lo crea
        if ($exeqlvnr == 0) {
        $sql2 = "insert into userevaluationb (iduser,idevaluation,responsea,responseb,responsec) values ($iduser, $fetch2[idevaluation], '0', '0', '0')";
        $exeql2 = pg_query($postgreSQL,$sql2);
    }
    }
    }

}

function validaUser($postgreSQL, $nameUser){
    $sql = "SELECT iduser from users where userName = '$nameUser'";
    $exeql = pg_query($postgreSQL,$sql);
    $count = pg_num_rows($exeql);
    $fetch = pg_fetch_array($exeql);
    if ($count == 1) {
        return $fetch['iduser'];
    }else{
        return 0;
    }

}

function incorrectas($postgreSQL, $activity, $user){
    $sql = "SELECT * FROM userevaluation, evaluation, itembyactivity, item, image, audiobyitem, sign where userevaluation.responseuser != userevaluation.responsecorrect and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.activity = $activity and userevaluation.iduser = $user and userevaluation.idevaluation = evaluation.idevaluation and item.idItem = itembyactivity.item and image.item = item.idItem and audiobyitem.item = item.idItem and sign.item = item.idItem";
    $exeql = pg_query($postgreSQL,$sql);

    return $exeql;
}

function incorrectasB($postgreSQL, $activity, $user){
    $sql = "SELECT * from userevaluationb, evaluation, itembyactivity, item, sign, image, audiobyitem where userevaluationb.idevaluation = evaluation.idevaluation and evaluation.activityitem = itembyactivity.iditembyactivity and itembyactivity.item = item.idItem and (userevaluationb.responsea != item.itemesp or userevaluationb.responseb != item.itempor or userevaluationb.responsec != item.itemeng) and itembyactivity.activity = $activity and userevaluationb.iduser = $user and sign.item = item.idItem and image.item = item.idItem and audiobyitem.item = item.idItem";
    $exeql = pg_query($postgreSQL,$sql);

    return $exeql;
}


?>