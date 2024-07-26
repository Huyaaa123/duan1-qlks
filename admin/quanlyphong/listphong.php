<nav class="nav-right">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Danh sách phòng <span>[ KDH Hotel ]</span></p>
        </div>
        <div>
            <a href="index.php?act=addp"><button><i class="fa-solid fa-plus"></i> Thêm</button></a>
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
            <form action="index.php?act=searchPhong" method="post">
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
                    <th>Mã phòng</th>
                    <th>Tên phòng</th>
                    <th>Loại phòng</th>
                    <th>Mô tả</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>

                </tr>
            <tbody>
                <?php
                foreach ($listphong as $phong) {
                    extract($phong);
                    $suasp = "index.php?act=updatep&maPhong=".$maPhong;
                    $xoaPhong = "index.php?act=xoap&maPhong=".$maPhong;
                    // $hinhpath = "../upload/".$img;
                    // $hinh = "";
                    // if(is_file($hinhpath)){
                    //     $hinh = "<img src='".$hinhpath."' height= '80'>";
                    // }else{
                    //     $hinh = "no photo";
                    // }
                    echo '<tr>
                        <td>'.$maPhong.'</td>
                        <td>'.$tenPhong.'</td>
                        <td>'.$maLoaiPhong.'</td>
                        <td>'.$ghiChu.'</td>
                        <td>'.$ten_tinhTrang.'</td>
                        <td>
                            <a href="'.$suasp.'"><input type="button" value="Sửa"></a>
                            <a href="'.$xoaPhong.'"><input type="button" value="Xoá"></a>
                        </td>
                        </tr>';
                }
                ?>
                                    <!-- <td>
                                     <a href="'.$suadm.'"><input type="button" value="Sửa"></a> 
                                     <a href="'.$xoadm.'"><input type="button" value="Xoá"></a>
                                </td> -->

            </tbody>
        </table>
    </div>
</nav>

</div>
