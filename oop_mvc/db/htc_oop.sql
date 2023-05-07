-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2023 lúc 10:12 AM
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
-- Cơ sở dữ liệu: `htc_oop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_language`
--

CREATE TABLE `tbl_language` (
  `pk_id_language` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_language`
--

INSERT INTO `tbl_language` (`pk_id_language`, `name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'Html'),
(5, 'CSS'),
(6, 'JS'),
(7, 'MYSQL'),
(8, 'PHP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_language_worker`
--

CREATE TABLE `tbl_language_worker` (
  `pk_id_lang_worker` int(11) NOT NULL,
  `fk_id_worker` int(11) NOT NULL,
  `fk_id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_language_worker`
--

INSERT INTO `tbl_language_worker` (`pk_id_lang_worker`, `fk_id_worker`, `fk_id_language`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_level`
--

CREATE TABLE `tbl_level` (
  `pk_id_level` int(11) NOT NULL,
  `fk_id_type_worker` int(11) NOT NULL,
  `name_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_level`
--

INSERT INTO `tbl_level` (`pk_id_level`, `fk_id_type_worker`, `name_level`) VALUES
(1, 1, 'Junior 1'),
(2, 1, 'Junior 2'),
(3, 1, 'Junior 3'),
(4, 1, 'Junior 4'),
(5, 2, 'PA'),
(6, 2, 'PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_noun`
--

CREATE TABLE `tbl_noun` (
  `pk_id_noun` int(11) NOT NULL,
  `fk_id_level` int(11) NOT NULL,
  `noun` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_noun`
--

INSERT INTO `tbl_noun` (`pk_id_noun`, `fk_id_level`, `noun`) VALUES
(1, 1, 1.5),
(2, 2, 2),
(3, 3, 2.5),
(4, 4, 3),
(5, 5, 1.5),
(6, 6, 2.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_type_worker`
--

CREATE TABLE `tbl_type_worker` (
  `pk_id_type_worker` int(11) NOT NULL,
  `name_type_worker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_type_worker`
--

INSERT INTO `tbl_type_worker` (`pk_id_type_worker`, `name_type_worker`) VALUES
(1, 'Dev'),
(2, 'Manager Product');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_work`
--

CREATE TABLE `tbl_work` (
  `pk_id_work` int(11) NOT NULL,
  `fk_id_worker` int(11) NOT NULL,
  `number_hour` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_work`
--

INSERT INTO `tbl_work` (`pk_id_work`, `fk_id_worker`, `number_hour`, `month`, `year`) VALUES
(1, 1, 160, 7, 2022),
(2, 1, 168, 8, 2022),
(3, 1, 172, 9, 2022),
(4, 1, 180, 10, 2022),
(5, 2, 170, 7, 2022),
(6, 2, 150, 8, 2022),
(7, 2, 160, 9, 2022),
(8, 3, 180, 7, 2022),
(9, 4, 157, 7, 2022),
(10, 4, 171, 8, 2022),
(13, 5, 182, 7, 2022);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_worker`
--

CREATE TABLE `tbl_worker` (
  `pk_id_worker` int(11) NOT NULL,
  `fk_id_type_worker` int(11) NOT NULL,
  `fk_id_level` int(11) NOT NULL,
  `name_worker` varchar(200) NOT NULL,
  `age_worker` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `birth_day` date NOT NULL,
  `number_year_exp` int(11) NOT NULL,
  `bassic_pay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_worker`
--

INSERT INTO `tbl_worker` (`pk_id_worker`, `fk_id_type_worker`, `fk_id_level`, `name_worker`, `age_worker`, `address`, `birth_day`, `number_year_exp`, `bassic_pay`) VALUES
(1, 1, 4, 'Mr Trung', 20, 'england', '2000-07-11', 10, 40000),
(2, 1, 2, 'Mr Thuan', 22, 'Italy', '2000-10-30', 3, 20000),
(3, 1, 4, 'Jax', 19, 'VietNam', '2000-05-05', 6, 30000),
(4, 2, 5, 'Master Yi', 21, 'Brazil', '2000-06-08', 2, 50000),
(5, 2, 6, 'Sylas', 30, 'england', '2000-08-04', 6, 60000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`pk_id_language`);

--
-- Chỉ mục cho bảng `tbl_language_worker`
--
ALTER TABLE `tbl_language_worker`
  ADD PRIMARY KEY (`pk_id_lang_worker`);

--
-- Chỉ mục cho bảng `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`pk_id_level`);

--
-- Chỉ mục cho bảng `tbl_noun`
--
ALTER TABLE `tbl_noun`
  ADD PRIMARY KEY (`pk_id_noun`);

--
-- Chỉ mục cho bảng `tbl_type_worker`
--
ALTER TABLE `tbl_type_worker`
  ADD PRIMARY KEY (`pk_id_type_worker`);

--
-- Chỉ mục cho bảng `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD PRIMARY KEY (`pk_id_work`);

--
-- Chỉ mục cho bảng `tbl_worker`
--
ALTER TABLE `tbl_worker`
  ADD PRIMARY KEY (`pk_id_worker`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `pk_id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_language_worker`
--
ALTER TABLE `tbl_language_worker`
  MODIFY `pk_id_lang_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `pk_id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_noun`
--
ALTER TABLE `tbl_noun`
  MODIFY `pk_id_noun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_type_worker`
--
ALTER TABLE `tbl_type_worker`
  MODIFY `pk_id_type_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_work`
--
ALTER TABLE `tbl_work`
  MODIFY `pk_id_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_worker`
--
ALTER TABLE `tbl_worker`
  MODIFY `pk_id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
