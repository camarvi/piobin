<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author carlos
 */
include_once 'DataObject.class.php';

class FichaPiobin  extends DataObject {
    //put your code here
    protected  $data=array(
        
        "COD"=>"",
        "AN"=>"",
        "CENTRO"=>"",
        "CNP"=>"",
        "FECHA"=>"",
        "TIEMPO"=>"",
        "FDIAGNOSTICO"=>"",
        "IMC_DIAGNOSTICO"=>"",
        "DESVIACION_DIAGNOSTICO"=>"",
        "FEVALUACION"=>"",
        "IMC_EVALUACION"=>"",
        "DESVIACION_EVALUACION"=>"",
        "FRUTANINO"=>"",
        "FRUTAPADRES"=>"",
        "VERDURANINO"=>"",
        "VERDURAPADRES"=>"",
        "HORASNINO"=>"",
        "HORASPADRES"=>"",
        "GRASASNINO"=>"",
        "GRASASPADRES"=>"",
        "DULCESNINO"=>"",
        "DULCESPADRES"=>"",
        "BEBIDASNINO"=>"",
        "BEBIDASPADRES"=>"",
        "DEPORTENINO"=>"",
        "DEPORTEPADRES"=>"",
        "JUEGONINO"=>"",
        "JUEGOPADRES"=>"",
        "MOVIMIENTONINO"=>"",
        "MOVIMIENTOPADRES"=>"",
        "SEDENTARIANINO"=>"",
        "SEDENTARIAPADRES"=>"",
        "HUMORNINO"=>"",
        "HUMORPADRES"=>"",
        "ESCOLARNINO"=>"",
        "ESCOLARPADRES"=>"",
        "SOCIALNINO"=>"",
        "SOCIALPADRES"=>"",
        "DESEONINO"=>"",
        "DESEOPADRES"=>"",
        "PESOMADRE"=>"",
        "PESOPADRE"=>"",
        "ACTIVIDAD_MADRE"=>"",
        "ACTIVIDAD_PADRE"=>"",
        "REFUERZO_POS"=>"",
        "CERRADO"=>"",
        "FECHA_FIN"=>""
     );    

