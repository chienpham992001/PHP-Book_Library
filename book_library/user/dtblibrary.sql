-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 09:28 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: ` librarymanegement-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `phone`, `email`) VALUES
(1, 'admin1', '12345678', 374423375, 'lbducanhb1ts419@gmail.com'),
(2, 'admin', '$2y$10$Gy3xipJ1z3sr/497AEY3guKCqC3hypyf9zFWVBRc8S0/6vSZkPRya', 0, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `auth_id` int(11) NOT NULL,
  `author_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `image` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`auth_id`, `author_name`, `image`, `description`) VALUES
(1, 'Phạm Văn Hiệp', 'images\\author\\nam.png', ''),
(2, 'Cao Thị Thanh', 'images\\author\\nu.png', ''),
(3, 'Đặng Văn Lương', 'images\\author\\nam.png', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `book_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `publisher` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `uploaded_time` datetime NOT NULL,
  `total_qty` int(11) NOT NULL,
  `current_qty` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`book_id`, `image`, `book_name`, `publisher`, `description`, `uploaded_time`, `total_qty`, `current_qty`, `category_id`, `author_id`) VALUES
(4, 'images/books/sach01.jpg', 'Giáo trình Mạng máy tính', 'Thanh Niên', 'Nội dung được trình bày trong các chương mục một cách rõ ràng, logic, giáo trình này sẽ giúp sinh viên nhanh chóng tiếp thu được các kiến thức cơ bản về mạng máy tính, từ đó thiết kế, xây dựng một hệ thống mạng cho các phòng thí nghiệm thực hành, các văn phòng làm việc của các cơ quan, tổ chức...\r\n\r\nNội dung giáo trình gồm 5 chương:\r\n\r\nChương 1: Tổng quan về mạng máy tính\r\n\r\nChương 2: Mô hình tham chiếu OIS và các chuẩn mạng\r\n\r\nChương 3: Các giao thức truyền thông\r\n\r\nChương 4: Mạng cục bộ\r\n\r\nChương 5: Giới thiệu hệ điều hành mạng Windows Server', '2019-05-22 00:00:00', 100, 70, 3, 2),
(8, 'images\\books\\sach02.jpg', 'Giáo trình nguyên lý thống kê', 'Thống Kê', 'Trong các cuộc tiếp xúc về thương mại, kinh tế, giáo dục và chính sách xã hội...mọi người đều minh chứng bẵng dữ liệu. Hiểu biết về thống kê giúp chúng ta chắt lọc những thông tin có nghĩa trong dòng lũ của dữ liệu để ra các quyết định chính xác trong điều kiện không chắc chắn\r\nNội dung giáo trình hướng đến tính khoa học, cơ bản và hội nhập. Giáo trình gồm 8 chương:\r\n\r\n+ Chương 1: Những vấn đề chung về thống kê.\r\n\r\n+ Chương 2: Điều tra thống kê.\r\n\r\n+ Chương 3: Tổng hợp thống kê.\r\n\r\n+ Chương 4: Các mức độ của hiện tượng kinh tế - xã hội.\r\n\r\n+ Chương 5: Hồi quy và tương quan.\r\n\r\nChương 6: Dãy số thời gian.\r\n\r\n+ Chương 7: Chỉ số.\r\n\r\n+ Chương 8: Điều tra chọn mẫu', '2014-02-06 09:32:46', 50, 12, 4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_borrow`
--

CREATE TABLE `book_borrow` (
  `borrow_id` int(11) NOT NULL,
  `book_copy_id` int(11) NOT NULL,
  `borrow_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_copy`
--

CREATE TABLE `book_copy` (
  `bcopy_id` int(11) NOT NULL,
  `buy_date` date NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `nganh_id` int(11) NOT NULL,
  `nganh_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`nganh_id`, `nganh_name`, `creation_date`) VALUES
(3, 'Công Nghệ Thông Tin', '0000-00-00 00:00:00'),
(4, 'Quản trị nhân lực', '0000-00-00 00:00:00'),
(5, 'Quản lý kinh doanh', '0000-00-00 00:00:00'),
(6, 'Kế toán - Kiểm toán', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `class` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `class`, `phone`, `email`, `avatar`) VALUES
(2, 'Đức Anh', '123133', '2143242412', 'qweqeqw@gmail.com', 'imag-01.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`auth_id`);

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `maDanhMuc` (`category_id`),
  ADD KEY `maTacGia` (`author_id`);

--
-- Chỉ mục cho bảng `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `maBanDoc` (`user_id`),
  ADD KEY `book_copy_id` (`book_copy_id`);

--
-- Chỉ mục cho bảng `book_copy`
--
ALTER TABLE `book_copy`
  ADD PRIMARY KEY (`bcopy_id`),
  ADD KEY `maSach` (`book_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`nganh_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `nganh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`nganh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`auth_id`);

--
-- Các ràng buộc cho bảng `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD CONSTRAINT `book_borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_borrow_ibfk_3` FOREIGN KEY (`book_copy_id`) REFERENCES `book_copy` (`bcopy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `book_copy`
--
ALTER TABLE `book_copy`
  ADD CONSTRAINT `book_copy_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
