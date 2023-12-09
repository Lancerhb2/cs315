CREATE TABLE IF NOT EXISTS `users` (
    `name` varchar(16) NOT NULL,
    `email` varchar(32) NOT NULL,
    `password` varchar(32),
    PRIMARY KEY (`email`)
 ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('Sean', 'spm4168@truman.edu', 'hunter2');
