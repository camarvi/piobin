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
    $nombre_usuario=trim($usuario->getValueEncoded('APE1')) . " " . trim($usuario->getValueEncoded('APE2')) . ", " . trim($usuario->getValueEncoded('NOMBRE'));
    $centro=$_GET['centro'];
    $fnacimiento=$_GET['fnacimiento'];
    $cnpprofesional=$_GET['cnpprofesional'];
    
}



 if (isset ($_POST['registrar'])) {

     
        $usuario=Usuarios::getUsuario($_POST['nuhsa']);
        $nombre_usuario=trim($usuario->getValueEncoded('APE1')) . " " . trim($usuario->getValueEncoded('APE2')) . ", " . trim($usuario->getValueEncoded('NOMBRE'));
        $centro=$_POST['centro'];
        $fnacimiento=$_POST['nacimiento'];
        $cnpprofesional=$_POST['cnp'];
      
     
        $separar =explode('/',$_POST["nacimiento"]);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
        $fnacimientook=$anio . "-" . $mes . "-" . $dia;
        
        $separar1 =explode('/',$_POST["fsolicitud"]);
        $dia_prueba=trim($separar1[0]);
        $mes_prueba=trim($separar1[1]);
        $anio_prueba=trim($separar1[2]);
        $fsolicitudok=$anio_prueba . "-" . $mes_prueba . "-" . $dia_prueba;
     
        if (strlen($_POST["fsintomas"])){
          $separar2 =explode('/',$_POST["fsintomas"]);
          $dia2=trim($separar2[0]);
          $mes2=trim($separar2[1]);
          $anio2=trim($separar2[2]);
          $fsintomasok=$anio2 . "-" . $mes2 . "-" . $dia2;
        
        }
        
        if (strlen($_POST["ths_finicio"])){
          $separar3 =explode('/',$_POST["ths_finicio"]);
          $dia3=trim($separar3[0]);
          $mes3=trim($separar3[1]);
          $anio3=trim($separar3[2]);
          $ths_finiciook=$anio3 . "-" . $mes3 . "-" . $dia3;
        
        } 
        
         if (strlen($_POST["ths_ffin"])){
          $separar4 =explode('/',$_POST["ths_ffin"]);
          $dia4=trim($separar4[0]);
          $mes4=trim($separar4[1]);
          $anio4=trim($separar4[2]);
          $ths_ffinok=$anio4 . "-" . $mes4 . "-" . $dia4;
        
        }  else {$ths_ffinok="";}
        
        if (strlen($_POST["biopsia_fecha"])){
          $separar5 =explode('/',$_POST["biopsia_fecha"]);
          $dia5=trim($separar5[0]);
          $mes5=trim($separar5[1]);
          $anio5=trim($separar5[2]);
          $biopsia_fechaok=$anio5 . "-" . $mes5 . "-" . $dia5;
        
        }  else {$biopsia_fechaok="";}
        
         if (strlen($_POST["antcmama_fecha"])){
          $separar6 =explode('/',$_POST["antcmama_fecha"]);
          $dia6=trim($separar6[0]);
          $mes6=trim($separar6[1]);
          $anio6=trim($separar6[2]);
          $antcmama_fechaok=$anio6 . "-" . $mes6 . "-" . $dia6;
        
        } else {$antcmama_fechaok="";}
        
        if (strlen($_POST["fecha_previa"])){
          $separar7 =explode('/',$_POST["fecha_previa"]);
          $dia7=trim($separar7[0]);
          $mes7=trim($separar7[1]);
          $anio7=trim($separar7[2]);
          $fecha_previaok=$anio7 . "-" . $mes7 . "-" . $dia7;
             
        } else {$fecha_previaok="";}
        
        if (strlen($_POST["fecha_pdpcm"])){
          $separar8 =explode('/',$_POST["fecha_pdpcm"]);
          $dia8=trim($separar8[0]);
          $mes8=trim($separar8[1]);
          $anio8=trim($separar8[2]);
          $fecha_pdpcm=$anio8 . "-" . $mes8 . "-" . $dia8;
        
        }  else {$fecha_pdpcm="";}
      
        
    if (isset ($_POST['nuhsa'])) {  
        $nuhsa=$_POST['nuhsa'];
        
    }  else {$nuhsa=""; }
      
    if (isset ($_POST['tlf'])) {  
        $tlf=$_POST['tlf'];
        
    }  else {$tlf=""; }
    
    if (isset ($_POST['tlf2'])) {  
        $tlf=$_POST['tlf2'];
        
    }  else {$tlf2=""; }
    
    if (isset ($_POST['cnp'])) {  
        $cnp=$_POST['cnp'];
        
    }  else {$cnp=""; }
    
    if (isset ($_POST['nodulo'])) {  
        $palpable=$_POST['nodulo'];
        
    }  else {$palpable=""; }
    
    if (isset ($_POST['cm_nodulo'])) {  
        $cm_nodulo=$_POST['cm_nodulo'];
        
    }  else {$cm_nodulo=0; }
     
    if (isset ($_POST['mamad'])) {  
        $mamad=$_POST['mamad'];
        
    }  else {$mamad=0; }
    
    if (isset ($_POST['mamai'])) {  
        $mamai=$_POST['mamai'];
        
    }  else {$mamai=0; }
    
    if (isset ($_POST['cse'])) {  
        $cse=$_POST['cse'];
        
    }  else {$cse=0; }
    
    if (isset ($_POST['csi'])) {  
        $csi=$_POST['csi'];
        
    }  else {$csi=0; }
    
    if (isset ($_POST['cid'])) {  
        $cid=$_POST['cid'];
        
    }  else {$cid=0; }
    
    if (isset ($_POST['cii'])) {  
        $cii=$_POST['cii'];
        
    }  else {$cii=0; }
    
    if (isset ($_POST['retroareolar'])) {  
        $retroareolar=$_POST['retroareolar'];
        
    }  else {$retroareolar=0; }
    
    if (isset ($_POST['retraccion_mamad'])) {  
        $retraccion_mamad=$_POST['retraccion_mamad'];
        
    }  else {$retraccion_mamad=0; }
    
    if (isset ($_POST['retraccion_mamai'])) {  
        $retraccion_mamai=$_POST['retraccion_mamai'];
        
    }  else {$retraccion_mamai=0; }
    
    if (isset ($_POST['retraccion_reciente'])) {  
        $retraccion_recient=$_POST['retraccion_reciente'];
        
    }  else {$retraccion_recient=0; }
    
    if (isset ($_POST['ulceraciond'])) {  
        $ulceraciond=$_POST['ulceraciond'];
        
    }  else {$ulceraciond=0; }
    
    if (isset ($_POST['ulceracioni'])) {  
        $ulceracioni=$_POST['ulceracioni'];
        
    }  else {$ulceracioni=0; }
    
    if (isset ($_POST['secreciond'])) {  
        $secreciond=$_POST['secreciond'];
        
    }  else {$secreciond=0; }
    
    if (isset ($_POST['secrecioni'])) {  
        $secrecioni=$_POST['secrecioni'];
        
    }  else {$secrecioni=0; }
    
    if (isset ($_POST['unilateral'])) {  
        $unilateral=$_POST['unilateral'];
        
    }  else {$unilateral=0; }
    
    if (isset ($_POST['uniporica'])) {  
        $uniporica=$_POST['uniporica'];
        
    }  else {$uniporica=0; }
    
    if (isset ($_POST['espontanea'])) {  
        $espontanea=$_POST['espontanea'];
        
    }  else {$espontanea=0; }
    
    if (isset ($_POST['serohematica'])) {  
        $serohematica=$_POST['serohematica'];
        
    }  else {$serohematica=0; }
    
    if (isset ($_POST['engrod'])) {  
        $engrod=$_POST['engrod'];
        
    }  else {$engrod=0; }
    
    if (isset ($_POST['engroi'])) {  
        $engroi=$_POST['engroi'];
        
    }  else {$engroi=0; }
    
    if (isset ($_POST['pnaranjad'])) {  
        $pnaranjad=$_POST['pnaranjad'];
        
    }  else {$pnaranjad=0; }
   
    if (isset ($_POST['pnaranjai'])) {  
        $pnaranjai=$_POST['pnaranjai'];
        
    }  else {$pnaranjai=0; }
    
    if (isset ($_POST['patologiad'])) {  
        $patologiad=$_POST['patologiad'];
        
    }  else {$patologiad=0; }
    
    if (isset ($_POST['patologiai'])) {  
        $patologiai=$_POST['patologiai'];
        
    }  else {$patologiai=0; }
    
    if (isset ($_POST['obs'])) { 
        $obs=  html_entity_decode($_POST['obs']) ;
        
    }  else {$obs=""; }
    
    if (isset ($_POST['antecedentes_no'])) { 
        $antecedentes_no=$_POST['antecedentes_no'] ;
        
    }  else {$antecedentes_no=0; }
    
    if (isset ($_POST['antecedentes_madre'])) { 
        $antecedentes_madre=$_POST['antecedentes_madre'] ;
        
    }  else {$antecedentes_madre=0; }
    
    if (isset ($_POST['antecedentes_padre'])) { 
        $antecedentes_padre=$_POST['antecedentes_padre'] ;
        
    }  else {$antecedentes_padre=0; }
    
    if (isset ($_POST['antecedentes_hermana'])) { 
        $antecedentes_hermana=$_POST['antecedentes_hermana'] ;
        
    }  else {$antecedentes_hermana=0; }
    
     if (isset ($_POST['antecedentes_hija'])) { 
        $antecedentes_hija=$_POST['antecedentes_hija'] ;
        
    }  else {$antecedentes_hija=0; }
    
    if (isset ($_POST['antecedentes_otros'])) { 
        $antecedentes_otros=$_POST['antecedentes_otros'] ;
        
    }  else {$antecedentes_otros=""; }
    
    if (isset ($_POST['ths'])) { 
        $ths=1 ;
        
    }  else {$ths=0; }
    
    if (isset ($_POST['ths_si'])) { 
        $ths_si=1 ;    
        
    }  else {$ths_si=0; }
    
    if (isset ($_POST['biopsia'])) { 
        $biopsia=$_POST['biopsia'] ;
        
    }  else {$biopsia=0; }
    
    if (isset ($_POST['biopsia_md'])) { 
        $biopsia_md=$_POST['biopsia_md'] ;
        
    }  else {$biopsia_md=0; }
    
    if (isset ($_POST['biopsia_mi'])) { 
        $biopsia_mi=$_POST['biopsia_mi'] ;
        
    }  else {$biopsia_mi=0; }
    
    if (isset ($_POST['protesis'])) { 
        $protesis=$_POST['protesis'] ;
        
    }  else {$protesis=0; }
    
    if (isset ($_POST['protesis_md'])) { 
        $protesis_md=$_POST['protesis_md'] ;
        
    }  else {$protesis_md=0; }
    
    if (isset ($_POST['protesis_mi'])) { 
        $protesis_mi=$_POST['protesis_mi'] ;
        
    }  else {$protesis_mi=0; }
    
    if (isset ($_POST['antcmama'])) { 
        $antcmama=$_POST['antcmama'] ;
        
    }  else {$antcmama=0; }
    
    if (isset ($_POST['antcmama_md'])) { 
        $antcmama_md=$_POST['antcmama_md'] ;
        
    }  else {$antcmama_md=0; }
    
    if (isset ($_POST['antcmama_mi'])) { 
        $antcmama_mi=$_POST['antcmama_mi'] ;
        
    }  else {$antcmama_mi=0; }
    
    if (isset ($_POST['trat_quir'])) { 
        $trat_quir=$_POST['trat_quir'] ;
        
    }  else {$trat_quir=0; }
    
    if (isset ($_POST['radioterapia'])) { 
        $radioterapia=$_POST['radioterapia'] ;
        
    }  else {$radioterapia=0; }
        
    if (isset ($_POST['quimio'])) { 
        $quimio=$_POST['quimio'] ;
        
    }  else {$quimio=0; }
    
    if (isset ($_POST['previa'])) { 
        $previa=$_POST['previa'] ;
        
    }  else {$previa=0; }
    
    if (isset ($_POST['pdpcm'])) { 
        $pdpcm=$_POST['pdpcm'] ;
        
    }  else {$pdpcm=0; }
    
 $nuevapeticion=new Peticion(array(
        "ESTADO_SOLICITUD"=>"0",
        "AN"=>$_POST["nuhsa"],
        "NOMBRE_PACIENTE"=>html_entity_decode($_POST["usuario"]),
        "FNACIMIENTO"=>($fnacimientook) ,
        "TLF"=>$tlf,
        "TLF2"=>$tlf2,
        "CNP"=>$cnp,
        "CENTRO"=>$_POST["centro"],
        "FSOLICITUD"=>$fsolicitudok,
        "FSINTOMAS"=>$fsintomasok,
        "PALPABLE"=>$palpable,
     
        "CM_NODULO"=>$cm_nodulo,
        "MAMAD"=>$mamad,
        "MAMAI"=>$mamai,
        "CSE"=>$cse,
        "CSI"=>$csi,
        "CID"=>$cid,
        "CII"=>$cii,
        "RETROAREOLAR"=>$retroareolar,              
        "RETRACCION_MAMAD"=>$retraccion_mamad, 
        "RETRACCION_MAMAI"=>$retraccion_mamai, 
     
        "RETRACCION_RECIENT"=>$retraccion_recient,   
        "ULCERACIOND"=>$ulceraciond, 
        "ULCERACIONI"=>$ulceracioni, 
        "SECRECIOND"=>$secreciond, 
        "SECRECIONI"=>$secrecioni, 
        "UNILATERAL"=>$unilateral, 
        "UNIPORICA"=>$uniporica, 
        "ESPONTANEA"=>$espontanea, 
        "SEROHEMATICA"=>$serohematica, 
        "ENGROD"=>$engrod, 
     
        "ENGROI"=>$engroi, 
        "PNARANJAD"=>$pnaranjad, 
        "PNARANJAI"=>$pnaranjai,
        "PATOLOGIAD"=>$patologiad,
        "PATOLOGIAI"=>$patologiai,
        "OBS"=>html_entity_decode($_POST["obs"]),
        "ANTECEDENTES_NO"=>$antecedentes_no,
        "ANTECEDENTES_MADRE"=>$antecedentes_madre,
        "ANTECEDENTES_PADRE"=>$antecedentes_padre,
        "ANTECEDENTES_HERMANA"=>$antecedentes_hermana,
        "ANTECEDENTES_HIJA"=>$antecedentes_hija,
        "ANTECEDENTES_OTROS"=>html_entity_decode($_POST["antecedentes_otros"]),
        "THS"=>$ths,
        "THS_SI"=>$ths_si,
        "THS_FINICIO"=>$ths_finiciook,
        "THS_FFIN"=>$ths_ffinok,
        "BIOPSIA"=>$biopsia,
        "BIOPSIA_MD"=>$biopsia_md,
        "BIOPSIA_MI"=>$biopsia_mi,
        "BIOPSIA_FECHA"=>$biopsia_fechaok,
        "PROTESIS"=>$protesis,
     
        "PROTESIS_MD"=>$protesis_md,
        "PROTESIS_MI"=>$protesis_mi,
        "ANTCMAMA"=>$antcmama,
        "ANTCMAMA_MD"=>$antcmama_md,
        "ANTCMAMA_MI"=>$antcmama_mi,
        "ANTCMAMA_FECHA"=>$antcmama_fechaok,
        "TRAT_QUIR"=>$trat_quir,
        "RADIOTERAPIA"=>$radioterapia,
        "QUIMIO"=>$quimio,
        "PREVIA"=>$previa,
     
        "FECHA_PREVIA"=>$fecha_previaok,
        "PDPCM"=>$pdpcm, 
        "FECHA_PDPCM"=>$fecha_pdpcm
                    ));
    $nuevapeticion->nueva_peticion();
          
 
    ?>
<script lang="javascript">
    alert("PETICION REGISTRADA CORRECTAMENTE")
</script>
 <?php 
 }
 ?>
 
