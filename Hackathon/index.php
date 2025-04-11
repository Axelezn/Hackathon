<?php
session_start();

$action = $_GET['action'] ?? 'home';

// Rediriger vers la connexion si non connecté
if (!isset($_SESSION['user']) && !in_array($action, ['signin', 'signup'])) {
    header('Location: index.php?action=signin');
    exit();
}

// Appeler les bonnes actions
require_once __DIR__ . '/controllers/UsersController.php';
$controller = new UsersController();

switch ($action) {
    case 'signup':
        $controller->signup();
        break;
    case 'signin':
        $controller->signin();
        break;
        case 'profile':
            $controller->profile();
        break;
    case 'home':
        $controller->home();
        break;
    case 'activity':
        require_once 'controllers/ActivityController.php';
        $controller = new ActivityController();
        $controller->index();
        break;
    case 'edit_profile':
        require_once 'controllers/ProfileController.php';
        $controller = new ProfileController();
        $controller->editProfile();
        break;
    case 'delete_account': 
        $controller = new UsersController();
        $controller->deleteAccount();
        break;
        
    case 'confirm_booking':
        $controller->confirmBooking();    
        break;
    case 'book':
        $controller->book();    
        break;
        
    case 'logout':
        session_destroy();
        header('Location: index.php?action=signin');
        exit();
        
    default:
        $controller->home(); // page d'accueil
        break;
}
