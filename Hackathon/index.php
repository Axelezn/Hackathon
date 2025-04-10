<?php
require_once __DIR__ . '/controllers/UsersController.php';

$controller = new UserController();
$controller->index();
