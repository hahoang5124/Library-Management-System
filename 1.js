function tinhThanhTien() {
    var dsSach = document.querySelectorAll('table tbody tr');
    var ngayMuon = document.querySelector('#ngayMuon').value;
    var ngayTra = document.querySelector('#ngayTra').value;
    var soNgayMuon = (new Date(ngayTra) - new Date(ngayMuon)) / (24 * 60 * 60 * 1000);
    var tong = 0;
    for (const Sach of dsSach) {
      var gia = Number(sach.querySelector('td:nth-child(4)').innerText.replace = ('đ', ''));
      var tien = gia * soNgayMuon;
      var tong = tong + tien;
      sach.querySelector('td:nth-child(5)').innerText = tien + 'đ';
    }
    document.querySelector('tfood th:nth-child(2)').innerText = tong + 'đ';

  }