<?php 
require_once 'Tarea.php';
Class GestorTarea {
    private $listaTareas = [];

    public function agregarTarea (Tarea $tarea) {
        array_push($this->listaTareas, $tarea);
    }
    public function eliminarTarea (Tarea $tarea) {
    foreach ($this->listaTareas as $key => $obj) {
        if ($obj === $tarea) {  
            unset($this->listaTareas[$key]);
            $this->listaTareas = array_values($this->listaTareas);
            break;
        }
    }
}

    public function mostrarTareas() {
        foreach ($this->listaTareas as $tarea) {
        $tarea->mostrarDatos();
        echo "\n"; 
}
    }
    public function completarTarea (Tarea $tarea){
        $tarea->setEstado('completada');
    }
}
?>