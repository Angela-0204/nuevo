<?php
require_once(__DIR__ . '/../connectDB.php');

class Almacen extends connectDB
{
    private $id_almacen;
    private $nombre_almacen;
   
    public function Listar()
    {
        $resultado = $this->conex->prepare("SELECT *FROM almacen;");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function Crear($id_almacen, $nombre_almacen)
    {
        $sql = "INSERT INTO almacen (id_almacen, nombre_almacen) 
                VALUES (:id_almacen, :nombre_almacen)";
        $resultado = $this->conex->prepare($sql);
        
        try {
            $resultado->execute([
                'id_almacen' => $id_almacen,
                'nombre_almacen' => $nombre_almacen
            
            ]);
        } catch (Exception $e) {
            echo "Error al crear el producto: " . $e->getMessage();
            return false;
        }
        
        return true;
    }

}
?>
