<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategoriyi Sil</title>
</head>
<body>
<h1>Kategoriyi Sil</h1>
<p><strong><?= htmlspecialchars($category['name']) ?></strong> adlı kategoriyi silmek istediğinize emin misiniz?</p>

<form method="POST" action="/restaurant_menu/public/Category/destroy">
    <input type="hidden" name="id" value="<?= htmlspecialchars($category['id']) ?>">
    <button type="submit" class="btn btn-danger">Evet, Sil</button>
    <a href="/restaurant_menu/public/Category/index" class="btn btn-secondary">İptal</a>
</form>

    <a href="/restaurant_menu/public/Category/index">Kategorilere Geri Dön</a>
</body>
</html>
