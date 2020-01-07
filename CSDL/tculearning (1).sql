-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2020 lúc 02:52 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tculearning`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAIBG` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MABAIHOC` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENBAIHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TENTAILIEU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIENKETTAILIEU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGUOIDANG` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`MAMONHOC`, `MALOAIBG`, `MABAIHOC`, `TENBAIHOC`, `TENTAILIEU`, `LIENKETTAILIEU`, `NGUOIDANG`) VALUES
('4111', 'DOCX', 'BH02', 'Giáo trình công nghệ Multimedia 111', 'CÔNG-NGHỆ-MULTIMEDIA.docx', 'https://drive.google.com/file/d/1VMW053rXtUG8UuToIxffj1gobk4x6y7p/view?usp=sharing', 'Trần Thị Mỹ Hiền'),
('4111', 'PPTX', 'BH11', 'Báo cáo thưc tập của sinh viên đại học công nghệ thông tin', '', 'https://drive.google.com/file/d/1hVAeukE5enN02lMGUD5GWDtpgBMeLDMz/view?usp=sharing', 'Trần Thị Mỹ Hiền'),
('4201', 'MP4', 'BH06', 'Chương trình C đầu tiên.', NULL, 'https://www.youtube.com/watch?v=D-HX5G3H3d4', 'Đỗ Văn Tuấn'),
('4201', 'MP4', 'BH07', 'Phép cộng hai số nguyên.', NULL, 'https://www.youtube.com/watch?v=-EzTL8JUZWo', 'Hà Văn Muôn'),
('4204', 'PDF', 'BH04', 'Tổng quan về cơ sở dữ liệu', 'Chuong1_TongquanCSDL_new.pdf', 'https://drive.google.com/file/d/1GiHG5reiDJsURF4AOzd0_MQzlzJNLiQf/view?usp=sharing', 'Trần Thị Mỹ Hiền'),
('4204', 'PDF', 'BH05', 'Giáo trình cơ sở dữ liệu', 'CSDL.pdf', 'https://drive.google.com/file/d/1fA-RLDiG_bOTjPYG2kwvWbhKAhAZ6Y6n/view?usp=sharing', 'Trần Thị Mỹ Hiền'),
('4204', 'PDF', 'BH13', '12313123', '', 'https://www.youtube.com/watch?v=D-HX5G3H3d4', 'Lý Phú Nam'),
('4209', 'MP4', 'BH12', 'Lập trình hướng đối tương C++ - Bài 1. Nhập xuất dữ liệu. Thao tác Visual studio', '', 'https://www.youtube.com/watch?v=PJeZVKZB7po', 'Nguyễn Thanh Hải');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihocsv`
--

CREATE TABLE `baihocsv` (
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MALOAIBG` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MABAIHOC` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENBAIHOC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TENTAILIEU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LIENKETTAILIEU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGUOIDANG` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baihocsv`
--

INSERT INTO `baihocsv` (`MAMONHOC`, `MALOAIBG`, `MABAIHOC`, `TENBAIHOC`, `TENTAILIEU`, `LIENKETTAILIEU`, `NGUOIDANG`) VALUES
('4111', 'PDF', 'BH14', 'hướng dẫn môn lập trình thiết bị ngoại vi', '', 'https://drive.google.com/file/d/1VMW053rXtUG8UuToIxffj1gobk4x6y7p/view?usp=sharing', 'Lý Phú Nam'),
('4201', 'DOCX', 'BH14', 'Chương trình C đầu tiên.', '', 'https://drive.google.com/file/d/1Rqjbna88njpkf5YO4DebolyLpWYRO_P6/view?usp=sharing', 'Lý Phú Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

CREATE TABLE `baitap` (
  `MABAITAP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MAGIAOVIEN` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CHUTHICH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HANNOP` date DEFAULT NULL,
  `SOCAU` int(11) NOT NULL,
  `TENBAITAP` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baitap`
--

INSERT INTO `baitap` (`MABAITAP`, `MAMONHOC`, `MAGIAOVIEN`, `CHUTHICH`, `HANNOP`, `SOCAU`, `TENBAITAP`) VALUES
('BT001', '4204', 'K401', '', '2019-06-10', 5, 'Bài tập chương 2 Cơ sở dữ liệu'),
('BT002', '4212', 'K401', '', '2019-06-18', 5, 'Kiểm tra lý thuyết chương 3 Game'),
('BT003', '4204', 'K401', '', '2019-06-11', 5, 'Bài tập cơ sở dữ liệu 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbaitap`
--

