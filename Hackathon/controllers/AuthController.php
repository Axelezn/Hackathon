<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
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

            if ($this->user->register($data)) {
                header("Location: index.php?action=signin");
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

            $user = $this->user->login($email);

            if ($user && password_verify($mdp, $user['mdp'])) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: index.php");
                exit();
            } else {
                $error = "Identifiants incorrects.";
            }
        }

        require __DIR__ . '/../views/auth/signin.php';
    }
}
