<?php
require_once 'Tarea.php';

class GestorTarea {
    private $archivo = '../data/registros.json';
    private $listaTareas = [];

    public function __construct() {
        $this->cargarTareasDesdeArchivo();
    }
    function leerLinea($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

    private function cargarTareasDesdeArchivo() {
        if (file_exists($this->archivo)) {
            $contenido = file_get_contents($this->archivo);
            $datos = json_decode($contenido, true);
            if (is_array($datos)) {
                foreach ($datos as $tareaData) {
                    $tarea = new Tarea();
                    $tarea->setTitulo($tareaData['titulo'] ?? null);
                    $tarea->setDescripcion($tareaData['descripcion'] ?? '');
                    $tarea->setEstado($tareaData['estado'] ?? 'pendiente');
                    $this->listaTareas[] = $tarea;
                }
            }
        }
    }

    private function guardarTareasEnArchivo() {
        $datos = [];
        foreach ($this->listaTareas as $tarea) {
            $datos[] = [
                'titulo' => $tarea->getTitulo(),
                'descripcion' => $tarea->getDescripcion(),
                'estado' => $tarea->getEstado(),
            ];
        }
        file_put_contents($this->archivo, json_encode($datos, JSON_PRETTY_PRINT));
    }

    public function agregarTarea(Tarea $tarea) {
        $this->listaTareas[] = $tarea;
        $this->guardarTareasEnArchivo();
    }

    public function eliminarTarea(Tarea $tarea) {
        foreach ($this->listaTareas as $key => $obj) {
            if ($obj->getId() === $tarea->getId()) {
                unset($this->listaTareas[$key]);
                $this->listaTareas = array_values($this->listaTareas);
                $this->guardarTareasEnArchivo();
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

    public function completarTarea(Tarea $tarea) {
        foreach ($this->listaTareas as $obj) {
            if ($obj->getId() === $tarea->getId()) {
                $obj->setEstado('completada');
                $this->guardarTareasEnArchivo();
                break;
            }
        }
    }

    public function getListaTareas() {
        return $this->listaTareas;
    }
    public function crearNuevaTarea(){
            $titulo = leerLinea("Título: ");
            $descripcion = leerLinea("Descripción: ");
            $estado = 'pendiente';
            $tarea = new Tarea($titulo, $descripcion, $estado)

            return $tarea
    }
}
?>
