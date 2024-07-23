<h2>lịch sử</h2>
<div class="dropdown mb-4">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Chờ duyệt
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?=$base_url?>admin/accept">Chờ duyệt</a></li>
    <li><a class="dropdown-item" href="<?=$base_url?>admin/accept/success">Đang mượn</a></li>
    <li><a class="dropdown-item" href="<?=$base_url?>admin/accept/returned">Đã trả</a></li>
  </ul>
</div>
<?php foreach ($ls as $item):
  $mhd = $item['MaLS'];
  $list = book_accept($mhd);
  ?>
  <div class="card border-primary mb-4">
  <div class="">
    <h5 class="card-title card-body text-center">Mã hóa đơn: <?=$item['MaLS']?></h5>
  </div>
    <ul class="list-group list-group-flush">
      <table class="table">
        <thead>
          <tr>
            <th class="">Hình ảnh</th>
            <th class="">Tựa sách</th>
            <th class="card-body text-end">Giá trị </th>
          </tr>
        </thead>
        <?php foreach ($list as $item): ?>
        <tbody>
          <tr>
            <td><img src="<?= $base_url ?>upload/product/<?=$item['HinhAnh']?>" alt=""style="width:60px"></td>
            <td><?=$item['TuaSach']?></td>
            <td class="text-end">500đ</td>
          </tr>
        </tbody>
        <?php endforeach;?>
        <tfoot>
          <tr>
            <th>Người mượn: Hoàng Nhật Hà</th>
            <th class="text-end" colspan="4">TỔNG THÀNH TIỀN:</th>
            <th class="text-end">0đ</th>
          </tr>
        </tfoot>
      </table>
    </ul>
  <div class="card-body text-end">
    <a class="btn btn-success" href="<?=$base_url?>admin/accept/accept/<?=$item['MaLS']?>">Chấp nhận</a>
    <a class="btn btn-danger"href="<?=$base_url?>admin/accept/delete/<?=$item['MaLS']?>">Từ chối</a>
  </div>
</div>
<?php endforeach;?>