<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($data) {
        $query = "INSERT INTO $this->table (nom, prenom, sexe, adresse, email, mdp, num_tel)
                  VALUES (:nom, :prenom, :sexe, :adresse, :email, :mdp, :num_tel)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':sexe', $data['sexe']);
        $stmt->bindParam(':adresse', $data['adresse']);
        $stmt->bindParam(':num_tel', $data['num_tel']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':mdp', $data['mdp']);

        return $stmt->execute();
    }

    public function login($email) {
        $query = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getActiveBarbers() {
        $query = "SELECT * FROM $this->table WHERE etat = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserById($id) {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getRendezVous($userId) {
        $query = "
            SELECT rdv.*, u.nom AS coiffeur_nom, u.prenom AS coiffeur_prenom
            FROM rendez_vous rdv
            JOIN users u ON u.id = rdv.id_coiffeur
            WHERE rdv.id_client = :id_client
            ORDER BY rdv.date DESC
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_client', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateProfile($data) {
        $query = "UPDATE $this->table SET nom = :nom, prenom = :prenom, adresse = :adresse, email = :email, sexe = :sexe, num_tel = :num_tel WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        return $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':adresse' => $data['adresse'],
            ':email' => $data['email'],
            ':sexe' => $data['sexe'],
            ':num_tel' => $data['num_tel'],
            ':id' => $data['id']
        ]);
    }
    
    public function deleteById($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
}
