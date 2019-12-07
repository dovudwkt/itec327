
CREATE USER 'schooluser'@'localhost' IDENTIFIED BY 'schoolpass';

GRANT USAGE ON * . * TO 'schooluser'@'localhost' IDENTIFIED BY 'schoolpass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;


CREATE DATABASE `school`;

GRANT ALL PRIVILEGES ON `school` . * TO 'schooluser'@'localhost' WITH GRANT OPTION ;

USE `school`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `stno` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  PRIMARY KEY (`stno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stno`, `name`, `surname`) VALUES
('006012', 'emre', 'ozen'),
('975137', 'ali', 'veli'),
('930298', 'ayse', 'fatma');
