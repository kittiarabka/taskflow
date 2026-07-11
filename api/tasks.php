<?php
require_once '../config/config.php';
require_once '../app/Models/Task.php';

header('Content-Type: application/json');

$task = new Task();

echo json_encode($task->all());
