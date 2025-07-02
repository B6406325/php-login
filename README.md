"# php-login" 

๒๒pHpMyAdmin

## 🗃 Database Setup

1. Create a database named: `php_db`
2. Create a table named: `user`

```sql
CREATE DATABASE php_db;

USE php_db;

CREATE TABLE user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL
);