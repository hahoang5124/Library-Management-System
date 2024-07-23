
                    <h2 class="my-3">thêm tài khoản</h2>
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
                            <label for="sodienthoai" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="sodienthoai" name="sodienthoai">
                        </div>

                        <div class="mb-3">
                            <label for="hoten" class="form-label">họ tên</label>
                            <input type="text" class="form-control" id="hoten" name="hoten">
                        </div>

                        <div class="mb-3">
                            <label for="vitien" class="form-label">ví tiền</label>
                            <input type="text" class="form-control" id="vitien" name="vitien">
                        </div>

                        <div class="mb-3">
                            <label for="quyen" class="form-label">quyền</label>
                            <select class="form-select" id="quyen" name="quyen">
                                <option value="0" selected>bạn đọc</option>
                                <option value="1">quản lý</option>
                                <option value="1">quản lý cao cấp</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">xác nhận</button>
                    </form>