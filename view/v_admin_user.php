
                    <a href="<?=$base_url?>admin/user/add" class="btn btn-success float-end">thêm tài khoản</a>
                    <h2 class="my-3">tài khoản</h2>
                    <table class="table text-center align-middle">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th class="text-start">Họ tên</th>
                                <th>số điện thoại</th>
                                <th>quyền</th>
                                <th class="text-end">hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dsTK as $user) :?>
                                <tr>
                                <td><?=$user['MaTK']?></td>
                                <td><img src="<?= $base_url ?>upload/avatar/<?= $user['HinhAnh'] ?>" style="width: 40px; height: 40px;" class="rounded-2">
                                </td>
                                <td class="text-start"><?=$user['HoTen']?></td>
                                <td><?=$user['SoDienThoai']?></td>
                                <td><span class="badge text-bg-danger">
                                    <?php
                                        switch ($user['Quyen']) {
                                            case '0':
                                                echo "Đọc giả";
                                            break;
                                            case '1':
                                                echo "Quản lý";
                                            break;
                                            case '2':
                                                echo "Quản lý cao cấp";
                                            break;
                                            
                                            default:
                                            # code...
                                            break;
                                        }
                                        ?> 
                                <td class="text-end">
                                    <a href="<?=$base_url?>admin/user/edit/<?=$user['MaTK']?>" class="btn btn-warning">sửa</a>
                                    <a href="<?=$base_url?>admin/user/delete/<?=$user['MaTK']?>" class="btn btn-danger">xóa</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>