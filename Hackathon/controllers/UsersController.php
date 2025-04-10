<?php
require_once __DIR__ . '/../models/User.php';

class UsersController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'sexe' => $_POST['sexe'],
                'adresse' => $_POST['adresse'],
                'email' => $_POST['email'],
                'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT)
            ];

            if ($this->userModel->register($data)) {
                $user = $this->userModel->login($data['email']);
                $_SESSION['user'] = $user;
                header("Location: index.php");
                exit();
            } else {
                $error = "Erreur lors de l'inscription.";
            }
        }

        require __DIR__ . '/../views/auth/signup.php';
    }

    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];

            $user = $this->userModel->login($email);

            if ($user && password_verify($mdp, $user['mdp'])) {
                $_SESSION['user'] = $user;
                header("Location: index.php");
                exit();
            } else {
                $error = "Identifiants incorrects.";
            }
        }

        require __DIR__ . '/../views/auth/signin.php';
    }

    public function home() {
        require __DIR__ . '/../views/home.php';
    }
}
