CREATE DATABASE sql_injection;
USE sql_injection;
SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE IF NOT EXISTS `a` (
  `id` varchar(4) NOT NULL,
  `flag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `a` (`id`, `flag`) VALUES ('1', 'flag{mUlti@By7e}');

CREATE USER 'hydewww'@'localhost' IDENTIFIED BY 'hydewww';
GRANT SELECT ON sql_injection.a TO 'hydewww'@'localhost';
