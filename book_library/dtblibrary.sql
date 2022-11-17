-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 07:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtblibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `phone`, `email`) VALUES
(1, 'admin1', '12345678', 374423375, 'lbducanhb1ts419@gmail.com'),
(2, 'admin', '$2y$10$Gy3xipJ1z3sr/497AEY3guKCqC3hypyf9zFWVBRc8S0/6vSZkPRya', 374423375, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `author_image` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `creation_time` date NOT NULL,
  `update_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_image`, `description`, `creation_time`, `update_time`) VALUES
(1, 'Phạm Văn Hiệp', 'nam.png', 'Giảng viên', '0000-00-00', '2022-05-23'),
(2, 'Cao Thị Thanh', 'nu.png', 'Giảng viên', '0000-00-00', '0000-00-00'),
(3, 'Đặng Văn Lương', 'nam.png', 'Giảng viên', '0000-00-00', '0000-00-00'),
(4, 'Covey, Stephen R.', 'nam.png', 'Nhà khoa học', '0000-00-00', '0000-00-00'),
(5, 'Từ Quang Phương', 'teacher.png', 'Thạc sĩ', '0000-00-00', '0000-00-00'),
(6, 'Đặng Ngọc Hùng', 'teacher.png', 'Giáo sư', '0000-00-00', '0000-00-00'),
(7, 'Đỗ Thị Tâm ', 'nu.png', 'Tiến sĩ', '0000-00-00', '0000-00-00'),
(8, 'Đỗ Ngọc Sơn', 'nam.png', 'Thạc sĩ', '0000-00-00', '0000-00-00'),
(10, 'Nguyễn Trung Phú', 'nam.png', 'Thạc sĩ', '2022-05-23', '2022-05-23'),
(11, 'Nguyễn Thị A', 'nu.png', 'Giảng viên', '2022-05-23', '2022-05-23'),
(12, 'Nguyễn Thị Giáp ', 'nu.png', 'Giảng viên', '2022-05-23', '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_bin NOT NULL,
  `book_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `publisher` varchar(20) COLLATE utf8_bin NOT NULL,
  `descrip` text COLLATE utf8_bin NOT NULL,
  `creation_time` date NOT NULL,
  `uploaded_time` date NOT NULL,
  `total_qty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `nganh_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `image`, `book_name`, `publisher`, `descrip`, `creation_time`, `uploaded_time`, `total_qty`, `cost`, `nganh_id`, `author_id`) VALUES
(1, 'sach03.jpg', 'Nắm vững nghệ thuật lãnh đạo', 'Tổng hợp Tp. Hồ CHí ', 'Cuốn sách Nghệ thuật lãnh đạo theo nguyên tắc sẽ giúp bạn giải quyết những nghịch lý sau:\n+ Làm thế nào để đạt được và duy trì sự cân bằng giữa công viêc với gia đình, giữa nghề nghiệp với các cuộc sống cá nhân dưới áp lực và khủng hoảng thường xuyên?\n+ Làm thế nào giải phóng tính sáng tạo, tài năng và sức mạnh hầu hết đội ngũ lao động hiện nay?\n+ Làm thế nào để xây dựng một văn hóa đổi mới, linh hoạt mà vẫn duy trì được tính ổn định và an toàn của tổ chức?\n+ Làm thế nào gắn kết con người và văn hóa với chiến lược để mọi người đều tận tâm với chiến lược?\n+ Cùng nhiều vấn đề đáng quan tâm khác?', '0000-00-00', '2022-05-24', 20, 14000, 4, 6),
(2, 'sach05.jpg', 'Giáo trình kế toán quản trị', 'Thống kê', 'Nội dung của cuốn sách gồm các chương:\r\n\r\n+ Chương 1: Tổng quan về kế toán quản trị\r\n\r\n+ Chương 2: Chi phí và phân loại chi phí trong kế toán quản trị\r\n\r\n+ Chương 3: Các phương pháp xác định chi phí và giá thành\r\n\r\n+ Chương 4: Phân tích mối quan hệ chi phi-khối lượng-lợi nhuận\r\n\r\n+ Chương 5: Định mức chi phí và dự toán ngân sách hoạt động sản xuất kinh doanh', '0000-00-00', '2013-05-15', 32, 15000, 6, 6),
(3, 'sach04.jpg', 'Giáo trình lập trình Windows', 'Đại học Công nghiệp ', 'Giáo trình Windows được biên soạn nhằm mục đích cung cấp những kiến thức cơ bản về lập trình trong môi trường .Net của MicroSoft. Với giáo trình này, sinh viên sẽ có được các kiến thức về lập trình để tạo ra các ứng dụng khác nhau, bao gồm: ứng dụng dòng lệnh (ConsoleApplication), ứng dụng giao diện Windows (Windows Application) sao cho chương trình dễ sử dụng, tính thực tiễn cao, giao diện thân thiện.\r\n\r\nNội dung giáo trình gồm 5 chương:\r\n\r\nChương 1: VISUAL STUDIO và .NET FRAMEWORK\r\n\r\nChương 2: Lập trình C# căn bản\r\n\r\nChương 3: Lập trình hướng đối tượng trong C#\r\n\r\nChương 4: Lập trình Windows Form\r\n\r\nChương 5: Tương tác cơ sở dữ liệu\r\n\r\n', '0000-00-00', '2015-01-14', 113, 16500, 3, 8),
(4, 'sach01.jpg', 'Giáo trình Mạng máy tính', 'Thanh Niên', 'Nội dung được trình bày trong các chương mục một cách rõ ràng, logic, giáo trình này sẽ giúp sinh viên nhanh chóng tiếp thu được các kiến thức cơ bản về mạng máy tính, từ đó thiết kế, xây dựng một hệ thống mạng cho các phòng thí nghiệm thực hành, các văn phòng làm việc của các cơ quan, tổ chức...\r\n\r\nNội dung giáo trình gồm 5 chương:\r\n\r\nChương 1: Tổng quan về mạng máy tính\r\n\r\nChương 2: Mô hình tham chiếu OIS và các chuẩn mạng\r\n\r\nChương 3: Các giao thức truyền thông\r\n\r\nChương 4: Mạng cục bộ\r\n\r\nChương 5: Giới thiệu hệ điều hành mạng Windows Server', '0000-00-00', '2019-05-22', 100, 21000, 3, 2),
(5, 'sach06.jpg', 'Giáo trình kinh tế đầu tư', 'Đại học KTQD', 'Giáo trình có kết cấu 10 chương như sau:\r\n\r\n- Chương 1: Tổng quan về đầu tư và môn học kinh tế đầu tư.\r\n\r\n- Chương 2: Những vấn đề cơ bản của đầu tư phát triển.\r\n\r\n- Chương 3: Nguồn vốn đầu tư.\r\n\r\n- Chương 4: Quản lý nhà nước và kế hoạch hóa đầu tư.\r\n\r\n- Chương 5: Môi trường đầu tư.\r\n\r\n- Chương 6: Đầu tư công.\r\n\r\n- Chương 7: Kết quả và hiệu quả của đầu tư phát triển.\r\n\r\n- Chương 8: Đầu tư quốc tế.\r\n\r\n- Chương 9: Đầu tư phát triển trong doanh nghiệp.\r\n\r\n- Chương 10: Quản lý đầu tư theo dự án.', '0000-00-00', '2014-07-17', 21, 15000, 5, 5),
(7, 'sach07.jpg', 'Giáo trình Công nghệ XML', 'Giáo dục Việt Nam', 'Giáo trình Công nghệ XML giúp bạn đọc có kiến thức nền tảng về công nghệ XML các ứng dụng của XML để xây dựng các ứng dụng thực tế. Giáo trình này cung cấp cho bạn đọc kiến thức từ cơ bản cho đến chuyên sâu về công nghệ XMLGiáo trình này gồm 5 chương:Chương 1: Tổng quan về XMLChương 2: Định nghĩa tài liệu kiểu và không gian tênChương 3: Trình bày tài liệu XML sử dụng CSS và XSLChương 4: Mô hình đối tượng cơ bản.Chương 5: Lược đồ. Nội dung của chương trình bày về các lược đồ XML và tính năng của nó trong việc xây dựng cấu trúc của tài liệu XML', '0000-00-00', '2022-05-23', 2, 14000, 1, 5),
(8, 'sach02.jpg', 'Giáo trình nguyên lý thống kê', 'Thống Kê', 'Trong các cuộc tiếp xúc về thương mại, kinh tế, giáo dục và chính sách xã hội...mọi người đều minh chứng bẵng dữ liệu. Hiểu biết về thống kê giúp chúng ta chắt lọc những thông tin có nghĩa trong dòng lũ của dữ liệu để ra các quyết định chính xác trong điều kiện không chắc chắn\r\nNội dung giáo trình hướng đến tính khoa học, cơ bản và hội nhập. Giáo trình gồm 8 chương:\r\n\r\n+ Chương 1: Những vấn đề chung về thống kê.\r\n\r\n+ Chương 2: Điều tra thống kê.\r\n\r\n+ Chương 3: Tổng hợp thống kê.\r\n\r\n+ Chương 4: Các mức độ của hiện tượng kinh tế - xã hội.\r\n\r\n+ Chương 5: Hồi quy và tương quan.\r\n\r\nChương 6: Dãy số thời gian.\r\n\r\n+ Chương 7: Chỉ số.\r\n\r\n+ Chương 8: Điều tra chọn mẫu', '0000-00-00', '2014-02-06', 50, 13000, 4, 3),
(35, 'sach09.jpg', 'Giáo trình Tiếng Việt thực hành', 'NXB Hồ Chí Minh', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-23', '2022-05-24', 22, 18000, 2, 12),
(36, 'sach10.jpg', 'Introducing English Semantics', 'Nước ngoài', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-23', '2022-05-23', 21, 18000, 6, 4),
(37, 'sach11.jpg', 'Đánh thức con người trong bạn', 'Nước ngoài', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 32, 14000, 6, 4),
(38, 'sach12.jpg', 'Giáo trình kinh doanh quốc tế', 'NXB Kim Đồng', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 20, 13000, 5, 11),
(39, 'sach13.jpg', 'Bài tập quản trị chiến lược', 'NXB Hồ Chí Minh', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 40, 16500, 5, 7),
(40, 'sach14.jpg', 'Giáo trình Quản trị chất lượng', 'NXB Kim Đồng', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 15, 18000, 2, 2),
(41, 'sach15.jpg', 'Lập trình căn bản đến nâng cao', 'ĐH Công Nghiệp HN', 'Cuốn sách Inside C# nguyên bản của tác giả Tom Archor do Microsoft Press ấn bản năm 2001 được rất nhiều lập trình viên, sinh viên nhiều nước trên thế giới, trong đó có Việt Nam đón nhận nồng nhiệt. Cuốn sách đã được nhóm tác giả biên dịch sang Tiếng Việt nhằm giúp cho bạn đọc là sinh viên, lập trình viên hạn chế về Tiếng Anh dễ dàng tiếp cận hơn.', '2022-05-24', '2022-05-24', 49, 15000, 1, 10),
(42, 'img-09.jpg', 'Lập trình Java căn bản', 'ĐH Công Nghiệp HN', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 40, 21000, 3, 3),
(43, 'sâch16.jpg', 'Giáo trình thuế và kế toán thuế', 'NXB Hồ Chí Minh', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 20, 16500, 4, 6),
(44, 'ngonnguhoc.jpg', 'Giáo trình ngôn ngữ học', 'Nước ngoài', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 22, 13000, 2, 5),
(45, 'img-07.jpg', 'Giáo trình kỹ thuật lập trình', 'ĐH Công Nghiệp HN', 'Những trí thức ngôn ngữ học là hữu ích cho bất cứ một ai. Nó rất cần thiết đối với những người làm công tác giảng dạy và nghiên cứu. Những người dùng ngôn ngữ làm công cụ nghề nghiệp như các nhà văn nhà báo, các cán bộ tuyên truyền…cũng không thể không biết đến ngôn ngữ học. Nhưng làm quen với những tư tưởng cơ bản của ngôn ngữ học hiện đại không phải là đơn giản bởi vì những tri thức được tích lũy trong ngành khoa học này rất phong phú và phức tạp. Để có thể bước vào ngôn ngữ học một cách thuận lợi, cần phải năm vững một số khái niệm cơ bản và quan trọng nhất của ngôn ngữ học. Những tri thức ấy được trình bày trong giáo trình “Dẫn luận ngôn ngữ học” do tác giả Nguyễn Thiện Giáp (ch.b), đồng tác giả: Đoàn Thiện Thuật, Nguyễn Minh Thuyết.', '2022-05-24', '2022-05-24', 30, 15000, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE `book_borrow` (
  `borrow_id` int(11) NOT NULL,
  `oder_detail_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `deadline` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`borrow_id`, `oder_detail_id`, `book_id`, `qty`, `borrow_date`, `user_id`, `deadline`, `return_date`, `status`) VALUES
