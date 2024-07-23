<h2>Giỏ sách</h2>
<?php if (isset($_SESSION['thongbao'])) : ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['thongbao'] ?>
    </div>
<?php endif;?>
<form action="<?=$base_url?>book/updateCart" method="post">
<input type="hidden" name="sosachmuon" id="sosachmuon">
<input type="hidden" name="tongtien" id="tongtien">
<div class="row">
  <div class="col-md-6">
    <div class="input-group flex-nowrap">
      <span class="input-group-text">Ngày dự kiến mượn</span>
      <input type="datetime-local" class="form-control" value="<?= $GioSach['NgayMuon'] ?>" name="ngaymuon" id="ngaymuon">
    </div>
  </div>
  <div class="col-md-6">
    <div class="input-group flex-nowrap">
      <span class="input-group-text">Ngày dự kiến trả</span>
      <input type="datetime-local" class="form-control" value="<?= $GioSach['NgayTra'] ?>" name="ngaytra" id="ngaytra" onchange="tinhThanhTien()">
    </div>
  </div>
</div>
<table class="table text-center cart">
  <thead>
    <tr>
      <th>Anh</th>
      <th class="text-start">Tựa sách</th>
      <Th class="text-end">Giá trị</Th>
      <Th class="text-end">Giá mượn</Th>
      <th class="text-end">Thành tiền</th>
      <th class="text-end">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php
    ?>
    <?php foreach ($ctGioSach as $item) :?>
      <tr>
        <td><img src="<?= $base_url ?>upload/product/<?= $item['HinhAnh'] ?>" alt="" class="rounded-3" style="width:50px">
        </td>
        <td class="text-start"><?= $item['TuaSach'] ?></td>
        <td class="text-end"><?= $item['GiaTri'] ?>đ</td>
        <td class="text-end"><?= max($item['GiaTri'] * 0.5 / 100, 500) ?>đ</td>
        <td class="text-end">0đ</td>
        <td>
          <a href="<?=$base_url?>book/removeFromCart/<?=$item['MaSach']?>" class="btn btn-outline-danger btn-sm">xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th class="text-end" colspan="4">TỔNG THÀNH TIỀN:</th>
      <th class="text-end">0đ</th>
      <th><a href="<?=$base_url?>book/removeCart" class="btn btn-outline-danger btn-sm">Xóa hết</a></th>
    </tr>
  </tfoot>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  xac nhan muon
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận mươn</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bằng việc bấm xác nhận, tồi đồng ý với quy định và giá sách.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">tôi đồng ý</button>
      </div>
    </div>
  </div>
</div>
</form>
<script>
  function tinhThanhTien() {
    var dsSach = document.querySelectorAll('table tbody tr');
    var ngayMuon = document.querySelector('#ngaymuon').value;
    var ngayTra = document.querySelector('#ngaytra').value;
    var soNgayMuon = (new Date(ngayTra) - new Date(ngayMuon)) / (24 * 60 * 60 * 1000);
    var tong = 0;
    for (const Sach of dsSach) {
      var gia = Number(Sach.querySelector('td:nth-child(4)').innerText.replace('đ', ''));
      var tien = gia * soNgayMuon;
      tong = tong + tien;
      Sach.querySelector('td:nth-child(5)').innerText = tien + 'đ';
    }
    console.log("check");
    document.querySelector('tfoot th:nth-child(2)').innerText = tong + 'đ';
    document.querySelector('#sosachmuon').value = dsSach.length;
    document.querySelector('#tongtien').value = tong;
  }
</script>