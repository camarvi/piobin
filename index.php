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
    
    $usuario=Usuarios::getUsuario($_GET['nuhsa']);
    $centro=$_GET['centro'];
    $an=$usuario->getValue('NUHSA');
   
    $cnp=$_GET['cnpprofesional'];
    
    $fichapiobin=  FichaPiobin::getPiobin($an);
     
          
    if (is_null($fichapiobin)) {
       $cod=0;
    } else {
       $cod=$fichapiobin->getValue('COD'); 
        
    }
}
      


 if (isset ($_POST['registrar'])) {

     
        $usuario=Usuarios::getUsuario($_POST['an']);
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
    
    $fichapiobin= FichaPiobin::getPiobin($_POST['an']);
     
          
    if (is_null($fichapiobin)) {
       $cod=0;
    } else {
       $cod=$fichapiobin->getValue('COD'); 
        
    }
     
    $centro=$_GET['centro'];
    $an=$_POST['an'];
    $cnp=$_GET['cnp'];
    
 
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
               <input type="text" id="fecha" name="fecha" size="10" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>"/> 
            </div>
            
            <div class="datos_personales">
            <label>Tiempo transcurrdo desde el inicio de la intervencion:</label> 
            <select name="tiempo" id="tiempo"> 
                <?php
                 foreach ($listatiempo as $ltiempo) {
                ?>
                   <option value="<?php echo $ltiempo->getValueEncoded('COD')?>">
                   <?php echo (($ltiempo->getValueEncoded('TIEMPO')))?></option>
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
                           <input type="text" id="fdiagnostico" name="fdiagnostico" size="10" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>"/> 
                        </td>
                        <td>
                           <input type="text" id="imc_diagnostico" name="imc_diagnostico" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="desviacion_diagnostico" name="desviacion_diagnostico" size="10"/> 
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Evaluaci&oacute;n</th>
                        <td>
                           <input type="text" id="fevaluacion" name="fevaluacion" size="10" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>"/> 
                        </td>
                        <td>
                           <input type="text" id="imc_evaluacion" name="imc_evaluacion" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="desviacion_evaluacion" name="desviacion_evaluacion" size="10"/> 
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>   
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalnino" name="totalnino" size="10" readonly="readonly"/> 
                        </td>
                        <td>
                            <input type="text" id="totalpadres" name="totalpadres" size="10" readonly="readonly"/> 
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
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
                                 ?>
                                 <option value="<?php echo $i;?>">
                                    <?php echo $i;?>
                                 </option>
                              <?php
                                  }     
                               ?>
                           </select>        
                         
                        </td>
                    </tr>
          
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalfisicanino" name="totalfisicanino" size="10" readonly="readonly"/> 
                        </td>
                        <td>
                           <input type="text" id="totalfisicapadres" name="totalfisicapadres" size="10" readonly="readonly"/> 
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                            ?>
                              <option value="<?php echo $lcambio->getValueEncoded('COD')?>" selected="selected">
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
                <select name="pesomadre" id="centro" name="pesomadre"> 
                    <option value="0">No cambio</option>
                    <option value="1">Dismunici&oacute;n</option>
                </select>  
              
              <label>Peso del padre:</label> 
                <select name="pesopadre" id="centro" name="pesopadre"> 
                    <option value="0">No cambio</option>
                    <option value="1">Dismunici&oacute;n</option>
                </select>  
            </div>  
            
              <label>Act. F&iacute;sica madre:</label> 
                <select name="actividad_madre" id="centro" name="actividad_madre"> 
                    <option value="0">No cambio</option>
                    <option value="1">Aumento</option>
                </select>  
              
              <label>Act. F&iacute;sica padre:</label> 
                <select name="actividad_padre" id="centro" name="actividad_padre"> 
                    <option value="0">No cambio</option>
                    <option value="1">Aumento</option>
                </select>  
              
             </div> 
             <div class="datos_personales">  
              <label>Refuerzo positivo proporcionado a su hijo/a por los cambios:</label>
               <select name="refuerzo_pos" id="centro" name="refuerzo_pos"> 
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>  
             </div>
          
           </fieldset>         
           
            <button type="submit" id="registar" name="registrar" class="botoncentrado" onClick="window.print()">
                 Registrar
             </button>
           
       </form>    
    
    
    </body>
</html>
