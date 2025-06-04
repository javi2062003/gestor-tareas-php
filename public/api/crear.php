<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once __DIR__ . '/../../clases/GestorTarea.php';

$gestor = new GestorTarea('../data/registros.json');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (!$input || empty($input['titulo']) || empty($input['descripcion'])) {
    echo json_encode(['error' => 'Faltan datos obligatorios: titulo y descripcion']);
    exit;
}

$tarea = new Tarea($input['titulo'], $input['descripcion'], 'pendiente');
$gestor->agregarTarea($tarea);

echo json_encode([
    'mensaje' => 'Tarea creada correctamente',
    'tarea' => [
        'titulo' => $tarea->getTitulo(),
        'descripcion' => $tarea->getDescripcion(),
        'estado' => $tarea->getEstado(),
    ]
]);
