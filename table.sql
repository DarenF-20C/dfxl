
--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double(6,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(4) NOT NULL,
  `size` varchar(2) NOT NULL,
  `available` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `products` (ID,title,category,price,image,quantity,size,available)
VALUES
('001','Sweatshirt Relaxed Fit shirt','Sweatshirt',34.95,'uploads/shirt1.jpg',99,'S',1),
('002','Relaxed Fit t-shirt','T-shirt',39.95,'uploads/shirt2.jpg',99,'M',1),
('003','Easy-icon shirt Slim Fit','Shirt',44.95,'uploads/shirt3.jpg',99,'L',1),
('004','Sport Top Muscle Fit','Sportshirt',39.95,'uploads/shirt4.jpg',99,'XS',1),
('005','Running Jacket Regular Fit','Jacket',74.95,'uploads/shirt5.jpg',99,'M',1),
('006','Printed T-shirt','T-shirt',54.95,'uploads/shirt6.jpg',99,'S',1),
('007','Hooded Top','Hooded',129.95,'uploads/shirt7.jpg',99,'XS',1),
('008','Star War Hooded Top','Hooded',129.95,'uploads/shirt8.jpg',99,'L',1),
('009','Jaws Printed T-Shirt','T-shirt',69.95,'uploads/shirt9.jpg',99,'S',1),
('010','Relaxed Fit Sweatshirt','Sweatshirt',129.95,'uploads/shirt10.jpg',99,'M',1);

ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);
COMMIT;

