<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
        $category = Category::find($categoryId);

if (!$category) {
    echo "Kategori bulunamadı!";
    return;
}

$categoryName = $category['name'];
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
    
        // `$data['name']` doğruluğunu kontrol edin
        if (!isset($data['name']) || !is_string($data['name'])) {
            throw new \Exception("Kategori adı geçersiz");
        }
    
        return $stmt->execute(['name' => $data['name']]);
    }
    
    public function update($data) {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = Database::getInstance()->prepare($sql);
        $stmt->execute(['name' => $data['name'], 'id' => $data['id']]);
    }
    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = :id ";
        $stmt = Database::getInstance()->prepare($sql);
        return $stmt->execute(['id'=> $id]);
    }
    
    
}
