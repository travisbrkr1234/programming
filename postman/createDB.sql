CREATE SCHEMA storee;

USE storee;

CREATE TABLE `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `storee`.`contact` (`first_name`,`last_name`,`email`)
VALUES
('test', 'one', 'test@example.com'),
('test', 'two', 'test2@example.com'),
('test', 'three', 'test3@example.com'),
('test', 'four', 'test4@example.com'),
('test', 'five', 'test4@example.com'),
('test', 'six', 'test6@example.com'),
('test', 'seven', 'test8@example.com'),
('test', 'eight', 'test8@example.com'),
('test', 'nine', 'test9@example.com'),
('John', 'Doe', 'john@example.com'),
('John', 'Doe2', 'john2@example.com'),
('John', 'Doe3', 'john3@example.com'),
('John', 'Doe4', 'john4@example.com'),
('John', 'Doe5', 'john5@example.com'),
('John', 'Doe6', 'john6@example.com'),
('John', 'Doe7', 'john7@example.com'),
('test', 'test2', 'test@example.com');