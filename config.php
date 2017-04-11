<?php
/* 
 * DEFINO LAS CONSTANTES QUE UTILIZO EN EL PROGRAMA
 */

// DATOS CONEXON POR MYSQL
//define("DB_DSN","mysql:host=10.8.65.9;dbname=SUCESOS");
//define("DB_DSN","mysql:dbname=web");
   


// CONEXION AL SERVIDOR SQL SERVER


define("DB_DSN","dblib:host=10.8.65.17;dbname=VISADO");
define("DB_DSN1","dblib:host=10.8.65.2;dbname=PERSONAL");

define("DB_USERNAME", "sa");
define("DB_PASSWORD", "servidor");
define("PAGE_SIZE", 5);
    

//Definicion Tablas BD
define("TBL_TIEMPO","PIOBIN_TIEMPO");
define("TBL_FICHA","FICHA_PIOBIN");
define("TBL_ABANDONO","PIOBIN_ABANDONO");
define("TBL_CAMBIOS","PIOBIN_CAMBIOS");

define("TBL_BDU","FICHERO_BDU");

define("ROOT", $_SERVER['HTTP_HOST']);
define("RAIZ", "http://" . $_SERVER['HTTP_HOST'] );

  
//consultas sql PARA LAS LISTAS



define("SQL_LISTATIEMPO", "SELECT COD,TIEMPO FROM " . TBL_TIEMPOS);
define("SQL_LISTAABANDONO", "SELECT COD,ABANDONO FROM " . TBL_ABANDONO);
define("SQL_LISTACAMBIOS", "SELECT COD,CAMBIO FROM " . TBL_CAMBIOS);

// Fin consultas Listas
   
  

define("SQL_INSERTA_PIOBIN","INSERT INTO " . TBL_FICHA . " (AN,CENTRO,CNP,FECHA,
    TIEMPO,FDIAGNOSTICO,IMC_DIAGNOSTICO,DESVIACION_DIAGNOSTICO,FEVALUACION,
    IMC_EVALUACION,DESVIACION_EVALUACION,FRUTANINO,FRUTAPADRES,VERDURANINO,
    VERDURAPADRES,HORASNINO,HORASPADRES,GRASASNINO,GRASASPADRES,DULCESNINO,
    DULCESPADRES,BEBIDASNINO,BEBIDASPADRES,DEPORTENINO,DEPORTEPADRES,JUEGONINO,
    JUEGOPADRES,MOVIMIENTONINO,MOVIMIENTOPADRES,SEDENTARIANINO,SEDENTARIAPADRES,
    HUMORNINO,HUMORPADRES,ESCOLARNINO,ESCOLARPADRES,SOCIALNINO,SOCIALPADRES,
    DESEONINO,DESEOPADRES,PESOMADRE,PESOPADRE,ACTIVIDAD_MADRE,ACTIVIDAD_PADRE,
    REFUERZO_POS) VALUES (:AN,:CENTRO,:CNP,:FECHA,:TIEMPO,:FDIAGNOSTICO,:IMC_DIAGNOSTICO,
    :DESVIACION_DIAGNOSTICO,:FEVALUACION,:IMC_EVALUACION,:DESVIACION_EVALUACION,
    :FRUTANINO,:FRUTAPADRES,:VERDURANINO,:VERDURAPADRES,:HORASNINO,:HORASPADRES,
    :GRASASNINO,:GRASASPADRES,:DULCESNINO,:DULCESPADRES,:BEBIDASNINO,:BEBIDASPADRES,
    :DEPORTENINO,:DEPORTEPADRES,:JUEGONINO,:JUEGOPADRES,:MOVIMIENTONINO,:MOVIMIENTOPADRES,
    :SEDENTARIANINO,:SEDENTARIAPADRES,:HUMORNINO,:HUMORPADRES,:ESCOLARNINO,:ESCOLARPADRES,
    :SOCIALNINO,:SOCIALPADRES,:DESEONINO,:DESEOPADRES,:PESOMADRE,:PESOPADRE,:ACTIVIDAD_MADRE,
    :ACTIVIDAD_PADRE,:REFUERZO_POS)");

