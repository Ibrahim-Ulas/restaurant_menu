<h1 class="mb-4">Ürünler</h1>
<?php if (!empty($items)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ürün Adı</th>
                <th>Fiyat</th>
                <th>Açıklama</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['price']) ?> TL</td>
                    <td><?= htmlspecialchars($item['description']) ?></td>
                    <td>
                        <a href="/restaurant_menu/public/Items/edit?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Düzenle</a>
                        <a href="/restaurant_menu/public/Items/delete?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-muted">Bu kategoride ürün bulunmamaktadır.</p>
<?php endif; ?>

<?php if (isset($categoryId)): ?>
    <a href="/restaurant_menu/public/Items/add?categoryId=<?= htmlspecialchars($categoryId) ?>" class="btn btn-primary">Yeni Ürün Ekle</a>
    <?php endif; ?>
    <br>
    <a href="/restaurant_menu/public/Category/index" class="btn btn-primary">Kategorilere Geri Dön</a>


