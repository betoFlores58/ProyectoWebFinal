<?php

include_once '../../conexion.php';

class Productos extends DB{
    
     function __construct(){
        parent::__construct();
    }
    public function get($id)
    {
        $query=$this->connect()->prepare('SELECT * from items WHERE id =: id LIMIT 0,12');
        $query->execute(['id'=>$id]);

        $row=$query->fetch();

        return [
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'precio'=>$row['precio'],
            'imagen'=>$row['imagen'],
            'categoria'=>$row['categoria']
        ];
    }
    public function getItemsByCategory($category)
    {
        $query=$this->connect()->prepare('SELECT * from items WHERE categoria =: cat LIMIT 0,12');
        $query->execute(['cat'=>$category]);

        $items=[];

        while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
            $item=[
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'precio'=>$row['precio'],
            'imagen'=>$row['imagen'],
            'categoria'=>$row['categoria']
            ];

            array_push($items,$item);
        }

        return $items;
    }
}
?>