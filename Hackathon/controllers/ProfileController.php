<?php
require_once 'models/User.php';

class ProfileController {
    public function editProfile() {

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $user = $_SESSION['user'];
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $user['id'], // ✅ correction ici
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'sexe' => $_POST['sexe'],
                'adresse' => $_POST['adresse'],
                'email' => $_POST['email'],
                'num_tel' => $_POST['num_tel']
            ];

            $userModel->updateProfile($data);

            // Mettre à jour la session
            $_SESSION['user'] = $userModel->getUserById($user['id']);

            header('Location: index.php?action=profile');
            exit();
        }

        // Charger les infos pour pré-remplir le formulaire
        $user = $userModel->getUserById($user['id']);
        include 'views/edit_profile.php';
    }
}
