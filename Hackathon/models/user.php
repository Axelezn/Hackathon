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
        $query = "INSERT INTO $this->table (nom, prenom, sexe, adresse, email, mdp)
                  VALUES (:nom, :prenom, :sexe, :adresse, :email, :mdp)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':sexe', $data['sexe']);
        $stmt->bindParam(':adresse', $data['adresse']);
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
}
