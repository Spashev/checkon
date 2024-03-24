CREATE TABLE invoice
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    total_amount INT,
    user_id      INT,
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE users
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    email    VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL
);
