
                    <h2 class="my-3">Sửa tài khoản</h2>
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
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="sodienthoai" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?=$tk['SoDienThoai']?>">
                        </div>

                        <div class="mb-3">
                            <label for="hoten" class="form-label">họ tên</label>
                            <input type="text" class="form-control" id="hoten" name="hoten" value="<?=$tk['HoTen']?>">
                        </div>

                        <div class="mb-3">
                            <label for="vitien" class="form-label">ví tiền</label>
                            <input type="text" class="form-control" id="vitien" name="vitien" value="<?=$tk['ViTien']?>">
                        </div>

                        <div class="mb-3">
                            <label for="quyen" class="form-label">quyền</label>
                            <select class="form-select" id="quyen" name="quyen" >
                                <option value="0" <?=($tk['Quyen'] == 0)?'selected':''?>>bạn đọc</option>
                                <option value="1" <?=($tk['Quyen'] == 1)?'selected':''?>>quản lý</option>
                                <option value="2"<?=($tk['Quyen'] == 2)?'selected':''?>>quản lý cao cấp</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">xác nhận</button>
                    </form>