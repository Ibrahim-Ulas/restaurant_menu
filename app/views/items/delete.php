<?php if (!$item): ?>
    <p>Ürün bulunamadı veya silinmiş olabilir.</p>
<?php else: ?>
    <h3>Bu ürünü silmek istediğinizden emin misiniz?</h3>
    <p>Ürün Adı: <?= htmlspecialchars($item['name']) ?></p>
    <form action="/restaurant_menu/public/Items/delete" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
    <p>Bu ürünü silmek istediğinizden emin misiniz? </p>
    <button type="submit" class="btn btn-danger">Evet, Sil</button>
</form>

<?php endif; ?>
