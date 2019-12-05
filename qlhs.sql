-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2019 lúc 10:12 AM
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
('20190045', '20190005', 'MH01', 8, 'T', 'Giữa kỳ 1'),
('20190046', '20190000', 'MH01', NULL, 'T', 'Giữa kỳ 1'),
('20190047', '20190000', 'MH02', NULL, 'T', 'Giữa kỳ 1'),
('20190048', '20190000', 'MH05', NULL, 'T', 'Giữa kỳ 1'),
('20190049', '20190000', 'MH06', NULL, 'T', 'Giữa kỳ 1'),
('20190050', '20190000', 'MH08', NULL, 'T', 'Giữa kỳ 1'),
('20190051', '20190000', 'MH09', NULL, 'T', 'Giữa kỳ 1'),
('20190052', '20190000', 'MH10', NULL, 'T', 'Giữa kỳ 1'),
('20190053', '20190000', 'MH11', NULL, 'T', 'Giữa kỳ 1'),
('20190054', '20190000', 'MH12', NULL, 'T', 'Giữa kỳ 1'),
('20190055', '20190000', 'MH14', NULL, 'T', 'Giữa kỳ 1'),
('20190056', '20190001', 'MH01', NULL, 'T', 'Giữa kỳ 1'),
('20190057', '20190001', 'MH02', NULL, 'T', 'Giữa kỳ 1'),
('20190058', '20190001', 'MH05', NULL, 'H', 'Giữa kỳ 1'),
('20190059', '20190001', 'MH06', NULL, 'H', 'Giữa kỳ 1'),
('20190060', '20190001', 'MH08', NULL, 'T', 'Giữa kỳ 1'),
('20190061', '20190001', 'MH09', NULL, 'H', 'Giữa kỳ 1'),
('20190062', '20190001', 'MH10', NULL, 'T', 'Giữa kỳ 1'),
('20190063', '20190001', 'MH11', NULL, 'H', 'Giữa kỳ 1'),
('20190064', '20190001', 'MH12', NULL, 'T', 'Giữa kỳ 1'),
('20190065', '20190001', 'MH14', NULL, 'T', 'Giữa kỳ 1'),
('20190066', '20190002', 'MH01', NULL, 'T', 'Giữa kỳ 1');

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
('20190025', '20190005', 'Tự phục vụ, tự quản', '', 'Giữa kỳ 1'),
('20190026', '20190005', 'Hợp tác', '', 'Giữa kỳ 1'),
('20190027', '20190005', 'Tự học và giải quyết vấn đề', '', 'Giữa kỳ 1'),
('20190028', '20190005', 'Chăm học, chăm làm', '', 'Giữa kỳ 1'),
('20190029', '20190005', 'Tự tin, trách nhiệm', '', 'Giữa kỳ 1'),
('20190030', '20190005', 'Trung thực, kỉ luật', '', 'Giữa kỳ 1'),
('20190031', '20190005', 'Đoàn kết, yêu thương', '', 'Giữa kỳ 1'),
('20190032', '20190005', 'Ghi chú', '', 'Giữa kỳ 1'),
('20190033', '20190000', 'Tự phục vụ, tự quản', 'T', 'Giữa kỳ 1'),
('20190034', '20190000', 'Hợp tác', 'T', 'Giữa kỳ 1'),
('20190035', '20190000', 'Tự học và giải quyết vấn đề', 'T', 'Giữa kỳ 1'),
('20190036', '20190000', 'Chăm học, chăm làm', 'T', 'Giữa kỳ 1'),
('20190037', '20190000', 'Tự tin, trách nhiệm', 'T', 'Giữa kỳ 1'),
('20190038', '20190000', 'Trung thực, kỉ luật', 'T', 'Giữa kỳ 1'),
('20190039', '20190000', 'Đoàn kết, yêu thương', 'T', 'Giữa kỳ 1'),
('20190040', '20190000', 'Ghi chú', '', 'Giữa kỳ 1'),
('20190041', '20190001', 'Tự phục vụ, tự quản', 'Đ', 'Giữa kỳ 1'),
('20190042', '20190001', 'Hợp tác', 'T', 'Giữa kỳ 1'),
('20190043', '20190001', 'Tự học và giải quyết vấn đề', '', 'Giữa kỳ 1'),
('20190044', '20190001', 'Chăm học, chăm làm', '', 'Giữa kỳ 1'),
('20190045', '20190001', 'Tự tin, trách nhiệm', '', 'Giữa kỳ 1'),
('20190046', '20190001', 'Trung thực, kỉ luật', '', 'Giữa kỳ 1'),
('20190047', '20190001', 'Đoàn kết, yêu thương', '', 'Giữa kỳ 1'),
('20190048', '20190001', 'Ghi chú', '', 'Giữa kỳ 1'),
('20190049', '20190002', 'Tự phục vụ, tự quản', '', 'Giữa kỳ 1'),
('20190050', '20190002', 'Hợp tác', '', 'Giữa kỳ 1'),
('20190051', '20190002', 'Tự học và giải quyết vấn đề', '', 'Giữa kỳ 1'),
('20190052', '20190002', 'Chăm học, chăm làm', '', 'Giữa kỳ 1'),
('20190053', '20190002', 'Tự tin, trách nhiệm', '', 'Giữa kỳ 1'),
('20190054', '20190002', 'Trung thực, kỉ luật', '', 'Giữa kỳ 1'),
('20190055', '20190002', 'Đoàn kết, yêu thương', '', 'Giữa kỳ 1'),
('20190056', '20190002', 'Ghi chú', '', 'Giữa kỳ 1');

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
('20190000', '20190000', '19520000', 0, 0, 0),
('20190001', '20190000', '19520002', 0, 0, 0),
('20190002', '20190000', '19520003', 0, 0, 0),
('20190003', '20190002', '19520004', 0, 0, 0),
('20190004', '20190002', '19520005', 0, 0, 0),
('20190005', '20190002', '19520006', 0, 0, 0),
('20190006', '20190000', '19520007', 0, 0, 0),
('20190007', '20190003', '19520008', 0, 0, 0),
('20190008', '20190003', '19520009', 0, 0, 0);

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
('20190000', 'MH08'),
('20190000', 'MH09'),
('20190000', 'MH10'),
('20190000', 'MH11'),
('20190000', 'MH12'),
('20190000', 'MH14'),
('20190001', 'MH01'),
('20190001', 'MH02'),
('20190001', 'MH09'),
('20190001', 'MH10'),
('20190001', 'MH11'),
('20190001', 'MH12'),
('20190001', 'MH14'),
('20190002', 'MH01'),
('20190002', 'MH02'),
('20190002', 'MH03'),
('20190002', 'MH04'),
('20190002', 'MH05'),
('20190002', 'MH06'),
('20190002', 'MH09'),
('20190002', 'MH10'),
('20190002', 'MH11'),
('20190002', 'MH13'),
('20190002', 'MH14');

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
  `nhomchucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbgiaovien`
