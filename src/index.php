<?php

// Appel de tous les Contrôleurs

// require_once 

$path = $_GET['path'] ?? 'homepage';
$path = filter_var($path, FILTER_SANITIZE_URL);
$path = explode('.', $path);

// Appel en fonction du contrôleur
$controller = ucfirst(path[0]) . 'Controller';
$method = $path[1];

try {
    (new $controller)->$method();
} catch (Exception $e) {
    // Gérer l'erreur
    echo 'Erreur : ' . $e->getMessage();
    die();
}
?>