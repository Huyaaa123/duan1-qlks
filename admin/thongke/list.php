<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlykhachsan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Truy vấn SQL để lấy dữ liệu
$sql = "SELECT lp.tenLoaiPhong, COUNT(*) AS SoLuotSuDung
        FROM hoadon hd
        JOIN phong p ON hd.maPhong = p.maPhong
        JOIN loaiphong lp ON p.maLoaiPhong = lp.maLoaiPhong
        GROUP BY lp.tenLoaiPhong
        ORDER BY SoLuotSuDung DESC
        LIMIT 5"; // Giới hạn top 5 loại phòng được sử dụng nhiều nhất

$result = $conn->query($sql);

// Tạo một mảng dữ liệu
$data = array();
$data[] = ['Loại phòng', 'Số lượt sử dụng'];

while ($row = $result->fetch_assoc()) {
    $data[] = [$row['tenLoaiPhong'], (int)$row['SoLuotSuDung']];
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thống kê số lượt sử dụng loại phòng</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

            var options = {
                title: 'Thống kê số lượt sử dụng loại phòng',
                pieHole: 0.4
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div" style="width: 1200px; height: 700px;"></div>
</body>
</html>
