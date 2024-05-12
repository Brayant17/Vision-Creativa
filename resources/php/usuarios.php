<?php 
    include_once '../../config/config.php';
    class Inventario{
        public static function getAllItems(){
            $db = db();
            $sql = "SELECT * FROM empleado";
            $query = $db->query($sql);
            if($query->num_rows > 0){
                while($rows = $query->fetch_assoc()){
                    $items[] = array(
                        'id_empleado' => $rows["empleadoID"],
                        'nombre' => $rows["nombre"],
                        'apellido' => $rows["apellido"],
                        'email' => $rows["email"],
                        'numero' => $rows["numero"],
                        'direccion' => $rows["direccion"],
                    );
                }
                
            }else{
                $items = null;
            }
            return $items;
        }
    }