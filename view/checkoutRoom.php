
<div class="checkout-room" id="checkoutRoom">
    <h1>≼ Booked Room ≽</h1>
    <form action="">
        <table>
            <thead>
                <tr>
                    <th>Họ và Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Tên phòng</th>
                    <th>Ngày đặt phòng</th>
                    <th>Ngày trả Phòng</th>
                    <th>Tổng hóa đơn</th>
                    <th>Trạng thái</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($list_datphong as $datphong) {
                    extract($datphong);
                    $xoadp =
                        'index.php?act=deletedatphong&id_customer=' .
                        $id_customer;

                    echo '<tr>
                    <td>' .
                        $customer_name .
                        '</td>
                    <td>' .
                        $customer_email .
                        '</td>
                    <td>' .
                        $customer_phone .
                        '</td>
                        <td>' .
                        $tenPhong .
                        '</td>
                    <td>' .
                        $ngayDatPhong .
                        '</td>
                    <td>' .
                        $ngayBatDauThue .
                        '</td>
                        <td>' .
                        $thanhtien .
                        '</td>
                        <td class="ten_status"> ' .
                        $ten_status  .
                        '</td>
                  
                </tr>';
                } ?>
            </tbody>

        </table>


</div>
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