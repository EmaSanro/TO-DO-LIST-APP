<?php 
require_once "tareasView.php";
require_once "tareasModel.php";
class TareasController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TareasModel();
        $this->view= new TareasView();
    }

    function listarTareas() {
        $tareas = $this->model->obtenerTareas();
        $this->view->vistaTareas($tareas);
    }

    function agregarTareas() {
        $tarea = $_POST['tarea'];
        $prioridad = $_POST['prioridad'];
        if(!empty($_POST['tarea'] && !empty($_POST['prioridad']))) {
            $this->model->agregarTareas($tarea, $prioridad);
            header("Location: " . BASE_URL);
            } else {
                header("Location: " . BASE_URL);
            }
        }

    function completada($id) {
        $this->model->tareaCompletada($id);
        header("Location: " . BASE_URL);
    }

    function eliminar($id) {
        $this->model->eliminar($id);
        header("Location: " . BASE_URL);
    }
}
?>