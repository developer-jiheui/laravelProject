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
                        USER_ID INT NOT NULL AUTO_INCREMENT,
                        EMAIL VARCHAR(100) NOT NULL UNIQUE,
                        AVATAR VARCHAR(100),
                        PW VARCHAR(64),
                        USER_TYPE INT,# admin 0, common user 1
                        FIRST_NAME VARCHAR(100),
                        LAST_NAME VARCHAR(100),
                        REGISTER_TYPE INT, #if we want to add github or google register api
                        REGISTER_DT DATETIME,
                        ADDRESS VARCHAR(100),
                        PHONE_NUM VARCHAR(20),
                        BIO VARCHAR(300),
                        JOB_TITLE VARCHAR(100),
                        BIRTHDAY DATE,
                        INSTAGRAM_URL VARCHAR(100),
                        LINKEDIN_URL VARCHAR(100),
                        GITHUB_URL VARCHAR(100),
                        PRIMARY KEY (USER_ID)
);

DROP TABLE IF EXISTS COMMENT_T;
CREATE TABLE COMMENT_T (
                           COMMENT_NO INT NOT NULL AUTO_INCREMENT,
                           CONTENTS VARCHAR(4000) NOT NULL,
                           CREATE_DT TIMESTAMP NULL,
                           STATE TINYINT,                    -- 0: deleted, 1: normal, 2: edited
                           DEPTH TINYINT,                    -- 0: original comment, 1: reply, 2: sub-reply
                           GROUP_NO INT,                     -- All replies to the same original comment share the same GROUP_NO
                           USER_NO INT,
                           BLOG_NO INT,
                           PARENT_NO INT,
                           PRIMARY KEY (COMMENT_NO),
                           CONSTRAINT FK_COMMENT_USER FOREIGN KEY (USER_NO)
                               REFERENCES USER_T(USER_NO) ON DELETE CASCADE,
                           CONSTRAINT FK_COMMENT_BLOG FOREIGN KEY (BLOG_NO)
                               REFERENCES BLOG_T(BLOG_NO) ON DELETE CASCADE
);

DROP TABLE IF EXISTS PORTFOLIO;
CREATE TABLE PORTFOLIO (
    PORTFOLIO_ID INT NOT NULL AUTO_INCREMENT,
    USER_ID INT,
    TITLE VARCHAR(100),
    DESCRIPTION VARCHAR(16384),
    CATEGORY VARCHAR(20),
    PROJECT_URL VARCHAR(1024),
    CREATED_AT DATE,
    UPDATED_AT DATE,
    IMAGE_URL VARCHAR(1024),
    LIKE_COUNT INT,
    PRIMARY KEY (PORTFOLIO_ID),
    FOREIGN KEY (USER_ID) REFERENCES USER_T(USER_ID)
);
DROP TABLE IF EXISTS LIKES;
CREATE TABLE LIKES (
    LIKE_ID INT NOT NULL AUTO_INCREMENT,
    PORTFOLIO_ID INT,
    USER_ID INT,
    PRIMARY KEY (LIKE_ID),
    FOREIGN KEY (PORTFOLIO_ID) REFERENCES PORTFOLIO(PORTFOLIO_ID),
    FOREIGN KEY (USER_ID) REFERENCES USER_T(USER_ID)
);