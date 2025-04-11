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
            header('Location: index.php?action=edit_profile');
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
        session_start(); // ← Manquait ici
    
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=signin');
            exit();
        }
    
        $user = $_SESSION['user'];
        $model = new User();
        $model->deleteById($user['id']);
    
        session_destroy();
        header('Location: index.php?action=signin'); // ← Assure-toi que "login" est bien l'action pour la page de connexion
        exit();
    }
    
    public function book() {
    if (!isset($_GET['id'])) {
        header("Location: index.php?action=book");
        exit();
    }

    $barberId = $_GET['id'];
    $barber = $this->userModel->getUserById($barberId);

    if (!$barber || $barber['etat'] != 1) {
        echo "Coiffeur non trouvé.";
        return;
    }

    // Tu peux ajouter un faux planning ici (ex. jours et créneaux disponibles)
    $planning = [
        "Lundi" => ["10:00", "11:00", "14:00"],
        "Mardi" => ["09:00", "13:00", "15:00"],
        "Mercredi" => ["10:00", "16:00"],
    ];

    include __DIR__ . '/../views/booking.php';
}

public function confirmBooking() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=signin");
            exit();
        }

        $data = [
            'client_id' => $_SESSION['user']['id'],
            'coiffeur_id' => $_POST['barber_id'],
            'jour' => $_POST['jour'],
            'heure' => $_POST['heure']
        ];

        if ($this->userModel->createAppointment($data)) {
            header("Location: index.php?action=profile&message=rdv_ok");
        } else {
            echo "Erreur lors de la réservation. Veuillez réessayer.";
        }
    }
}

    
}
