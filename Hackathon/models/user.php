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
            SELECT * FROM rendez_vous WHERE client_id = :client_id
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':client_id', $userId);
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
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }

    public function createAppointment($data) {
        $sql = "INSERT INTO rendez_vous (client_id, coiffeur_id, jour, heure) 
                VALUES (:client_id, :coiffeur_id, :jour, :heure)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'client_id' => $data['client_id'],
            'coiffeur_id' => $data['coiffeur_id'],
            'jour' => $data['jour'],
            'heure' => $data['heure'],
        ]);
    }
    
    
}
