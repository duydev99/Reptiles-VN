-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2022 lúc 07:23 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ttnm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo`
--

CREATE TABLE `bo` (
  `b_id` int(11) NOT NULL,
  `b_bo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bo`
--

INSERT INTO `bo` (`b_id`, `b_bo`, `l_id`) VALUES
(1, 'Bộ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi`
--

CREATE TABLE `gioi` (
  `g_id` int(11) NOT NULL,
  `g_gioi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioi`
--

INSERT INTO `gioi` (`g_id`, `g_gioi`) VALUES
(1, 'Động vật'),
(3, 'Thực vật'),
(4, 'Nấm'),
(5, 'Sinh vật Nguyên sinh'),
(6, 'Vi khuẩn cổ'),
(7, 'Vi khuẩn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho`
--

CREATE TABLE `ho` (
  `h_id` int(11) NOT NULL,
  `h_ho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ho`
--

INSERT INTO `ho` (`h_id`, `h_ho`, `b_id`) VALUES
(1, 'Họ', 1),
(3, 'Họ123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `img_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`img_id`, `img_source`, `mv_id`) VALUES
(7, '1_meme.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `l_id` int(11) NOT NULL,
  `l_lop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ng_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`l_id`, `l_lop`, `ng_id`) VALUES
(1, 'lớp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mauvat`
--

CREATE TABLE `mauvat` (
  `mv_id` int(11) NOT NULL,
  `mv_mat_do_phan_bo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mv_sinh_canh` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mv_dia_diem` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mv_toado_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mv_toado_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mv_toado_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mv_toado_4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mv_toado_5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mv_thoi_gian` datetime NOT NULL,
  `mv_tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa xác định',
  `mv_duyet` bit(1) NOT NULL DEFAULT b'0',
  `sv_id` int(11) NOT NULL,
  `nd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mauvat`
--

INSERT INTO `mauvat` (`mv_id`, `mv_mat_do_phan_bo`, `mv_sinh_canh`, `mv_dia_diem`, `mv_toado_1`, `mv_toado_2`, `mv_toado_3`, `mv_toado_4`, `mv_toado_5`, `mv_thoi_gian`, `mv_tinh_trang`, `mv_duyet`, `sv_id`, `nd_id`) VALUES
(1, 'Phổ biến', 'Rừng tràm khai thác, rừng tràm đặc dụng', 'Rừng Tràm Mỹ Phước, Mỹ Phước, Mỹ Tú, Sóc Trăng.', '9.574483 N, 105.735084 E', '9.563477 N, 105.735868 E', NULL, NULL, NULL, '2022-04-23 08:33:42', 'Thu được mẫu', b'1', 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mota`
--

CREATE TABLE `mota` (
  `mt_id` int(11) NOT NULL,
  `mt_mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mota`
--

INSERT INTO `mota` (`mt_id`, `mt_mota`) VALUES
(1, 'Mô tả đặc điểm hình thái'),
(2, 'Mô tả đặc điểm sinh thái'),
(3, 'Tình trạng bảo tồn theo IUCN'),
(4, 'Tình trạng bảo tồn theo sách đỏ Việt Nam'),
(5, 'Tình trạng bảo tồn theo Nghị định 32/2006/NĐCP'),
(6, 'Tình trạng bảo tồn theo CITES (40/2013/TT-BNNPTNT)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mota_sinhvat`
--

CREATE TABLE `mota_sinhvat` (
  `mtsv_id` int(11) NOT NULL,
  `mt_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `mota` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mota_sinhvat`
--

INSERT INTO `mota_sinhvat` (`mtsv_id`, `mt_id`, `sv_id`, `mota`) VALUES
(7, 4, 2, 'Không có giá trị bảo tồn'),
(8, 1, 2, 'Kích thước lớn, chân và tay tương đối ngắn, ngón chân có màng bao phủ gần như hoàn toàn, đầu ngón không có đĩa ngón, hơi phồng ở đầu ngón; không có củ bàn trong ở chân, khoảng 10 hàng nếp gấp da trên lưng, gian ổ mắt nhỏ hơn nhiều so với chiều rộng mi mắt trên.'),
(9, 3, 2, 'LC (Least concern)'),
(10, 2, 2, 'Ếch đồng là loài phổ biến trong khu vực rừng tràm Mỹ Phước; được tìm thấy nhiều vào mùa mưa, đặc biệt vào đầu mùa mưa. Ếch đồng sinh sản vào đầu mùa mưa, con đực phát âm thanh to thu hút con cái. Ếch đực và ếch cái có hiện tượng \"bắt cặp\" khi giao phối. Trong khu vực rừng tràm Mỹ Phước, ếch đồng được tìm thấy trong sinh cảnh rừng tràm khai thác và rừng tràm đặc dụng.'),
(11, 5, 2, 'Không nằm trong danh mục bảo tồn'),
(12, 6, 2, 'Không có trong danh mục');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh`
--

CREATE TABLE `nganh` (
  `ng_id` int(11) NOT NULL,
  `ng_nganh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh`
--

INSERT INTO `nganh` (`ng_id`, `ng_nganh`, `g_id`) VALUES
(1, 'Thân lỗ', 1),
(3, 'Ruột khoang', 1),
(4, 'Giun dẹp', 1),
(5, 'Giun tròn', 1),
(6, 'Giun đốt', 1),
(7, 'Thân mềm', 1),
(8, 'Chân khớp', 1),
(9, 'Da gai', 1),
(10, 'Nửa dây sống', 1),
(11, 'cá miệng tròn', 1),
(12, 'cá sụn', 1),
(13, 'cá xương', 1),
(14, 'lưỡng cư', 1),
(15, 'bò sát', 1),
(16, 'chim', 1),
(17, 'thú', 1),
(18, 'Rêu', 3),
(19, 'Quyết', 3),
(20, 'Hạt trần', 3),
(21, 'Hạt kín', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_id` int(11) NOT NULL,
  `nd_ho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_tai_khoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_loai` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nd_id`, `nd_ho_ten`, `nd_tai_khoan`, `nd_mat_khau`, `nd_loai`) VALUES
(1, 'Pham Thanh Duy', 'admin', '202cb962ac59075b964b07152d234b70', b'1'),
(5, 'Pham Thanh Duy', 'demo', '202cb962ac59075b964b07152d234b70', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvat`
--

CREATE TABLE `sinhvat` (
  `sv_id` int(11) NOT NULL,
  `sv_ten_khoahoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sv_ten_tiengviet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sv_ten_dia_phuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sv_giatri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa xác định',
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvat`
--

INSERT INTO `sinhvat` (`sv_id`, `sv_ten_khoahoc`, `sv_ten_tiengviet`, `sv_ten_dia_phuong`, `sv_giatri`, `h_id`) VALUES
(2, 'Hoplobatrachus rugulosus (Wiegmann, 1834)', 'Ếch đồng', 'Ếch', 'Chưa xác định', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`video_id`, `video_source`, `mv_id`) VALUES
(6, '1_SampleVideo_1280x720_1mb.mp4', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bo`
--
ALTER TABLE `bo`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Chỉ mục cho bảng `gioi`
--
ALTER TABLE `gioi`
  ADD PRIMARY KEY (`g_id`);

--
-- Chỉ mục cho bảng `ho`
--
ALTER TABLE `ho`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `mv_id` (`mv_id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `ng_id` (`ng_id`);

--
-- Chỉ mục cho bảng `mauvat`
--
ALTER TABLE `mauvat`
  ADD PRIMARY KEY (`mv_id`),
  ADD KEY `sv_id` (`sv_id`),
  ADD KEY `ng_id` (`nd_id`);

--
-- Chỉ mục cho bảng `mota`
--
ALTER TABLE `mota`
  ADD PRIMARY KEY (`mt_id`);

--
-- Chỉ mục cho bảng `mota_sinhvat`
--
ALTER TABLE `mota_sinhvat`
  ADD PRIMARY KEY (`mtsv_id`),
  ADD KEY `mt_id` (`mt_id`),
  ADD KEY `sv_id` (`sv_id`);

--
-- Chỉ mục cho bảng `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`ng_id`),
  ADD KEY `g_id` (`g_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_id`);

--
-- Chỉ mục cho bảng `sinhvat`
--
ALTER TABLE `sinhvat`
  ADD PRIMARY KEY (`sv_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `mv_id` (`mv_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bo`
--
ALTER TABLE `bo`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `gioi`
--
ALTER TABLE `gioi`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ho`
--
ALTER TABLE `ho`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mauvat`
--
ALTER TABLE `mauvat`
  MODIFY `mv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mota`
--
ALTER TABLE `mota`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `mota_sinhvat`
--
ALTER TABLE `mota_sinhvat`
  MODIFY `mtsv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nganh`
--
ALTER TABLE `nganh`
  MODIFY `ng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sinhvat`
--
ALTER TABLE `sinhvat`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bo`
--
ALTER TABLE `bo`
  ADD CONSTRAINT `bo_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `lop` (`l_id`);

--
-- Các ràng buộc cho bảng `ho`
--
ALTER TABLE `ho`
  ADD CONSTRAINT `ho_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bo` (`b_id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`mv_id`) REFERENCES `mauvat` (`mv_id`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`ng_id`) REFERENCES `nganh` (`ng_id`);

--
-- Các ràng buộc cho bảng `mauvat`
--
ALTER TABLE `mauvat`
  ADD CONSTRAINT `mauvat_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvat` (`sv_id`),
  ADD CONSTRAINT `mauvat_ibfk_2` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`);

--
-- Các ràng buộc cho bảng `mota_sinhvat`
--
ALTER TABLE `mota_sinhvat`
  ADD CONSTRAINT `mota_sinhvat_ibfk_1` FOREIGN KEY (`mt_id`) REFERENCES `mota` (`mt_id`),
  ADD CONSTRAINT `mota_sinhvat_ibfk_2` FOREIGN KEY (`sv_id`) REFERENCES `sinhvat` (`sv_id`);

--
-- Các ràng buộc cho bảng `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `gioi` (`g_id`);

--
-- Các ràng buộc cho bảng `sinhvat`
--
ALTER TABLE `sinhvat`
  ADD CONSTRAINT `sinhvat_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `ho` (`h_id`);

--
-- Các ràng buộc cho bảng `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`mv_id`) REFERENCES `mauvat` (`mv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
