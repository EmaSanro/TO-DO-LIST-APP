<?php 
class TareasModel {
    

    function obtenerTareas() {
        $conex = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8', 'root', '');
        $query= $conex->prepare("SELECT * FROM tareas");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
        return $datos;
    }

    function agregarTareas($tarea, $prioridad) {
        $conex = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8', 'root', '');
        $consulta = $conex->prepare("INSERT INTO tareas(tarea, prioridad, completada) VALUES ('$tarea','$prioridad','0')");
        $consulta->execute();
    }

    function tareaCompletada($id) {
        $conex = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8', 'root', '');
        $query = $conex->prepare("SELECT * FROM tareas WHERE id=$id");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($datos as $dato) {
            if($dato->completada == 1) {
                $consulta = $conex->prepare("UPDATE tareas SET completada=0 WHERE id=$id");
                $consulta->execute();
            } else {
                $consulta = $conex->prepare("UPDATE tareas SET completada=1 WHERE id=$id");
                $consulta->execute();
            }
        }
    }

    function eliminar($id) {
        $conex = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8', 'root', '');
        $consulta = $conex->prepare("DELETE FROM tareas WHERE id=$id");
        $consulta->execute();
    }
}

?>