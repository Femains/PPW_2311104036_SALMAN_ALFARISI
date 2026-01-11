CREATE DATABASE IF NOT EXISTS login_project;
USE login_project;


CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL UNIQUE,
password_hash VARCHAR(255) NOT NULL,
remember_token VARCHAR(255) DEFAULT NULL,
token_expire DATETIME DEFAULT NULL
);


-- contoh user: username = mahasiswa, password = tugas123
INSERT INTO users (username, password_hash) VALUES (
'mahasiswa',
'" + "REPLACE_ME_HASH" + "'
);