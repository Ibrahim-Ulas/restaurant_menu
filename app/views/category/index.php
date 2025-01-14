<h1 class="mb-4">Kategoriler</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Kategori Adı</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <td><a href="/restaurant_menu/public/Items/index?categoryId=<?= $category['id'] ?>">Ürünleri Gör</a></td></td>
                <td>   
                    <a href="/restaurant_menu/public/Category/edit?id=<?= $category['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm ('Bu kategoriyi silmek istediğinizden emin misiniz?')">Düzenle</a>
                    <a href="/restaurant_menu/public/Category/delete?id=<?= $category['id'] ?>" class="btn btn-danger btn-sm">Sil</a>
                </td>
                <td><a href="/restaurant_menu/public/Items/add?id=<?= $category['id'] ?>" class="btn btn-primary">Yeni Ürün Ekle</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/restaurant_menu/public/Category/add" class="btn btn-primary">Yeni Kategori Ekle</a>
<br>
<a href="/restaurant_menu/public/home" class="btn btn-primary">Ana Sayfaya Geri Dön</a>
