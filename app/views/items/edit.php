<h1>Ürünü Düzenle</h1>
<form method="POST">
    <label for="name">Ürün Adı:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
    
    <label for="price">Fiyat:</label>
    <input type="number" name="price" value="<?= htmlspecialchars($item['price']) ?>" required>
    
    <label for="description">Açıklama:</label>
    <textarea name="description" required><?= htmlspecialchars($item['description']) ?></textarea>
    
    <label for="category_id">Kategori:</label>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>" <?= $item['category_id'] == $category['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Kaydet</button>
</form>
<a href="/restaurant_menu/public/Category/index?categoryId=<?= htmlspecialchars($categoryId) ?>" class="btn btn-secondary">Geri Dön</a>

