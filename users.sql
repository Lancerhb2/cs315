CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(16) NOT NULL,
    `email` varchar(32) NOT NULL,
    `password` varchar(32),
    PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('Sean', 'spm4168@truman.edu', 'hunter2');
