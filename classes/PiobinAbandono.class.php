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

class PiobinAbandono  extends DataObject {
    //put your code here
    protected  $data=array(
        
        "COD"=>"",
        "ABANDONO"=>""
     );    

    //lista de categorias por orden alfabetico

    public static function listaAbandonos() {

        $conn=parent::connect();
        $sql=SQL_LISTAABANDONO;
   
        try {
            $st=$conn->prepare($sql);
            
            $st->execute();
             $labandonos=array();
               foreach ($st->fetchAll() as $row) {
                   $labandonos[]=new PiobinAbandono($row);
               }

               parent::disconnect($conn);
               return array($labandonos);
            } catch (PDOException $e) {
                parent::disconnect($conn);
                die("Query failed: " . $e->getMessage());
            }

    }

}

?>
