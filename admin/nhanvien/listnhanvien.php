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
            <p><i class="fa-solid fa-hotel"></i> Danh sách nhân viên <span>[ KDH Hotel ]</span></p>
        </div>
        <div class="themmoi">
            <button name="themmoi"><a href="index.php?act=addnhanvien">Thêm</a></button>
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
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Chức vụ</th>
                <th>Thao tác</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($listnhanvien as $listnhanvien) {
                extract($listnhanvien);
                // $suanv = 'index.php?act=updatenhanvien&id=' . $manv;
                $xoanv = 'index.php?act=deletenhanvien&manv=' . $manv;

                // Kiểm tra xem tệp tin hình ảnh có tồn tại hay không
                // if (is_file("../image/" . $image)) {
                //     $imageHTML = '<img src="../image/' . $image . '" height="80">';
                // } else {
                //     $imageHTML = "No photo";
                // }

                echo '<tr>
                    <td>' .
                    $manv .
                    '</td>
                    <td>' .
                    $name .
                    '</td>
                    <td>' .
                    $chucvu .
                    '</td>
                    <td>
                        <a href="' .
                    $xoanv .
                    '"><input type="button" value="Xoá"></a>
           
                </tr>';
            } ?>
        </tbody>
    </table>
</nav>
<!-- <script>
function confirmDelete() {
    var result = confirm("Bạn có chắc chắn muốn xóa?");
    if (result) {
        // Thực hiện hành động xóa tại đây
    } else {
        console.log("Hủy bỏ xóa");
        return false;
    }
}
</script> -->