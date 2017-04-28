<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
CAMBIAR DATOS 
-->
  
<?php


require_once ("common.inc.php");

list($listatiempo)= PiobinTiempo::listaTiempo() ;
list($listaabandono)= PiobinAbandono::listaAbandonos();
list($listacambios)= PiobinCambios::listaCambios();
   
//LEO LAS VARIABLES QUE ME PASAN POR GET PARA 
//OBTENER LOS DATOS DEL PACIENTE

if (isset ($_GET['nuhsa'])){
    
   // $usuario=Usuarios::getUsuario($_GET['nuhsa']);
    $centro=$_GET['centro'];
    $an=$_GET['nuhsa'];
   
    $cnp=$_GET['cnpprofesional'];
    
    $fichapiobin=  FichaPiobin::getPiobin($an);
     
          
    if (is_null($fichapiobin)) {
       $cod=0;
       
       $fecha='';
       $tiempo='';
       $fdiagnostico='';
       $imc_diagnostico='';
       $desviacion_diagnostico='';
       $fevaluacion='';
       $imc_evaluacion='';
       $desviacion_evaluacion='';
       $frutanino= '';
       $frutapadres= '';
       $verduranino= '';
       $verdurapadres= '';
       $horasnino= '';
       $horaspadres= '';
       $grasasnino= '';
       $grasaspadres= '';
       $dulcesnino= '';
       $dulcespadres= '';
       $bebidasnino= '';
       $bebidaspadres= '';
       $deportenino= '';
       $deportepadres= '';
       $juegonino= '';
       $juegopadres= '';
       $movimientonino= '';
       $movimientopadres= '';
       $sedentarianino= '';
       $sedentariapadres= '';
       $humornino= '';
       $humorpadres= '';
       $escolarnino= '';
       $escolarpadres= '';
       $socialnino= '';
       $socialpadres= '';
       $deseonino= '';
       $deseopadres= '';
       $pesomadre= '';
       $pesopadre= '';
       $actividad_madre= '';
       $actividad_padre= '';
       $refuerzo_pos= '';
      
    } else {
       $cod=$fichapiobin->getValue('COD'); 
       $an=$fichapiobin->getValue('AN');
       $centro=$fichapiobin->getValue('CENTRO');
       $cnp=$fichapiobin->getValue('CNP');
       
       $fecha_inter=$fichapiobin->getValue('FECHA');
       $fecha=(strtotime($fecha_inter));
       $fecha=date("d/m/Y",$fecha);
       $tiempo=$fichapiobin->getValue('TIEMPO');
       $fdiagnostico_int=$fichapiobin->getValue('FDIAGNOSTICO');
       $fdiagnostico=date('d/m/Y',strtotime($fdiagnostico_int));
       
       $imc_diagnostico=$fichapiobin->getValue('IMC_DIAGNOSTICO');
       $desviacion_diagnostico=$fichapiobin->getValue('DESVIACION_DIAGNOSTICO');
       
       $fevaluacion_inter=$fichapiobin->getValue('FEVALUACION');
       $fevaluacion=date('d/m/Y',strtotime($fevaluacion_inter));
       if ((trim($fevaluacion)=='01/01/1970') or (trim($fevaluacion)=='01/01/1900')){
           $fevaluacion="";
       }
       
       $imc_evaluacion=$fichapiobin->getValue('IMC_EVALUACION');
       $desviacion_evaluacion=$fichapiobin->getValue('DESVIACION_EVALUACION');
       $frutanino= $fichapiobin->getValue('FRUTANINO');
       $frutapadres= $fichapiobin->getValue('FRUTAPADRES');
       $verduranino= $fichapiobin->getValue('VERDURANINO');
       $verdurapadres= $fichapiobin->getValue('VERDURAPADRES');
       $horasnino= $fichapiobin->getValue('HORASNINO');
       $horaspadres= $fichapiobin->getValue('HORASPADRES');
       $grasasnino= $fichapiobin->getValue('GRASASNINO');
       $grasaspadres= $fichapiobin->getValue('GRASASPADRES');
       $dulcesnino= $fichapiobin->getValue('DULCESNINO');
       $dulcespadres= $fichapiobin->getValue('DULCESPADRES');
       $bebidasnino= $fichapiobin->getValue('BEBIDASNINO');
       $bebidaspadres= $fichapiobin->getValue('BEBIDASPADRES');
       $deportenino= $fichapiobin->getValue('DEPORTENINO');
       $deportepadres= $fichapiobin->getValue('DEPORTEPADRES');
       $juegonino= $fichapiobin->getValue('JUEGONINO');
       $juegopadres= $fichapiobin->getValue('JUEGOPADRES');
       $movimientonino= $fichapiobin->getValue('MOVIMIENTONINO');
       $movimientopadres= $fichapiobin->getValue('MOVIMIENTOPADRES');
       $sedentarianino= $fichapiobin->getValue('SEDENTARIANINO');
       $sedentariapadres= $fichapiobin->getValue('SEDENTARIAPADRES');
       $humornino= $fichapiobin->getValue('HUMORNINO');
       $humorpadres= $fichapiobin->getValue('HUMORPADRES');
       $escolarnino= $fichapiobin->getValue('ESCOLARNINO');
       $escolarpadres= $fichapiobin->getValue('ESCOLARPADRES');
       $socialnino= $fichapiobin->getValue('SOCIALNINO');
       $socialpadres= $fichapiobin->getValue('SOCIALPADRES');
       $deseonino= $fichapiobin->getValue('DESEONINO');
       $deseopadres= $fichapiobin->getValue('DESEOPADRES');
       $pesomadre= $fichapiobin->getValue('PESOMADRE');
       $pesopadre= $fichapiobin->getValue('PESOPADRE');
       $actividad_madre= $fichapiobin->getValue('ACTIVIDAD_MADRE');
       $actividad_padre= $fichapiobin->getValue('ACTIVIDAD_PADRE');
       $refuerzo_pos= $fichapiobin->getValue('REFUERZO_POS');
        
    }
}
      


 if (isset ($_POST['registrar'])) {

     
       // $usuario=Usuarios::getUsuario($_POST['an']);
       // $nombre_usuario=trim($usuario->getValueEncoded('APE1')) . " " . trim($usuario->getValueEncoded('APE2')) . ", " . trim($usuario->getValueEncoded('NOMBRE'));
        $centro=$_POST['centro'];
       
        $cnp=$_POST['cnp'];
      
     
        $separar =explode('/',$_POST["fecha"]);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
        $fechaok=$anio . "-" . $mes . "-" . $dia;
        
        if (strlen($_POST["fdiagnostico"])){
          $separar1 =explode('/',$_POST["fdiagnostico"]);
          $dia_prueba=trim($separar1[0]);
          $mes_prueba=trim($separar1[1]);
          $anio_prueba=trim($separar1[2]);
          $fdiagnosticook=$anio_prueba . "-" . $mes_prueba . "-" . $dia_prueba;
        
        } else {  $fdiagnosticook=""; } 
     
        
        if (strlen($_POST["fevaluacion"])){
          $separar2 =explode('/',$_POST["fevaluacion"]);
          $dia2=trim($separar2[0]);
          $mes2=trim($separar2[1]);
          $anio2=trim($separar2[2]);
          $fevaluacionsok=$anio2 . "-" . $mes2 . "-" . $dia2;
        
        } else { $fevaluacionsok=""; }
        
      
        
    if (isset ($_POST['an'])) {  
        $an=$_POST['an'];
        
    }  else {$an=""; }
      
    
    
 $fichapiobinusuario=new FichaPiobin(array(
        
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
 
    $fichapiobinusuario->nueva_ficha();
    
    $fichapiobin= FichaPiobin::getPiobin($an);
     
          
    if (is_null($fichapiobin)) {
       $cod=0;
       $fecha='';
       $tiempo='';
       $fdiagnostico='';
       $imc_diagnostico='';
       $desviacion_diagnostico='';
       $fevaluacion='';
       $imc_evaluacion='';
       $desviacion_evaluacion='';
       $frutanino= '';
       $frutapadres= '';
       $verduranino= '';
       $verdurapadres= '';
       $horasnino= '';
       $horaspadres= '';
       $grasasnino= '';
       $grasaspadres= '';
       $dulcesnino= '';
       $dulcespadres= '';
       $bebidasnino= '';
       $bebidaspadres= '';
       $deportenino= '';
       $deportepadres= '';
       $juegonino= '';
       $juegopadres= '';
       $movimientonino= '';
       $movimientopadres= '';
       $sedentarianino= '';
       $sedentariapadres= '';
       $humornino= '';
       $humorpadres= '';
       $escolarnino= '';
       $escolarpadres= '';
       $socialnino= '';
       $socialpadres= '';
       $deseonino= '';
       $deseopadres= '';
       $pesomadre= '';
       $pesopadre= '';
       $actividad_madre= '';
       $actividad_padre= '';
       $refuerzo_pos= '';
    } else {
       $cod=$fichapiobin->getValue('COD'); 
       $an=$fichapiobin->getValue('AN');
       $centro=$fichapiobin->getValue('CENTRO');
       $cnp=$fichapiobin->getValue('CNP');
       $fecha=$fichapiobin->getValue('FECHA');
       $fecha=date('d/m/Y',strtotime($fecha));
       if ((trim($fecha)=='01/01/1970') or (trim($fecha)=='01/01/1900')){
           $fecha="";
       }
       
       $tiempo=$fichapiobin->getValue('TIEMPO');
       $fdiagnostico=$fichapiobin->getValue('FDIAGNOSTICO');
       $fdiagnostico=date('d/m/Y',strtotime($fdiagnostico));
       if ((trim($fdiagnostico)=='01/01/1970') or (trim($fdiagnostico)=='01/01/1900')){
           $fdiagnostico="";
       }
       
       $imc_diagnostico=$fichapiobin->getValue('IMC_DIAGNOSTICO');
       $desviacion_diagnostico=$fichapiobin->getValue('DESVIACION_DIAGNOSTICO');
       $fevaluacion=$fichapiobin->getValue('FEVALUACION');
       $fevaluacion=date('d/m/Y',strtotime($fevaluacion));
       if ((trim($fevaluacion)=='01/01/1970') or (trim($fevaluacion)=='01/01/1900')){
           $fevaluacion="";
       }
       
       $imc_evaluacion=$fichapiobin->getValue('IMC_EVALUACION');
       $desviacion_evaluacion=$fichapiobin->getValue('DESVIACION_EVALUACION');
       $frutanino= $fichapiobin->getValue('FRUTANINO');
       $frutapadres= $fichapiobin->getValue('FRUTAPADRES');
       $verduranino= $fichapiobin->getValue('VERDURANINO');
       $verdurapadres= $fichapiobin->getValue('VERDURAPADRES');
       $horasnino= $fichapiobin->getValue('HORASNINO');
       $horaspadres= $fichapiobin->getValue('HORASPADRES');
       $grasasnino= $fichapiobin->getValue('GRASASNINO');
       $grasaspadres= $fichapiobin->getValue('GRASASPADRES');
       $dulcesnino= $fichapiobin->getValue('DULCESNINO');
       $dulcespadres= $fichapiobin->getValue('DULCESPADRES');
       $bebidasnino= $fichapiobin->getValue('BEBIDASNINO');
       $bebidaspadres= $fichapiobin->getValue('BEBIDASPADRES');
       $deportenino= $fichapiobin->getValue('DEPORTENINO');
       $deportepadres= $fichapiobin->getValue('DEPORTEPADRES');
       $juegonino= $fichapiobin->getValue('JUEGONINO');
       $juegopadres= $fichapiobin->getValue('JUEGOPADRES');
       $movimientonino= $fichapiobin->getValue('MOVIMIENTONINO');
       $movimientopadres= $fichapiobin->getValue('MOVIMIENTOPADRES');
       $sedentarianino= $fichapiobin->getValue('SEDENTARIANINO');
       $sedentariapadres= $fichapiobin->getValue('SEDENTARIAPADRES');
       $humornino= $fichapiobin->getValue('HUMORNINO');
       $humorpadres= $fichapiobin->getValue('HUMORPADRES');
       $escolarnino= $fichapiobin->getValue('ESCOLARNINO');
       $escolarpadres= $fichapiobin->getValue('ESCOLARPADRES');
       $socialnino= $fichapiobin->getValue('SOCIALNINO');
       $socialpadres= $fichapiobin->getValue('SOCIALPADRES');
       $deseonino= $fichapiobin->getValue('DESEONINO');
       $deseopadres= $fichapiobin->getValue('DESEOPADRES');
       $pesomadre= $fichapiobin->getValue('PESOMADRE');
       $pesopadre= $fichapiobin->getValue('PESOPADRE');
       $actividad_madre= $fichapiobin->getValue('ACTIVIDAD_MADRE');
       $actividad_padre= $fichapiobin->getValue('ACTIVIDAD_PADRE');
       $refuerzo_pos= $fichapiobin->getValue('REFUERZO_POS');
        
    }
     
    $centro=$_POST['centro'];
    $an=$_POST['an'];
    $cnp=$_POST['cnp'];
    
 
    ?>

<script type="text/javascript" src="/js/funciones.js"></script>

<script lang="javascript">
    alert("FICHA ALMACENADA CORRECTAMENTE")
</script>
 <?php 
 }
 ?>
 
<html>
    <head>
        <meta charset="UTF-8">
   
      <title> Peticion Estudio Piobin</title>
    <meta name="author" content="carlos" />




 <link href="css/estilos.css" rel="stylesheet" type="text/css"/>

 <script type="text/javascript" src="js/funciones.js"></script>
 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 
 
 
 <script type="text/javascript" >
 

function valida_fecha(fecha) {
 
    //var expresion_fecha=/^\d{2}-\d{2}-\d{4}$/;
    var expresion_fecha2=/^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/;
    var vfecha=fecha;
    //var vemail=document.getElementById("email").value;
    
    var longitud=vfecha.length;
     
    if (longitud>0) { 
     if (expresion_fecha2.test(vfecha)==false){
        alert("FECHA NO VALIDA");  
        return false;
     
      } 
  }
 
 }
 


function valida_decimales(numero) {
   
   var expresion_fecha2=/^[0-9]+([.][0-9]+)?$/;
   var vnumero=numero;
   
    if (expresion_fecha2.test(vnumero)==false){
        alert("LOS NUMEROS SE PONEN CON PUNTO");  
        return false;
     
      } 
    
    
}
 
 
</script>

 
 
 
 <script type="text/javascript">
    $('document').ready(function(){
       $('#modificar').click(function(){
           var cod=$('#cod').val();
            var fecha=$('#fecha').val();
            var tiempo=$('#tiempo').val();
            var fdiagnostico=$('#fdiagnostico').val();
            var imc_diagnostico=$('#imc_diagnostico').val();
            var desviacion_diagnostico=$('#desviacion_diagnostico').val();
            var fevaluacion=$('#fevaluacion').val();
            var imc_evaluacion=$('#imc_evaluacion').val();
            var desviacion_evaluacion=$('#desviacion_evaluacion').val();
            var frutanino= $('#frutanino').val();
            var frutapadres= $('#frutapadres').val();
            var verduranino= $('#verduranino').val();
            var verdurapadres= $('#verdurapadres').val();
            var horasnino= $('#horasnino').val();
            var horaspadres= $('#horaspadres').val();
            var grasasnino= $('#grasasnino').val();
            var grasaspadres= $('#grasaspadres').val();
            var dulcesnino= $('#dulcesnino').val();
            var dulcespadres= $('#dulcespadres').val();
            var bebidasnino= $('#bebidasnino').val();
            var bebidaspadres= $('#bebidaspadres').val();
            var deportenino= $('#deportenino').val();
            var deportepadres= $('#deportepadres').val();
            var juegonino= $('#juegonino').val();
            var juegopadres= $('#juegopadres').val();
            var movimientonino= $('#movimientonino').val();
            var movimientopadres= $('#movimientopadres').val();
            var sedentarianino= $('#sedentarianino').val();
            var sedentariapadres= $('#sedentariapadres').val();
            var humornino= $('#humornino').val();
            var humorpadres= $('#humorpadres').val();
            var escolarnino= $('#escolarnino').val();
            var escolarpadres= $('#escolarpadres').val();
            var socialnino= $('#socialnino').val();
            var socialpadres= $('#socialpadres').val();
            var deseonino= $('#deseonino').val();
            var deseopadres= $('#deseopadres').val();
            var pesomadre= $('#pesomadre').val();
            var pesopadre= $('#pesopadre').val();
            var actividad_madre= $('#actividad_madre').val();
            var actividad_padre= $('#actividad_padre').val();
            var refuerzo_pos= $('#refuerzo_pos').val(); 
            
         $.post("modificar.php",{
                cod:cod,
                fecha:fecha,
                tiempo:tiempo,
                fdiagnostico:fdiagnostico,
                imc_diagnostico:imc_diagnostico,
                desviacion_diagnostico:desviacion_diagnostico,
                fevaluacion:fevaluacion,
                imc_evaluacion:imc_evaluacion,
                desviacion_evaluacion:desviacion_evaluacion,
                frutanino:frutanino,
                frutapadres:frutapadres,
                verduranino:verduranino,
                verdurapadres:verdurapadres,
                horasnino:horasnino,
                horaspadres:horaspadres,
                grasasnino:grasasnino,
                grasaspadres:grasaspadres,
                dulcesnino:dulcesnino,
                dulcespadres:dulcespadres,
                bebidasnino:bebidasnino,
                bebidaspadres:bebidaspadres,
                deportenino:deportenino,
                deportepadres:deportepadres,
                juegonino:juegonino,
                juegopadres:juegopadres,
                movimientonino:movimientonino,
                movimientopadres:movimientopadres,
                sedentarianino:sedentarianino,
                sedentariapadres:sedentariapadres,
                humornino:humornino,
                humorpadres:humorpadres,
                escolarnino:escolarnino,
                escolarpadres:escolarpadres,
                socialnino:socialnino,
                socialpadres:socialpadres,
                deseonino:deseonino,
                deseopadres:deseopadres,
                pesomadre:pesomadre,
                pesopadre:pesopadre,
                actividad_madre:actividad_madre,
                actividad_padre:actividad_padre,
                refuerzo_pos:refuerzo_pos},
                function(data,estado){
                   if (estado='succes'){
                       alert ('Datos Modificados');
                   } 
                });
       });
       
    });   
     
   
     
 </script>    
 
 
 
 

</head>
    
<header>    
  <h1><u>Cuestionario de Seguimiento</u></h1>
  <h1><u>Valoraci&oacute;n Peri&oacute;dica de los Pasos hacia un mejor Estilo de Vida.</u></h1>
  <h3>Distrito Sanitario Almer&iacute;a</h3>
</header>       

    <body>
    
       <form action="index.php" method="post">
          <input type="hidden" name="cod" id="cod" value="<?php echo $cod; ?>" />
          <input type="hidden" name="an" id="an" value="<?php echo $an; ?>" />
	  <input type="hidden" name="centro" id="centro" value="<?php echo $centro; ?>" />
	  <input type="hidden" name="cnp" id="cnp" value="<?php echo $cnp; ?>" />
	     
         
        <fieldset>  
         
            <div class="datos_personales">
               <label>FECHA:</label> 
               <input type="text" id="fecha" name="fecha" size="10" onblur="valida_fecha(this.value)" 
                      value="<?php if ($cod>0) { echo $fecha; } else { echo date('d/m/Y');} ?>"/> 
            </div>
            
            <div class="datos_personales">
            <label>Tiempo transcurrdo desde el inicio de la intervencion:</label> 
            <select name="tiempo" id="tiempo"> 
                <?php
                 foreach ($listatiempo as $ltiempo) {
                
                   if ($ltiempo->getValueEncoded('COD')==$tiempo){  
                ?>
                   <option value="<?php echo $ltiempo->getValueEncoded('COD')?>" selected="selected">
                   <?php  } else { ?>  
                        <option value="<?php echo $ltiempo->getValueEncoded('COD')?>">
                   <?php } ?>  
                   <?php echo (($ltiempo->getValue('TIEMPO')))?></option>
                <?php
                       
                 }
                ?>
            </select>    
          </div>
        </fieldset>         
        
      
          <fieldset>  
            <legend>1) VALORACI&Oacute;N DEL IMC:</legend>
            <div class="datos_personales">
                <table class="tablaentrada">
                    <tr>
                        <th></th>
                        <th scope="col">Fecha</th>
                        <th scope="col">IMC</th>
                        <th scope="col">Desviaci&oacute;n Estandar</th>
                    </tr>
                    <tr>
                        <th scope="row">Diagn&oacute;stico</th>
                        <td>
                           <input type="text" id="fdiagnostico" name="fdiagnostico" size="10" onblur="valida_fecha(this.value)" 
                                  value="<?php      
                                    if ($cod>0) {
                                    echo $fdiagnostico;
                                    } else {
                                    echo date('d/m/Y');} ?>"/> 
                        </td>
                        <td>
                           <input type="text" id="imc_diagnostico" name="imc_diagnostico" size="10" onblur="valida_decimales(this.value)"
                             value="<?php  echo $imc_diagnostico;?>"/> 
                        </td>
                        <td>
                           <input type="text" id="desviacion_diagnostico" name="desviacion_diagnostico" size="10" onblur="valida_decimales(this.value)"
                               value="<?php echo $desviacion_diagnostico;?>" /> 
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Evaluaci&oacute;n</th>
                        <td>
                           <input type="text" id="fevaluacion" name="fevaluacion" size="10" onblur="valida_fecha(this.value)" 
                                  value="<?php 
                                   if ($cod>0) {
                                   echo $fevaluacion;
                                 }    ?>"/> 
                        </td>
                        <td>
                           <input type="text" id="imc_evaluacion" name="imc_evaluacion" size="10" onblur="valida_decimales(this.value)"
                                   value="<?php  echo $imc_evaluacion; ?>"/> 
                        </td>
                        <td>
                           <input type="text" id="desviacion_evaluacion" name="desviacion_evaluacion" size="10" onblur="valida_decimales(this.value)"
                                  value="<?php echo $desviacion_evaluacion;?>"/> 
                        </td>
                    </tr>
                    <tr colspan="4">Nota: Utilizar la tabla de IMC para valoraci&oacute;n</tr>
                </table>
                
                 </div>  
           </fieldset>         
       
      
          <fieldset>  
              <legend>2) CAMBIOS DE LA ALIMENTACI&Oacute;N (Da una puntuaci&oacute;n de 
                  0 a 10 a tu cambio)</legend> 
          
            <table class="tablaentrada">
                    <tr>
                        <th scope="col">ALIMENTACION SANA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Fruta fresca cruda o cocida</th>
                        <td>
                            <select name="frutanino" id="frutanino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                 if ($frutanino==$i) {
                                 ?>
                                <option value="<?php echo $i;?>" selected="selected">
                                 <?php } else { ?>    
                                 <option value="<?php echo $i;?>">   
                                 <?php } ?>    
                                    <?php echo $i;?>
                                    
                                 </option>
                              <?php
                                  }     
                               ?>
                            </select>     
                        </td>
                        <td>
                            <select name="frutapadres" id="frutapadres" onchange="sumar_tpadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                 if ($frutapadres==$i) {
                                 ?>
                                <option value="<?php echo $i;?>" selected="selected">
                                 <?php } else { ?>
                                  <option value="<?php echo $i;?>"> 
                                 <?php }?>  
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                            </select>     
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Verdura de temporada con pocas grasas</th>
                       <td>
                           <select name="verduranino" id="verduranino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                 if ($verduranino==$i) {
                                 ?>
                               <option value="<?php echo $i;?>" selected="selected">
                                 <?php } else { ?>
                                 <option value="<?php echo $i;?>">
                                 <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                            </select>     
                      
                        </td>
                        <td>
                          <select name="verdurapadres" id="verdurapadres" onchange="sumar_tpadres();"> 
                           <?php
                              for ($i=0;$i<11;$i++) {
                               if ($verdurapadres==$i)  {
                                 ?>
                                 <option value="<?php echo $i;?>" selected="selected">
                               <?php } else { ?>
                                 <option value="<?php echo $i;?>">  
                               <?php } ?>     
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                            </select>     
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Comer entrehoras (snacks,dulces,etc)</th>
                       <td>
                          <select name="horasnino" id="horasnino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                               if ($horasnino==$i)  {
                                 ?>
                                 <option value="<?php echo $i;?>" selected="selected">
                               <?php } else { ?>
                                 <option value="<?php echo $i;?>">  
                               <?php } ?>     
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>     
                         
                        </td>
                        <td>
                           <select name="horaspadres" id="horaspadres" onchange="sumar_tpadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                               if ($horaspadres==$i) {  
                                 ?>
                               <option value="<?php echo $i;?>" selected="selected">
                               <?php } else { ?>
                                <option value="<?php echo $i;?>">
                               <?php } ?>     
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>      
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Grasas (mayonesa,nocilla,nata)</th>
                       <td>
                         <select name="grasasnino" id="grasasnino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($grasasnino==$i) { 
                                 ?>
                             <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                 <option value="<?php echo $i;?>"> 
                                <?php } ?>     
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>      
                        </td>
                        <td>
                          <select name="grasaspadres" id="grasaspadres" onchange="sumar_tpadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($grasaspadres==$i) { 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                               <?php } else { ?>
                                 <option value="<?php echo $i;?>"> 
                               <?php } ?>      
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>       
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Dulces (bolleria, etc)</th>
                       <td>
                          <select name="dulcesnino" id="dulcesnino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($dulcesnino==$i) {
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">  
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>
                        </td>
                        <td>
                          <select name="dulcespadres" id="dulcespadres" onchange="sumar_tpadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($dulcespadres==$i) { 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                              <?php } else { ?>
                                <option value="<?php echo $i;?>">  
                              <?php } ?>   
                                 <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Bebidas dulces (Refrescos, batidos, etc)</th>
                       <td>
                          <select name="bebidasnino" id="bebidasnino" onchange="sumar_tnino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($bebidasnino==$i) { 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">  
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select> 
                        </td>
                        <td>
                          <select name="bebidaspadres" id="bebidaspadres" onchange="sumar_tpadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($bebidaspadres==$i){ 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>   
                        </td>
                    </tr>
                    <?php $totalnino=$frutanino+$verduranino+$horasnino+$grasasnino+$dulcesnino+$bebidasnino; 
                          $totalpadres=$frutapadres+$verdurapadres+$horaspadres+$grasaspadres+$dulcespadres+$bebidaspadres; 
                    ?>
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalnino" name="totalnino" size="10" readonly="readonly"
                               value="<?php echo $totalnino; ?>"   /> 
                        </td>
                        <td>
                            <input type="text" id="totalpadres" name="totalpadres" size="10" readonly="readonly"
                               value="<?php echo $totalpadres; ?>"    /> 
                        </td>
                    </tr>
                    
                    <tr colspan="4">*Si el ni&ntilde;o/a es demasiado peque&ntilde;o para 
                        responder, preguntarle al padre o madre, si el ni&ntilde;o/a y los
                        padres otorgan valoraciones diversas, usar las dos columnas.
                    </tr>
                </table>
          
          
          </fieldset> 
              
          <fieldset>   
            <legend>3) CAMBIOS DE LA ACTIVIDAD F&Iacute;SICA (Da una puntuaci&oacute;n de 
                  0 a 10 a tu cambio)</legend> 
          
            <table class="tablaentrada">
                    <tr>
                        <th scope="col">ACTIVIDAD F&Iacute;SICA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Actividad deportiva organizada</th>
                        <td>
                            <select name="deportenino" id="deportenino" onchange="sumar_fisicanino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                 if ($deportenino==$i) {
                                 ?>
                                <option value="<?php echo $i;?>" selected="selected" >
                                 <?php } else {  ?>
                                  <option value="<?php echo $i;?>">
                                 <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>     
                        </td>
                        <td>
                            <select name="deportepadres" id="deportepadres" onchange="sumar_fisicapadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($deportepadres==$i){ 
                                 ?>
                                <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                 <option value="<?php echo $i;?>">
                                <?php } ?>     
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>      
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Juego espontaneo activo</th>
                        <td>
                          <select name="juegonino" id="juegonino" onchange="sumar_fisicanino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                 if ($juegonino==$i) {
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                 <?php } else { ?>
                              <option value="<?php echo $i;?>">
                                 <?php } ?>  
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>       
                       
                        </td>
                        <td>
                          <select name="juegopadres" id="juegopadres" onchange="sumar_fisicapadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($juegopadres==$i) { 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>  
                                <option value="<?php echo $i;?>">  
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>    
                         
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Movimiento en la vida cotidiana</th>
                        <td>
                          <select name="movimientonino" id="movimientonino" onchange="sumar_fisicanino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($movimientonino==$i){ 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else {  ?>
                                <option value="<?php echo $i;?>">
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>      
                        
                        </td>
                        <td>
                           <select name="movimientopadres" id="movimientopadres" onchange="sumar_fisicapadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($movimientopadres==$i){ 
                                 ?>
                               <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>       
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">- Actividad sedentaria (TV, PC, etc)</th>
                        <td>
                           <select name="sedentarianino" id="sedentarianino" onchange="sumar_fisicanino();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($sedentarianino==$i) { 
                                 ?>
                               <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">  
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>        
                        </td>
                        <td>
                          <select name="sedentariapadres" id="sedentariapadres" onchange="sumar_fisicapadres();"> 
                           <?php
                             for ($i=0;$i<11;$i++) {
                                if ($sedentariapadres==$i) { 
                                 ?>
                              <option value="<?php echo $i;?>" selected="selected">
                                <?php } else { ?>
                                <option value="<?php echo $i;?>">
                                <?php } ?>    
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>        
                         
                        </td>
                    </tr>
          
                    <?php $totalfisicanino=$deportenino+$juegonino+$movimientonino+$sedentarianino; 
                          $totalfisicapadres=$deportepadres+$juegopadres+$movimientopadres+$sedentariapadres; 
                    ?>
               
                    
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalfisicanino" name="totalfisicanino" size="10" readonly="readonly"
                                 value="<?php echo $totalfisicanino; ?>" /> 
                        </td>
                        <td>
                           <input type="text" id="totalfisicapadres" name="totalfisicapadres" size="10" readonly="readonly"
                                value="<?php echo $totalfisicapadres; ?>"  /> 
                        </td>
                    </tr>
                    
                    <tr colspan="4">*Si el ni&ntilde;o/a es demasiado peque&ntilde;o para 
                        responder, preguntarle al padre o madre, si el ni&ntilde;o/a y los
                        padres otorgan valoraciones diversas, usar las dos columnas.
                    </tr>
                    
                    
            </table>
          
           
          </fieldset> 
             
          <fieldset>   
              <legend>4) CAMBIOS DE LA VIDA. Se&ntilde;ala la respuesta que te 
                  parece m&aacute;s adecuada.
              </legend> 
          
            <table class="tablaentrada">
                    <tr>
                        <th scope="col">CALIDAD DE VIDA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">Cambio de humor(serenidad,enfado,etc)</th>
                        <td>
                          <select name="humornino" id="humornino"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($humornino==$lcambio->getValueEncoded('COD')) { 
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>"> 
                               <?php } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>    
                        </td>
                        <td>
                           <select name="humorpadres" id="humorpadres"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($humorpadres==$lcambio->getValueEncoded('COD')) { 
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>">   
                               <?php } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>     
                    
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Rendimiento escolar</th>
                        <td>
                          <select name="escolarnino" id="escolarnino"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($escolarnino==$lcambio->getValueEncoded('COD')) { 
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>
                               <option value="<?php echo $lcambio->getValueEncoded('COD')?>">  
                               <?php } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>      
                         
                        </td>
                        <td>
                           <select name="escolarpadres" id="escolarpadres"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                                if ($escolarpadres==$lcambio->getValueEncoded('COD')) {
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                                <?php } else { ?> 
                                 <option value="<?php echo $lcambio->getValueEncoded('COD')?>">
                                <?php } ?>     
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>     
                         
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Socializaci&oacute;n (deseo y capacidad de estar bien
                            con los dem&aacute;s)</th>
                        <td>
                          <select name="socialnino" id="socialnino"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                                if ($socialnino==$lcambio->getValueEncoded('COD')) {
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                                <?php } else { ?>
                                 <option value="<?php echo $lcambio->getValueEncoded('COD')?>">
                                <?php } ?> 
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>      
                         
                        </td>
                        <td>
                           <select name="socialpadres" id="socialpadres"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($socialpadres==$lcambio->getValueEncoded('COD')) { 
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>
                               <option value="<?php echo $lcambio->getValueEncoded('COD')?>">   
                               <?php  } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>   
                         
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Deseo de abandanor el Programa de abordaje del peso</th>
                        <td>
                          <select name="deseonino" id="deseonino"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($deseonino==$lcambio->getValueEncoded('COD'))  {
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>  
                               <option value="<?php echo $lcambio->getValueEncoded('COD')?>">    
                               <?php } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>    
                         
                        </td>
                        <td>
                          <select name="deseopadres" id="deseopadres"> 
                            <?php
                             foreach ($listacambios as $lcambio) {
                               if ($deseopadres==$lcambio->getValueEncoded('COD'))  {
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
                               <?php } else { ?>
                               <option value="<?php echo $lcambio->getValueEncoded('COD')?>">  
                               <?php } ?>    
                              <?php echo (($lcambio->getValueEncoded('CAMBIO')))?></option>
                            <?php
                                 }     
                                ?>
                          </select>    
                        
                        </td>
                    </tr>
            </table>    
              
          </fieldset>    
             
         <fieldset>  
           <legend>5) MODIFICACIONES EN LOS PADRES.</legend>
            <div class="datos_personales">
              <label>Peso de la madre:</label> 
                <select name="pesomadre" id="pesomadre" name="pesomadre"> 
                    <?php if ($pesomadre==0) { ?>
                    <option value="0" selected="selected">No cambio</option>
                    <option value="1">Dismunici&oacute;n</option>
                    <?php } else { ?>
                      <option value="0">No cambio</option>
                      <option value="1" selected="selected">Dismunici&oacute;n</option> 
                    <?php } ?>  
                </select>  
              
              <label>Peso del padre:</label> 
                <select name="pesopadre" id="pesopadre" name="pesopadre"> 
                    <?php if ($pesopadre==0)  { ?>
                    <option value="0" selected="selected">No cambio</option>
                    <option value="1">Dismunici&oacute;n</option>
                    <?php } else { ?> 
                     <option value="0">No cambio</option>
                     <option value="1" selected="selected">Dismunici&oacute;n</option>
                    <?php } ?> 
                </select>  
            </div>  
            
              <label>Act. F&iacute;sica madre:</label> 
                <select name="actividad_madre" id="actividad_madre" name="actividad_madre"> 
                   <?php if ($actividad_madre==0) { ?> 
                    <option value="0" selected="selected">No cambio</option>
                    <option value="1">Aumento</option>
                   <?php } else { ?>
                    <option value="0">No cambio</option>
                    <option value="1" selected="selected">Aumento</option>
                   <?php } ?> 
                </select>  
              
              <label>Act. F&iacute;sica padre:</label> 
                <select name="actividad_padre" id="actividad_padre" name="actividad_padre"> 
                   <?php if ($actividad_padre==0) { ?> 
                    <option value="0" selected="selected">No cambio</option>
                    <option value="1">Aumento</option>
                   <?php } else { ?>
                     <option value="0">No cambio</option>
                    <option value="1" selected="selected">Aumento</option>
                   <?php } ?>  
                </select>  
              
             </div> 
             <div class="datos_personales">  
              <label>Refuerzo positivo proporcionado a su hijo/a por los cambios:</label>
               <select name="refuerzo_pos" id="refuerzo_pos" name="refuerzo_pos"> 
                  <?php if ($refuerzo_pos==0) { ?> 
                    <option value="0" selected="selected">No</option>
                    <option value="1">Si</option>
                  <?php } else { ?>   
                    <option value="0">No</option>
                    <option value="1" selected="selected">Si</option>
                  <?php } ?>  
                </select>  
             </div>
          
           </fieldset>         
           
          <?php  if ($cod<1) { ?>
            <button type="submit" id="registar" name="registrar" class="botoncentrado">
                 Registrar
             </button>
          <?php } else { ?> 
             <button type="button" id="modificar" name="modificar" value="modificar" class="botoncentrado">
                 Modificar
             </button>
          <?php } ?>
       </form>    
        
        
    </body>
</html>
