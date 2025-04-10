<?php
require_once __DIR__ . '/../models/Coiffeur.php';

class CoiffeurController {
    public function index() {
        $coiffeurModel = new Coiffeur();
        $coiffeurs = $coiffeurModel->getAll();
        require __DIR__ . '/../views/coiffeurs.php';
    }
}
