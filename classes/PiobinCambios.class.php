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

class PiobinCambios  extends DataObject {
    //put your code here
    protected  $data=array(
        
        "COD"=>"",
        "CAMBIO"=>""
     );    

    //lista de categorias por orden alfabetico

    public static function listaCambios() {

        $conn=parent::connect();
        $sql=SQL_LISTACAMBIOS;
        
        try {
            $st=$conn->prepare($sql);
            
            $st->execute();
             $lcambios=array();
               foreach ($st->fetchAll() as $row) {
                   $lcambios[]=new PiobinCambios($row);
               }

               parent::disconnect($conn);
               return array($lcambios);
            } catch (PDOException $e) {
                parent::disconnect($conn);
                die("Query failed: " . $e->getMessage());
            }

    }

}

?>