    //lista de categorias por orden alfabetico

  
  public function nueva_ficha() {

        $conn=parent::connect();
        $sql=SQL_INSERTA_PIOBIN;

        try {
            $st=$conn->prepare($sql);
            $st->bindValue(":AN",$this->data["AN"], PDO::PARAM_STR);
            $st->bindValue(":CENTRO",$this->data["CENTRO"], PDO::PARAM_STR);
            $st->bindValue(":CNP",$this->data["CNP"], PDO::PARAM_STR);
            $st->bindValue(":FECHA",$this->data["FECHA"], PDO::PARAM_STR);
            $st->bindValue(":TIEMPO",$this->data["TIEMPO"], PDO::PARAM_INT);
            $st->bindValue(":FDIAGNOSTICO",$this->data["FDIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":IMC_DIAGNOSTICO",$this->data["IMC_DIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":DESVIACION_DIAGNOSTICO",$this->data["DESVIACION_DIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":FEVALUACION",$this->data["FEVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":IMC_EVALUACION",$this->data["IMC_EVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":DESVIACION_EVALUACION",$this->data["DESVIACION_EVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":FRUTANINO",$this->data["FRUTANINO"], PDO::PARAM_STR);
            $st->bindValue(":FRUTAPADRES",$this->data["FRUTAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":VERDURANINO",$this->data["VERDURANINO"], PDO::PARAM_INT);
            $st->bindValue(":VERDURAPADRES",$this->data["VERDURAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":HORASNINO",$this->data["HORASNINO"], PDO::PARAM_INT); 
            $st->bindValue(":HORASPADRES",$this->data["HORASPADRES"], PDO::PARAM_INT);
            $st->bindValue(":GRASASNINO",$this->data["GRASASNINO"], PDO::PARAM_INT);
            $st->bindValue(":GRASASPADRES",$this->data["GRASASPADRES"], PDO::PARAM_INT);
            $st->bindValue(":DULCESNINO",$this->data["DULCESNINO"], PDO::PARAM_INT);
            $st->bindValue(":DULCESPADRES",$this->data["DULCESPADRES"], PDO::PARAM_INT);
            $st->bindValue(":BEBIDASNINO",$this->data["BEBIDASNINO"], PDO::PARAM_INT);
            $st->bindValue(":BEBIDASPADRES",$this->data["BEBIDASPADRES"], PDO::PARAM_INT); 
            $st->bindValue(":DEPORTENINO",$this->data["DEPORTENINO"], PDO::PARAM_INT);
            $st->bindValue(":DEPORTEPADRES",$this->data["DEPORTEPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":JUEGONINO",$this->data["JUEGONINO"], PDO::PARAM_INT);
            $st->bindValue(":JUEGOPADRES",$this->data["JUEGOPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":MOVIMIENTONINO",$this->data["MOVIMIENTONINO"], PDO::PARAM_INT);
            $st->bindValue(":MOVIMIENTOPADRES",$this->data["MOVIMIENTOPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":SEDENTARIANINO",$this->data["SEDENTARIANINO"], PDO::PARAM_INT);
            $st->bindValue(":SEDENTARIAPADRES",$this->data["SEDENTARIAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":HUMORNINO",$this->data["HUMORNINO"], PDO::PARAM_INT);
            $st->bindValue(":HUMORPADRES",$this->data["HUMORPADRES"], PDO::PARAM_INT);
            $st->bindValue(":ESCOLARNINO",$this->data["ESCOLARNINO"], PDO::PARAM_INT);
            $st->bindValue(":ESCOLARPADRES",$this->data["ESCOLARPADRES"], PDO::PARAM_INT);
            $st->bindValue(":SOCIALNINO",$this->data["SOCIALNINO"], PDO::PARAM_INT); 
            $st->bindValue(":SOCIALPADRES",$this->data["SOCIALPADRES"], PDO::PARAM_INT);
            $st->bindValue(":DESEONINO",$this->data["DESEONINO"], PDO::PARAM_INT);
            $st->bindValue(":DESEOPADRES",$this->data["DESEOPADRES"], PDO::PARAM_INT);   
            $st->bindValue(":PESOMADRE",$this->data["PESOMADRE"], PDO::PARAM_INT);
            $st->bindValue(":PESOPADRE",$this->data["PESOPADRE"], PDO::PARAM_INT);
            $st->bindValue(":ACTIVIDAD_MADRE",$this->data["ACTIVIDAD_MADRE"], PDO::PARAM_INT);
            $st->bindValue(":ACTIVIDAD_PADRE",$this->data["ACTIVIDAD_PADRE"], PDO::PARAM_INT);
            $st->bindValue(":REFUERZO_POS",$this->data["REFUERZO_POS"], PDO::PARAM_INT);
         
       $st->execute();
            parent::disconnect($conn);

       //   $lasid=$conn->lastInsertId();
           // $lasid2=$st->fetch(PDO::FETCH_ASSOC);
         //   return $lasid2["IDCURSO"];
          $conn=null;


        } catch (PDOException $e) {
            parent::disconnect($conn);
            die ("Query failed: " . $e->getMessage());

        }

    }    
              
         
  public function  modifica_ficha() {

        $conn=parent::connect();
        $sql=SQL_MODIFICA_PIOBIN;
           
        try {
            $st=$conn->prepare($sql);
            $st->bindValue(":COD",$this->data["COD"], PDO::PARAM_STR);
            $st->bindValue(":TIEMPO",$this->data["TIEMPO"], PDO::PARAM_STR);
            $st->bindValue(":FECHA",$this->data["FECHA"], PDO::PARAM_STR);
            $st->bindValue(":FDIAGNOSTICO",$this->data["FDIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":IMC_DIAGNOSTICO",$this->data["IMC_DIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":DESVIACION_DIAGNOSTICO",$this->data["DESVIACION_DIAGNOSTICO"], PDO::PARAM_STR);
            $st->bindValue(":FEVALUACION",$this->data["FEVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":IMC_EVALUACION",$this->data["IMC_EVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":DESVIACION_EVALUACION",$this->data["DESVIACION_EVALUACION"], PDO::PARAM_STR);
            $st->bindValue(":FRUTANINO",$this->data["FRUTANINO"], PDO::PARAM_STR);
            $st->bindValue(":FRUTAPADRES",$this->data["FRUTAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":VERDURANINO",$this->data["VERDURANINO"], PDO::PARAM_INT);
            $st->bindValue(":VERDURAPADRES",$this->data["VERDURAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":HORASNINO",$this->data["HORASNINO"], PDO::PARAM_INT); 
            $st->bindValue(":HORASPADRES",$this->data["HORASPADRES"], PDO::PARAM_INT);
            $st->bindValue(":GRASASNINO",$this->data["GRASASNINO"], PDO::PARAM_INT);
            $st->bindValue(":GRASASPADRES",$this->data["GRASASPADRES"], PDO::PARAM_INT);
            $st->bindValue(":DULCESNINO",$this->data["DULCESNINO"], PDO::PARAM_INT);
            $st->bindValue(":DULCESPADRES",$this->data["DULCESPADRES"], PDO::PARAM_INT);
            $st->bindValue(":BEBIDASNINO",$this->data["BEBIDASNINO"], PDO::PARAM_INT);
            $st->bindValue(":BEBIDASPADRES",$this->data["BEBIDASPADRES"], PDO::PARAM_INT); 
            $st->bindValue(":DEPORTENINO",$this->data["DEPORTENINO"], PDO::PARAM_INT);
            $st->bindValue(":DEPORTEPADRES",$this->data["DEPORTEPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":JUEGONINO",$this->data["JUEGONINO"], PDO::PARAM_INT);
            $st->bindValue(":JUEGOPADRES",$this->data["JUEGOPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":MOVIMIENTONINO",$this->data["MOVIMIENTONINO"], PDO::PARAM_INT);
            $st->bindValue(":MOVIMIENTOPADRES",$this->data["MOVIMIENTOPADRES"], PDO::PARAM_INT);           
            $st->bindValue(":SEDENTARIANINO",$this->data["SEDENTARIANINO"], PDO::PARAM_INT);
            $st->bindValue(":SEDENTARIAPADRES",$this->data["SEDENTARIAPADRES"], PDO::PARAM_INT);
            $st->bindValue(":HUMORNINO",$this->data["HUMORNINO"], PDO::PARAM_INT);
            $st->bindValue(":HUMORPADRES",$this->data["HUMORPADRES"], PDO::PARAM_INT);
            $st->bindValue(":ESCOLARNINO",$this->data["ESCOLARNINO"], PDO::PARAM_INT);
            $st->bindValue(":ESCOLARPADRES",$this->data["ESCOLARPADRES"], PDO::PARAM_INT);
            $st->bindValue(":SOCIALNINO",$this->data["SOCIALNINO"], PDO::PARAM_INT); 
            $st->bindValue(":SOCIALPADRES",$this->data["SOCIALPADRES"], PDO::PARAM_INT);
            $st->bindValue(":DESEONINO",$this->data["DESEONINO"], PDO::PARAM_INT);
            $st->bindValue(":DESEOPADRES",$this->data["DESEOPADRES"], PDO::PARAM_INT);   
            $st->bindValue(":PESOMADRE",$this->data["PESOMADRE"], PDO::PARAM_INT);
            $st->bindValue(":PESOPADRE",$this->data["PESOPADRE"], PDO::PARAM_INT);
            $st->bindValue(":ACTIVIDAD_MADRE",$this->data["ACTIVIDAD_MADRE"], PDO::PARAM_INT);
            $st->bindValue(":ACTIVIDAD_PADRE",$this->data["ACTIVIDAD_PADRE"], PDO::PARAM_INT);
            $st->bindValue(":REFUERZO_POS",$this->data["REFUERZO_POS"], PDO::PARAM_INT);
            

            $st->execute();
            parent::disconnect($conn);

        } catch (PDOException $e) {
            parent::disconnect($conn);
            die ("Query failed: " . $e->getMessage());

        }

    }   
    
  public static function getPiobin($an) {

        $conn=parent::connect();
        $sql=SQL_BUSCA_PIOBIN;
        
        try {
            $st=$conn->prepare($sql);
            $st->bindValue(":AN",$an,PDO::PARAM_STR);
            $st->execute();
            $row=$st->fetch();
            parent::disconnect($conn);
            if ($row) return new FichaPiobin($row);

        } catch (PDOException $e) {
            parent::disconnect($conn);
            die("Query Failed :" . $e->getMessage());
        }

    }   
   
   
}
?>
