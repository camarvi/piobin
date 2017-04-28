<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("common.inc.php");

  $separar =explode('/',$_POST["fecha"]);
  $dia=trim($separar[0]);
  $mes=trim($separar[1]);
  $anio=trim($separar[2]);
  $fechaok=$anio . "-" . $mes . "-" . $dia;
  
  $separar1 =explode('/',$_POST["fdiagnostico"]);
  $dia1=trim($separar1[0]);
  $mes1=trim($separar1[1]);
  $anio1=trim($separar1[2]);
  $fdiagnosticook=$anio1 . "-" . $mes1 . "-" . $dia1;
  
  if (strlen($fdiagnosticook)<3) {
      
     $fdiagnosticook=''; 
      
  }
  
  $separar2 =explode('/',$_POST["fevaluacion"]);
  $dia2=trim($separar2[0]);
  $mes2=trim($separar2[1]);
  $anio2=trim($separar2[2]);
  $fevaluacionok=$anio2 . "-" . $mes2 . "-" . $dia2;
  
  if (strlen($fevaluacionok)<3) {
     $fevaluacionok=''; 
  }

$modificafichapiobin=new FichaPiobin(array(
              
        "COD"=>$_POST['cod'],
        "AN"=>$_POST['an'],
        "CENTRO"=>$_POST['centro'],
        "CNP"=>$_POST['cnp'],
        "FECHA"=>$fechaok,
        "TIEMPO"=>$_POST["tiempo"],
        "FDIAGNOSTICO"=>$fdiagnosticook,
        "IMC_DIAGNOSTICO"=>$_POST["imc_diagnostico"],
        "DESVIACION_DIAGNOSTICO"=>$_POST["desviacion_diagnostico"],
        "FEVALUACION"=>$fevaluacionok,
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
       
     ));
 
    $modificafichapiobin->modifica_ficha();

  


?>