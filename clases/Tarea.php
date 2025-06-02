<?php
class Tarea
{
    private $titulo = '';
    private $descripcion = '';
    private $estado = '';

    public function __construct (string $titulo, string $descripcion, string $estado) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    public function marcarComoCompletada() {
        $this->estado = 'completada';
    }
    
    public function mostrarDatos() {
        echo $this->titulo;
        echo $this->descripcion;
        echo $this->estado;
    }
    public function getTitulo () {
        return $this->titulo;
    }
    public function getDescripcion () {
        return $this->descripcion;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setTitulo (string $titulo) {
        $this->titulo = $titulo;
    }
    public function setDescripcion (string $descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setEstado(string $estado) {
        $this->estado = $estado;
    }
}
?>