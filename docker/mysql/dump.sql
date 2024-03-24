-- checkon.users definition

CREATE TABLE `users`
(
    `id`       int          NOT NULL AUTO_INCREMENT,
    `email`    varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `total`    decimal(10, 2) DEFAULT '100.00',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;