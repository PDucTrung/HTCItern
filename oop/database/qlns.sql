-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2023 lúc 11:15 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devloper`
--

CREATE TABLE `devloper` (
  `StaffID` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `devloper`
--

INSERT INTO `devloper` (`StaffID`, `language`, `level`) VALUES
(5, 'Pascal, C++, C', 'junior 2'),
(3, 'html', 'junior 4'),
(6, 'python', 'junior 2'),
(2, 'ruby', 'junior 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `StaffID` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`StaffID`, `level`) VALUES
(4, 'PM'),
(1, 'PA'),
(7, 'PA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soefficientsalary`
--

CREATE TABLE `soefficientsalary` (
  `StaffID` int(11) NOT NULL,
  `hesoluong` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soefficientsalary`
--

INSERT INTO `soefficientsalary` (`StaffID`, `hesoluong`) VALUES
(1, 3),
(2, 1.5),
(4, 3.5),
(5, 1.5),
(3, 2.5),
(6, 1.5),
(7, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `namkinhnghiem` int(11) NOT NULL,
  `luongcoban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`StaffID`, `ten`, `tuoi`, `diachi`, `ngaysinh`, `namkinhnghiem`, `luongcoban`) VALUES
(4, 'Tiền', 23, 'Bắc Ninh', '2000-03-03', 2, 3000000),
(5, 'Thuần', 23, 'Nam sách', '2000-02-02', 1, 1000000),
(1, 'Trung', 23, 'Hải Dương', '2000-04-04', 2, 3000000),
(3, 'Tuyền', 21, 'Nam Định', '2000-11-11', 1, 500000),
(6, 'trung6', 23, 'Nam sách', '2000-02-02', 2, 1000000),
(7, 'Long', 23, 'hai duong', '2000-04-04', 1, 4000000),
(2, 'Trung2', 22, 'Hà Nội', '2000-03-03', 3, 3000000),
(8, 'dasd', 12, 'Bắc Ninh', '2000-01-01', 2, 3000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work`
--

CREATE TABLE `work` (
  `StaffID` int(11) NOT NULL,
  `sogio` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `work`
--

INSERT INTO `work` (`StaffID`, `sogio`, `thang`, `nam`) VALUES
(1, 100, 11, 2),
(2, 120, 8, 2),
(4, 200, 12, 3),
(5, 120, 12, 2),
(3, 250, 14, 2),
(6, 250, 1, 2),
(7, 120, 5, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