(96, 'p1', 45, 1, '2022-06-15', 2010897654, 18, '2022-07-12', 'Đang mượn'),
(97, 'p1', 41, 2, '2022-06-16', 2010897654, 4, '2022-06-29', 'Đang mượn'),
(124, 'p03', 7, 1, '2022-06-16', 123, 3, '2022-07-03', 'Đang mượn'),
(138, 'p04918', 39, 1, '2022-06-25', 2, 3, '2022-06-28', 'Chờ xác nhận'),
(139, 'p01234', 2, 1, '2022-06-25', 2012345679, 4, '2022-06-29', 'Chờ xác nhận'),
(140, '5743', 1, 1, '2022-06-28', 123, 5, '2022-07-03', 'Chờ xác nhận'),
(142, 'p01221', 2, 1, '2022-06-28', 2, 5, '2022-07-03', 'Chờ xác nhận'),
(143, 'p0513', 44, 1, '2022-06-28', 123, 3, '2022-07-01', 'Chờ xác nhận'),
(144, 'p01283', 44, 1, '2022-06-28', 123, 5, '2022-07-03', 'Chờ xác nhận'),
(145, 'p04919', 44, 5, '2022-06-28', 123, 5, '2022-07-03', 'Chờ xác nhận'),
(148, 'p0646', 2, 0, '2022-06-28', 2019603123, 3, '2022-07-01', 'Chờ xác nhận'),
(149, 'p0646', 3, 0, '2022-06-28', 2019603123, 3, '2022-07-01', 'Chờ xác nhận'),
(150, 'p04958', 44, 2, '2022-06-28', 123, 2, '2022-06-30', 'Chờ xác nhận'),
(155, 'p0656', 41, 3, '2022-06-29', 2012345679, 4, '2022-07-12', 'Đang mượn'),
(157, 'p05177', 1, 3, '2022-06-29', 123, 5, '2022-07-04', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `book_return`
--

CREATE TABLE `book_return` (
  `return_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `oder_detail_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `back_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `borrow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_return`
--

INSERT INTO `book_return` (`return_id`, `book_id`, `oder_detail_id`, `qty`, `back_date`, `user_id`, `return_date`, `status`, `borrow_id`) VALUES
(1, 44, '', 1, '2022-06-15', 123, '2022-06-16', 'Đã trả', 0),
(5, 35, '', 1, '2022-06-15', 123, '2022-06-19', 'Đã trả', 0),
(9, 39, '', 1, '2022-06-15', 123, '2022-06-16', 'Đã trả', 0),
(10, 3, '', 1, '2022-06-15', 2019503428, '2022-06-04', 'Trả muộn', 0),
(11, 1, '', 1, '2022-06-15', 2019503428, '1970-01-01', 'Trả muộn', 0),
(14, 4, '', 1, '2022-06-15', 123, '2022-06-16', 'Đã trả', 0),
(19, 7, '', 1, '2022-06-15', 123, '2022-06-17', 'Đã trả', 0),
(20, 43, '', 1, '2022-06-15', 123, '2022-06-20', 'Đã trả', 0),
(21, 38, '', 1, '2022-06-15', 123, '2022-06-20', 'Đã trả', 0),
(22, 41, '', 1, '2022-06-15', 2010897654, '2022-06-19', 'Đã trả', 0),
(23, 45, '', 1, '2022-06-15', 2010897654, '2022-06-19', 'Đã trả', 0),
(24, 36, '', 1, '2022-06-15', 2018304539, '2022-06-13', 'Trả muộn', 0),
(25, 43, '', 1, '2022-06-15', 2018304539, '2022-06-13', 'Trả muộn', 0),
(26, 41, '', 1, '2022-06-16', 123, '2022-06-22', 'Đã trả', 0),
(27, 35, '', 1, '2022-06-16', 2010897654, '2022-06-19', 'Đã trả', 0),
(28, 5, '', 1, '2022-06-24', 2019603123, '1970-01-01', 'Trả muộn', 0),
(39, 35, '', 1, '2022-06-24', 123, '2022-06-25', 'Đã trả', 0),
(40, 42, '', 1, '2022-06-27', 123, '2022-07-03', 'Đã trả', 0),
(41, 41, 'p05483', 2, '2022-06-29', 123, '2022-07-13', 'Đã trả', 0),
(42, 45, 'p02615', 3, '2022-06-29', 2012345679, '2022-07-13', 'Đã trả', 0),
(43, 7, 'p02615', 2, '2022-06-29', 2012345679, '2022-07-13', 'Đã trả', 0),
(44, 35, 'p03', 1, '2022-06-29', 123, '2022-07-01', 'Đã trả', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `nganh_id` int(11) NOT NULL,
  `nganh_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `creation_date` date NOT NULL,
  `updated_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`nganh_id`, `nganh_name`, `creation_date`, `updated_time`) VALUES
(1, 'Hệ thống thông tin', '2022-05-23', '2022-05-23'),
(2, 'Ngôn ngữ Anh', '2022-05-23', '2022-05-23'),
(3, 'Công Nghệ Thông Tin ', '0000-00-00', '2022-05-23'),
(4, 'Quản trị nhân lực', '0000-00-00', '2022-05-23'),
(5, 'Quản lý kinh doanh', '0000-00-00', '2022-05-23'),
(6, 'Kế toán - Kiểm toán', '0000-00-00', '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(11) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(30) COLLATE utf8_bin NOT NULL,
  `class` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `fullname`, `class`, `phone`, `email`) VALUES
(2, '0', 'Đức Anh', '123133', '2143242412', 'qweqeqw@gmail.com'),
(123, '123', 'Chiến', 'CNTT03', '012345678', 'choquyen01@gmail.com'),
(2010345890, '123456', 'Phạm Minh Test', 'KTPM02', '0997564213', 'test@gmail.com'),
(2010897654, '123', 'Nguyen Van Hoat', 'CNTT03', '0967812364', 'hoat@gmail.com'),
(2012345679, '123', 'Nguyễn Văn A', 'ABCD2', '0978899221', 'mail@gmail.com'),
(2018304539, '123456', 'Nguyễn Doãn Đạt', 'CNTT03', '0897465231', 'dat@gmail.com'),
(2019503428, '123456', 'Pham Minh Chien', 'CNTT03', '0968209394', 'chien@gmail.com'),
(2019603123, '', 'Nguyen Duc Anh', 'CNTT03', '0921345412', 'vnb@gmail.com'),
(2019603428, '123', 'Phạm Minh Chiến', 'CNTT03', '0968209396', 'chien@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `maDanhMuc` (`nganh_id`),
  ADD KEY `maTacGia` (`author_id`);

--
-- Indexes for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `maBanDoc` (`user_id`),
  ADD KEY `book_copy_id` (`book_id`);

--
-- Indexes for table `book_return`
--
ALTER TABLE `book_return`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `fk4` (`book_id`),
  ADD KEY `fk5` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`nganh_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `book_return`
--
ALTER TABLE `book_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `nganh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`nganh_id`) REFERENCES `category` (`nganh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`);

--
-- Constraints for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD CONSTRAINT `book_borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_borrow_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_return`
--
ALTER TABLE `book_return`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
