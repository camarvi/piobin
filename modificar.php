<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("common.inc.php");


$modificafichapiobin=new FichaPiobin(array(
        
        "COD"=>$cod,
        "AN"=>$an,
        "CENTRO"=>$centro,
        "CNP"=>$cnp,
        "FECHA"=>$fechaok,
        "TIEMPO"=>$_POST["tiempo"],
        "FDIAGNOSTICO"=>$fdiagnosticook,
        "IMC_DIAGNOSTICO"=>$_POST["imc_diagnostico"],
        "DESVIACION_DIAGNOSTICO"=>$_POST["desviacion_diagnostico"],
        "FEVALUACION"=>$fevaluacionsok,
        "IMC_EVALUACION"=>$_POST["imc_evaluacion"],
        "DESVIACION_EVALUACION"=>$_POST["desviacion_evaluacion"],
        "FRUTANINO"=>$_POST["frutanino"],
        "FRUTAPADRES"=>$_POST["frutapadres"],
        "VERDURANINO"=>$_POST["verduranino"],
        "VERDURAPADRES"=>$_POST["verdurapadres"],
        "HORASNINO"=>$_POST["horasnino"],
        "HORASPADRES"=>$_POST["horaspadres"],
        "GRASASNINO"=>$_POST["grasasnino"],
        "GRASASPADRES"=>$_POST["grasaspadres"],
        "DULCESNINO"=>$_POST["dulcesnino"],
        "DULCESPADRES"=>$_POST["dulcespadres"],
        "BEBIDASNINO"=>$_POST["bebidasnino"],
        "BEBIDASPADRES"=>$_POST["bebidaspadres"],
        "DEPORTENINO"=>$_POST["deportenino"],
        "DEPORTEPADRES"=>$_POST["deportepadres"],
        "JUEGONINO"=>$_POST["juegonino"],
        "JUEGOPADRES"=>$_POST["juegopadres"],
        "MOVIMIENTONINO"=>$_POST["movimientonino"],
        "MOVIMIENTOPADRES"=>$_POST["movimientopadres"],
        "SEDENTARIANINO"=>$_POST["sedentarianino"],
        "SEDENTARIAPADRES"=>$_POST["sedentariapadres"],
        "HUMORNINO"=>$_POST["humornino"],
        "HUMORPADRES"=>$_POST["humorpadres"],
        "ESCOLARNINO"=>$_POST["escolarnino"],
        "ESCOLARPADRES"=>$_POST["escolarpadres"],
        "SOCIALNINO"=>$_POST["socialnino"],
        "SOCIALPADRES"=>$_POST["socialpadres"],
        "DESEONINO"=>$_POST["deseonino"],
        "DESEOPADRES"=>$_POST["deseopadres"],
        "PESOMADRE"=>$_POST["pesomadre"],
        "PESOPADRE"=>$_POST["pesopadre"],
        "ACTIVIDAD_MADRE"=>$_POST["actividad_madre"],
        "ACTIVIDAD_PADRE"=>$_POST["actividad_padre"],
        "REFUERZO_POS"=>$_POST["refuerzo_pos"],
        "CERRADO"=>"",
        "FECHA_FIN"=>""
     ));
 
    $modificafichapiobin->modifica_ficha();




?>