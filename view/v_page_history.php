<h2>lịch sử</h2>
<table class="table">
  <thead>
    <tr>
      <th>Mã mượn sách</th>
      <th>Ngày mượn</th>
      <th>Ngày trả</th>
      <th>Số sách mượn</th>
      <th>Tổng tiền</th>
      <th>Trạng thái</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dsLichSu as $ls): ?>
      <tr>
      <td><?=$ls['MaLS']?></td>
      <td><?=$ls['NgayMuon']?></td>
      <td><?=$ls['NgayTra']?></td>
      <td><?=$ls['SoSachMuon']?></td>
      <td><?=$ls['TongTien']?></td>
      <td>
        <?php
        switch ($ls['TrangThai']) {
          case 'chuan-bi':
            echo ('<span class="badge rounded-pill text-bg-primary">Đang chờ</span>');
            break;
          case 'da-muon':
            echo ('<span class="badge rounded-pill text-bg-primary">Đã mượn</span>');
            break;
          case 'da-tra':
            echo ('<span class="badge rounded-pill text-bg-primary">Đã trả</span>');
            break;
          
          default:
            # code...
            break;
        }
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>