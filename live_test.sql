-- Dumping database structure for live_test
DROP DATABASE IF EXISTS `live_test`;
CREATE DATABASE IF NOT EXISTS `live_test`;
USE `live_test`;

-- Dumping structure for table live_test.tweet
DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
