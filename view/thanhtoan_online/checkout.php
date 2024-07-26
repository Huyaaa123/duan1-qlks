<!-- checkout.php -->
<html>

<head>
    <title>Thanh toán</title>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AcsHobYlloCKHiAaC05umlZGMWsOOIIXx3VxHjnp7ABcDDXRvbuj-g3IoALDloki_pcF1S-DYBy5pmn5">
    </script>
</head>

<body>
    <form action="index.php?act=chot_bill" method="post">
        <h1>Sản phẩm của bạn</h1>
        <p>Tên sản phẩm: Áo thun</p>
        <p>Giá: $20</p>
        <div id="paypal-button-container"></div>


        <a href="index.php?act=chot_bill"><input type="submit" value="Hoàn tất"></a>
    </form>
    <script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '20.00' // Số tiền thanh toán
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
</body>

</html>