<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Item {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public static function findByCategoryId($categoryId) {
        $db = Database::getInstance();
        $stmt = $db->prepare('SELECT * FROM items WHERE category_id = :category_id');
        $stmt->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $db = Database::getInstance();
        $sql = "INSERT INTO items (category_id, name, price, description) VALUES (:category_id, :name, :price, :description)";
        $stmt = $db->prepare($sql);
        return $stmt->execute($data);
    }

    public function find($id) {
   
        $sql = "SELECT * FROM items WHERE id = :id";
        $stmt = Database::getInstance()->prepare($sql);
        $stmt->execute(['id' => $id]);


        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function getAllByCategory($categoryId) {
        $sql = "SELECT * FROM items WHERE category_id = :category_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['category_id' => $categoryId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE items 
                SET name = :name, price = :price, description = :description, category_id = :category_id 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'id' => $data['id'],
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM items WHERE id = :id";
        $stmt = Database::getInstance()->prepare($sql);
        $stmt->execute(['id' => $id]); // Burada $id bir dize ya da tam sayı olmalı.
        return $stmt->rowCount() > 0;
    }
    
    public function deleteById($id) {
        $sql = "DELETE FROM items WHERE id = :id";
        $stmt = Database::getInstance()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    
}
