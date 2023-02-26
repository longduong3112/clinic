-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingcare_cnm`
--

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id_director`, `username`, `password`, `fullname`, `age`, `gioitinh`, `address`, `sdt`, `email`, `image`, `created_at`) VALUES
(1, 'nhatnguyen', '123', 'Nguyễn Hoàng Nhật', 22, 'Male', '122 Nguyễn Văn Bảo, P4, Quận Gò Vấp', '0852136254', 'nhatnguyenadmin@gmail.com', 'FB_IMG_1522249461445.jpg', '2022-09-04 09:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `username`, `password`, `fullname`, `age`, `gioitinh`, `id_khoa`, `address`, `sdt`, `email`, `image`, `working_address`, `created_at`, `account`) VALUES
(1, 'bacsigovap1', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 26, 'Nam', 1, '127 Phạm Văn Đồng P7 Gò Vấp', '0852132032', '', '252742215_1079960296143212_8089276407152995710_n.jpg', 'govap', '2022-10-15 20:44:20', 'active'),
(2, 'bacsigovap2', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 2, '', '', '', '', 'govap', '2022-10-15 20:55:23', 'active'),
(3, 'bacsigovap3', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 3, '', '', '', '', 'govap', '2022-10-15 20:55:41', 'active'),
(4, 'bacsigovap4', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 4, '', '', '', '', 'govap', '2022-10-15 20:55:57', 'active'),
(5, 'bacsigovap5', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 5, '', '', '', '', 'govap', '2022-10-15 20:56:11', 'active'),
(6, 'bacsigovap6', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 6, '', '', '', '', 'govap', '2022-10-15 20:56:23', 'active'),
(7, 'bacsigovap7', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 7, '', '', '', '', 'govap', '2022-10-15 20:56:34', 'active'),
(8, 'bacsigovap8', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoàng Nhật', 0, '', 8, '', '', '', '', 'govap', '2022-10-15 20:56:44', 'active'),
(75, 'nhatnguyen', '202cb962ac59075b964b07152d234b70', 'Nhật Nguyễn', 0, '', 7, '', '', '', '', 'binhthanh', '2022-10-15 23:13:21', 'active'),
(76, 'nhatnguyen111', '202cb962ac59075b964b07152d234b70', 'Nhật Nguyễn', 0, '', 3, '', '', '', '', 'binhthanh', '2022-10-15 23:13:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameF` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `name`, `nameF`) VALUES
(1, 'coxuongkhop', 'Cơ xương khớp'),
(2, 'thankinh', 'Thần kinh'),
(3, 'tieuhoa', 'Tiêu hóa'),
(4, 'timmach', 'Tim mạch'),
(5, 'taimuihong', 'Tai mũi họng'),
(6, 'cotsong', 'Cột sống'),
(7, 'yhoccotruyen', 'Y học cổ truyền'),
(8, 'dalieu', 'Da liễu');

-- --------------------------------------------------------

--
-- Table structure for table `messages_chat`
--

CREATE TABLE `messages_chat` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages_chat`
--

INSERT INTO `messages_chat` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1348466428, 1217127758, 'dádđ'),
(2, 4234324, 1233211231, 'hi'),
(3, 1111111111, 1233211231, '?'),
(4, 432432, 1233211231, '??'),
(5, 432432, 1233211231, 'dfgh'),
(6, 1635600050, 432432, '?'),
(7, 432432, 1233211231, 'làm sao'),
(8, 1233211231, 432432, '?'),
(9, 432432, 1233211231, 'alo'),
(10, 1233211231, 432432, '?'),
(11, 432432, 4234324, 'fdsf'),
(12, 1368313469, 432432, 'hehe'),
(13, 1368313469, 42342, 'oke'),
(14, 432432, 42342, 'alo'),
(15, 432432, 42342, 'ád'),
(16, 42342, 432432, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `phieukham`
--

CREATE TABLE `phieukham` (
  `id_phieukham` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ngayhen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `trieuchung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chidan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phikham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` longtext COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(26, 'Nhật Nguyễn', 'ngfre@gmail.com', 234775488, ' 2132131231', '2022-10-07 17:23:27', NULL, NULL, NULL),
(27, 'Nhật Nguyễn', 'ngfre@gmail.com', 234775488, ' đau đầu lắm ', '2022-10-08 12:40:08', NULL, NULL, NULL),
(28, 'Nhật Nguyễn', 'ngfre@gmail.com', 234775488, 'hahahaah', '2022-10-09 12:52:38', NULL, NULL, NULL),
(29, 'Nguyễn Hoàng Nhật ', 'ngfre2133@gmail.com', 232021235, 'Vào một sáng cuối xuân, đầu hạ, khi bầu trời còn đẫm sương đêm, đoàn xe tham quan của trường em đã bắt đầu chuyển bánh. Những chiếc xe đầy ắp tiếng cười lướt nhẹ qua cây cầu bắc ngang sông Đáy hiền hòa,\"trong vắt, rồi tiếp tục bon bon trên quốc lộ 1. Xa xa, sau làn sương mờ, dãy Non Nước hiện lên đẹp như một bức tranh phong cảnh. Chúng em đều cảm thấy hồi hộp vì tuy nghe tiếng đã lâu nhưng chưa ai được đặt chân tới mảnh đất quê hương cờ lau dẹp loạn này bao giờ. Tiếng cười nói trong xe tạm lắng xuống, nhường chỗ cho những ánh mắt háo hức, chờ đợi.', '2022-10-15 16:32:01', NULL, NULL, NULL),
(30, 'Nguyễn Hoàng Nhật', 'ngfre2133@gmail.com', 234775488, 'EDSDF', '2022-10-16 18:30:15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `PatientGender` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `PatientAdd` mediumtext CHARACTER SET latin1 DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext CHARACTER SET latin1 DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(18, 0, 'nh?t', 712387612, 'nhaasdddd@gmail.com', 'male', '12 PVN P7 TPHCM', 21, '??????????????', '2022-10-14 10:40:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(11) NOT NULL,
  `TuaDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TinTuc` varchar(20000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaNhanVien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDang` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `TuaDe`, `TinTuc`, `img`, `MaNhanVien`, `url`, `ten_url`, `NgayDang`) VALUES
(40, 'Tin tức Covid-19 mới nhất hôm nay 07/07/2022 | Dịch Virus Corona Việt Nam hôm nay', 'Hôm nay (2.11), Việt Nam ghi nhận 5.637 ca mắc COVID-19, 2.741 ca khỏi bệnh', 'tintucct.jpg', '', 'https://laodong.vn/y-te/hom-nay-211-viet-nam-ghi-nhan-5637-ca-mac-covid-19-2741-ca-khoi-benh-969963.ldo', 'Tin tức Covid-19 mới nhất hôm nay 07/07/2022 | Dịch Virus Corona Việt Nam hôm nay', '20:44 10-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `attribute` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `unique_id`, `username`, `password`, `fullname`, `attribute`, `lname`, `age`, `gioitinh`, `address`, `sdt`, `email`, `image`, `status`) VALUES
(28, 1111111111, 'long_lonely123', '8359c1adf487ee7eacee6f3d40405782', 'Duong Ngoc Long', '', 'Thành viên', NULL, '', 'Ládasdasd', '0833069308', '12345@gmail.com', '', 'Active now'),
(30, 432432, 'hoicham', 'f46ef81f2464441ba58aeecbf654ee41', 'BS. Nguyễn Hoàng Nhật', 'tuvanvien', 'Chuyên khoa Da liễu', NULL, '', '12 PVN P7 TPHCM', '02315242652', 'hahalolo@gmail.com', '', 'Offline now'),
(33, 213213123, 'nhatt', '202cb962ac59075b964b07152d234b70', 'Nhật Hoàng', '', 'Thành viên', NULL, '', '12dd', '02315242133', 'nhatit32kid213@gmail.com', '', 'Offline now'),
(34, 1368313469, 'abc', '202cb962ac59075b964b07152d234b70', 'BS. Dương Ngọc Long', 'tuvanvien', 'Chuyên khoa Tim mạch', NULL, '', '12dd', '0231523344', 'nottingeqweham312@gmail.com', '', 'Online'),
(36, 1111111113, 'nhatnguyen123', '8359c1adf487ee7eacee6f3d40405782', 'Nhat Nguyen', '', 'Thành viên', NULL, '', 'Ládasdasd', '0833069308', '12345@gmail.com', '', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `messages_chat`
--
ALTER TABLE `messages_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`id_phieukham`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages_chat`
--
ALTER TABLE `messages_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `id_phieukham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
