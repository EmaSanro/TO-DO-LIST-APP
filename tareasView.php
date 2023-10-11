<?php 

class TareasView {

    function vistaTareas($tareas) {
        echo '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>TODOLIST APP | Emanuel San Roman</title>
                <link rel="icon" href="WebIcon.png" type="image/png" sizes="96x96">
                <link rel="stylesheet" href="style.css">
                <base href="'.BASE_URL.'">
            </head>
            <body>
                <header class="header">
                    <span class="icon"><svg width="36" height="36" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 6h13"></path>
                        <path d="M8 12h13"></path>
                        <path d="M8 18h13"></path>
                        <path d="M3 6h.01"></path>
                        <path d="M3 12h.01"></path>
                        <path d="M3 18h.01"></path>
                      </svg></span><h1>To Do List App</h1><ion-icon class="paper" name="reader-outline"></ion-icon>
                </header>
                <main>
                    <div class="divAgregar">
                        <form action="agregar" method="POST" class="formAgregar">
                            <label for="tarea">Tarea</label>
                            <input class="datos" name="tarea" type="text" placeholder="Ingrese Tarea....."/>
                            <label for="Prioridad">Prioridad(1 menos importante - 6 mas importante)</label>
                            <input class="datos" name="prioridad" type="number" min="1" max="6" placeholder="Prioridad.....">
                            <button type="submit" class="btn agregar">Agregar Tarea</button>
                        </form>
                    </div>
                    <table class="tableList">
                        <thead>
                            <th>TAREA</th>
                            <th>PRIORIDAD</th>
                        </thead>
                        <tbody class="midiv">';
        foreach($tareas as $tarea) {
            if($tarea->completada == 1) {
                echo "<tr class='complete'>
                        <td>$tarea->tarea</td>    
                        <td>$tarea->prioridad<a class='btnComplete' href='completada/$tarea->id'><ion-icon name='checkmark-circle'></ion-icon></a><a class='btnEliminar' href='eliminar/$tarea->id'><ion-icon name='close-circle'></ion-icon></a></td>
                      </tr>";
            }else {
                echo "<tr>
                        <td>$tarea->tarea</td>    
                        <td>$tarea->prioridad<a class='btnComplete' href='completada/$tarea->id'><ion-icon name='checkmark-circle-outline'></ion-icon></a><a class='btnEliminar' href='eliminar/$tarea->id'><ion-icon name='close-circle'></ion-icon></a></td>
                      </tr>";
            }
        }
        echo '</tbody>
            </table>
        </main>
    </body>
    <script src="main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </html>';
    }
}

?>