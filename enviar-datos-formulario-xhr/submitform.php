<?php
// fichero en formato json
header('Content-Type: application/json');

$data = $_POST;
echo json_encode($data);