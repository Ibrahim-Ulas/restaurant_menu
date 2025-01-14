<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Düzenle</title>
</head>
<body>
    <h1>Kategori Düzenle</h1>
    <form action="" method="POST">
        <label for="name">Kategori Adı:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
        <button type="submit">Kaydet</button>
    </form>
    <a href="/restaurant_menu/public/Category/index">Kategorilere Geri Dön</a>
</body>
</html>
