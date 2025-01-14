<?php

namespace App\Controllers;

use App\Models\Item;
use App\Models\Category;

class ItemController {
    public function index($params) {
        $categoryId = $params['categoryId'] ?? null;
        if (!$categoryId) {
            echo "Kategori ID bulunamadı!";
            echo '<br><a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>';
            return;
        }
    
        $itemsModel = new Item();
        $items = $itemsModel->getAllByCategory($categoryId);
    
        if ($items === false || empty($items)) {
            echo "Bu kategoride ürün bulunmamaktadır.";            
            echo '<br><a href="/restaurant_menu/public/Items/add?id='.htmlspecialchars($categoryId).'" class="btn btn-primary">Yeni Ürün Ekle</a>';
            echo '<br><a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>';
            return;
        }
    
        include_once __DIR__ . '/../views/items/index.php';
    }
    
    public function add($params) {
        // URL'den categoryId al
        $categoryId = $params['categoryId'] ?? null;
    
        if (!$categoryId || !is_numeric($categoryId)) {
            echo "Kategori ID bulunamadı veya geçersiz!";
            echo '<br><a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>';
            return;
        }
    
        // Eğer POST isteği geldiyse ürünü kaydet
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'category_id' => $categoryId, // Kategori ID buradan alınır
            ];
    
            $itemModel = new Item();
            $success = $itemModel->create($data);
    
            if ($success) {
                header("Location: /restaurant_menu/public/Items/index?categoryId=" . $categoryId);
                exit;
            } else {
                echo "Ürün eklenirken bir hata oluştu!";
            }
        }
    
        // Kategori adı kontrolü (isteğe bağlı)
        $categoryModel = new Category();
        $category = $categoryModel->find($categoryId);
    
        if (!$category) {
            echo "Kategori bulunamadı!";
            echo '<br><a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>';
            return;
        }
    
        // Görünüm dosyasını yükle
        include_once __DIR__ . '/../views/items/add.php';
    }
    
    public function store($params) {
        $itemModel = new Item();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'],
                'name'        => $_POST['name'],
                'price'       => $_POST['price'],
                'description' => $_POST['description'],
            ];
    
            // Ürünü veritabanına ekle
            $itemModel->create($data);
    
            // İşlem sonrası ilgili kategoriye geri yönlendir
            header("Location: /restaurant_menu/public/Items/index?categoryId=" . $data['category_id']);
            exit;
        }
    }
    
    public function edit($id) {
        $itemModel = new Item();
        $item = $itemModel->find($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'category_id' => $_POST['category_id'],
            ];
            $itemModel->update($data);
    
            header("Location: /restaurant_menu/public/Items/index?categoryId=" . $_POST['category_id']);
            exit;
        }
    
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
    
        include_once __DIR__ . '/../views/items/edit.php';
    }

    public function delete() {
        // ID'yi hem POST hem de GET'ten almayı deneyin
        $id = $_POST['id'] ?? ($_GET['id'] ?? null);
    
        if (!$id) {
            die("Geçersiz ürün ID'si."); // ID yoksa hata döndür
        }
    
    
        $itemModel = new Item();
        $item = $itemModel->find($id);
    
        // Ürün bulunamadıysa hata verin
        if (!$item) {
            die("Ürün bulunamadı veya silinmiş olabilir.");
        }
    
        // POST ile form gönderildiyse silme işlemini yap
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $itemModel->deleteById($id);
    
            if ($success) {
                header("Location: /restaurant_menu/public/Items/index?categoryId=" . $item['category_id']);
                exit;
            } else {
                die("Ürün silinirken bir hata oluştu.");
            }
        }
    
        include_once __DIR__ . '/../views/items/delete.php';
    }
    
    
    
    
    public function destroy($params) {
die("Debug: Gelen veriler kontrol ediliyor.");

        // POST kontrolü
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $params['id'] ?? null;
    
            // ID doğrulaması
            if (!$id) {
                die("Geçersiz ürün ID'si.");
            }
    
            $itemModel = new Item();
            $item = $itemModel->find($id);
    
            // Hata kontrolü: Ürün mevcut mu?
            if (!$item) {
                die("Ürün bulunamadı veya silinmiş olabilir.");
            }
    
            $success = $itemModel->deleteById($id);
    
            if ($success) {
                // Silme işlemi sonrası yönlendirme
                header("Location: /restaurant_menu/public/Items/index?categoryId=" . $item['category_id']);
                exit;
            } else {
                die("Ürün silinirken bir hata oluştu.");
            }
        }
    }
    
    
    
    
}



