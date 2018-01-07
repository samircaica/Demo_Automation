CREATE TABLE IF NOT EXISTS `test` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `test` (`aid`, `user`, `pass`) VALUES
('1', 'test1', 'test1');
#('2', 'test2', 'test2');