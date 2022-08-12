-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 12:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



DROP DATABASE IF EXISTS smartPhoneStore;
CREATE DATABASE smartPhoneStore;
USE smartPhoneStore;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(2, 'IPHONE', 1),
(4, 'SAMSUNG', 1),
(3, 'XIAOMI', 1),
(1, 'OPPO', 1),	
(5, 'REALME', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

-- INSERT INTO `orders` (`id`, `userId`, `createdDate`, `receivedDate`, `status`) VALUES
-- (39, 31, '2021-12-07', '2021-12-07', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,	
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

-- INSERT INTO `order_details` (`id`, `orderId`, `productId`, `qty`, `productPrice`, `productName`, `productImage`) VALUES
-- (36, 39, 7, 2, '3190000', 'GUITAR YAMAHA CX40', 'd3ac08c33e.jpg'),
-- (37, 39, 4, 1, '749000000', 'Boston GP-156', 'a30bcd79d7.jpg'),
-- (38, 39, 8, 3, '19000000', 'Taylor 114E', 'cb50eef0d8.jpg'),
-- (39, 39, 9, 4, '4200000', 'Takamine D2D', '758ded2800.jpg');	

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,	
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(2, 'Iphone 11', '14990000', '12990000', 'iphone-11-do-1-1-1-org.jpg', 1, '0000-00-00', 2, 96, 'Tinh xảo và tỉ mỉ từng chi tiết, khung nhôm bền bỉ, mặt kính cường lực chắc chắn. Camera góc rộng 12MP, cảm biến mới với Focus Pixel 100% lấy nét tự động nhanh hơn gấp 3 lần trong điều kiện thiếu sáng, góc siêu rộng 12MP, chụp cảnh rộng hơn gấp 4 lần, phù hợp đi du lịch, chụp nội thất...Tăng dung lượng pin và thời gian trải nghiệm so với Ipone 10 với khả năng sạc nhanh, sạc đầy pin tiết kiệm thời gian hơn.', 1, 4),
(3, 'Iphone 13 pro', '31290000', '31190000', 'iphone-13-pro-xanh-xa-1.jpg', 1, '0000-00-00', 2, 9, 'Iphone 13 pro là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', 1, 4),
(4, 'Oppo A95', '6990000', '6240000', 'oppo-a95-4g-bac-1-1.jpg', 1, '0000-00-00', 1, 19, 'Bên cạnh phiên bản 5G, OPPO còn bổ sung phiên bản OPPO A95 4G với giá thành phải chăng tập trung vào thiết kế năng động, sạc nhanh và hiệu năng đa nhiệm ấn tượng sẽ giúp cho cuộc sống của bạn thêm phần hấp dẫn, ngập tràn niềm vui.', 1, 4),
(5, 'OPPO Reno6 Z 5G', '9490000', '8990000', 'oppo-reno6-z-5g-bac-1-org.jpg', 1, '0000-00-00', 1, 8, 'Reno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá “chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất”, đây chắc chắn sẽ là một “siêu phẩm" mà bạn không thể bỏ qua.', 1, 2),
(6, 'OPPO Reno7 Z 5G', '10490000', '10490000', 'oppo-reno7-z-1-1.jpg', 1, '0000-00-00', 1, 7, 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.', 1, 3),
(7, 'Realme C25Y 64GB', '4690000', '4190000', 'realme-c25y-1-2.jpg', 1, '2021-12-07', 5, 8, 'Realme C25Y 64GB - là chiếc smartphone được Realme cho ra mắt với một mức giá khá tốt, sở hữu thiết kế hiện đại với 3 camera AI lên đến 50 MP, hiệu suất ổn định cùng thời gian sử dụng lâu dài nhờ viên pin khủng 5000 mAh, được xem là một trong những sản phẩm lý tưởng mà bạn nên sở hữu.', 1, 4),
(8, 'Realme C35 64GB', '3990000', '3990000', 'realme-c35-1-2.jpg', 1, '2021-12-07', 5, 7, 'Realme C35 thuộc phân khúc giá rẻ được nhà Realme cho ra mắt với thiết kế trẻ trung, dung lượng pin lớn cùng camera hỗ trợ nhiều tính năng. Đây sẽ là thiết bị liên lạc, giải trí và làm việc ổn định,… cho các nhu cầu sử dụng của bạn.', 1, 3),
(9, 'Samsung Galaxy A53 5G 128GB', '9990000', '9090000', 'samsung-galaxy-a53-1-1.jpg', 4, '2021-12-07', 4, 6, 'Samsung Galaxy A53 5G 128GB trình làng với một thiết kế hiện đại, hiệu năng ổn định cùng một màn hình hiển thị sắc nét, hỗ trợ tần số quét cao giúp bạn có được những phút giây giải trí cực kỳ đã mắt, hay thỏa mãn đam mê nhiếp ảnh trong bạn nhờ trang bị camera có độ phân giải cao.', 1, 4),
(10, 'Samsung Galaxy S21 Ultra 5G 128GB', '30990000', '22990000', 'samsung-galaxy-s21-ultra-bac-1-org.jpg', 1, '2021-12-07', 4, 10, 'Sự đẳng cấp được Samsung gửi gắm thông qua chiếc smartphone Galaxy S21 Ultra 5G với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong, hứa hẹn đáp ứng trọn vẹn nhu cầu ngày càng cao của người dùng.', 1, 0),
(11, 'Samsung Galaxy S22 Ultra 5G 128GB', '30990000', '30990000', 'samsung-galaxy-s22-ultra-1.jpg', 1, '2021-12-07', 4, 10, 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', 1, 0),
(12, 'Samsung Galaxy Z Fold3 5G 256GB', '41990000', '33990000', 'samsung-galaxy-z-fold-3-1-3.jpg', 1, '2021-12-07', 4, 10, 'Galaxy Z Fold3 5G, chiếc điện thoại được nâng cấp toàn diện về nhiều mặt, đặc biệt đây là điện thoại màn hình gập đầu tiên trên thế giới có camera ẩn (08/2021). Sản phẩm sẽ là một “cú hit” của Samsung góp phần mang đến những trải nghiệm mới cho người dùng.', 1, 4),
(13, 'Xiaomi 11T 5G 256GB', '11990000', '11990000', 'xiaomi-11t-1-1.jpg', 1, '2021-12-07', 3, 20, 'Xiaomi 11T 5G sở hữu màn hình AMOLED, viên pin siêu khủng cùng camera độ phân giải 108 MP, chiếc smartphone này của Xiaomi sẽ đáp ứng mọi nhu cầu sử dụng của bạn, từ giải trí đến làm việc đều vô cùng mượt mà. ', 1, 0),
(14, 'Xiaomi Redmi 10C 64GB', '3490000', '3490000', 'xiaomi-redmi-10c-1-1.jpg', 1, '2021-12-07', 3, 15, 'Xiaomi Redmi 10C ra mắt với một cấu hình mạnh mẽ nhờ trang bị con chip 6 nm đến từ Qualcomm, màn hình hiển thị đẹp mắt, pin đáp ứng nhu cầu sử dụng cả ngày, hứa hẹn mang đến trải nghiệm tuyệt vời so với mức giá mà nó trang bị.', 1, 0),
(15, 'iPhone 12 Pro Max 512GB', '30990000', '30990000', 'iphone-12-pro-max-512gb-xam-1-org.jpg', 1, '2022-05-22', 2, 15, 'Điện thoại iPhone 12 Pro Max 512GB - đẳng cấp từ tên gọi đến từng chi tiết. Ngay từ khi chỉ là tin đồn thì chiếc smartphone này đã làm đứng ngồi không yên bao “fan cứng” nhà Apple, với những nâng cấp vô cùng nổi bật hứa hẹn sẽ mang đến những trải nghiệm tốt nhất về mọi mặt mà chưa một chiếc iPhone tiền nhiệm nào có được', 1, 0),
(16, 'iPhone XR 128GB', '13990000', '13490000', 'iphone-xr-128gb-trang-1-1-org.jpg', 1, '2022-05-22', 2, 15, 'Được xem là phiên bản iPhone giá rẻ đầy hoàn hảo, iPhone Xr 128GB khiến người dùng có nhiều sự lựa chọn hơn về màu sắc đa dạng nhưng vẫn sở hữu cấu hình mạnh mẽ và thiết kế sang trọng', 1, 0),
(17, 'iPhone SE 64GB (2020)', '9490000', '9490000', 'iphone-se-64gb-2020-hop-moi-den-1-1-org.jpg', 1, '2022-05-22', 2, 15, ' Điện thoại iPhone SE 2020 đã bất ngờ ra mắt với thiết kế 4.7 inch nhỏ gọn, chip A13 Bionic mạnh mẽ như trên iPhone 11 và đặc biệt sở hữu mức giá tốt chưa từng có	', 1, 0),
(18, 'Samsung Z Flig3 5G 128GB', '24990000', '24990000', 'Frame4559-640x640.png', 1, '2022-05-22', 4, 15, 'Samsung Galaxy Z Flip3 5G được trình làng với các màu sắc thời thượng bao gồm: Đen, Tím, Kem, Xanh lá. Hãng tạo ra rất nhiều lựa chọn cho người dùng phù hợp với cá tính của riêng mình. Điện thoại có kích thước 167.3 x 73.6 x 7.2mm với trọng lượng 183g, sản phẩm được đánh giá là nhỏ gọn đáng kể hơn so với Z Flip 5G. Thế nhưng thiết kế màn hình phụ lại lên tới 1.9 inch, lớn hơn đáng kể.', 1, 0),
(19, 'Xiaomi 12', '19990000', '19990000', 'xiaomi-12-1.jpg', 1, '2022-05-22', 3, 15, 'Xiaomi đang dần khẳng định chỗ đứng của mình trong phân khúc điện thoại flagship bằng việc ra mắt Xiaomi 12 với bộ thông số ấn tượng, máy có một thiết kế gọn gàng, hiệu năng mạnh mẽ, màn hình hiển thị chi tiết cùng khả năng chụp ảnh sắc nét nhờ trang bị ống kính đến từ Sony.', 1, 0),
(20, 'Xiaomi Redmi Note 10 Pro (8GB/128GB)', '74900	00', '7490000', 'xiaomi-redmi-note-10-pro-xam-1-org.jpg', 1, '2022-05-22', 3, 15, 'Kế thừa và nâng cấp từ thế hệ trước, Xiaomi đã cho ra mắt điện thoại Xiaomi Redmi Note 10 Pro (8GB/128GB) sở hữu một thiết kế cao cấp, sang trọng bên cạnh cấu hình vô cùng mạnh mẽ, hứa hẹn mang đến sự cạnh tranh lớn trong phân khúc smartphone tầm trung', 1, 0),
(21, 'Xiaomi Redmi Note 11S 5G', '6490000', '6490000', 'xiaomi-redmi-note-11s-5g-lam-hong-1.jpg', 1, '2022-05-22', 3, 15, 'Tại sự kiện ra mắt sản phẩm mới diễn ra hôm 29/3, Xiaomi đã ra mắt Xiaomi Redmi Note 11S 5G toàn cầu. Thiết bị là một bản nâng cấp đáng giá so với Redmi Note 11S 4G, cùng xem máy có gì đặc biệt thôi nào.', 1, 0),
(22, 'Realme 9 Pro 5G', '7990000', '7990000', 'realme-9-pro-1-1.jpg', 1, '2022-05-22', 5, 15, 'Realme 9 Pro - chiếc điện thoại tầm trung được Realme giới thiệu với thiết kế phản quang hoàn toàn mới, máy có một vẻ ngoài năng động, hiệu năng mạnh mẽ, cụm camera AI 64 MP và một tốc độ sạc ổn định', 1, 0),
(23, 'Realme 8', '6790000', '6790000', 'realme-8-bac-1-org.jpg', 1, '2022-05-22', 5, 15, 'Điện thoại Realme 8 được ra mắt nằm trong phân khúc tầm trung, có thiết kế đẹp mắt đặc trưng của Realme, smartphone trang bị hiệu năng bên trong đầy mạnh mẽ và có dung lượng pin tương đối lớn.', 1, 0),
(24, 'Realme 9i (4GB/64GB)', '5490000', '5490000', 'realme-9i-den-1.jpg', 1, '2022-05-22', 5, 15, 'Realme đang ngày càng cải thiện hơn rất nhiều ở các sản phẩm của họ và sản phẩm gần đây nhất đó là dòng điện thoại Realme 9i. Chiếc điện thoại này được sở hữu con chip Snapdragon 680 kết hợp cùng với các tiện ích khác, hứa hẹn sẽ mang lại cho bạn sự trải nghiệm hiệu năng ổn định, mượt mà.', 1, 0),
(25, 'OPPO Find X5 Pro 5G', '32990000', '30990000', 'oppo-find-x5-pro-1-2.jpg', 1, '2022-05-22', 1, 15, 'Dòng Find X đến từ OPPO luôn mang trên mình những công nghệ hàng đầu trong ngành công nghiệp điện thoại. OPPO Find X5 Pro cũng sở hữu những thông số kỹ thuật chuẩn flagship năm 2022, có thể kể đến như vi xử lý Snapdragon 8 Gen 1, màn hình 2K+ sắc nét, camera Sony và sạc nhanh 80 W.', 1, 0),
(26, 'OPPO Reno4 Pro', '10490000', '7990000', 'oppo-reno4-pro-trang-1-org.jpg', 1, '2022-05-22', 1, 15, 'OPPO chính thức trình làng chiếc smartphone có tên OPPO Reno4 Pro. Máy trang bị cấu hình vô cùng cao cấp với vi xử lý chip Snapdragon 720G, bộ 4 camera đến 48 MP ấn tượng, cùng công nghệ sạc siêu nhanh 65 W nhưng được bán với mức giá vô ưu đãi, dễ tiếp cận', 1, 0);


-- --------------------------------------------------------

--
-- Table structure for table `role`
--
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(500) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `captcha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;	

--
-- Dumping data for table `users`
--
-- password admin  : admin123456
-- password client : 123456
INSERT INTO `users` (`id`, `email`, `fullname`, `dob`, `password`, `role_id`, `status`, `address`, `isConfirmed`, `captcha`) VALUES
(1, 'admin@gmail.com', 'Lê Chí Tài', '2022-9-05', 'a66abb5684c45962d887564f08346e8d', 1, 1, '', 1, ''),
(31, 'lechitai@gmail.com', 'Lê Chí Tài', '2022-9-05', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 'HaTinh', 1, '56661');

--
-- Indexes for dumped tables
--	

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
