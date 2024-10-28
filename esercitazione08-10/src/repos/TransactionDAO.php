<?php

namespace App\Repos;
class TransactionDAO{
    private $conn;
    private $table = 'transactions';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Creare un nuovo oggetto
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (date, receipt, user_id, description, amount, category) VALUES (:date, :receipt, :user_id, :description, :amount, :category)";
        $stmt = $this->conn->prepare($query);

        // Bind dei parametri
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':receipt', $data['receipt']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':amount', $data['amount']);
        $stmt->bindParam(':category', $data['category']);

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