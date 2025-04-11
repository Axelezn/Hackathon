<?php
require_once 'models/User.php';

class ActivityController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $user = $_SESSION['user'];
        $rendezVousList = $this->userModel->getRendezVous($user['id']);

        include 'views/activity.php';
    }
}

?>