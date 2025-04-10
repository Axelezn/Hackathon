<?php

require_once 'models/User.php';

class ProfileController {
    public function delete() {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $userId = $_SESSION['user']['id'];
        $userModel = new User();
        $userModel->deleteById($userId);

        // On détruit la session après suppression
        session_destroy();

        header('Location: index.php?action=login');
        exit();
    }
}
?>
