-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2019 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(65, '2019_11_19_062628_tb_hocsinh', 1),
(66, '2019_11_19_065941_tb_monhoc', 1),
(67, '2019_11_19_071203_tb_giaovien', 1),
(68, '2019_11_19_072342_tb_lophoc', 1),
(69, '2019_11_19_072604_tb_ctlophoc', 1),
(70, '2019_11_19_072620_tb_ctmonhoc', 1),
(71, '2019_11_19_075656_tb_khenthuongdotxuat', 1),
(72, '2019_11_19_075710_tb_khenthuongthuongnien', 1),
(73, '2019_11_19_080937_tb_ctkqhoctap', 2),
(74, '2019_11_19_080950_tb_ctkqnanglucphamchat', 2),
(79, '2019_11_19_081909_users', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbctkqhoctap`
--

CREATE TABLE `tbctkqhoctap` (
  `mactkqhoctap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mactlophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mamonhoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diemkt` int(11) DEFAULT NULL,
  `mucdatduoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoidiemdanhgia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbctkqhoctap`
--

INSERT INTO `tbctkqhoctap` (`mactkqhoctap`, `mactlophoc`, `mamonhoc`, `diemkt`, `mucdatduoc`, `thoidiemdanhgia`) VALUES
('20190000', '20190013', 'MH01', 0, 'T', 'Giữa kỳ 1'),
('20190001', '20190013', 'MH02', 0, 'T', 'Giữa kỳ 1'),
('20190002', '20190013', 'MH05', 0, 'T', 'Giữa kỳ 1'),
('20190003', '20190013', 'MH06', 0, 'T', 'Giữa kỳ 1'),
('20190004', '20190013', 'MH07', 0, 'T', 'Giữa kỳ 1'),
('20190005', '20190013', 'MH08', 0, 'T', 'Giữa kỳ 1'),
('20190006', '20190013', 'MH09', 0, 'T', 'Giữa kỳ 1'),
('20190007', '20190013', 'MH10', 0, 'T', 'Giữa kỳ 1'),
('20190008', '20190013', 'MH11', 0, 'T', 'Giữa kỳ 1'),
('20190009', '20190013', 'MH12', 0, 'T', 'Giữa kỳ 1'),
('20190010', '20190013', 'MH14', 0, 'T', 'Giữa kỳ 1'),
('20190011', '20190014', 'MH01', 0, 'H', 'Giữa kỳ 1'),
('20190012', '20190014', 'MH02', 0, 'H', 'Giữa kỳ 1'),
('20190013', '20190014', 'MH05', 0, 'H', 'Giữa kỳ 1'),
('20190014', '20190014', 'MH06', 0, 'H', 'Giữa kỳ 1'),
('20190015', '20190014', 'MH07', 0, 'H', 'Giữa kỳ 1'),
('20190016', '20190014', 'MH08', 0, 'H', 'Giữa kỳ 1'),
('20190017', '20190014', 'MH09', 0, 'H', 'Giữa kỳ 1'),
('20190018', '20190014', 'MH10', 0, 'H', 'Giữa kỳ 1'),
('20190019', '20190014', 'MH11', 0, 'H', 'Giữa kỳ 1'),
('20190020', '20190014', 'MH12', 0, 'H', 'Giữa kỳ 1'),
('20190021', '20190014', 'MH14', 0, 'H', 'Giữa kỳ 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbctkqnanglucphamchat`
--

CREATE TABLE `tbctkqnanglucphamchat` (
  `mactkqnanglucphamchat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mactlophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tendanhgia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mucdatduoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoidiemdanhgia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbctkqnanglucphamchat`
--

INSERT INTO `tbctkqnanglucphamchat` (`mactkqnanglucphamchat`, `mactlophoc`, `tendanhgia`, `mucdatduoc`, `thoidiemdanhgia`) VALUES
('20190000', '20190013', 'Tự phục vụ, tự quản', 'T', 'Giữa kỳ 1'),
('20190001', '20190013', 'Hợp tác', 'T', 'Giữa kỳ 1'),
('20190002', '20190013', 'Tự học và giải quyết vấn đề', 'T', 'Giữa kỳ 1'),
('20190003', '20190013', 'Chăm học, chăm làm', 'T', 'Giữa kỳ 1'),
('20190004', '20190013', 'Tự tin, trách nhiệm', 'T', 'Giữa kỳ 1'),
('20190005', '20190013', 'Trung thực, kỉ luật', 'T', 'Giữa kỳ 1'),
('20190006', '20190013', 'Đoàn kết, yêu thương', 'T', 'Giữa kỳ 1'),
('20190007', '20190013', 'Ghi chú', NULL, 'Giữa kỳ 1'),
('20190008', '20190014', 'Tự phục vụ, tự quản', 'T', 'Giữa kỳ 1'),
('20190009', '20190014', 'Hợp tác', 'T', 'Giữa kỳ 1'),
('20190010', '20190014', 'Tự học và giải quyết vấn đề', 'T', 'Giữa kỳ 1'),
('20190011', '20190014', 'Chăm học, chăm làm', 'T', 'Giữa kỳ 1'),
('20190012', '20190014', 'Tự tin, trách nhiệm', 'T', 'Giữa kỳ 1'),
('20190013', '20190014', 'Trung thực, kỉ luật', 'T', 'Giữa kỳ 1'),
('20190014', '20190014', 'Đoàn kết, yêu thương', 'T', 'Giữa kỳ 1'),
('20190015', '20190014', 'Ghi chú', NULL, 'Giữa kỳ 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbctlophoc`
--

CREATE TABLE `tbctlophoc` (
  `mactlophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahocsinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lenlop` tinyint(1) NOT NULL,
  `hoanthanhctlh` tinyint(1) NOT NULL,
  `khenthuong` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbctlophoc`
--

INSERT INTO `tbctlophoc` (`mactlophoc`, `malophoc`, `mahocsinh`, `lenlop`, `hoanthanhctlh`, `khenthuong`) VALUES
('20190000', '20190000', '20190000', 0, 0, 0),
('20190001', '20190000', '20190001', 0, 0, 0),
('20190002', '20190000', '20190002', 0, 0, 0),
('20190003', '20190000', '20190003', 0, 0, 0),
('20190004', '20190000', '20190004', 0, 0, 0),
('20190005', '20190000', '20190005', 0, 0, 0),
('20190006', '20190000', '20190006', 0, 0, 0),
('20190007', '20190000', '20190007', 0, 0, 0),
('20190008', '20190000', '20190008', 0, 0, 0),
('20190009', '20190000', '20190009', 0, 0, 0),
('20190010', '20190000', '20190010', 0, 0, 0),
('20190011', '20190000', '20190011', 0, 0, 0),
('20190012', '20190000', '20190012', 0, 0, 0),
('20190013', '20190006', '20190013', 0, 0, 0),
('20190014', '20190006', '20190014', 0, 0, 0),
('20190015', '20190002', '20190015', 0, 0, 0),
('20190016', '20190002', '20190016', 0, 0, 0),
('20190017', '20190002', '20190017', 0, 0, 0),
('20190018', '20190002', '20190018', 0, 0, 0),
('20190019', '20190002', '20190019', 0, 0, 0),
('20190020', '20190002', '20190020', 0, 0, 0),
('20190021', '20190002', '20190021', 0, 0, 0),
('20190022', '20190002', '20190022', 0, 0, 0),
('20190023', '20190002', '20190023', 0, 0, 0),
('20190024', '20190002', '20190024', 0, 0, 0),
('20190025', '20190002', '20190025', 0, 0, 0),
('20190026', '20190002', '20190026', 0, 0, 0),
('20190027', '20190002', '20190027', 0, 0, 0),
('20190028', '20190002', '20190028', 0, 0, 0),
('20190029', '20190002', '20190029', 0, 0, 0),
('20190030', '20190003', '20190030', 0, 0, 0),
('20190031', '20190003', '20190031', 0, 0, 0),
('20190032', '20190003', '20190032', 0, 0, 0),
('20190033', '20190003', '20190033', 0, 0, 0),
('20190034', '20190003', '20190034', 0, 0, 0),
('20190035', '20190003', '20190035', 0, 0, 0),
('20190036', '20190003', '20190036', 0, 0, 0),
('20190037', '20190003', '20190037', 0, 0, 0),
('20190038', '20190003', '20190038', 0, 0, 0),
('20190039', '20190003', '20190039', 0, 0, 0),
('20190040', '20190004', '20190040', 0, 0, 0),
('20190041', '20190004', '20190041', 0, 0, 0),
('20190042', '20190004', '20190042', 0, 0, 0),
('20190043', '20190004', '20190043', 0, 0, 0),
('20190044', '20190004', '20190044', 0, 0, 0),
('20190045', '20190004', '20190045', 0, 0, 0),
('20190046', '20190004', '20190046', 0, 0, 0),
('20190047', '20190004', '20190047', 0, 0, 0),
('20190048', '20190004', '20190048', 0, 0, 0),
('20190049', '20190004', '20190049', 0, 0, 0),
('20190050', '20190005', '20190050', 0, 0, 0),
('20190051', '20190005', '20190051', 0, 0, 0),
('20190052', '20190005', '20190052', 0, 0, 0),
('20190053', '20190005', '20190053', 0, 0, 0),
('20190054', '20190005', '20190054', 0, 0, 0),
('20190055', '20190005', '20190055', 0, 0, 0),
('20190056', '20190005', '20190056', 0, 0, 0),
('20190057', '20190005', '20190057', 0, 0, 0),
('20190058', '20190005', '20190058', 0, 0, 0),
('20190059', '20190005', '20190059', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbctmonhoc`
--

CREATE TABLE `tbctmonhoc` (
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mamonhoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbctmonhoc`
--

INSERT INTO `tbctmonhoc` (`malophoc`, `mamonhoc`) VALUES
('20190000', 'MH01'),
('20190000', 'MH02'),
('20190000', 'MH05'),
('20190000', 'MH06'),
('20190000', 'MH07'),
('20190000', 'MH08'),
('20190000', 'MH09'),
('20190000', 'MH10'),
('20190000', 'MH11'),
('20190000', 'MH12'),
('20190000', 'MH14'),
('20190002', 'MH01'),
('20190002', 'MH02'),
('20190002', 'MH05'),
('20190002', 'MH06'),
('20190002', 'MH07'),
('20190002', 'MH08'),
('20190002', 'MH09'),
('20190002', 'MH10'),
('20190002', 'MH11'),
('20190002', 'MH12'),
('20190002', 'MH14'),
('20190003', 'MH01'),
('20190003', 'MH02'),
('20190003', 'MH05'),
('20190003', 'MH06'),
('20190003', 'MH07'),
('20190003', 'MH08'),
('20190003', 'MH09'),
('20190003', 'MH10'),
('20190003', 'MH11'),
('20190003', 'MH12'),
('20190003', 'MH14'),
('20190004', 'MH01'),
('20190004', 'MH02'),
('20190004', 'MH03'),
('20190004', 'MH04'),
('20190004', 'MH05'),
('20190004', 'MH06'),
('20190004', 'MH07'),
('20190004', 'MH09'),
('20190004', 'MH10'),
('20190004', 'MH11'),
('20190004', 'MH13'),
('20190004', 'MH14'),
('20190005', 'MH01'),
('20190005', 'MH02'),
('20190005', 'MH03'),
('20190005', 'MH04'),
('20190005', 'MH05'),
('20190005', 'MH06'),
('20190005', 'MH07'),
('20190005', 'MH09'),
('20190005', 'MH10'),
('20190005', 'MH11'),
('20190005', 'MH13'),
('20190005', 'MH14'),
('20190006', 'MH01'),
('20190006', 'MH02'),
('20190006', 'MH05'),
('20190006', 'MH06'),
('20190006', 'MH07'),
('20190006', 'MH08'),
('20190006', 'MH09'),
('20190006', 'MH10'),
('20190006', 'MH11'),
('20190006', 'MH12'),
('20190006', 'MH14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbgiaovien`
--

CREATE TABLE `tbgiaovien` (
  `magv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tengv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthaicanbo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quequan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dantoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoctich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhomchucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbgiaovien`
--

INSERT INTO `tbgiaovien` (`magv`, `tengv`, `ngaysinh`, `gioitinh`, `trangthaicanbo`, `cmnd`, `dienthoai`, `email`, `quequan`, `dantoc`, `quoctich`, `nhomchucvu`, `taikhoan`, `matkhau`) VALUES
('20190000', 'Nguyễn Thị Anh', '1974-03-26 00:00:00', 'Nữ', 'Đang làm việc', '221483570', '0396501999', NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Hiệu trưởng', 'ntanh', '$2y$10$LlTUOHmYiJatPEpxW6JG6.pzn9xg/7uElLDBIKYmdqR7FK558VJZS'),
('20190001', 'Trương Quân Y', '1972-12-24 00:00:00', 'Nam', 'Đang làm việc', '221483569', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', 'tqy', '$2y$10$i4.YwWu7FzWKO1w1OhvjCuGEC.x3wO5xhYSr8Z3cmvT.SMNRJVNU.'),
('20190002', 'Hàn Thiên Vy', '1991-07-26 00:00:00', 'Nữ', 'Đang làm việc', '221483577', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', NULL, NULL),
('20190003', 'Trần Trung Hiếu', '1970-10-06 00:00:00', 'Nam', 'Đang làm việc', '221483588', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', NULL, NULL),
('20190004', 'Nguyễn Quân', '1970-01-11 00:00:00', 'Nam', 'Đang làm việc', '221483577', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', NULL, NULL),
('20190005', 'Trần B', '1977-11-11 00:00:00', 'Nam', 'Đang làm việc', '2212483673', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', NULL, NULL),
('20190006', 'Hà Lan', '1980-12-08 00:00:00', 'Nữ', 'Đang làm việc', '221483500', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm', 'hlan', '$2y$10$ffVppBTnfXx7EECMVrNouOSAUPmGodzl6XvJXUS6Rn6fpvvuUk5um');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbhocsinh`
--

CREATE TABLE `tbhocsinh` (
  `mahocsinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenhocsinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthaihocsinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dantoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoctich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `huyen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noisinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choohientai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sodt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuvuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaikhuyettat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doituongchinhsach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mienhocphi` tinyint(1) DEFAULT NULL,
  `giamhocphi` tinyint(1) DEFAULT NULL,
  `doivien` tinyint(1) DEFAULT NULL,
  `luubannamtruoc` tinyint(1) DEFAULT NULL,
  `hotencha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nghenghiepcha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namsinhcha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotenme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nghenghiepme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namsinhme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotenngh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nghenghiepngh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namsinhngh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoanthanhcttieuhoc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbhocsinh`
--

INSERT INTO `tbhocsinh` (`mahocsinh`, `tenhocsinh`, `ngaysinh`, `gioitinh`, `trangthaihocsinh`, `dantoc`, `quoctich`, `tinh`, `huyen`, `xa`, `noisinh`, `choohientai`, `sodt`, `khuvuc`, `loaikhuyettat`, `doituongchinhsach`, `mienhocphi`, `giamhocphi`, `doivien`, `luubannamtruoc`, `hotencha`, `nghenghiepcha`, `namsinhcha`, `hotenme`, `nghenghiepme`, `namsinhme`, `hotenngh`, `nghenghiepngh`, `namsinhngh`, `hoanthanhcttieuhoc`) VALUES
('20190000', 'Nguyễn Chí Bình', '2013-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 1, 0, 'Nguyễn Cu ', 'Làm biển', '1976', 'Nguyễn Thị Hợp ', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190001', 'Nguyễn Huỳnh Bi Boy', '2013-07-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 1, 0, 0, 0, 'Nguyễn Ngọc Liến', 'Làm biển', '1985', 'Huỳnh Thị Mỹ Nhung', 'Nội trợ', '1983', NULL, NULL, NULL, NULL),
('20190002', 'Hồ Khánh Đạt', '2013-07-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, '', 0, 0, 0, 0, 'Hồ Văn Pháp', 'Làm biển', '1983', 'Châu Thị Phi', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190003', 'Phan Ngô Đạt', '2013-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Phan Văn Giảng', 'Làm biển', '1985', 'Ngô Thị Mai', 'Nội trợ', '1993', NULL, NULL, NULL, NULL),
('20190004', 'Trần Nguyễn Phi Đạt', '2013-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trần Văn Út', 'Làm biển', '1982', 'Nguyễn Thị Thảo', 'Nội trợ', '1985', NULL, NULL, NULL, NULL),
('20190005', 'Dương Ngọc Hạnh', '2013-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Dương Ngọc Dư', 'Làm biển', '1993', 'Nguyễn Thị Hồng Sáo', 'Nội trợ', '1996', NULL, NULL, NULL, NULL),
('20190006', 'Trịnh Yến Hoài Hân', '2013-07-09', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trịnh Minh Vân', 'Thợ cắt tóc', '1988', 'Trần Thị Viên', 'Nội trợ', '1988', NULL, NULL, NULL, NULL),
('20190007', 'Lê Đinh Hưng', '2013-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 0, 0, 0, 0, 'Lê Văn Anh', 'Làm biển', '1982', 'Đinh Thị Bảy', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190008', 'Nguyễn Trí Khiêm', '2013-03-03', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Trí Liêm', 'Thợ hồ', '1992', 'Nguyễn Thị Thản', 'Nội trợ', '1992', NULL, NULL, NULL, NULL),
('20190009', 'Đặng Gia Khôi', '2013-01-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện đa khoa huyện Tuy An, tỉnh Phú Yên', 'Thôn Tân An', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Đặng Minh Quang', 'Tài xế', '1984', 'Trịnh Thị Hồng Như', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190010', 'Nguyễn Minh Khôi', '2013-04-22', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Hồng Mỹ', 'Làm biển', '1985', 'Nguyễn Thị Thùy Linh', 'Nội trợ', '1986', NULL, NULL, NULL, NULL),
('20190011', 'Lê Tiến Khởi', '2013-02-24', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Lê Văn Tiết', 'Làm biển', '1985', 'Phạm Thị Kim Linh', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190012', 'Huỳnh Trung Kiên', '2013-01-20', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Huỳnh Văn Vương', 'Làm biển', '1982', 'Võ Thị Thu Thảo', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190013', 'Võ Văn Kiệt', '2013-11-28', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ, Tuy An, Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Võ Văn Cây', 'Làm biển', '1983', 'Võ Thị Ngã', 'Nội trợ', '1986', NULL, NULL, NULL, NULL),
('20190014', 'Mai Tường Lam', '2013-09-16', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Mai Văn Lực', 'Làm biển', '1975', 'Dương Thị Lan', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190015', 'Nguyễn A', '2014-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 1, 0, 'Nguyễn Cu ', 'Làm biển', '1976', 'Nguyễn Thị Hợp ', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190016', 'Nguyễn Huỳnh B', '2014-07-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 1, 0, 0, 0, 'Nguyễn Ngọc Liến', 'Làm biển', '1985', 'Huỳnh Thị Mỹ Nhung', 'Nội trợ', '1983', NULL, NULL, NULL, NULL),
('20190017', 'Hồ Khánh Đạt', '2014-07-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, '', 0, 0, 0, 0, 'Hồ Văn Pháp', 'Làm biển', '1983', 'Châu Thị Phi', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190018', 'Phan Ngô Đạt', '2014-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Phan Văn Giảng', 'Làm biển', '1985', 'Ngô Thị Mai', 'Nội trợ', '1993', NULL, NULL, NULL, NULL),
('20190019', 'Trần Nguyễn Phi Đạt', '2014-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trần Văn Út', 'Làm biển', '1982', 'Nguyễn Thị Thảo', 'Nội trợ', '1985', NULL, NULL, NULL, NULL),
('20190020', 'Dương Ngọc Hạnh', '2014-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Dương Ngọc Dư', 'Làm biển', '1993', 'Nguyễn Thị Hồng Sáo', 'Nội trợ', '1996', NULL, NULL, NULL, NULL),
('20190021', 'Trịnh Yến Hoài Hân', '2014-07-09', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trịnh Minh Vân', 'Thợ cắt tóc', '1988', 'Trần Thị Viên', 'Nội trợ', '1988', NULL, NULL, NULL, NULL),
('20190022', 'Lê Đinh Hưng', '2014-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 0, 0, 0, 0, 'Lê Văn Anh', 'Làm biển', '1982', 'Đinh Thị Bảy', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190023', 'Nguyễn Trí Khiêm', '2014-03-03', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Trí Liêm', 'Thợ hồ', '1992', 'Nguyễn Thị Thản', 'Nội trợ', '1992', NULL, NULL, NULL, NULL),
('20190024', 'Đặng Gia Khôi', '2014-01-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện đa khoa huyện Tuy An, tỉnh Phú Yên', 'Thôn Tân An', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Đặng Minh Quang', 'Tài xế', '1984', 'Trịnh Thị Hồng Như', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190025', 'Nguyễn Minh Khôi', '2014-04-22', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Hồng Mỹ', 'Làm biển', '1985', 'Nguyễn Thị Thùy Linh', 'Nội trợ', '1986', NULL, NULL, NULL, NULL),
('20190026', 'Lê Tiến Khởi', '2014-02-24', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Lê Văn Tiết', 'Làm biển', '1985', 'Phạm Thị Kim Linh', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190027', 'Huỳnh Trung Kiên', '2014-01-20', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Huỳnh Văn Vương', 'Làm biển', '1982', 'Võ Thị Thu Thảo', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190028', 'Võ Văn Kiệt', '2014-11-28', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ, Tuy An, Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Võ Văn Cây', 'Làm biển', '1983', 'Võ Thị Ngã', 'Nội trợ', '1986', NULL, NULL, NULL, NULL),
('20190029', 'Mai Tường Lam', '2014-09-16', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Mai Văn Lực', 'Làm biển', '1975', 'Dương Thị Lan', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190030', 'Nguyễn A', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 1, 0, 'Nguyễn Cu ', 'Làm biển', '1976', 'Nguyễn Thị Hợp ', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190031', 'Nguyễn Huỳnh B', '2011-07-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 1, 0, 0, 0, 'Nguyễn Ngọc Liến', 'Làm biển', '1985', 'Huỳnh Thị Mỹ Nhung', 'Nội trợ', '1983', NULL, NULL, NULL, NULL),
('20190032', 'Hồ Khánh Đạt', '2011-07-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, '', 0, 0, 0, 0, 'Hồ Văn Pháp', 'Làm biển', '1983', 'Châu Thị Phi', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190033', 'Phan Ngô Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Phan Văn Giảng', 'Làm biển', '1985', 'Ngô Thị Mai', 'Nội trợ', '1993', NULL, NULL, NULL, NULL),
('20190034', 'Trần Nguyễn Phi Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trần Văn Út', 'Làm biển', '1982', 'Nguyễn Thị Thảo', 'Nội trợ', '1985', NULL, NULL, NULL, NULL),
('20190035', 'Dương Ngọc Hạnh', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Dương Ngọc Dư', 'Làm biển', '1993', 'Nguyễn Thị Hồng Sáo', 'Nội trợ', '1996', NULL, NULL, NULL, NULL),
('20190036', 'Trịnh Yến Hoài Hân', '2011-07-09', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trịnh Minh Vân', 'Thợ cắt tóc', '1988', 'Trần Thị Viên', 'Nội trợ', '1988', NULL, NULL, NULL, NULL),
('20190037', 'Lê Đinh Hưng', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 0, 0, 0, 0, 'Lê Văn Anh', 'Làm biển', '1982', 'Đinh Thị Bảy', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190038', 'Nguyễn Trí Khiêm', '2011-03-03', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Trí Liêm', 'Thợ hồ', '1992', 'Nguyễn Thị Thản', 'Nội trợ', '1992', NULL, NULL, NULL, NULL),
('20190039', 'Đặng Gia Khôi', '2011-01-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện đa khoa huyện Tuy An, tỉnh Phú Yên', 'Thôn Tân An', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Đặng Minh Quang', 'Tài xế', '1984', 'Trịnh Thị Hồng Như', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190040', 'Nguyễn A', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 1, 0, 'Nguyễn Cu ', 'Làm biển', '1976', 'Nguyễn Thị Hợp ', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190041', 'Nguyễn Huỳnh B', '2011-07-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 1, 0, 0, 0, 'Nguyễn Ngọc Liến', 'Làm biển', '1985', 'Huỳnh Thị Mỹ Nhung', 'Nội trợ', '1983', NULL, NULL, NULL, NULL),
('20190042', 'Hồ Khánh Đạt', '2011-07-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, '', 0, 0, 0, 0, 'Hồ Văn Pháp', 'Làm biển', '1983', 'Châu Thị Phi', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190043', 'Phan Ngô Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Phan Văn Giảng', 'Làm biển', '1985', 'Ngô Thị Mai', 'Nội trợ', '1993', NULL, NULL, NULL, NULL),
('20190044', 'Trần Nguyễn Phi Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trần Văn Út', 'Làm biển', '1982', 'Nguyễn Thị Thảo', 'Nội trợ', '1985', NULL, NULL, NULL, NULL),
('20190045', 'Dương Ngọc Hạnh', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Dương Ngọc Dư', 'Làm biển', '1993', 'Nguyễn Thị Hồng Sáo', 'Nội trợ', '1996', NULL, NULL, NULL, NULL),
('20190046', 'Trịnh Yến Hoài Hân', '2011-07-09', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trịnh Minh Vân', 'Thợ cắt tóc', '1988', 'Trần Thị Viên', 'Nội trợ', '1988', NULL, NULL, NULL, NULL),
('20190047', 'Lê Đinh Hưng', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 0, 0, 0, 0, 'Lê Văn Anh', 'Làm biển', '1982', 'Đinh Thị Bảy', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190048', 'Nguyễn Trí Khiêm', '2011-03-03', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Trí Liêm', 'Thợ hồ', '1992', 'Nguyễn Thị Thản', 'Nội trợ', '1992', NULL, NULL, NULL, NULL),
('20190049', 'Đặng Gia Khôi', '2011-01-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện đa khoa huyện Tuy An, tỉnh Phú Yên', 'Thôn Tân An', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Đặng Minh Quang', 'Tài xế', '1984', 'Trịnh Thị Hồng Như', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190050', 'Nguyễn A', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 1, 0, 'Nguyễn Cu ', 'Làm biển', '1976', 'Nguyễn Thị Hợp ', 'Nội trợ', '1981', NULL, NULL, NULL, NULL),
('20190051', 'Nguyễn Huỳnh B', '2011-07-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 1, 0, 0, 0, 'Nguyễn Ngọc Liến', 'Làm biển', '1985', 'Huỳnh Thị Mỹ Nhung', 'Nội trợ', '1983', NULL, NULL, NULL, NULL),
('20190052', 'Hồ Khánh Đạt', '2011-07-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, '', 0, 0, 0, 0, 'Hồ Văn Pháp', 'Làm biển', '1983', 'Châu Thị Phi', 'Nội trợ', '1984', NULL, NULL, NULL, NULL),
('20190053', 'Phan Ngô Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Trạm Y tế xã An Mỹ', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Phan Văn Giảng', 'Làm biển', '1985', 'Ngô Thị Mai', 'Nội trợ', '1993', NULL, NULL, NULL, NULL),
('20190054', 'Trần Nguyễn Phi Đạt', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Hội Sơn', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trần Văn Út', 'Làm biển', '1982', 'Nguyễn Thị Thảo', 'Nội trợ', '1985', NULL, NULL, NULL, NULL),
('20190055', 'Dương Ngọc Hạnh', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Dương Ngọc Dư', 'Làm biển', '1993', 'Nguyễn Thị Hồng Sáo', 'Nội trợ', '1996', NULL, NULL, NULL, NULL),
('20190056', 'Trịnh Yến Hoài Hân', '2011-07-09', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Trịnh Minh Vân', 'Thợ cắt tóc', '1988', 'Trần Thị Viên', 'Nội trợ', '1988', NULL, NULL, NULL, NULL),
('20190057', 'Lê Đinh Hưng', '2011-07-09', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', '', NULL, 0, 0, 0, 0, 'Lê Văn Anh', 'Làm biển', '1982', 'Đinh Thị Bảy', 'Nội trợ', '1991', NULL, NULL, NULL, NULL),
('20190058', 'Nguyễn Trí Khiêm', '2011-03-03', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Nguyễn Trí Liêm', 'Thợ hồ', '1992', 'Nguyễn Thị Thản', 'Nội trợ', '1992', NULL, NULL, NULL, NULL),
('20190059', 'Đặng Gia Khôi', '2011-01-02', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện đa khoa huyện Tuy An, tỉnh Phú Yên', 'Thôn Tân An', NULL, 'Đồng bằng', NULL, NULL, 0, 0, 0, 0, 'Đặng Minh Quang', 'Tài xế', '1984', 'Trịnh Thị Hồng Như', 'Nội trợ', '1984', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbkhenthuongdotxuat`
--

CREATE TABLE `tbkhenthuongdotxuat` (
  `maktdx` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahocsinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidungkt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbkhenthuongthuongnien`
--

CREATE TABLE `tbkhenthuongthuongnien` (
  `makt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahocsinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khenthuongcanam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyluatcanam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `songaynghicanam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblophoc`
--

CREATE TABLE `tblophoc` (
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenlophoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoi` int(11) NOT NULL,
  `namhoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `magv` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblophoc`
--

INSERT INTO `tblophoc` (`malophoc`, `tenlophoc`, `khoi`, `namhoc`, `magv`) VALUES
('20190000', '1A1', 1, '2019 - 2020', '20190001'),
('20190002', '2A1', 2, '2019 - 2020', '20190004'),
('20190003', '3A1', 3, '2019 - 2020', '20190003'),
('20190004', '4A1', 4, '2019 - 2020', '20190005'),
('20190005', '5A1', 5, '2019 - 2020', '20190006'),
('20190006', '1A2', 1, '2019 - 2020', '20190002'),
('20190007', '1A1', 1, '2020 - 2021', NULL),
('20190008', '1A2', 1, '2020 - 2021', NULL),
('20190009', '2A1', 2, '2020 - 2021', NULL),
('20190010', '3A1', 3, '2020 - 2021', NULL),
('20190011', '4A1', 4, '2020 - 2021', NULL),
('20190012', '5A1', 5, '2020 - 2021', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbmonhoc`
--

CREATE TABLE `tbmonhoc` (
  `mamonhoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenmonhoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbmonhoc`
--

INSERT INTO `tbmonhoc` (`mamonhoc`, `tenmonhoc`, `LoaiMH`) VALUES
('MH01', 'Toán', 1),
('MH02', 'Tiếng Việt', 1),
('MH03', 'Khoa học', 3),
('MH04', 'Lịch sử và Địa lí', 3),
('MH05', 'Ngoại ngữ', 1),
('MH06', 'Tin học', 1),
('MH07', 'Tiếng dân tộc', 1),
('MH08', 'Tự nhiên và Xã hội', 2),
('MH09', 'Đạo đức', 1),
('MH10', 'Âm nhạc', 1),
('MH11', 'Mỹ thuật', 1),
('MH12', 'Thủ công', 2),
('MH13', 'Kĩ thuật', 3),
('MH14', 'Thể dục', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbctkqhoctap`
--
ALTER TABLE `tbctkqhoctap`
  ADD PRIMARY KEY (`mactkqhoctap`),
  ADD KEY `tbctkqhoctap_mactlophoc_foreign` (`mactlophoc`),
  ADD KEY `tbctkqhoctap_mamonhoc_foreign` (`mamonhoc`);

--
-- Chỉ mục cho bảng `tbctkqnanglucphamchat`
--
ALTER TABLE `tbctkqnanglucphamchat`
  ADD PRIMARY KEY (`mactkqnanglucphamchat`),
  ADD KEY `tbctkqnanglucphamchat_mactlophoc_foreign` (`mactlophoc`);

--
-- Chỉ mục cho bảng `tbctlophoc`
--
ALTER TABLE `tbctlophoc`
  ADD PRIMARY KEY (`mactlophoc`),
  ADD KEY `tbctlophoc_malophoc_foreign` (`malophoc`),
  ADD KEY `tbctlophoc_mahocsinh_foreign` (`mahocsinh`);

--
-- Chỉ mục cho bảng `tbctmonhoc`
--
ALTER TABLE `tbctmonhoc`
  ADD PRIMARY KEY (`malophoc`,`mamonhoc`),
  ADD KEY `tbctmonhoc_mamonhoc_foreign` (`mamonhoc`);

--
-- Chỉ mục cho bảng `tbgiaovien`
--
ALTER TABLE `tbgiaovien`
  ADD PRIMARY KEY (`magv`);

--
-- Chỉ mục cho bảng `tbhocsinh`
--
ALTER TABLE `tbhocsinh`
  ADD PRIMARY KEY (`mahocsinh`);

--
-- Chỉ mục cho bảng `tbkhenthuongdotxuat`
--
ALTER TABLE `tbkhenthuongdotxuat`
  ADD PRIMARY KEY (`maktdx`),
  ADD KEY `tbkhenthuongdotxuat_malophoc_foreign` (`malophoc`),
  ADD KEY `tbkhenthuongdotxuat_mahocsinh_foreign` (`mahocsinh`);

--
-- Chỉ mục cho bảng `tbkhenthuongthuongnien`
--
ALTER TABLE `tbkhenthuongthuongnien`
  ADD PRIMARY KEY (`makt`),
  ADD KEY `tbkhenthuongthuongnien_malophoc_foreign` (`malophoc`),
  ADD KEY `tbkhenthuongthuongnien_mahocsinh_foreign` (`mahocsinh`);

--
-- Chỉ mục cho bảng `tblophoc`
--
ALTER TABLE `tblophoc`
  ADD PRIMARY KEY (`malophoc`),
  ADD KEY `tblophoc_magv_foreign` (`magv`);

--
-- Chỉ mục cho bảng `tbmonhoc`
--
ALTER TABLE `tbmonhoc`
  ADD PRIMARY KEY (`mamonhoc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbctkqhoctap`
--
ALTER TABLE `tbctkqhoctap`
  ADD CONSTRAINT `tbctkqhoctap_mactlophoc_foreign` FOREIGN KEY (`mactlophoc`) REFERENCES `tbctlophoc` (`mactlophoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbctkqhoctap_mamonhoc_foreign` FOREIGN KEY (`mamonhoc`) REFERENCES `tbmonhoc` (`mamonhoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbctkqnanglucphamchat`
--
ALTER TABLE `tbctkqnanglucphamchat`
  ADD CONSTRAINT `tbctkqnanglucphamchat_mactlophoc_foreign` FOREIGN KEY (`mactlophoc`) REFERENCES `tbctlophoc` (`mactlophoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbctlophoc`
--
ALTER TABLE `tbctlophoc`
  ADD CONSTRAINT `tbctlophoc_mahocsinh_foreign` FOREIGN KEY (`mahocsinh`) REFERENCES `tbhocsinh` (`mahocsinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbctlophoc_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `tblophoc` (`malophoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbctmonhoc`
--
ALTER TABLE `tbctmonhoc`
  ADD CONSTRAINT `tbctmonhoc_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `tblophoc` (`malophoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbctmonhoc_mamonhoc_foreign` FOREIGN KEY (`mamonhoc`) REFERENCES `tbmonhoc` (`mamonhoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbkhenthuongdotxuat`
--
ALTER TABLE `tbkhenthuongdotxuat`
  ADD CONSTRAINT `tbkhenthuongdotxuat_mahocsinh_foreign` FOREIGN KEY (`mahocsinh`) REFERENCES `tbhocsinh` (`mahocsinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbkhenthuongdotxuat_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `tblophoc` (`malophoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbkhenthuongthuongnien`
--
ALTER TABLE `tbkhenthuongthuongnien`
  ADD CONSTRAINT `tbkhenthuongthuongnien_mahocsinh_foreign` FOREIGN KEY (`mahocsinh`) REFERENCES `tbhocsinh` (`mahocsinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbkhenthuongthuongnien_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `tblophoc` (`malophoc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tblophoc`
--
ALTER TABLE `tblophoc`
  ADD CONSTRAINT `tblophoc_magv_foreign` FOREIGN KEY (`magv`) REFERENCES `tbgiaovien` (`magv`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_foreign` FOREIGN KEY (`id`) REFERENCES `tbgiaovien` (`magv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
