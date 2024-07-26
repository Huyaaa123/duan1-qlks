<style>
th{
    text-align: center;
}
.themmoi a{
    text-decoration: none;
    font-size: 12px;
}
.themmoi a:hover{
    color: white;
    
}
</style>

<nav class="nav-right">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Danh sách bình luận <span>[ KDH Hotel ]</span></p>
        </div>
        <div class="themmoi">
            <button name="themmoi"><a href="index.php?act=add-binhluan">Thêm</a></button>
        </div>
    </div>
    <div class="display-floor">
        <div class="display-floor_left">
            <p>Hiển thị <select name="floor" id="display-floor">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
            </select> Loại </p>
        </div>
        <div class="display-floor_right">
            <div class="input-group mb-3">
                <button class="btn btn-success" type="submit">Tìm kiếm</button>
                <input type="text" class="form-control" placeholder="Gõ từ khóa">
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>

            
                <th>Mã phòng </th>

                <th>Nội dung </th>
                <th>Người đăng</th>
                <th>Ngày đăng </th>
                <th>Mã phòng đã bình luận</th>

                <th>Thao tác hd</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_binhluan as $binhluan) {
                extract($binhluan);
                $suabl = "index.php?act=update-binhluan&id=" . $id;
                $xoabl = "index.php?act=delete-bl&id=" . $id;

                echo '<tr>
              
                    <td>' . $id . '</td>
                    <td>' . $noi_dung . '</td>
                    <td>' . $Username . '</td>
                    <td>' . $ngay_dang . '</td>
                    <td>' . $maLoaiPhong . '</td>
                    <td>
                        <a href="' . $xoabl . '" onclick="return confirmDelete()"><input type="button" value="Xoá"></a>
                        <a href="' . $suabl . '"><input type="button" value="Sửa"></a>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</nav>
<script>
    function confirmDelete() {
        var result = confirm("Bạn có chắc chắn muốn xóa?");
        if (result) {
            // Thực hiện hành động xóa tại đây
        } else {
            console.log("Hủy bỏ xóa");
            return false;
        }
    }
</script>