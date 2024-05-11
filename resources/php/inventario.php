<?php 
    include_once '../../config/config.php';
    class Inventario{
        public static function getAllItems(){
            $db = db();
            $sql = "SELECT * FROM inventario";
            $query = $db->query($sql);
            if($query->num_rows > 0){
                while($rows = $query->fetch_assoc()){
                    $items[] = array(
                        'id_inventario' => $rows["id_inventario"],
                        'nombre' => $rows["Nombre"],
                        'descripcion' => $rows["Descripcion"],
                        'stock' => $rows["Stock"],
                        'sku' => $rows["sku"],
                    );
                }
                
            }else{
                $items = null;
            }
            return $items;
        }
    }