<h2>Thông Tin Cá Nhân</h2>
<div class="row mt-4">
  <div class="col-sm-2"><img src="<?=$base_url?>upload/avatar/<?=$info['HinhAnh']?>" class="rounded float-start" alt="..."></div>
  <div class="col-sm-10">
    <form class="w-50 mx-auto" method="POST" action="">
          <div class="form-outline mb-4">
            <label for="phone" class="form-label">Họ Và Tên</label>
              <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?=$info['HoTen']?>"/>
            </div>
            <div class="form-outline mb-4">
            <label for="phone" class="form-label">Số Điện Thoại</label>
              <input type="text" id="phone" name="SoDienThoai" class="form-control form-control-lg" value="<?=$info['SoDienThoai']?>"/>
            </div>

            <div class="form-outline mb-3">
            <label for="email" class="form-label">email</label>
              <input type="text" id="email" name="email" class="form-control form-control-lg" value="<?=$info['email']?>"/>
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Cập nhật</button>
            </div>

          </form>
  </div>
</div>