define("SQL_MODIFICA_PIOBIN","UPDATE " . TBL_FICHA . " SET TIEMPO=:TIEMPO,
    FDIAGNOSTICO=:FDIAGNOSTICO,IMC_DIAGNOSTICO=:IMC_DIAGNOSTICO,
    DESVIACION_DIAGNOSTICO=:DESVIACION_DIAGNOSTICO,FEVALUACION=:FEVALUACION,
    IMC_EVALUACION=:IMC_EVALUACION,DESVIACION_EVALUACION=:DESVIACION_EVALUACION,
    FRUTANINO=:FRUTANINO,FRUTAPADRES=:FRUTAPADRES,VERDURANINO=:VERDURANINO,
    VERDURAPADRES=:VERDURAPADRES,HORASNINO=:HORASNINO,HORASPADRES=:HORASPADRES,
    GRASASNINO=:GRASASNINO,GRASASPADRES=:GRASASPADRES,DULCESNINO=:DULCESNINO,
    DULCESPADRES=:DULCESPADRES,BEBIDASNINO=:BEBIDASNINO,BEBIDASPADRES=:BEBIDASPADRES,
    DEPORTENINO=:DEPORTENINO,DEPORTEPADRES=:DEPORTEPADRES,JUEGONINO=:JUEGONINO,
    JUEGOPADRES=:JUEGOPADRES,MOVIMIENTONINO=:MOVIMIENTONINO,MOVIMIENTOPADRES=:MOVIMIENTOPADRES,
    SEDENTARIANINO=:SEDENTARIANINO,SEDENTARIAPADRES=:SEDENTARIAPADRES,HUMORNINO=:HUMORNINO,
    HUMORPADRES=:HUMORPADRES,ESCOLARNINO=:ESCOLARNINO,ESCOLARPADRES=:ESCOLARPADRES,
    SOCIALNINO=:SOCIALNINO,SOCIALPADRES=:SOCIALPADRES,DESEONINO=:DESEONINO,
    DESEOPADRES=:DESEOPADRES,PESOMADRE=:PESOMADRE,PESOPADRE=:PESOPADRE,
    ACTIVIDAD_MADRE=:ACTIVIDAD_MADRE,ACTIVIDAD_PADRE=:ACTIVIDAD_PADRE,
    REFUERZO_POS=:REFUERZO_POS WHERE COD=:COD");


define("SQL_BUSCA_PIOBIN","SELECT COD,AN,CENTRO,CNP,FECHA,
    TIEMPO,FDIAGNOSTICO,IMC_DIAGNOSTICO,DESVIACION_DIAGNOSTICO,FEVALUACION,
    IMC_EVALUACION,DESVIACION_EVALUACION,FRUTANINO,FRUTAPADRES,VERDURANINO,
    VERDURAPADRES,HORASNINO,HORASPADRES,GRASASNINO,GRASASPADRES,DULCESNINO,
    DULCESPADRES,BEBIDASNINO,BEBIDASPADRES,DEPORTENINO,DEPORTEPADRES,JUEGONINO,
    JUEGOPADRES,MOVIMIENTONINO,MOVIMIENTOPADRES,SEDENTARIANINO,SEDENTARIAPADRES,
    HUMORNINO,HUMORPADRES,ESCOLARNINO,ESCOLARPADRES,SOCIALNINO,SOCIALPADRES,
    DESEONINO,DESEOPADRES,PESOMADRE,PESOPADRE,ACTIVIDAD_MADRE,ACTIVIDAD_PADRE,
    REFUERZO_POS FROM " . TBL_FICHA . " WHERE AN=:AN");



define("SQL_BUSCA_USUARIO","SELECT NUHSA,CLAMED,ANIO,MES,DIA,APE1,APE2,NOMBRE,"
        . "IDENTIFICADOR,TELEFONO,MOVIL FROM " . TBL_BDU . " WHERE NUHSA=:NUHSA");



?>
     