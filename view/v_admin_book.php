
                    <a href="<?=$base_url?>admin/book/add" class="btn btn-success float-end">thêm sách mới</a>
                    <h2 class="my-3">sách</h2>
                    <table class="table text-center align-middle">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>hình ảnh</th>
                                <th class="text-start">tựa sách</th>
                                <th class="text-start">tác giả</th>
                                <th class="text-start">giá trị</th>
                                <th>số lượng</th>
                                <th>chủ đề</th>
                                <th>số cảm nghĩ</th>
                                <th>lượt đọc</th>
                                <th>lượt xem</th>
                                <th class="text-end">hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dsSach as $sach) :?>
                                <tr>
                                <td><?=$sach['MaSach']?></td>
                                <td><img src="<?= $base_url ?>upload/product/<?= $sach['HinhAnh'] ?>" class="rownded-2" style="width: 64px; "></td>
                                <td class="text-start"><?=$sach['TuaSach']?></td>
                                <td class="text-start"><?=$sach['TacGia']?></td>
                                <td class="text-start"><?=$sach['GiaTri']?></td>
                                <td><?=$sach['SoLuong']?></td>
                                <td><?=$sach['TenChuDe']?></td>
                                <td><?=$sach['SoCamNghi']?></td>
                                <td><?=$sach['LuotDoc']?></td>
                                <td><?=$sach['LuotXem']?></td>
                                <td class="text-end">
                                    <a class="btn btn-warning" href="<?=$base_url?>admin/book/edit/<?=$sach['MaSach']?>">sửa</a>
                                    <a class="btn btn-danger"href="<?=$base_url?>admin/book/delete/<?=$sach['MaSach']?>">xóa</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>