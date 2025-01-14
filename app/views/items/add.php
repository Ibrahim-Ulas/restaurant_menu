<?php
$categoryId = $_GET['id'] ?? null;

if (!$categoryId) {
    echo "Kategori ID'si bulunamadı!";
    exit;
}
?>

<h1>Yeni Ürün Ekle</h1>
<form action="/restaurant_menu/public/Items/add?categoryId=<?= htmlspecialchars($categoryId) ?>" method="post">
    <input type="hidden" name="category_id" value="<?= htmlspecialchars($categoryId) ?>">
    <div class="form-group">
        <label for="name">Ürün Adı:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Fiyat:</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Açıklama:</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ürünü Kaydet</button>
</form>

<a href="/restaurant_menu/public/Category/index?categoryId=<?= htmlspecialchars($categoryId) ?>" class="btn btn-secondary">Geri Dön</a>
