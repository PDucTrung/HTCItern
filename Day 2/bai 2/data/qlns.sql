-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2023 lúc 03:46 PM
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
(2, 'android,css,js', 'junior 1'),
(3, 'android,php,js', 'junior 2');

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
(1, 'PA'),
(4, 'PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soefficientsalary`
--

CREATE TABLE `soefficientsalary` (
  `level` varchar(255) NOT NULL,
  `hesoluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soefficientsalary`
--

INSERT INTO `soefficientsalary` (`level`, `hesoluong`) VALUES
('junior 1', 1),
('junior 2', 2),
('junior 3', 2),
('junior 4', 3),
('PA', 3),
('PM', 4);

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
(1, 'trung', 23, 'hoaiduc', '2000-01-01', 1, 2000000),
(2, 'trung2', 22, 'hanoi', '2000-02-01', 2, 4000000),
(3, 'trung3', 21, 'hadong', '2000-03-01', 3, 3000000),
(4, 'trung4', 20, 'namtuliem', '2000-04-01', 4, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work`
--

CREATE TABLE `work` (
  `staffID` int(11) NOT NULL,
  `sogio` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `work`
--

INSERT INTO `work` (`staffID`, `sogio`, `thang`, `nam`) VALUES
(1, 100, 11, 2),
(2, 300, 10, 2),
(3, 400, 1, 1),
(4, 200, 3, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
