-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 10, 2022 lúc 06:54 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `flight_booking_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `airlines_list`
--

CREATE TABLE `airlines_list` (
  `id` int(30) NOT NULL,
  `airlines` text NOT NULL,
  `logo_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `airlines_list`
--

INSERT INTO `airlines_list` (`id`, `airlines`, `logo_path`) VALUES
(1, 'vietnam airlines', 'vietnam-airline-logo.jpg'),
(2, 'vietjetair', 'vietjetair.jpg'),
(3, 'bamboairway', 'bambo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `airport_list`
--

CREATE TABLE `airport_list` (
  `id` int(30) NOT NULL,
  `airport` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `airport_list`
--

INSERT INTO `airport_list` (`id`, `airport`, `location`) VALUES
(1, 'Nội Bài', 'Hà Nội'),
(2, 'Tân Sơn Nhất', 'Hồ Chí Minh'),
(3, 'Cam Ranh', 'Nha Trang'),
(4, 'Đà Nẵng', 'Đà Nẵng'),
(5, 'Phú Quốc', 'Phú Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booked_flight`
--

CREATE TABLE `booked_flight` (
  `id` int(30) NOT NULL,
  `flight_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `booked_flight`
--

INSERT INTO `booked_flight` (`id`, `flight_id`, `name`, `address`, `contact`) VALUES
(3, 4, 'lê đức huấn', 'Hà Nội\r\n', '01211322323'),
(4, 1, 'ngô văn huân', 'thái bình', '010201201201'),
(9, 4, 'ngô văn huân', '', ''),
(10, 4, 'bùi minh đức', 'hà nội', '010201201201'),
(11, 4, 'lê thành an', 'mai thúy', '777777777777777');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_list`
--

CREATE TABLE `flight_list` (
  `id` int(30) NOT NULL,
  `airline_id` int(30) NOT NULL,
  `plane_no` text NOT NULL,
  `departure_airport_id` int(30) NOT NULL,
  `arrival_airport_id` int(30) NOT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  `seats` int(10) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `flight_list`
--

INSERT INTO `flight_list` (`id`, `airline_id`, `plane_no`, `departure_airport_id`, `arrival_airport_id`, `departure_datetime`, `arrival_datetime`, `seats`, `price`, `date_created`) VALUES
(1, 1, 'GB623-14', 1, 3, '2022-10-07 04:00:00', '2022-10-21 10:00:00', 150, 7500, '2022-09-25 11:23:52'),
(3, 3, 'CEB-1101', 5, 1, '2022-09-30 08:00:00', '2022-09-30 08:45:00', 100, 2500, '2022-09-25 11:57:31'),
(4, 3, 'CEB10023', 1, 5, '2022-10-07 01:00:00', '2022-10-07 01:45:00', 100, 2500, '2022-09-25 14:50:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hahalolo_data_blogs`
--

CREATE TABLE `hahalolo_data_blogs` (
  `id` int(11) NOT NULL,
  `images_name` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hahalolo_data_blogs`
--

INSERT INTO `hahalolo_data_blogs` (`id`, `images_name`, `title`, `text`) VALUES
(1, '../images/anh1.png', 'ĐỔI TÊN MIỄN PHÍ - TÂN NIÊN HẾT Ý', 'Bạn đã bao giờ \"tá hoả\" vì một tay lo Tết, một tay tìm vé bay trong bận rộn rồi nhỡ tay ... gõ nhầm tên trong \"booking\" khi chốt vé chưa?'),
(2, '../images/anh2.png', 'BAMBOO AIRWAYS MỞ BÁN VÉ BAY ', 'Với những hành trình bay bằng phản lực Embraer của Bamboo Airways, lần đầu tiên trong lịch sử, khoảng cách gần 2000km giữa TP HCM và Điện Biên sẽ chỉ còn gói gọn trong hơn 2 giờ bay thẳng.'),
(3, '../images/anh3.png', 'HÀ NỘI ĐIỀU CHỈNH  KIỂM SOÁT DỊCH', 'Ngày 18/11/2021, Ủy ban Nhân dân thành phố Hà Nội đã triển khai công điện hoả tốc số 24-CĐ/UBND, điều chỉnh một số yêu cầu kiểm soát dịch đối với người đến/về Hà Nội từ địa phương khác,'),
(4, '../images/anh4.png', 'HƯỚNG DẪN BAY AN TOÀN DÀNH CHO KHÁCH BAY NỘI ĐỊA', 'Theo Công văn số 11244/BGTVT-CYT của Bộ Giao thông Vận tải, các hành khách khi đi bay sẽ không phải thực hiện việc kê khai thông tin bằng Bản cam kết phòng chống dịch Covid-19 (bản cứng) từ 12h00 ngày 26/10/2010.\r\n\r\n'),
(5, '../images/anh5.png', 'HAHALOLO TUYỂN ĐẠI LÝ VÉ MÁY BAY CẤP 2 TRÊN TOÀN QUỐC.', 'Hahalolo ra đời với mục tiêu trở thành trung tâm cung cấp đầy đủ thông tin về khách sạn, tour du lịch, địa điểm du lịch, địa điểm mua sắm và giải trí, các phương tiện đi lại, ...'),
(6, '../images/anh6.png', 'CÓ NÊN MUA BẢO HIỂM HÀNG KHÔNG KHI ĐẶT VÉ MÁY BAY?', 'Nhiều Quý khách hàng luôn thắc mắc “Bảo hiểm hàng không là gì?” và “Có được những quyền lợi gì khi tham gia bảo hiểm”. Để giải đáp những thắc mắc trên, hãy cùng Hahalolo tìm hiểu kỹ hơn về bảo hiểm vé máy bay ở bài viết dưới đây nhé!'),
(7, '../images/anh7.png', 'LOWER PRICE - HIGHER COMMISSION ON HAHALOLO', '“No funds released, tons of profit received”: Do you believe that you will earn tons of profit without having to spend any money? Yes, it is an undoubted truth. Hurry to become an airline ticketing collaborator for Hahalolo to relish that incentive.'),
(8, '../images/anh8.png', 'HAHALOLO - THE LOWEST FLIGHT TICKETS ON THE MARKET', 'Cheap flight tickets are always a viral topic for globetrotters though not all of them can find a reputable place offering many alluring promotions, especially the lowest prices on the market.'),
(9, '../images/anh9.png', 'WHAT SOLUTIONS ARE DESTINED FOR THOSE WHO \"FAVOR\"', 'You are a busy person who always finds plane traveling needed, yet your schedule is very changeable. Whenever you need to change flight date/time, purchase additional baggage, your flight is delayed or canceled.'),
(10, '../images/anh10.png', 'NẾU BẠN LÀ TÍN ĐỒ MÊ DU LỊCH, YÊU THÍCH XÊ DỊCH', '\"Thế giới là một cuốn sách kì thú, và những người không trải nghiệm du lịch sẽ chỉ đọc duy nhất một trang”.'),
(11, '../images/anh13.png', 'CHƯƠNG TRÌNH “MUA HÀNH LÝ, TRÚNG VÉ DU HÍ”', 'Mỗi chuyến đi của mình bạn vẫn thường hay mua gói hành lý ký gửi để được thoải mái mang đồ theo, thế bạn đã từng nghĩ mình sẽ may mắn nhận được phần quà giá trị khi đăng ký mua gói hành lý ký gửi chưa?'),
(12, '../images/anh14.png', 'VẬN CHUYỂN MAI ĐÀO - XUÂN VỀ NÔN NAO', 'Đón chào xuân Nhâm Dần đang tiến dần, các Hãng hàng không đồng loạt đưa ra dịch vụ đưa cành mai, cành đào về đến mọi nhà. Cụ thể như sau:');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` longtext NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'hahalolo_image.jpg', 'hahalolo@gmail.com', '032190321832', '1600998360_travel-cover.jpg', 'uierfeuhfsfhsejkfhsfhsfsjkfhsehfsdjhfsd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 'admin', '', '', 'admin', 'admin123', 1),
(7, 'Le Duc Huan', 'Hà Nội', '0991212121', 'ldh@gmail.com', 'ldh', 2),
(9, 'Ngô Văn Huân', 'Thái Bình', '0322323232', 'nvh@gmail.com', 'nvh', 2),
(10, 'Lê Thành An', 'Hà Nội', '0448949944', 'lta@gmail.com', 'lta', 2),
(11, 'nam', 'ha noi', '+09999987766', 'nam@sample.com', 'nam', 2),
(15, 'Nguyễn quỳnh Hương', 'Sample Address', '+1235 456 623', 'qh@gmail.com', 'qh', 2),
(27, 'nhữ văn chiến', 'hà nội', '01921919212', 'nvc@gmail.com', 'chien', 2),
(28, 'khuong', 'bacnih', '093', 'khuong123@gmail.com', '123', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `airlines_list`
--
ALTER TABLE `airlines_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `airport_list`
--
ALTER TABLE `airport_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Chỉ mục cho bảng `flight_list`
--
ALTER TABLE `flight_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airline_id` (`airline_id`);

--
-- Chỉ mục cho bảng `hahalolo_data_blogs`
--
ALTER TABLE `hahalolo_data_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `airlines_list`
--
ALTER TABLE `airlines_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `airport_list`
--
ALTER TABLE `airport_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `booked_flight`
--
ALTER TABLE `booked_flight`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `flight_list`
--
ALTER TABLE `flight_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hahalolo_data_blogs`
--
ALTER TABLE `hahalolo_data_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD CONSTRAINT `booked_flight_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight_list` (`id`);

--
-- Các ràng buộc cho bảng `flight_list`
--
ALTER TABLE `flight_list`
  ADD CONSTRAINT `flight_list_ibfk_1` FOREIGN KEY (`airline_id`) REFERENCES `airlines_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
