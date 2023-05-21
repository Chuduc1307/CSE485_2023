-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2023 lúc 04:34 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btth02`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `ID_KhoaHoc` int(11) DEFAULT NULL,
  `ID_SinhVien` int(11) DEFAULT NULL,
  `ID_Suthamdu` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `ID_GiangVien` int(11) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `ID_KhoaHoc` int(11) NOT NULL,
  `MaKhoahoc` varchar(10) DEFAULT NULL,
  `TieuDe` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `ID_LopHocPhan` int(11) NOT NULL,
  `ID_KhoaHoc` int(11) DEFAULT NULL,
  `ID_GiangVien` int(11) DEFAULT NULL,
  `KhoangThoiGian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `ID_SinhVien` int(11) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `Khoahoc` int(20) DEFAULT NULL,
  `Hocky` varchar(10) DEFAULT NULL,
  `Giaidoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suthamdu`
--

CREATE TABLE `suthamdu` (
  `ID_Suthamdu` int(11) NOT NULL,
  `ID_LopHocPhan` int(11) DEFAULT NULL,
  `ID_SinhVien` int(11) DEFAULT NULL,
  `Ngay` date DEFAULT NULL,
  `TrangThai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD KEY `ID_KhoaHoc` (`ID_KhoaHoc`),
  ADD KEY `ID_SinhVien` (`ID_SinhVien`),
  ADD KEY `ID_Suthamdu` (`ID_Suthamdu`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`ID_GiangVien`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`ID_KhoaHoc`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`ID_LopHocPhan`),
  ADD KEY `ID_KhoaHoc` (`ID_KhoaHoc`),
  ADD KEY `ID_GiangVien` (`ID_GiangVien`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`ID_SinhVien`);

--
-- Chỉ mục cho bảng `suthamdu`
--
ALTER TABLE `suthamdu`
  ADD PRIMARY KEY (`ID_Suthamdu`),
  ADD KEY `ID_LopHocPhan` (`ID_LopHocPhan`),
  ADD KEY `ID_SinhVien` (`ID_SinhVien`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ibfk_1` FOREIGN KEY (`ID_KhoaHoc`) REFERENCES `khoahoc` (`ID_KhoaHoc`),
  ADD CONSTRAINT `baocao_ibfk_2` FOREIGN KEY (`ID_SinhVien`) REFERENCES `sinhvien` (`ID_SinhVien`),
  ADD CONSTRAINT `baocao_ibfk_3` FOREIGN KEY (`ID_Suthamdu`) REFERENCES `suthamdu` (`ID_Suthamdu`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`ID_KhoaHoc`) REFERENCES `khoahoc` (`ID_KhoaHoc`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`ID_GiangVien`) REFERENCES `giangvien` (`ID_GiangVien`);

--
-- Các ràng buộc cho bảng `suthamdu`
--
ALTER TABLE `suthamdu`
  ADD CONSTRAINT `suthamdu_ibfk_1` FOREIGN KEY (`ID_LopHocPhan`) REFERENCES `lophocphan` (`ID_LopHocPhan`),
  ADD CONSTRAINT `suthamdu_ibfk_2` FOREIGN KEY (`ID_SinhVien`) REFERENCES `sinhvien` (`ID_SinhVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
