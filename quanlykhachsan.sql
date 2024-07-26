-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2023 lúc 07:55 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noi_dung` text DEFAULT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `maLoaiPhong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noi_dung`, `ngay_dang`, `UserID`, `maLoaiPhong`) VALUES
(1, 'ok', '2023-11-30 15:37:40', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id_customer` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `ngayDatPhong` date DEFAULT NULL,
  `ngayBatDauThue` date DEFAULT NULL,
  `thanhtien` double DEFAULT NULL,
  `status` int(10) NOT NULL,
  `tenPhong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id_customer`, `customer_name`, `customer_email`, `customer_phone`, `ngayDatPhong`, `ngayBatDauThue`, `thanhtien`, `status`, `tenPhong`) VALUES
(185, 'Trần Ngọc Kiên', 'kientnph41341@gmail.com', '2', '2023-12-07', '2023-12-09', 24000000, 2, 'B02'),
(186, 'Trần Ngọc Kiên', 'kientnph41341@gmail.com', '2', '2023-12-08', '2023-12-10', 24000000, 1, 'B01'),
(187, 'fhfh hgh', 'test@gmail.com', '685', '1999-12-11', '1999-12-11', 0, 2, 'B02'),
(188, 'testdk@gmail.com', '0000000072@gmail.com', '365', '1999-11-12', '2000-11-11', 1460000000, 1, 'D01'),
(189, 'testdk@gmail.com', 'admin', '6565', '1236-12-11', '2023-12-12', 3449351945555.6, 1, 'B01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `name`, `mota`, `price`, `time`, `image`) VALUES
(1, 'Dịch vụ phòng', 'ok', 500000, '10h-20h', '../image/hotel1.jpg'),
(2, 'Nhà hàng', 'Cung cấp các món ăn và thức uống cho khách hàng.', 500000, '7:00 AM - 10:00 PM', '../image/food.jpg'),
(3, 'Spa', 'Cung cấp các liệu pháp mát-xa và thư giãn.', 80000, '9:00 AM - 8:00 PM', '../image/spa.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `emp_login`
--

CREATE TABLE `emp_login` (
  `empid` int(100) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL,
  `Emp_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `emp_login`
--

INSERT INTO `emp_login` (`empid`, `Emp_Email`, `Emp_Password`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(10) NOT NULL,
  `tenKhachHang` varchar(255) NOT NULL,
  `ngayDatPhong` date NOT NULL,
  `ngayThanhToan` date DEFAULT NULL,
  `thanhTien` int(11) DEFAULT NULL,
  `maPhong` int(10) NOT NULL,
  `sdt` int(10) NOT NULL,
  `trangThai` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `dichvu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `tenKhachHang`, `ngayDatPhong`, `ngayThanhToan`, `thanhTien`, `maPhong`, `sdt`, `trangThai`, `taikhoan`, `dichvu`) VALUES
(101, 'NguyenHuyHoang', '0000-00-00', '0000-00-00', 3000000, 7, 0, 'xac_nhan', 'huyoppa12022004@gmail.com     ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `maLoaiPhong` int(10) NOT NULL,
  `tenLoaiPhong` varchar(255) NOT NULL,
  `donGia` int(11) NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`maLoaiPhong`, `tenLoaiPhong`, `donGia`, `ghiChu`, `image`) VALUES
(2, 'Delux Room', 10000000, 'abc', '../image/hotel1photo.jpg'),
(3, 'Guest Room', 8000000, 'abc', '../image/hotel2photo.jpg'),
(5, 'Superior Room', 12000000, NULL, '../image/hotel3photo.jpg'),
(6, 'Single Room', 4000000, '', '../image/hotel4photo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `name`, `chucvu`, `Email`, `Password`) VALUES
(1, 'Dương', 'nhân viên 1', 'duong@gmail.com', '1234'),
(2, 'kien', 'Nhân viên 2', 'kien@gmail.com', '1234'),
(3, 'Hùng', 'Nhân viên 3', 'hung@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maPhong` int(10) NOT NULL,
  `tenPhong` varchar(255) NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `tinhTrang` int(10) NOT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `maLoaiPhong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maPhong`, `tenPhong`, `ghiChu`, `tinhTrang`, `checkin`, `checkout`, `maLoaiPhong`) VALUES
(7, 'A01', 'Đầy đủ tiện nghi', 1, NULL, NULL, 2),
(8, 'C01', 'Phòng cao cấp ', 1, NULL, NULL, 3),
(15, 'B02', NULL, 1, NULL, NULL, 5),
(16, 'D01', NULL, 2, NULL, NULL, 6),
(17, 'A02', NULL, 1, NULL, NULL, 2),
(18, 'B01', NULL, 2, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `doanhthu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `name`, `soluong`, `dongia`, `doanhthu`) VALUES
(1, 'Dịch vụ phòng', 15, 100000, 1500000),
(2, 'Nhà hàng', 5, 500000, 2500000),
(3, 'Spa', 4, 80000, 320000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `signup`
--

CREATE TABLE `signup` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `signup`
--

INSERT INTO `signup` (`UserID`, `Username`, `Email`, `Password`) VALUES
(1, 'tranngockien', 'zkienxoo@gmail.com', '123'),
(7, 'huy12345', 'huyoppa12022004@gmail.com', '123123'),
(8, 'huy', 'huy@gmail.com', '123'),
(9, 'test', 'tanchan679@gmail.com', '89da20a8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id_status` int(10) NOT NULL,
  `ten_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id_status`, `ten_status`) VALUES
(1, 'Xác nhận'),
(2, 'Chưa xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id_tinhTrang` int(10) NOT NULL,
  `ten_tinhTrang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`id_tinhTrang`, `ten_tinhTrang`) VALUES
(1, 'Còn phòng'),
(2, 'Hết phòng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `maLoaiPhong` (`maLoaiPhong`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `status` (`status`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `emp_login`
--
ALTER TABLE `emp_login`
  ADD PRIMARY KEY (`empid`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maPhong` (`maPhong`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`maLoaiPhong`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maPhong`),
  ADD KEY `tinhTrang` (`tinhTrang`),
  ADD KEY `maLoaiPhong` (`maLoaiPhong`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UserID`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id_tinhTrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `emp_login`
--
ALTER TABLE `emp_login`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `maLoaiPhong` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `maPhong` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `signup`
--
ALTER TABLE `signup`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id_tinhTrang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `signup` (`UserID`);

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `maPhong` FOREIGN KEY (`maPhong`) REFERENCES `phong` (`maPhong`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `maLoaiPhong` FOREIGN KEY (`maLoaiPhong`) REFERENCES `loaiphong` (`maLoaiPhong`),
  ADD CONSTRAINT `tinhTrang` FOREIGN KEY (`tinhTrang`) REFERENCES `tinhtrang` (`id_tinhTrang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
