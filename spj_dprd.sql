CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100),
username VARCHAR(50),
password VARCHAR(255),
role ENUM('admin','user')
);