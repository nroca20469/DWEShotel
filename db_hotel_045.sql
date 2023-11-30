-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 12:04:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `hotel`

-- DROP TABLES IF EXISTS
DROP TABLE IF EXISTS `045_tickets`;
DROP TABLE IF EXISTS `045_reservations`;
DROP TABLE IF EXISTS `045_services`;
DROP TABLE IF EXISTS `045_users`;
DROP TABLE IF EXISTS `045_rooms`;

-- CREATE TABLES

-- Rooms
CREATE TABLE `045_rooms` (
  `room_number` int(11) NOT NULL PRIMARY KEY,
  `room_category` enum('single','double','suite') DEFAULT NULL,
  `room_state` enum('maintenance','dirty','clean') NOT NULL,
  `room_status` tinyint(4) NOT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `room_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `room_image` varchar(250) DEFAULT NULL
);

-- Users
CREATE TABLE `045_users` (
  `customer_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `customer_forename` varchar(50) DEFAULT NULL,
  `customer_lastname` varchar(50) DEFAULT NULL,
  `customer_dni` varchar(50) DEFAULT NULL,
  `customer_email` varchar(250) NOT NULL,
  `online_user` varchar(250) NOT NULL,
  `online_password` varchar(250) NOT NULL DEFAULT '********',
  `customer_role` enum('admin','customer','worker') NOT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `customer_phone_number` varchar(20) DEFAULT NULL,
  `customer_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `customer_status` tinyint(1) NOT NULL DEFAULT 1
);

-- Services
CREATE TABLE `045_services` (
  `service_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `service_name` varchar(250) NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `service_description` longtext NOT NULL
);

-- Reservations
CREATE TABLE `045_reservations` (
  `reservation_number` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `preselected_room` int(11) NOT NULL,
  `room_number` int(11) DEFAULT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `reservation_status` enum('check_in','check_out','booked','absent','cancelled') NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `room_image` varchar(250) DEFAULT NULL,
  FOREIGN KEY (`room_number`) REFERENCES `045_rooms` (`room_number`),
  FOREIGN KEY (`customer_id`) REFERENCES `045_users` (`customer_id`)
);

-- Tickets
CREATE TABLE `045_tickets` (
  `ticket_number` varchar(100) NOT NULL PRIMARY KEY,
  `reservation_number` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `ticket_description` longtext NOT NULL,
  `ticket_date` date NOT NULL,
  FOREIGN KEY (`reservation_number`) REFERENCES `045_reservations` (`reservation_number`),
  FOREIGN KEY (`service_id`) REFERENCES `045_services` (`service_id`)
);

