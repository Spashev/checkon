-- checkon.invoice definition

CREATE TABLE `invoice`
(
    `id`           int NOT NULL AUTO_INCREMENT,
    `total_amount` int DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- checkon.users definition

CREATE TABLE `users`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `email`      varchar(255) NOT NULL,
    `username`   varchar(255) NOT NULL,
    `invoice_id` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY          `invoice_id` (`invoice_id`),
    CONSTRAINT `users_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
