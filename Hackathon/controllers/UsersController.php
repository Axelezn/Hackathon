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
                'num_tel' => $_POST['num_tel'],
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
        $barbers = $this->userModel->getActiveBarbers();
        require __DIR__ . '/../views/home.php';
    }
    

    public function profile() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=signin");
            exit();
        }
    
        $userId = $_SESSION['user']['id'];
        $user = $this->userModel->getUserById($userId);
    
        require __DIR__ . '/../views/profile.php';
    }
    
    public function editProfile() {
        session_start();
    
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }
    
        $user = $_SESSION['user'];
        $model = new User();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $user['id'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'adresse' => $_POST['adresse'],
                'email' => $_POST['email'],
                'sexe' => $_POST['sexe'],
                'num_tel' => $_POST['num_tel'],
            ];
    
            $model->updateProfile($data);
            $_SESSION['user'] = $model->getUserById($user['id']); // refresh session
            header('Location: index.php?action=profile');
            exit();
        }
    
        include 'views/edit_profile.php';
    }
    
    public function deleteAccount() {
        session_start();
    
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }
    
        $model = new User();
        $model->deleteById($_SESSION['user']['id']);
        session_destroy();
    
        header('Location: index.php?action=login');
        exit();
    }
    
}