--

INSERT INTO `tbgiaovien` (`magv`, `tengv`, `ngaysinh`, `gioitinh`, `trangthaicanbo`, `cmnd`, `dienthoai`, `email`, `quequan`, `dantoc`, `quoctich`, `nhomchucvu`) VALUES
('20190000', 'Nguyễn Thị Anh', '1974-03-26 00:00:00', 'Nữ', 'Đang làm việc', '221483570', '0396501999', '', 'Nhơn Hội, An Hòa, Tuy An, Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm'),
('20190001', 'Trương Quân Y', '1972-12-24 00:00:00', 'Nam', 'Đang làm việc', '221483569', NULL, NULL, NULL, 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm'),
('20190002', 'Hàn Thiên Vy', '1991-07-26 00:00:00', 'Nữ', 'Đang làm việc', '221483577', NULL, NULL, NULL, 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm'),
('20190003', 'Trần Trung Hiếu', '1970-10-06 00:00:00', 'Nam', 'Đang làm việc', '221483588', NULL, NULL, 'Phú Yên', 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm'),
('20190004', 'Nguyễn Quân', '1970-01-11 00:00:00', 'Nam', 'Đang làm việc', '221483577', NULL, NULL, NULL, 'Kinh', 'Việt Nam', 'Giáo viên chủ nhiệm');

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
('19520000', 'Nguyễn Chí Bình', '2013-09-07', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', 'Bệnh viện sản nhi tỉnh Phú Yên', 'Thôn Nhơn Hội', '', 'Đồng bằng', '', '', 1, 0, 0, 0, 'Nguyễn Cu', 'Làm biển', '1976', 'Nguyễn Thị Hợp', 'Nội trợ', '1981', '', '', '', NULL),
('19520002', 'Nguyễn Tấn A', '2013-04-26', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, '0396501282', 'Đồng bằng', NULL, 'Thương binh', 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520003', 'Dương Thị Thu', '2013-02-06', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, 'Xã An Hòa', 'Đồng bằng', 'Xã An Hòa', 'Thương binh', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520004', 'Nguyễn Văn A', '2010-02-06', 'Nam', 'Chuyển đến kỳ 1', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520005', 'Trương Thiên', '2010-12-12', 'Nữ', 'Chuyển đến kỳ 1', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520006', 'Triệu Quốc', '2010-01-11', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520007', 'Nguyễn Thiện Thuật', '2010-02-04', 'Nam', 'Chuyển đến kỳ 1', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19520008', 'Nguyễn Thị A', '2009-11-11', 'Nữ', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('19520009', 'Trần Dần', '2009-10-26', 'Nam', 'Đang học', 'Kinh', 'Việt Nam', 'Tỉnh Phú Yên', 'Huyện Tuy An', 'Xã An Hòa', NULL, NULL, NULL, 'Đồng bằng', 'Đồng bằng', 'Thương binh', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `tbkhenthuongdotxuat`
--

INSERT INTO `tbkhenthuongdotxuat` (`maktdx`, `mahocsinh`, `malophoc`, `noidungkt`) VALUES
('20190000', '19520000', '20190000', 'Giải nhất cuộc thi Vở sạch cấp Huyện');

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

--
-- Đang đổ dữ liệu cho bảng `tbkhenthuongthuongnien`
--

INSERT INTO `tbkhenthuongthuongnien` (`makt`, `mahocsinh`, `malophoc`, `khenthuongcanam`, `kyluatcanam`, `songaynghicanam`) VALUES
('20190000', '19520000', '20190000', 'Hoàn thành xuất sắc chương trình lớp học', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblophoc`
--

CREATE TABLE `tblophoc` (
  `malophoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenlophoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoi` int(11) NOT NULL,
  `namhoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `magv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblophoc`
--

INSERT INTO `tblophoc` (`malophoc`, `tenlophoc`, `khoi`, `namhoc`, `magv`) VALUES
('20190000', '1A1', 1, '2019 - 2020', '20190000'),
('20190001', '1A3', 1, '2019 - 2020', '20190001'),
('20190002', '4A1', 4, '2019 - 2020', '20190002'),
('20190003', '5A1', 5, '2019 - 2020', '20190003'),
('20190004', '5A2', 5, '2019 - 2020', '20190004');

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
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
  ADD PRIMARY KEY (`id`,`username`);

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
