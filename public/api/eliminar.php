<?php
header('Content-Type: application/json');
require_once '../clases/GestorTarea.php';

$gestor = new GestorTarea('../data/registros.json');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (!$input || empty($input['titulo'])) {
    echo json_encode(['error' => 'Indica un título.']);
    exit;
}

$exito = $gestor->eliminarTareaPorTitulo($input['titulo']);

if ($exito) {
    echo json_encode(['mensaje' => 'Tarea marcada como completada']);
} else {
    echo json_encode(['error' => 'No se encontró ninguna tarea con ese título']);
}
?>