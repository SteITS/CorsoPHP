<?php

namespace App\Repos;
class ProductDAO{
    private $conn;
    private $table = 'products';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Creare un nuovo oggetto
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (user_id, category_id, name, description, price, image) VALUES (:user_id, :category_id, :name, :description, :price, :image)";
        $stmt = $this->conn->prepare($query);

        // Bind dei parametri
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':image', $data['image']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leggere tutti gli oggetti
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}