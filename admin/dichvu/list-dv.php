<style>
th {
    text-align: center;
}

.themmoi a {
    text-decoration: none;
    font-size: 12px;
}

.themmoi a:hover {
    color: white;

}
</style>

<nav class="nav-right">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Danh sách loại dịch vụ <span>[ KDH Hotel ]</span></p>
        </div>
        <div class="themmoi">
            <button name="themmoi"><a href="index.php?act=add-dv">Thêm</a></button>
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
                <th>ID</th>
                <th>Tên dịch vụ</th>
                <th>Hình ảnh dịch vụ</th>
                <th>Mô tả dịch vụ</th>
                <th>Thời gian hoạt động</th>
                <th>Giá tiền dịch vụ</th>
                <th>Thao tác hd</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_dv as $listdv) {
                extract($listdv);
                $suadv = "index.php?act=update-dv&id=" . $id;
                $xoadv = "index.php?act=delete-dv&id=" . $id;

                // Kiểm tra xem tệp tin hình ảnh có tồn tại hay không
                if (is_file("../image/" . $image)) {
                    $imageHTML = '<img src="../image/' . $image . '" height="80">';
                } else {
                    $imageHTML = "No photo";
                }

                echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $imageHTML . '</td>
                    <td>' . $mota . '</td>
                    <td>' . $time . '</td>
                    <td>' . $price . '</td>
                    <td>
                        <a href="' . $xoadv . '" onclick="return confirmDelete()"><input type="button" value="Xoá"></a>
                        <a href="' . $suadv . '"><input type="button" value="Sửa"></a>
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