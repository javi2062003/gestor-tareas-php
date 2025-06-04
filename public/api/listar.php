<?php

require_once __DIR__ . '/../../clases/GestorTarea.php';


$gestor = new GestorTarea();
header('Content-Type: application/json');

echo json_encode($gestor->obtenerTareasParaJson());



?>