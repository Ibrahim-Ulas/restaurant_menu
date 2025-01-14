<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Ekle</title>
</head>
<body>
    <h1>Kategori Ekle</h1>
    <form action="/restaurant_menu/public/Category/store" method="POST">
        <div>
        <label for="name">Kategori Adı:</label>
        <input type="text" class="form-control" id="name" name="name" required>
        <button type="submit">Kaydet</button>

        </div>
   </form> 
   <a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>

        
</body>
</html>
