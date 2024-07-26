<?php
// Lấy số ngày nhận phòng và trả phòng từ form
$nhanPhong = $_POST['nhanphong']; // Định dạng Y-m-d
$traPhong = $_POST['traphong']; // Định dạng Y-m-d

// Chuyển đổi ngày nhận phòng và trả phòng sang định dạng timestamp
$nhanPhongTimestamp = strtotime($nhanPhong);
$traPhongTimestamp = strtotime($traPhong);

if ($nhanPhongTimestamp !== false && $traPhongTimestamp !== false) {
    // Tính toán số ngày ở bằng cách lấy hiệu của 2 ngày và chia cho số giây trong một ngày
    $diffInSeconds = $traPhongTimestamp - $nhanPhongTimestamp;
    $diffInDays = $diffInSeconds / (60 * 60 * 24);

    // Lấy giá tiền từ form
    $giaTien = trim($_POST['thanhtien']);

    // Tính tổng số tiền cần thanh toán
    $tongTien = $diffInDays * $giaTien;
} else {
    echo "Đã xảy ra lỗi khi xử lý ngày tháng";
}
?>
<div class="order-details">
        <div class="order-info">
            <h5>Thông tin đặt phòng</h5>
            <form action="index.php?act=chot_bill" method="post">
                <div class="customer-details">
                    <div>
                        <input type="hidden" name="id_customer" placeholder="id" value="">
                    </div>
                    <div>
                        <label for="customer-name">Tên người đặt</label><br>
                        <input type="text" name="name" value="<?php if (isset($name) && $name != "") echo $name; ?>">
                    </div>
                    <div>
                        <label for="customer-email">Email</label><br>
                        <input type="text" name="email" value="<?php if (isset($email) && $email != "") echo $email; ?>">
                    </div>
                    <div>
                        <label for="customer-address">Tên phòng</label><br>
                        <input type="text" name="selectBox" value="<?php if (isset($selectBox) && $selectBox != "") echo $selectBox; ?>">
                    </div>
                    <div>
                        <label for="customer-phone">Số điện thoại</label><br>
                        <input type="text" name="sdt" value="<?php if (isset($sdt) && $sdt != "") echo $sdt; ?>">
                    </div>
                    <div>
                        <label for="customer-phone">Thời gian nhận phòng</label><br>
                        <input type="text" name="nhanphong" value="<?php if (isset($nhanphong) && $nhanphong != "") echo $nhanphong; ?>">
                    </div>
                    <div>
                        <label for="customer-phone">Thời gian trả phòng</label><br>
                        <input type="text" name="traphong" value="<?php if (isset($traphong) && $traphong != "") echo $traphong; ?>">
                    </div>
                    <div>
                        <label for="customer-phone">Số ngày ở là</label><br>
                        <input type="text" name="sdt" value="<?php if (isset($diffInDays) && $diffInDays != "") echo $diffInDays; ?>">
                    </div>
                    <div>
                        <label for="customer-phone">Thành tiền</label><br>
                        <input type="text" name="thanhtien" value="<?php if (isset($tongTien) && $tongTien != "") echo $tongTien; ?>">
                    </div>
                </div>
                <div>
                    <h1 class="title-clickpt">Chọn Phương Thức Thanh Toán</h1>
                    <label>
                        <input type="checkbox" name="payment_method" value="online" id="onlineCheckbox"> Thanh toán Online
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="payment_method" value="direct" id="directCheckbox"> Thanh toán Trực
                        Tiếp
                    </label>
                </div>
                <div id="paypal-form" style="display: none;">
                    <h1>Tên phòng :
                        <?php if (isset($selectBox) && $selectBox != "") echo $selectBox; ?>
                    </h1>
                    <p style="color: red;">Ngày nhận phòng: <?= $nhanphong ?></p>
                    <p style="color: red;">Ngày trả phòng: <?= $traphong ?></p>
                    <p><b style="font-size: 20px;">Giá:</b> $<?= $tongTien ?></p>
                    <div id="paypal-button-container"></div>
                </div>

                <a><input id="confirmButton" style="width: 190px;" class="btn btn-primary bookbtn" type="submit" name="cn_orders" value="Đồng ý đặt phòng"></a>
            </form>
        </div>


</div>
</div>
<!-- Thanh toan don gian deo co du lieu gi  -->

<div class="order-actions">

    <script>
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Display the success alert
            alert('Đặt phòng thành công!');

            // Your logic to delete the room using the generated PHP link
            // This will navigate to the delete link after the user dismisses the alert
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Optionally, you can check the response to ensure successful deletion
                    console.log(this.responseText);
                }
            };
            xhttp.open("GET", "<?php echo $xoadp; ?>", true);
            xhttp.send();
        });
    </script>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AcsHobYlloCKHiAaC05umlZGMWsOOIIXx3VxHjnp7ABcDDXRvbuj-g3IoALDloki_pcF1S-DYBy5pmn5">
</script>

<script>
    const onlineCheckbox = document.getElementById('onlineCheckbox');
    const directCheckbox = document.getElementById('directCheckbox');
    const paypalForm = document.getElementById('paypal-form');

    onlineCheckbox.addEventListener('change', function() {
        if (onlineCheckbox.checked) {
            // If online payment is selected, display the PayPal form
            paypalForm.style.display = 'block';
            // Uncheck the direct payment checkbox
            directCheckbox.checked = false;
        } else {
            // If online payment is not selected, hide the PayPal form
            paypalForm.style.display = 'none';
        }
    });

    directCheckbox.addEventListener('change', function() {
        if (directCheckbox.checked) {
            // If direct payment is selected, hide the PayPal form
            paypalForm.style.display = 'none';
            // Uncheck the online payment checkbox
            onlineCheckbox.checked = false;
        }
    });


    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '20.00'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Thanh toán thành công!\nID đơn hàng: ' + details.id);
            });
        }
    }).render('#paypal-button-container');
</script>