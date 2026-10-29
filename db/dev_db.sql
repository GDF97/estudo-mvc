DROP DATABASE dev_db;
CREATE DATABASE dev_db;
USE dev_db;

CREATE TABLE tb_user(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

CREATE TABLE tb_task(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    fk_user INT,
    FOREIGN KEY (fk_user) REFERENCES tb_user (id)
);

