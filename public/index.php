<?php
require_once 'C:\Users\marta\OneDrive\Escritorio\Gestor-Tareas\clases\tarea.php';
require_once 'C:\Users\marta\OneDrive\Escritorio\Gestor-Tareas\clases\GestorTarea.php';

$gestor = new GestorTarea();

function mostrarMenu() {
    echo "\n--- MENÚ DE GESTIÓN DE TAREAS ---\n";
    echo "1. Agregar tarea\n";
    echo "2. Eliminar tarea\n";
    echo "3. Listar tareas\n";
    echo "4. Completar tarea\n";
    echo "5. Salir\n";
    echo "Elige una opción: ";
}

function leerLinea($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

while (true) {
    mostrarMenu();
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            $tarea = new Tarea();
            $tarea = $gestor->crearNuevaTarea();
            $gestor->agregarTarea($tarea);
            echo "Tarea agregada.\n";
            break;

        case '2':
            $nombretarea = leerLinea("Nombre o título de la tarea: ");
            $lista = $gestor->getListaTareas();
            $tareaEncontrada = null;
            foreach ($lista as $tarea) {
                if ($tarea->getTitulo() === $nombretarea) {
                    $tareaEncontrada = $tarea;
                    break;
                }
            }
            if ($tareaEncontrada !== null) {
                $gestor->eliminarTarea($tareaEncontrada);
                echo "Tarea eliminada.\n";
            } else {
                echo "No se encontró tarea con ese título.\n";
            }
            break;

        case '3':
            echo "\nListado de tareas:\n";
            $gestor->mostrarTareas();
            break;

        case '4':
            $gestor->mostrarTareas();
            $idx = leerLinea("Número de tarea a completar (empezando en 1): ");
            $idx = intval($idx) - 1;
            $lista = $gestor->getListaTareas();
            if (isset($lista[$idx])) {
                $gestor->completarTarea($lista[$idx]);
                echo "Tarea marcada como completada.\n";
            } else {
                echo "Índice inválido.\n";
            }
            break;

        case '5':
            echo "¡Adiós!\n";
            exit;

        default:
            echo "Opción no válida, intenta de nuevo.\n";
            break;
    }
}
?>
