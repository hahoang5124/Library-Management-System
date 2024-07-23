<div class="col-md-12">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= $base_url ?>upload/product/<?= $CTSach['HinhAnh'] ?>" class="w-100">
        </div>
        <div class="col-md-7">
            <h2><?= $CTSach['TuaSach'] ?></h2>
            <div class="row">
                <div class="col-md-6">
                    Nhà cung cấp: <strong>Đông A</strong> <br>

                    Nhà xuất bản : <strong>Hội Nhà Văn</strong>
                </div>
                <div class="col-md-6">
                    Tác giả:<strong><?= $CTSach['TacGia'] ?></strong> <br>
                    chủ đề:<strong><?= $CTSach['TenChuDe'] ?> </strong>
                </div>
            </div>
            <div class="text-danger fs-1"><?= $CTSach['GiaTri'] ?></div>
            <small>còn <strong><?= $CTSach['SoLuong'] ?></strong>cuốn trong thư viện</small> <br>

            <a class="btn btn-outline-primary btn-lg" href="<?= $base_url ?>book/addToCart/<?= $CTSach['MaSach'] ?>">Muon Sach</a>
            <?php if (isset($_SESSION['thongbao'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['thongbao'] ?>
                </div>
            <?php endif;
            unset($_SESSION['thongbao']); ?>
            <?php if (isset($_SESSION['loi'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['loi'] ?>
                </div>
            <?php endif;
            unset($_SESSION['loi']); ?>
            <hr>
            <p class="my-3"><?= $CTSach['MoTa'] ?>
            </p>
        </div>
    </div>
    <h2> có thể bạn thích đọc</h2>
    <div class="row">
        <!-- item -->
        <?php foreach ($dsNgauNhienCungChuDe as $sach) : ?>
            <div class="col-md-3 col-sm-6">
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
    <h2>cảm nghỉ của các bạn đọc</h2>
    <div class="row">
        <div class="col-sm-3">
            <strong>Hoàng Nhật Hà</strong><br>
            12:00 29/9/2023 <br>
            <strong>đã mượn:</strong> 1
        </div>
        <div class="col-sm-9">
            Tôi cũng không hiểu tại dao tôi lại chọn cuốn sách này để đọc. V cơ bản thì nó chưa có tác dụng gì với
            tôi cho lắm. Vì .. tôi chưa có gia đình. Đùa thôi. Quyển sách này là một trong những tác phẩm rất hữu
            ích với bất kỳ ai. Nó khiến cho bạn hiểu rõ thêm về người bạn khác giới, người chồng,... của mình. Những
            "bí ẩn" khó hiểu của 2 phái sẽ dần được phơi bày và sáng tỏ. Đọc xong tác phẩm, một cách khách quan, tôi
            đã học được nhiều điều. Sự khoan dung cần thiết, cáu nhìn rộng rãi để có thể tha thứ. Nhiều khi còn học
            được những "bí quyết định tồn" để không làm hỏng việc hoặc vỗ giận "người ấy". Nói chung, một cuốn sách
            rất hay để bạn dồn thời gian vào nó, nhìn giá hơi đắt nhưng số với lượng kiến thức được cũng cấp lại vô
            cùng hợp lý
        </div>
        <hr>
        <div class="col-sm-3">
            <strong>Hoàng Nhật Hà</strong><br>
            12:00 29/9/2023 <br>
            <strong>đã mượn:</strong> 1
        </div>
        <div class="col-sm-9">
            Tôi cũng không hiểu tại dao tôi lại chọn cuốn sách này để đọc. V cơ bản thì nó chưa có tác dụng gì với
            tôi cho lắm. Vì .. tôi chưa có gia đình. Đùa thôi. Quyển sách này là một trong những tác phẩm rất hữu
            ích với bất kỳ ai. Nó khiến cho bạn hiểu rõ thêm về người bạn khác giới, người chồng,... của mình. Những
            "bí ẩn" khó hiểu của 2 phái sẽ dần được phơi bày và sáng tỏ. Đọc xong tác phẩm, một cách khách quan, tôi
            đã học được nhiều điều. Sự khoan dung cần thiết, cáu nhìn rộng rãi để có thể tha thứ. Nhiều khi còn học
            được những "bí quyết định tồn" để không làm hỏng việc hoặc vỗ giận "người ấy". Nói chung, một cuốn sách
            rất hay để bạn dồn thời gian vào nó, nhìn giá hơi đắt nhưng số với lượng kiến thức được cũng cấp lại vô
            cùng hợp lý
        </div>
    </div>