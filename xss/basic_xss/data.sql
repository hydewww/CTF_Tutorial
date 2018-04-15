CREATE DATABASE basic_xss;
USE basic_xss;
SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE USER 'hydewww'@'localhost' IDENTIFIED BY 'hydewww';
GRANT SELECT,INSERT,DELETE ON basic_xss.blog TO 'hydewww'@'localhost';
