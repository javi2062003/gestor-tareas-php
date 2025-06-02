<?php 
require_once 'Tarea.php';
Class GestorTarea {
    private $listaTareas = array(Tarea $tarea);

    public function agregarTarea (Tarea $tarea) {
        array_push($listaTareas, $tarea);
    }
    public function eliminarTarea (Tarea $tarea) {
        unset($this->listaTareas[$tarea])
    }
    public function mostrarTareas() {
        echo $this->listaTareas;
    }
    public function completarTarea (Tarea $tarea){
        $tarea->estado = 'completada';
    }
}
?>