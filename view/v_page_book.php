<h2 class="text-info">sách nổi bật</h2>
<div class="row">
    <?php foreach ($dsGhim as $sach) : ?>
        <div class="col-sm-3 mb-3">
            <div class="card">
                <img src="<?= $base_url ?>upload/product/<?= $sach['HinhAnh'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $sach['TuaSach'] ?></h5>
                    <p class="card-text"><?= $sach['GiaTri'] ?>

                    </p>
                    <a href="<?= $base_url ?>book/detail/<?= $sach['MaSach'] ?>" class="btn btn-primary">Mượn</a>
                </div>
            </div>

        </div>
    <?php endforeach; ?>

</div>
