-- 데이터베이스 생성
CREATE DATABASE mydatabase;

-- 생성한 데이터베이스 선택
USE mydatabase;

-- users 테이블 생성
CREATE TABLE users (
    nb INT AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(100),
    pass VARCHAR(100),
    name VARCHAR(100)
);

-- users 테이블의 모든 데이터 조회
SELECT * FROM users;

-- 현재 데이터베이스 목록 조회
SHOW DATABASES;

-- 현재 데이터베이스 내 테이블 목록 조회
SHOW TABLES;
CREATE USER 'toor'@'localhost' IDENTIFIED BY 'ggm';
GRANT ALL PRIVILEGES ON mydatabase.* TO 'toor'@'localhost';
FLUSH PRIVILEGES;