<nav class="nav-right">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Danh sách loại phòng <span>[ KDH Hotel ]</span></p>
        </div>
        <div>
            <button name="themmoi"><i class="fa-solid fa-plus"></i><a href="index.php?act=adddmp">Thêm</a> </button>
        </div>
    </div>
    <div class="display-floor">
        <div class="display-floor_left">
            <p>Hiển thị <select name="floor" id="display-floor">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select> tầng</p>
        </div>
        <div class="display-floor_right">
            <div class="input-group mb-3">
            <form action="index.php?act=listsp" method="post">
                        <input type="text" name="kyw">
                        <input type="submit" name="listok" value="Tìm kiếm">
            </form>

            </div>
        </div>


    </div>
    <div class="table-loaiphong">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã loại phòng</th>
                    <th>Loại Phòng</th>
                    <th>Đơn giá</th>
                    <th>Mô tả</th>
                    <th style="width: 100px;">Thao tác</th>

                </tr>
            <tbody>
                <?php
                foreach ($listloaiphong as $loaiphong) {
                    extract($loaiphong);
                    $suadm = "index.php?act=updatedmp&maLoaiPhong=" . $maLoaiPhong;
                    $xoaPhong = "index.php?act=xoadmp&maLoaiPhong=" . $maLoaiPhong;
                    echo '<tr>
                                    <td>' . $maLoaiPhong . '</td>
                                    <td>' . $tenLoaiPhong . '</td>
                                    <td>' . $donGia . '</td>
                                    <td>' . $ghiChu . '</td>
                                    <td>
                                        <a href="' . $suadm . '"> <input type="button" value="Sửa"> </a>
                                        <a href="' . $xoaPhong . '"><input type="button" value="Xoá"></a>
                                    </td>
                            </tr>';
                }
                ?>
                <!-- <td>
                                     <a href="'.$suadm.'"><input type="button" value="Sửa"></a> 
                                     <a href="'.$xoadm.'"><input type="button" value="Xoá"></a>
                                </td> -->
                <a href=""></a>
            </tbody>
        </table>
    </div>
</nav>

</div>