<html>
    <head>
        <meta charset="UTF-8">
   
      <title> Peticion Estudio Imagen Patología Mamaria</title>
<meta name="author" content="carlos" />




 <link href="estilos.css" rel="stylesheet" type="text/css"/>

 
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
  <h1><u>Cuestionario de Segumiento</u></h1>
  <h1><u>Valoraci&oacute;n Peri&oacute;dica de los Pasos hacia un mejor Estilo de Vida.</u></h1>
  <h3>Distrito Sanitario Almer&iacute;a</h3>
</header>       

    <body>
    
       <form action="index.php" method="post">
                 
         
        <fieldset>  
          <div class="datos_personales">
            <label>Tiempo transcurrdo desde el inicio de la intervencion:</label> 
            <select name="tiempo" id="centro" name="tiempo"> 
                <?php
                 foreach ($listatiempo as $ltiempo) {
                ?>
                   <option value="<?php echo $ltiempo->getValueEncoded('COD')?>" selected="selected">
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
                <table>
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
                        <th scope="row">Evaluaci&&oacute;n</th>
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
          
            <table>
                    <tr>
                        <th scope="col">ALIMENTACION SANA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Fruta fresca cruda o cocida</th>
                        <td>
                           <input type="text" id="frutanino" name="frutanino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="frutapadres" name="frutapadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Verdura de temporada con pocas grasas</th>
                       <td>
                           <input type="text" id="verduranino" name="verduranino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="verdurapadres" name="verdurapadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Comer entrehoras (snacks,dulces,etc)</th>
                       <td>
                           <input type="text" id="horasnino" name="horasnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="horaspadres" name="horaspadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Grasas (mayonesa,nocilla,nata)</th>
                       <td>
                           <input type="text" id="grasasnino" name="grasasnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="grasaspadres" name="grasaspadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Dulces (bolleria, etc)</th>
                       <td>
                           <input type="text" id="dulcesnino" name="dulcesnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="dulcespadres" name="dulcespadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">- Bebidas dulces (Refrescos, batidos, etc)</th>
                       <td>
                           <input type="text" id="bebidasnino" name="bebidasnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="bebidaspadres" name="bebidaspadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalnino" name="totalnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="totalpadres" name="totalpadres" size="10"/> 
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
          
            <table>
                    <tr>
                        <th scope="col">ACTIVIDAD F&Iacute;SICA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Actividad deportiva organizada</th>
                        <td>
                           <input type="text" id="deportenino" name="deportenino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="deportepadres" name="deportepadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Juego espontaneo activo</th>
                        <td>
                           <input type="text" id="juegonino" name="juegonino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="juegopadres" name="juegopadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">+ Movimiento en la vida cotidiana</th>
                        <td>
                           <input type="text" id="movimientonino" name="movimientonino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="movimientopadres" name="movimientopadres" size="10"/> 
                        </td>
                    </tr>
                    <tr>
                            <th scope="row">- Actividad sedentaria (TV, PC, etc)</th>
                        <td>
                           <input type="text" id="sedentarianino" name="sedentarianino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="sedentariapadres" name="sedentariapadres" size="10"/> 
                        </td>
                    </tr>
          
                    <tr>
                        <th scope="row">Valoraci&oacute;n Total</th>
                       <td>
                           <input type="text" id="totalfisicanino" name="totalfisicanino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="totalfisicapadres" name="totalfisicapadres" size="10"/> 
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
          
            <table>
                    <tr>
                        <th scope="col">CALIDAD DE VIDA</th>
                        <th scope="col">Valoraci&oacute;n ni&ntilde;o*</th>
                        <th scope="col">Valoraci&oacute;n Padres</th>
                    </tr>
                    
                    <tr>
                        <th scope="row">Cambio de humor(serenidad,enfado,etc)</th>
                        <td>
                           <input type="text" id="humornino" name="humornino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="humorpadres" name="humorpadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Rendimiento escolar</th>
                        <td>
                           <input type="text" id="escolarnino" name="escolarnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="escolarpadres" name="escolarpadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Socializaci&oacute;n (deseo y capacidad de estar bien
                            con los dem&aacute;s)</th>
                        <td>
                           <input type="text" id="socialnino" name="socialnino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="socialpadres" name="socialpadres" size="10"/> 
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Deseo de abandanor el Programa de abordaje del peso</th>
                        <td>
                           <input type="text" id="deseonino" name="deseonino" size="10"/> 
                        </td>
                        <td>
                           <input type="text" id="deseopadres" name="deseopadres" size="10"/> 
                        </td>
                    </tr>
            </table>    
           
              
              
          </fieldset>    
             
           <fieldset>   
              
            <div class="colum_personales2_30"> 
                <label>ENGROSAMIENTO/RETRACCI&Oacute;N CUT&Aacute;NEA</label> 
            </div>  
          
            <div class="colum_personales2_70">      
              <label>Mama D.</label><input type="checkbox" name="engrod" id="engrod" value="1"/>   
              <label>Mama I.</label><input type="checkbox" name="engroi" id="engroi" value="1"/>  
            </div>      
           </fieldset>     
            
           <fieldset>   
              
            <div class="colum_personales2_30"> 
                <label>PIEL NARANJA</label> 
            </div>  
          
            <div class="colum_personales2_70">      
              <label>Mama D.</label><input type="checkbox" name="pnaranjad" id="pnaranjad" value="1"/>   
              <label>Mama I.</label><input type="checkbox" name="pnaranjai" id="pnaranjai" value="1"/>  
            </div>      
           </fieldset>   
             
           <fieldset>   
              
            <div class="colum_personales2_30"> 
                <label>PATOLOG&Iacute;A INFECCIOSO-INFLAMATORIA</label> 
            </div>  
          
            <div class="colum_personales2_70">      
              <label>Mama D.</label><input type="checkbox" name="patologiad" id="patologiad" value="1"/>   
              <label>Mama I.</label><input type="checkbox" name="patologiai" id="patologiai" value="1"/>  
            </div>      
           </fieldset>    
           
           
           <fieldset>   
              
             <div class="datos_personales">
              <label>TRATAMIENTO EFECTUADO/OBSERVACIONES:</label>
             </div>
               <div class="datos_personales">  
                <input type="text" id="obs" name="obs" size="80"/>
             
             </div> 
           </fieldset>     
           
           <fieldset>   
              
             <div class="datos_personales">
                 <label>ANTECEDENTES FAMILIARES DE C&Aacute;NCER DE MAMA:</label>
             </div>
               <div class="datos_personales">  
                <label>NO</label><input type="checkbox" name="antecedentes_no" id="antecedentes_no" value="1"/>
                <label>MADRE</label><input type="checkbox" name="antecedentes_madre" id="antecedentes_madre" value="1"/>  
                <label>PADRE</label><input type="checkbox" name="antecedentes_padre" id="antecedentes_padre" value="1"/>  
                <label>HERMANA</label><input type="checkbox" name="antecedentes_hermana" id="antecedentes_hermana" value="1"/>  
                <label>HIJA</label><input type="checkbox" name="antecedentes_hija" id="antecedentes_hija" value="1"/>
                <label>OTROS</label>
                <input type="text" id="antecedentes_otros" name="antecedentes_otros" size="30"/>
             </div> 
           </fieldset>  
           
          <fieldset>   
              
             <div class="datos_personales">
                 <label>ANTECEDENTES PERSONALES:</label>
             </div>
             <div class="datos_personales">  
                <label>TSH</label><input type="checkbox" name="ths" id="ths" value="ths"/>
                <label>Si</label><input type="radio" name="ths_si" value="1"/>
                <label>No</label><input type="radio" name="ths_si" value="0"/>
                
                <label>Fecha Inicio</label>
                <input type="text" id="ths_finicio" name="ths_finicio" size="10" onblur="valida_fecha(this.value)"/>
                
                <label>Fecha Fin</label>
                <input type="text" id="ths_ffin" name="ths_ffin" size="10" onblur="valida_fecha(this.value)"/>
               
             </div> 
            
            <div  class="colum_personales2_30">
                <label>CIRUG&Iacute;A/ BIOPSIA MAMARIA PREVIA:</label>
            </div>   
            <div class="colum_personales2_70">
                <label>SI</label><input type="radio" name="biopsia" value="1"/>  
                <label>NO</label><input type="radio" name="biopsia" value="0"/> 
                <label>MD</label><input type="checkbox" name="biopsia_md" id="biopsia_md" value="1"/>  
                <label>MI</label><input type="checkbox" name="biopsia_mi" id="biopsia_mi" value="1"/>
                <label>Resultado (Fecha)</label>
                <input type="text" id="biopsia_fecha" name="biopsia_fecha" size="10" onblur="valida_fecha(this.value)"/>
               
            </div>
           
            <div  class="colum_personales2_30">
                <label>PROTESIS MAMARIA:</label>
            </div>   
            <div class="colum_personales2_70">
                <label>SI</label><input type="radio" name="protesis" value="1"/>  
                <label>NO</label><input type="radio" name="protesis" value="0"/> 
                <label>MD</label><input type="checkbox" name="protesis_md" id="protesis_md" value="1"/>  
                <label>MI</label><input type="checkbox" name="protesis_mi" id="protesis_mi" value="1"/>
           
            </div>
              
            <div  class="colum_personales2_30">
                <label>ANTECEDENTES C&Aacute;NCER DE MAMA:</label>
            </div>   
            <div class="colum_personales2_70">
                <label>SI</label><input type="radio" name="antcmama" value="1"/>  
                <label>NO</label><input type="radio" name="antcmama" value="0"/> 
                <label>MD</label><input type="checkbox" name="antcmama_md" id="antcmama_md" value="1"/>  
                <label>MI</label><input type="checkbox" name="antcmama_mi" id="antcmama_mi" value="1"/>
                <label>Fecha</label>
                <input type="text" id="antcmama_fecha" name="antcmama_fecha" size="10" onblur="valida_fecha(this.value)"/>
               
            </div>   
          
            <div class="datos_personales">
               
                <label>Tratamiento:</label>
                <label>Trat. Quir&uacute;rgico</label><input type="checkbox" name="trat_quir" id="trat_quir" value="1">  
                <label>Radioterapia</label><input type="checkbox" name="radioterapia" id="radioterapia" value="1"> 
                <label>Quimioterapia</label><input type="checkbox" name="quimio" id="quimio" value="1">  
            </div>  
              
           <div class="datos_personales">
                <label>Mamograf&iacute;a previa:</label>
                <label>SI</label><input type="radio" name="previa" value="1"/> 
                <label>NO</label><input type="radio" name="previa" value="0"/>  
                <label>Fecha</label>
                <input type="text" id="fecha_previa" name="fecha_previa" size="10" onblur="valida_fecha(this.value)"/>
               
           </div>
           <div class="datos_personales">
                <label>Se ha realizado mamograf&iacute;a en el Programa de Detecci&oacute;n Precoz de C&aacute;ncer de Mama:</label>
                <label>SI</label><input type="radio" name="pdpcm" value="1"/> 
                <label>NO</label><input type="radio" name="pdpcm" value="0"/>  
           </div>   
          
           <div class="datos_personales">
                <label>Fecha</label>
                <input type="text" id="fecha_pdpcm" name="fecha_pdpcm" size="10" onblur="valida_fecha(this.value)"/>
               
           </div>
             
          </fieldset>  
           
            <button type="submit" id="registar" name="registrar" class="botoncentrado" onClick="window.print()">
                 Registrar
             </button>
           
       </form>    
    
    
    </body>
</html>
