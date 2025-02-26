CREATE DATABASE servers_db;
USE servers_db;
CREATE TABLE servers (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    ip_address VARCHAR(20) NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
);
