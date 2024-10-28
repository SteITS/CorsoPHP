<?php

namespace App\controller;
use App\Config\Database;
use App\Model\Transaction;
use App\Repos\TransactionDAO;

class TransactionController{

    private $db;
    private $TransactionModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->TransactionModel = new TransactionDAO($this->db);
    }

    // Creazione di un nuovo oggetto
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'date' => $_POST['date'],
                'receipt' => $_POST['receipt'],
                'user_id' => $_POST['user_id'],
                'description' => $_POST['description'],
                'amount' => $_POST['amount'],
                'category' => $_POST['category']
            ];

            if ($this->TransactionModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
        }
    }
    public function createFromJSON($data) {
            

            if ($this->TransactionModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
    }

    // Recuperare tutti gli oggetti
    public function read() {
        $result = $this->TransactionModel->read();
        $Transactions = $result->fetchAll(\PDO::FETCH_ASSOC);
        $this->respond($Transactions);
    }
    public function readMVC() {
        $result = $this->TransactionModel->read();
        $Transactions = $result->fetchAll(\PDO::FETCH_OBJ);
        //$this->respond($Transactions);
        return $Transactions;
    }

    // Upload dell'immagine
    private function uploadImage() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            return $targetFile;
        }
        return null;
    }

    // Risposta JSON
    private function respond($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}