-- INSERT INTO TABLES
-- Rooms
INSERT INTO `045_rooms` (`room_number`, `room_category`, `room_state`, `room_status`, `room_price`, `room_description`, `room_image`) VALUES
(1, 'single', 'clean', 1, 100.00, '{\n        \"TV\": true,\n        \"Air Conditioning\": true,\n        \"Wifi\": true,\n        \"extra bed\":true,\n        \"bed type\": \"single\",\n        \"bed price per night\": 100\n    }', NULL),
(2, 'single', 'clean', 1, 100.00, '{\n                            \"TV\": true,\n                            \"Air Conditioning\": true,\n                            \"Wifi\": true,\n                            \"extra bed\":true,\n                            \"bed type\": \"single\",\n                            \"bed price per night\": 100\n                        }', NULL),
(3, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(4, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(5, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(6, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(7, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(8, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(9, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(10, 'single', 'clean', 1, 100.00, '{\n                            \"TV\": true,\n                            \"Air Conditioning\": true,\n                            \"Wifi\": true,\n                            \"extra bed\":true,\n                            \"bed type\": \"single\",\n                            \"bed price per night\": 100\n                        }', NULL),
(101, 'single', 'dirty', 1, 100.00, '{\r\n        \"TV\": true,\r\n        \"Air Conditioning\": true,\r\n        \"Wifi\": true,\r\n        \"extra bed\":true,\r\n        \"bed type\": \"single\",\r\n        \"bed price per night\": 100\r\n    }', NULL),
(102, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(103, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(104, 'single', 'clean', 1, 100.00, '{\n                            \"TV\": true,\n                            \"Air Conditioning\": true,\n                            \"Wifi\": true,\n                            \"extra bed\":true,\n                            \"bed type\": \"single\",\n                            \"bed price per night\": 100\n                        }', NULL),
(105, 'double', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(106, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(107, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(108, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(109, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(110, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(201, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(202, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(203, 'single', 'dirty', 0, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(204, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(205, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(206, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(207, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(208, 'double', 'clean', 1, 200.00, '{\n                            \"TV\": true,\n                            \"Air Conditioning\": true,\n                            \"Wifi\": true,\n                            \"Terrace\": true,\n                            \"extra bed\":true,\n                            \"bed type\":\"double\",\n                            \"bed price per night\": 200\n                        }', NULL),
(209, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(210, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(301, 'suite', 'clean', 1, 300.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 150\r\n                        }', NULL),
(302, 'suite', 'clean', 1, 300.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 150\r\n                        }', NULL),
(303, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(304, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(305, 'single', 'clean', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(306, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(307, 'double', 'clean', 1, 200.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"Terrace\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\":\"double\",\r\n                            \"bed price per night\": 200\r\n                        }', NULL),
(308, 'double', 'clean', 1, 200.00, '{\n                            \"TV\": true,\n                            \"Air Conditioning\": true,\n                            \"Wifi\": true,\n                            \"Terrace\": true,\n                            \"extra bed\":true,\n                            \"bed type\":\"double\",\n                            \"bed price per night\": 200\n                        }', NULL),
(401, 'single', 'dirty', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"1\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(402, 'single', 'dirty', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"1\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(403, 'single', 'dirty', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"1\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(404, 'single', 'dirty', 1, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(405, 'single', 'clean', 0, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL),
(406, 'single', 'dirty', 0, 100.00, '{\r\n                            \"TV\": true,\r\n                            \"Air Conditioning\": true,\r\n                            \"Wifi\": true,\r\n                            \"extra bed\":true,\r\n                            \"bed type\": \"single\",\r\n                            \"bed price per night\": 100\r\n                        }', NULL);

-- Users
INSERT INTO `045_users` (`customer_id`, `customer_forename`, `customer_lastname`, `customer_dni`, `customer_email`, `online_user`, `online_password`, `customer_role`, `customer_address`, `customer_phone_number`, `customer_description`, `customer_status`) VALUES
(1, 'Peter', 'Smith', '111444W', 'petersmith@gmail.com', 'petersmith@gmail.com', '********', 'admin', 'Calle Lasaña, 25, 2n piso', '616223323', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(2, 'John', 'Nellencamp', '1256856A', 'johnnellenc@gmail.com', 'johnnellenc@gmail.com', '********', 'admin', 'Calle Lenteja, 27, 2o piso', '2147483647', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(3, 'Pepito', 'de los Palotes', '7418526T', 'pepitopalot@gmail.com', 'pepitopalotes@gmail.com', '********', 'admin', 'Calle Lasaña, 25, 3r piso', '85267471', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(4, 'Pili', 'Pons', '7419635Y', 'pilipons@gmail.com', 'pilipons@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso\n', '217483647', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(5, 'Emmanuel', 'Roca', '7496582A', 'emmanuelroc@gmail.com', 'emmanuelroc@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 4o piso', '78548745', '{\n\"vip\": false, \n\"problematic\": false \n}', 1),
(6, 'Euridice', 'Bosch', '7895412F', 'euridicebos@gmail.com', 'euridicebos@gmail.com', '********', 'customer', 'Calle Lenteja, 27, 2o piso', '784965482', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(7, 'Manuelito', 'Roca', '6478945H', 'manuelitoroccoa@gmail.com', 'manuelitoroccoa@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso\n', '785421692', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(8, 'Miquelito', 'Smith', '4564665E', 'miquelitosm@gmail.com', 'miquelitosm@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 1r piso', '789827115', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(9, 'Manuelito', 'Roccoa', '8954328Y', 'manuelitoro@gmail.com', 'manuelitoroca@gmail.com', '********', 'customer', 'La casa de al lado, la Amarilla', '514789596', '{\r\n    \"vip\" : false,\r\n    \"problematic\": true\r\n}', 1),
(10, 'Paca', 'Pons', '9654995F', 'pacapons@gmail.com', 'pacapons@gmail.com', '********', 'customer', 'Calle Lenteja, 27, 2o piso', '758848551', '{\n\"vip\": true, \n\"problematic\": false \n}', 1),
(11, 'Marga', 'Danoz', '7845129G', 'margadanoz@gmail.com', 'margadanoz@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso\n', '854257252', '{\n\"vip\": true, \n\"problematic\": true \n}', 1),
(12, 'Paola', 'Rodriguez', '7851496J', 'paolarodrig@gmail.com', 'paolarodrig@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso\n', '547898654', '{\n\"vip\": true, \n\"problematic\": false \n}', 1),
(13, 'Miquel', 'Gayon', '9746458K', 'miquelgayon@gmail.com', 'miquelgayon@gmail.com', '********', 'customer', 'Calle Lenteja, 27, 2o piso', '548796532', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(14, 'Li', 'Huan', '9745695J', 'lihuan@gmail.com', 'lihuan@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 3r piso', '789865325', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(15, 'Yu', 'Yang', '9765486A', 'yuyang@gmail.com', 'yuyang@gmail.com', '********', 'customer', 'La casa de al lado, la Amarilla', '214748647', '{\n\"vip\": true, \n\"problematic\": false \n}', 1),
(16, 'Pepi', 'Palotes', '7896541W', 'pepipalotes@gmail.com', 'pepipalotes@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso\n', '852674719', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(17, 'Maria', 'Pons', '7896542A', 'mariapons@gmail.com', 'mariapons@gmail.com', '********', 'customer', 'La casa de al lado, la Amarilla', '214743647', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(18, 'Emmanuel', 'Lorca', '6497896D', 'emmanuellor@gmail.com', 'emmanuellor@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 3r piso', '785487455', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(19, 'Eurin', 'Cosch', '7984789A', 'eurincos@gmail.com', 'eurincos@gmail.com', '********', 'customer', 'Calle Lenteja, 27, 2o piso', '784965482', '{\r\n    \"vip\" : true,\r\n    \"problematic\": false\r\n}', 1),
(20, 'Pepito', 'de los Palotes', '7418529A', 'pepitopalot@gmail.com', 'pepitopalot@gmail.com', '********', 'customer', 'La casa de al lado, la Amarilla', '789654521', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(21, 'Pili', 'Pons', '4561237S', 'pilipons2@gmail.com', 'pilipons2@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 3r piso', '123456852', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(22, 'Emmanuel', 'Roca', '7852145S', 'emmanuelroc@gmail.com', 'emmanuelroca@gmail.com', '********', 'customer', 'Calle Lasaña, 25, 2o piso', '789652141', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(23, 'Euridice', 'Bosch', '452147D', 'euridicebos@gmail.com', 'euridicebosch@gmail.com', '********', 'customer', 'Calle Lenteja, 27, 2o piso', '741085206', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(24, 'Manuelito', 'Roca', '7896325D', 'manuelitoro@gmail.com', 'manuelitoro@gmail.com', '********', 'worker', 'Calle Lasaña, 25, 2o piso', '789632541', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(25, 'Miquelito', 'Smith', '7895412F', 'miquelitosmith@gmail.com', 'miquelitosmith@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso', '78965241', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(26, 'Manuelit', 'Roca', '7541258F', 'manuelitroc@gmail.com', 'manuelitroc@gmail.com', '********', 'customer', 'Calle Garbanzo, 30, 10o piso', '789635241', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(27, 'Paca', 'Ponns', '4125896F', 'pacapons@gmail.com', 'pacapons2@gmail.com', '********', 'customer', 'Carrer de Pablo Iglesias, 79, 07004 Palma, Illes Balears', '794631144', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(28, 'Marga', 'Danoz', '1524786D', 'margadanoz@gmail.com', 'margadanoz3@gmail.com', '********', 'customer', 'C/ Sa Salada, 25, 07751 Mallorca, Illes Balears', '746135785', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(29, 'Paola', 'Rodriguez', '7854624D', 'paoolarodri@gmail.com', 'paoolarodri@gmail.com', '********', 'customer', 'C/ Lacorte, 29, 17024 Chicago, EEUU', '963852074', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(30, 'Miquel', 'Gayon', '4851254S', 'miquelgayona@gmail.com', 'miquelgayona@gmail.com', '********', 'customer', 'C/ Sa Dolça, 35, 00751 Lalola, Andorra, Russia', '963784513', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(31, 'Li', 'Huan', '7515268D', 'lihuan2@gmail.com', 'lihuan2@gmail.com', '********', 'customer', ' Huairou, Pekín, China, 101402', '963741855', '{\r\n    \"vip\" : false,\r\n    \"problematic\": false\r\n}', 1),
(34, 'Yu', 'Yang', '415785A', 'yuyang2@gmail.com', 'yuyang2@gmail.com', '********', 'admin', NULL, '524658965', '{\n\"vip\": true,\n\"problematic\": false \n}', 1),
(36, 'Ana', 'Pons', '4154171A', 'anapons@gmail.com', 'anapons@gmail.com', '********', 'admin', NULL, '748574859', '{\n\"vip\": true,\n\"problematic\": true \n}', 1),
(37, 'Nerea', 'Roca', '111444A', 'aploo@gmail.com', 'aploo@gmail.com', '123', 'customer', NULL, '689589988', NULL, 1),
(38, 'Ana', 'Laca', '111444F', 'analaca@gmail.com', 'analaca@gmail.com', '********', 'admin', NULL, '124141514', '{\n\"vip\": false,\n\"problematic\": true \n}', 1),
(40, 'Enrique', 'Profe', '1234567a', 'dwesteacherenrique', 'enrique', 'enrique', 'admin', NULL, '123456789', '{\n\"vip\": false, \n\"problematic\": false \n}', 1);

-- Services
INSERT INTO `045_services` (`service_id`, `service_name`, `price_per_hour`, `service_description`) VALUES
(1, 'spa', 50.00, '{\r\n        \"name\": \"spa\",\r\n        \"price\": \"50.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(2, 'gym', 20.00, '{\n        \"name\": \"gym\",\n        \"price\": \"20.00\",\n        \"uds\": \"1\"\n    }'),
(3, 'laundry', 10.00, '{\r\n        \"name\": \"laundry\",\r\n        \"price\": \"10.00\",\r\n        \"uds\": \"1\"\r\n    }'),
(4, 'bar', 0.00, ' { \"bar\":[\n                {\n                    \"name\": \"wine\",\n                    \"price\": \"10.0\",\n                    \"uds\": \"1\"\n                },\n                {\n                    \"name\": \"beer\",\n                    \"price\": \"5.00\",\n                    \"uds\": \"1\"\n                }\n            ]}'),
(5, 'rent_a_vehicle', 0.00, '{\r\n        \"name\": \"rent_a_vehicle\",\r\n        \"price\": \"\",\r\n        \"uds\": \"\"\r\n    }'),
(6, 'Horse trail', 55.00, '{\r\n        \"name\": \"Horse trail\",\r\n        \"price\": \"55.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(7, 'Boat trail', 55.00, '{\r\n        \"name\": \"Boat trail\",\r\n        \"price\": \"55.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(8, 'buffet libre', 20.00, '{\r\n        \"name\": \"buffet libre\",\r\n        \"price\": \"20.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(9, 'dinner time', 30.00, '{\r\n        \"name\": \"dinner time\",\r\n        \"price\": \"30.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(10, 'breakfast time', 30.00, '{\r\n        \"name\": \"breakfast time\",\r\n        \"price\": \"30.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(11, 'kindergarden', 10.00, '{\r\n        \"name\": \"kindergarden\",\r\n        \"price\": \"10.0\",\r\n        \"uds\": \"1\"\r\n    }'),
(12, 'petgarden', 5.00, '{\r\n        \"name\": \"petgarden\",\r\n        \"price\": \"5.0\",\r\n        \"uds\": \"1\"\r\n    }');

-- Reservations
INSERT INTO `045_reservations` (`reservation_number`, `customer_id`, `preselected_room`, `room_number`, `room_price`, `reservation_status`, `date_in`, `date_out`) VALUES
(44, 28, 203, 1, 100.00, 'check_out', '2023-07-07', '2023-07-22'),
(45, 15, 304, 304, 100.00, 'check_out', '2023-06-13', '2023-06-19'),
(46, 26, 3, 3, 100.00, 'cancelled', '2023-08-06', '2023-08-10'),
(47, 31, 206, 206, 200.00, 'check_out', '2023-08-27', '2023-09-10'),
(48, 9, 305, 305, 100.00, 'check_out', '2023-06-21', '2023-06-25'),
(49, 3, 2, 2, 100.00, 'check_out', '2023-08-02', '2023-08-03'),
(50, 10, 10, 10, 100.00, 'check_out', '2023-07-28', '2023-08-02'),
(51, 15, 1, 1, 100.00, 'absent', '2023-07-15', '2023-07-31'),
(52, 10, 1, 1, 100.00, 'cancelled', '2023-10-29', '2023-10-31'),
(53, 1, 2, 2, 100.00, 'booked', '2023-10-20', '2023-10-28'),
(54, 10, 2, NULL, 100.00, 'check_out', '2023-10-29', '2023-10-31'),
(55, 10, 2, NULL, 100.00, 'check_in', '2023-10-29', '2023-10-31'),
(56, 10, 2, NULL, 100.00, 'check_in', '2023-10-29', '2023-10-31'),
(57, 10, 2, NULL, 100.00, 'check_in', '2023-10-29', '2023-10-31'),
(58, 10, 2, NULL, 100.00, 'check_in', '2023-10-29', '2023-10-31'),
(59, 10, 2, NULL, 100.00, 'absent', '2023-10-29', '2023-10-31'),
(60, 10, 2, 1, 100.00, 'booked', '2023-10-29', '2023-10-31'),
(61, 10, 3, NULL, 100.00, 'booked', '2023-10-24', '2023-10-30'),
(63, 1, 1, NULL, 100.00, 'booked', '2023-11-09', '2023-11-30'),
(66, 1, 2, NULL, 100.00, 'booked', '2023-11-15', '2023-11-16');

-- Tickets
INSERT INTO `045_tickets` (`ticket_number`, `reservation_number`, `service_id`, `total_price`, `ticket_description`, `ticket_date`) VALUES
('202311241335176340', 63, 2, 40.00, '{\"service\" : \"gym\",\n                        \"uds\": 2,\n                        \"price\" : 20.00 ,\n                        \"date\": \"2023-11-24\",\n                        \"total\": 40} ', '2023-11-24'),
('202311241335386340', 63, 2, 40.00, '{\"service\" : \"gym\",\r\n                        \"uds\": 2,\r\n                        \"price\" : 20.00 ,\r\n                        \"date\": \"2023-11-24\",\r\n                        \"total\": 40} ', '2023-11-24'),
('202311241538466320', 63, 3, 20.00, '{\"service\" : \"laundry\",\r\n                        \"uds\": 2,\r\n                        \"price\" : 10.00 ,\r\n                        \"date\": \"2023-11-24\",\r\n                        \"total\": 20} ', '2023-11-24'),
('202311241540056330', 63, 4, 30.00, '{\"service\" : \"bar\",\r\n                            \"uds\": 0,\r\n                            \"price\" : 0,\r\n                            \"date\": \"2023-11-24\",\r\n                            \"details\": [\r\n                                {\r\n                                    \"name\": \"wine\",\r\n                                    \"price\": \"10.0\",\r\n                                    \"uds\": \"3\"\r\n                                }],\r\n                            \"total\": 30}', '2023-11-24'),
('202311241857556340', 63, 4, 40.00, '{\"service\" : \"bar\",\r\n                            \"uds\": 0,\r\n                            \"price\" : 0,\r\n                            \"date\": \"2023-11-24\",\r\n                            \"details\": [\r\n                                {\r\n                                    \"name\": \"wine\",\r\n                                    \"price\": \"10.00\",\r\n                                    \"uds\": \"4\"\r\n                                }],\r\n                            \"total\": 40}', '2023-11-24'),
('202311246320', 63, 4, 20.00, '{\"service\" : \"bar\",\r\n                        \"uds\": 0,\r\n                        \"price\" : 0,\r\n                        \"date\": \"2023-11-24\",\r\n                        \"details\": [\r\n                            {\r\n                                \"name\": \"wine\",\r\n                                \"price\": \"10.0\",\r\n                                \"uds\": \"2\"\r\n                            }],\r\n                        \"total\": 20}', '2023-11-24'),
('202311246340', 63, 2, 40.00, '{\"service\" : \"gym\",\r\n                    \"uds\": 2,\r\n                    \"price\" : 20.00 ,\r\n                    \"date\": \"2023-11-24\",\r\n                    \"total\": 40} ', '2023-11-24');
