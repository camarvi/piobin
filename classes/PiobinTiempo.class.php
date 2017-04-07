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
        $sql=SQL_LISTACENTROS;
   
   
        try {
            $st=$conn->prepare($sql);
           
            
            $st->execute();
             $lcentros=array();
               foreach ($st->fetchAll() as $row) {
                   $lcentros[]=new Centros($row);
               }

               parent::disconnect($conn);
               return array($lcentros);
            } catch (PDOException $e) {
                parent::disconnect($conn);
                die("Query failed: " . $e->getMessage());
            }



    }

}
?>
