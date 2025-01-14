<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController {
    public function index($categoryId) {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
    
        }
        
        // Tüm kategorileri getir
        $categories = $categoryModel->getAll();
        
    
        include_once  '../app/views/category/index.php';

       
    }


    public function add($params) {
        $categoryModel = new Category();
    
        // Form gönderilmiş mi kontrol et
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Formdan gelen kategori adını al
            $name = $_POST['name'] ?? null;
    
            // Kategori adı boş mu kontrol et
            if (!empty($name)) {
                $success = $categoryModel->create(['name' => $name]); // Veritabanına kaydet
                if ($success) {
                    $message = "Kategori başarıyla eklendi!";
                } else {
                    $message = "Kategori eklenirken bir hata oluştu.";
                }
            } else {
                $message = "Kategori adı boş olamaz!";
            }
        }
    
        // Ekleme görünümünü yükle
        include_once __DIR__ . '/../views/category/add.php';
    }
    
    public function store($params) {
        $categoryModel = new Category();
    
        // Form gönderildiyse kategori ekleme işlemini yap
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kullanıcıdan gelen veriyi al ve doğrula
            $name = trim($_POST['name'] ?? ''); // Trim ile boşlukları temizle
    
            // Kategori adını kontrol et
            if (empty($name)) {
                echo "Kategori adı boş olamaz!";
                return;
            }
    
            // Kategori verisini oluştur
            $data = [
                'name' => htmlspecialchars(trim($name)),
            ];
    
            // Veritabanına kaydetme işlemi
            $success = $categoryModel->create($data);
    
            if ($success) {
                // Başarılı yönlendirme
                header("Location: /restaurant_menu/public/Category/index");
                exit;
            } else {
                // Hata mesajı
                echo "Kategori eklenirken bir hata oluştu.";
                return;
            }
        }
    }
    
    
       
    public function edit($params) {
        $categoryModel = new Category();
    
        // GET parametresinden ID'yi
        
        $id = $params['id'] ?? null;
        if (!$id) {
            echo "Kategori ID bulunamadı!";
            return;
        }
    
        // Kategoriyi bul
        $category = $categoryModel->find($id);
        if (!$category) {
            echo "Kategori bulunamadı!";
            return;
        }
    
        // Form gönderildiyse düzenleme işlemini yap
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'name' => $_POST['name']
            ];
    
            $categoryModel->update($data);
    
            // Düzenleme işleminden sonra yönlendirme
            header("Location: /restaurant_menu/public/Category/index");
            exit;
        }
    
        // Düzenleme görünümünü yükle
        include_once __DIR__ . '/../views/category/edit.php';
    }
    public function delete($params) {
        $id = $params['id'] ?? null;
    
        if ($id) {
            $categoryModel = new Category();
    
            // Silme onayı için bir görünüm yükleyin
            $category = $categoryModel->find($id);
    
            if ($category) {
                include_once __DIR__ . '/../views/category/delete.php';
            } else {
                echo "Kategori bulunamadı.";
            }
        } else {
            echo "Geçersiz kategori ID.";
        }
    }
    public function destroy($params) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
        if ($id) {
            $categoryModel = new Category();
            $success = $categoryModel->delete($id);
    
            if ($success) {
                header("Location: /restaurant_menu/public/Category/index");
                exit;
            } else {
                echo "Kategori silinirken bir hata oluştu.";
            }
        } else {
            echo "Geçersiz kategori ID.";
        }
    }
    
    

}
}