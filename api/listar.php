<?php

header('Content-Type: application/json');

require_once '../clases/GestorTarea.php';

$gestor = new GestorTarea('../data/registros.json');

$tareas = $gestor->obtenerTareas();

echo json_encode($tareas);
