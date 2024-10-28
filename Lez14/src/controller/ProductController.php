<?php

namespace App\controller;
use App\Config\Database;
use App\Model\Product;
use App\Repos\ProductDAO;

class ProductController{

    private $db;
    private $productModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->productModel = new ProductDAO($this->db);
    }

    // Creazione di un nuovo oggetto
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'user_id' => $_POST['user_id'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price'],
                'image' => $this->uploadImage()
            ];

            if ($this->productModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
        }
    }
    public function createFromJSON($data) {
            

            if ($this->productModel->create($data)) {
                $this->respond(['message' => 'Oggetto creato con successo']);
            } else {
                $this->respond(['message' => 'Errore nella creazione dell\'oggetto'], 500);
            }
    }

    // Recuperare tutti gli oggetti
    public function read() {
        $result = $this->productModel->read();
        $Products = $result->fetchAll(\PDO::FETCH_ASSOC);
        $this->respond($Products);
    }
    public function readMVC() {
        $result = $this->productModel->read();
        $Products = $result->fetchAll(\PDO::FETCH_OBJ);
        //$this->respond($Products);
        return $Products;
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