CREATE TABLE `chitietbaitap` (
  `ID` int(11) NOT NULL,
  `MABAITAP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENCAU` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `TENCAUHOI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DAPANA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DAPANB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DAPANC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DAPAND` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DAPANDUNG` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbaitap`
--

INSERT INTO `chitietbaitap` (`ID`, `MABAITAP`, `TENCAU`, `TENCAUHOI`, `DAPANA`, `DAPANB`, `DAPANC`, `DAPAND`, `DAPANDUNG`) VALUES
(66, 'BT001', 'Câu 1', 'Ký tự “a” và “A” có mã ASCII cách nhau bao nhiêu đơn vị ?', '36 đơn vị.', '32 đơn vị.', '100 đơn vị', 'Không có đáp án nào đúng', 'B'),
(67, 'BT001', 'Câu 2', 'Trong hệ nhị phân 1 + 1 bằng:', '10 viết 0 nhớ 1', '1 nhớ 1', '11 viết 1 nhớ 1', '2', 'A'),
(68, 'BT001', 'Câu 3', 'Đơn vị nhỏ nhất để biểu diễn thông tin là?', 'Byte ', 'Bit', 'MB', 'KB', 'B'),
(69, 'BT001', 'Câu 4', 'Chọn phương án đúng nhất về việc sắp xếp tăng dần theo đơn vị đo thông tin', 'B, MB, KB, GB', 'B, MB, GB, KB', 'B, KB, MB, GB', 'B, KB, GB, MB', 'C'),
(70, 'BT001', 'Câu 5', 'Một MB bằng:', '1024KB', '210 KB', '1024 Byte', 'Cả (a) và (b) đều đúng', 'D'),
(76, 'BT002', 'Câu 1', 'Sử dụng công cụ tìm kiếm google để tìm và chỉ hiển thị các tập tin có phần mở rộng .pdf thì tại cửa sổ tìm kiếm của google phải nhập cú pháp như thế nào ?', 'Tên tài liệu filetype.pdf', 'Tên tài liệu file.pdf', 'Tên tài liệu .pdf', 'Tên tài liệu Filetype:pdf', 'D'),
(77, 'BT002', 'Câu 2', 'Virút máy tính có đặc điểm gì ?', 'Những đoạn chương trình được viết ra với mục đích không tốt', 'Những đoạn chương trình nhằm thực hiện một công việc có ích nào đó dành cho mọi người', 'Mầm mống gây ra dịch bệnh cho con người', 'Chương trình trò chơi hữu ích, tiêu khiển cho mọi người', 'A'),
(78, 'BT002', 'Câu 3', 'Hacker viết ra các chương trình Virus nhằm mục đích gì ?', 'Phá hoại các tập tin văn bản, chương trình phần mềm.', 'Phá hủy hệ thống máy tính.', 'Đánh cắp thông tin, dữ liệu của cá nhân hoặc tổ chức', 'Làm gián đoạn các hoạt động của một hệ thống', 'C'),
(79, 'BT002', 'Câu 4', 'Tên của một tập tin gồm có mấy phần ?', '3', '4', '1', '2', 'D'),
(80, 'BT002', 'Câu 5', 'Các ký tự nào dưới đây không thể dùng để đặt tên cho tập tin ?', 'Các ký tự chữ cái từ A đến Z', 'Các ký số từ 0 đến 9', 'Một số ký tự khác @, $, &, (, ), %, #, !, -, _', 'Các ký tự  / : * “ <> |', 'D'),
(81, 'BT003', 'Câu 1', 'câu hỏi số 1', 'A', 'B', 'C', 'D', 'B'),
(82, 'BT003', 'Câu 2', 'câu hỏi số 2', 'A', 'B', 'C', 'D', 'C'),
(83, 'BT003', 'Câu 3', 'câu hỏi số 3', 'A', 'B', 'C', 'D', 'B'),
(84, 'BT003', 'Câu 4', 'câu hỏi số 4', 'A', 'B', 'C', 'D', 'C'),
(85, 'BT003', 'Câu 5', 'câu hỏi số 5', 'A', 'B', 'C', 'D', 'B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MASV` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `KETQUA` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MAGIAOVIEN` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TENGIAOVIEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAKHOA` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MAGIAOVIEN`, `TENGIAOVIEN`, `MAKHOA`, `MATKHAU`) VALUES
('K401', 'Trần Thị Mỹ Hiền', 'K4', '123456'),
('K402', 'Nguyễn Thanh Hải', 'K4', '123456'),
('K403', 'Phan Thanh Sơn', 'K4', '123456'),
('K404', 'Đỗ Văn Tuấn', 'K4', '123456'),
('K405', 'Hà Văn Muôn', 'K4', '123456'),
('K406', 'Lê Thị Giang', 'K4', '123456'),
('K407', 'Nguyễn Thị Hiền', 'K4', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquakiemtra`
--

CREATE TABLE `ketquakiemtra` (
  `ID` int(11) NOT NULL,
  `MASV` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `MABAITAP` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `KETQUA` char(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ketquakiemtra`
--

INSERT INTO `ketquakiemtra` (`ID`, `MASV`, `MABAITAP`, `MAMONHOC`, `TRANGTHAI`, `KETQUA`) VALUES
(7, '15ĐC067', 'BT001', '4204', '1', 'D'),
(8, '15ĐC068', 'BT001', '4204', '1', 'KD'),
(9, '15ĐC069', 'BT001', '4204', '0', ''),
(10, '15ĐC070', 'BT001', '4204', '1', 'D'),
(11, '15ĐC071', 'BT001', '4204', '1', 'KD'),
(12, '15ĐC072', 'BT001', '4204', '0', ''),
(19, '15ĐC067', 'BT002', '4212', '1', 'KD'),
(20, '15ĐC068', 'BT002', '4212', '0', ''),
(21, '15ĐC069', 'BT002', '4212', '0', ''),
(22, '15ĐC070', 'BT002', '4212', '0', ''),
(23, '15ĐC071', 'BT002', '4212', '0', ''),
(24, '15ĐC072', 'BT002', '4212', '0', ''),
(25, '15ĐC067', 'BT003', '4204', '0', ''),
(26, '15ĐC068', 'BT003', '4204', '0', ''),
(27, '15ĐC069', 'BT003', '4204', '1', 'KD'),
(28, '15ĐC070', 'BT003', '4204', '1', 'KD'),
(29, '15ĐC071', 'BT003', '4204', '0', ''),
(30, '15ĐC072', 'BT003', '4204', '0', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MAKHOA` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `TENKHOA` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MAKHOA`, `TENKHOA`) VALUES
('K4', 'Khoa Công Nghệ Thông Tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaibaigiang`
--

CREATE TABLE `loaibaigiang` (
  `MALOAIBG` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOAIBG` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaibaigiang`
--

INSERT INTO `loaibaigiang` (`MALOAIBG`, `TENLOAIBG`) VALUES
('DOCX', 'Bài giảng dạng WORD'),
('MP4', 'Bài giảng dạng ViDeo'),
('PDF', 'Bài giảng dạng PDF'),
('PPTX', 'Bài giảng dạng PowerPoint');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MALOP` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `TENLOP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NIENKHOA` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MAKHOA` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `NIENKHOA`, `MAKHOA`) VALUES
('DHCN2A', 'Đại học công nghệ 2A', '2015-2019', 'K4'),
('DHCN2B', 'Đại học công nghệ 2B', '2015-2019', 'K4'),
('DHCN2C', 'Đại học công nghệ 2C', '2015-2019', 'K4'),
('DHCN2D', 'Đại học công nghệ 2D', '2015-2019', 'K4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `TENMONHOC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HOCKY` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MAMONHOC`, `TENMONHOC`, `HOCKY`) VALUES
('4111', 'lập trình hệ thống và điều khiển thiết bị ngoại vi', 'I'),
('4201', 'Lập trình C', 'I'),
('4202', 'Kĩ Thuật Lập Trình', 'II'),
('4203', 'Cấu Trúc Giữ Liệu Và Giải Thuật', 'I'),
('4204', 'Cơ Sở Dữ Liệu', 'II'),
('4205', 'SQL Server', 'I'),
('4206', 'Công Nghệ Phần Mềm', 'II'),
('4207', 'Phân Tích Thiết Kế Hệ Thống', 'I'),
('4208', 'Java', 'II'),
('4209', 'Lập Trình Hướng Đối Tượng', 'I'),
('4210', 'C#', 'II'),
('4211', 'Multimedia', 'II'),
('4212', 'Game', 'II');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `MAGIAOVIEN` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MAMONHOC` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`MAGIAOVIEN`, `MAMONHOC`) VALUES
('K401', '4204');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MASV` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `TENSV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MALOP` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MASV`, `TENSV`, `MALOP`, `MATKHAU`) VALUES
('15ĐC067', 'Phùng Văn Dũng', 'DHCN2B', '123456'),
('15ĐC068', 'Lý Phú Nam', 'DHCN2B', '123456'),
('15ĐC069', 'Nguyễn Công Minh', 'DHCN2B', '123456'),
('15ĐC070', 'Lê Hùng Mạnh', 'DHCN2B', '123456'),
('15ĐC071', 'Nguyễn Mạnh Cường', 'DHCN2B', '123456'),
('15ĐC072', 'Nguyễn Văn Minh', 'DHCN2B', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaotinnhan`
--

CREATE TABLE `thongbaotinnhan` (
  `MATINNHAN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `USER1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `USER2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `STT1` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `STT2` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbaotinnhan`
--

INSERT INTO `thongbaotinnhan` (`MATINNHAN`, `USER1`, `USER2`, `STT1`, `STT2`) VALUES
('15ĐC06715ĐC069', '15ĐC067', '15ĐC069', '0', '0'),
('15ĐC067K401', '15ĐC067', 'K401', '0', '0'),
('15ĐC06815ĐC067', '15ĐC067', '15ĐC068', '0', '1'),
('15ĐC06815ĐC069', '15ĐC068', '15ĐC069', '0', '0'),
('15ĐC06915ĐC070', '15ĐC069', '15ĐC070', '0', '0'),
('15ĐC07015ĐC067', '15ĐC067', '15ĐC070', '0', '0'),
('15ĐC07115ĐC069', '15ĐC069', '15ĐC071', '1', '0'),
('15ĐC071K404', 'K404', '15ĐC071', '0', '0'),
('K40115ĐC069', '15ĐC069', 'K401', '0', '0'),
('K40115ĐC070', '15ĐC070', 'K401', '0', '0'),
('K401K404', 'K404', 'K401', '0', '0'),
('K40215ĐC069', '15ĐC069', 'K402', '0', '0'),
('K40215ĐC070', 'K402', '15ĐC070', '0', '0'),
('K40415ĐC067', '15ĐC067', 'K404', '0', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`MAMONHOC`,`MALOAIBG`,`MABAIHOC`),
  ADD KEY `MALOAIBG` (`MALOAIBG`);

--
-- Chỉ mục cho bảng `baihocsv`
--
ALTER TABLE `baihocsv`
  ADD PRIMARY KEY (`MAMONHOC`,`MALOAIBG`,`MABAIHOC`);

--
-- Chỉ mục cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`MABAITAP`),
  ADD KEY `MAMONHOC` (`MAMONHOC`),
  ADD KEY `MAGIAOVIEN` (`MAGIAOVIEN`);

--
-- Chỉ mục cho bảng `chitietbaitap`
--
ALTER TABLE `chitietbaitap`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MABAITAP` (`MABAITAP`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MAMONHOC`,`MASV`),
  ADD KEY `MASV` (`MASV`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MAGIAOVIEN`),
  ADD KEY `MAKHOA` (`MAKHOA`);

--
-- Chỉ mục cho bảng `ketquakiemtra`
--
ALTER TABLE `ketquakiemtra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MASV` (`MASV`),
  ADD KEY `MABAITAP` (`MABAITAP`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAKHOA`);

--
-- Chỉ mục cho bảng `loaibaigiang`
--
ALTER TABLE `loaibaigiang`
  ADD PRIMARY KEY (`MALOAIBG`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MALOP`),
  ADD KEY `MAKHOA` (`MAKHOA`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MAMONHOC`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`MAGIAOVIEN`,`MAMONHOC`),
  ADD KEY `MAMONHOC` (`MAMONHOC`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MASV`),
  ADD KEY `MALOP` (`MALOP`);

--
-- Chỉ mục cho bảng `thongbaotinnhan`
--
ALTER TABLE `thongbaotinnhan`
  ADD PRIMARY KEY (`MATINNHAN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietbaitap`
--
ALTER TABLE `chitietbaitap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `ketquakiemtra`
--
ALTER TABLE `ketquakiemtra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD CONSTRAINT `baihoc_ibfk_1` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`),
  ADD CONSTRAINT `baihoc_ibfk_2` FOREIGN KEY (`MALOAIBG`) REFERENCES `loaibaigiang` (`MALOAIBG`);

--
-- Các ràng buộc cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD CONSTRAINT `baitap_ibfk_1` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`),
  ADD CONSTRAINT `baitap_ibfk_2` FOREIGN KEY (`MAGIAOVIEN`) REFERENCES `giaovien` (`MAGIAOVIEN`);

--
-- Các ràng buộc cho bảng `chitietbaitap`
--
ALTER TABLE `chitietbaitap`
  ADD CONSTRAINT `chitietbaitap_ibfk_1` FOREIGN KEY (`MABAITAP`) REFERENCES `baitap` (`MABAITAP`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`MASV`) REFERENCES `sinhvien` (`MASV`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`MAKHOA`) REFERENCES `khoa` (`MAKHOA`);

--
-- Các ràng buộc cho bảng `ketquakiemtra`
--
ALTER TABLE `ketquakiemtra`
  ADD CONSTRAINT `ketquakiemtra_ibfk_1` FOREIGN KEY (`MASV`) REFERENCES `sinhvien` (`MASV`),
  ADD CONSTRAINT `ketquakiemtra_ibfk_2` FOREIGN KEY (`MABAITAP`) REFERENCES `baitap` (`MABAITAP`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MAKHOA`) REFERENCES `khoa` (`MAKHOA`);

--
-- Các ràng buộc cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `phancong_ibfk_1` FOREIGN KEY (`MAMONHOC`) REFERENCES `monhoc` (`MAMONHOC`),
  ADD CONSTRAINT `phancong_ibfk_2` FOREIGN KEY (`MAGIAOVIEN`) REFERENCES `giaovien` (`MAGIAOVIEN`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
