CREATE TABLE IF NOT EXISTS `orders` (
   `order_id` int(11) NOT NULL AUTO_INCREMENT, -- used to track items and their quantity
    `user_id` int(11) NOT NULL,
    `card_number` varchar(32) NOT NULL, -- while most cards are 16 digits in length, some are 19 so 32 for some extra padding
    `address` varchar(256) NOT NULL,
    PRIMARY KEY (`order_id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

 CREATE TABLE IF NOT EXISTS `order_info` (
    `order_id` int(11) NOT NULL, -- so can join with orders table
    `pokemon_id` int(11) NOT NULL,
    `quantity` int(8) NOT NULL
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `orders` (`user_id`, `card_number`, `address`) VALUES
(1, '1234567890987654', '100 E Normal Street, Kirksville, MO');

INSERT INTO `order_info` (`order_id`, `pokemon_id`, `quantity`) VALUES
(1, 1, 3), -- 3 Bulbasaurs
(1, 311, 1), -- 1 Plusle
(1, 312, 1); -- 1 Minun
