<?php

namespace App\controller;
use App\Config\Database;
use App\Model\User;
use App\Repos\UserDAO;

class UserController{

    private $db;
    private $UserModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->UserModel = new UserDAO($this->db);
    }

    // Creazione di un nuovo oggetto
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($this->UserModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
        }
    }
    public function createFromJSON($data) {
            

            if ($this->UserModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
    }

    // Recuperare tutti gli oggetti
    public function read() {
        $result = $this->UserModel->read();
        $Users = $result->fetchAll(\PDO::FETCH_ASSOC);
        $this->respond($Users);
    }
    public function readMVC() {
        $result = $this->UserModel->read();
        $Users = $result->fetchAll(\PDO::FETCH_OBJ);
        //$this->respond($Users);
        return $Users;
    }

    // Upload dell'immagine


    // Risposta JSON
    private function respond($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}