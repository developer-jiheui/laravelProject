-- DROP the database if it exists
-- CREATE THE DATABASE
DROP DATABASE IF EXISTS blog;
CREATE DATABASE IF NOT EXISTS blog;

-- Use the database
USE blog;

-- drop in case the table exists.
DROP TABLE IF EXISTS USER_T;

-- user table
CREATE TABLE USER_T (
                        USER_NO INT NOT NULL AUTO_INCREMENT,
                        EMAIL VARCHAR(100) NOT NULL UNIQUE,
                        PW VARCHAR(64),
                        USER_TYPE INT,# admin 0, common user 1
                        FIRST_NAME VARCHAR(100),
                        LAST_NAME VARCHAR(100),
                        AGREED_EVENT INT,
                        REGISTER_TYPE INT, #if we want to add github or google register api
                        PW_MODIFY_DT DATETIME,
                        REGISTER_DT DATETIME,
                        LOCATION VARCHAR(100),
                        PHONE_NUM VARCHAR(20),
                        BIO VARCHAR(300),
                        JOB_TITLE VARCHAR(100),
                        BIRTHDAY DATE,
                        INSTAGRAM_URL VARCHAR(100),
                        LINKEDIN_URL VARCHAR(100),
                        GITHUB_URL VARCHAR(100),
                        PRIMARY KEY (USER_NO)
);
