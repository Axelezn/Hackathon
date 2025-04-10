<?php
require_once 'models/User.php';

class ActivityController {
    public function index() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $user = $_SESSION['user'];
        $userModel = new User();
        $rendezVousList = $userModel->getRendezVous($user['id']);

        include 'views/activity.php';
    }
}
