<?php
$categoryId = $_GET['id'] ?? null;

if (!$categoryId) {
    echo "Kategori ID'si bulunamadı!";
    exit;
}
?>

<h1>Yeni Ürün Ekle</h1>
<form method="POST" action="/restaurant_menu/public/Items/store">
    <!-- Kategori ID'si gizli input -->
    <input type="hidden" name="category_id" value="<?= htmlspecialchars($categoryId) ?>">
    
    <div class="mb-3">
        <label for="name" class="form-label">Ürün Adı</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Fiyat</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Açıklama</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Ekle</button>
</form>
<a href="/restaurant_menu/public/Category/index?categoryId=<?= htmlspecialchars($categoryId) ?>" class="btn btn-secondary">Geri Dön</a>
