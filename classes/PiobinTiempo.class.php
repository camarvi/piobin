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

class PiobinTiempo  extends DataObject {
    //put your code here
    protected  $data=array(
        
        "COD"=>"",
        "TIEMPO"=>""
     );    

    //lista de categorias por orden alfabetico

    public static function listaTiempo() {

        $conn=parent::connect();
        $sql=SQL_LISTATIEMPO;
   
   
        try {
            $st=$conn->prepare($sql);
           
            
            $st->execute();
             $ltiempos=array();
               foreach ($st->fetchAll() as $row) {
                   $ltiempos[]=new PiobinTiempo($row);
               }

               parent::disconnect($conn);
               return array($ltiempos);
            } catch (PDOException $e) {
                parent::disconnect($conn);
                die("Query failed: " . $e->getMessage());
            }

       

    }

}
?>
