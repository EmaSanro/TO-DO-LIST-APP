<?php 

require_once 'tareasController.php';

$action = 'listar';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
$controller = new TareasController();

switch($params[0]) {
    case 'listar': {
        $controller->listarTareas();
    }; break;
    case 'agregar': {
        $controller->agregarTareas();
    }; break;
    case 'eliminar': {
        $id = $params[1];
        $controller->eliminar($id);
    }
    case 'completada': {
        $id = $params[1];
        $controller->completada($id);
    }; break;
    default: {
        echo "<h2>ERROR 404 URL NOT FOUND ";
    }
}

?>