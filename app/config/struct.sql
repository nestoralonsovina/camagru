-- -----------------------------------------------------
-- Delete camagru if it already exists
-- -----------------------------------------------------
DROP DATABASE IF EXISTS camagru;

-- -----------------------------------------------------
-- Create database
-- -----------------------------------------------------

CREATE DATABASE IF NOT EXISTS camagru DEFAULT CHARACTER SET utf8;
USE camagru;

-- -----------------------------------------------------
-- CREATE USER TABLE
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS users (
                                     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                     username VARCHAR(12) NOT NULL,
                                     password VARCHAR(512) NOT NULL,
                                     mail VARCHAR(128) NOT NULL,
                                     photo VARCHAR(512)
);

-- -----------------------------------------------------
-- CREATE PHOTOS TABLE
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS photos (
                                      id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                      likes INT NOT NULL, user_id INT,
                                      creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                                      photo_url VARCHAR(128) NOT NULL,
                                      CONSTRAINT fk_user_photo FOREIGN KEY (user_id) REFERENCES users(id)
);

-- -----------------------------------------------------
-- CREATE LIKES TABLE ? Necessary
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS likes (
                                     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                     photo_id INT NOT NULL, user_id INT NOT NULL,
                                     CONSTRAINT fk_user_like FOREIGN KEY (user_id) REFERENCES users(id),
                                     CONSTRAINT fk_photos_like FOREIGN KEY (photo_id) REFERENCES photos(id)
);

-- -----------------------------------------------------
-- CREATE COMMENTS TABLE ? Necessary
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS comments (
                                        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                        content TEXT, photo_id INT NOT NULL,
                                        user_id INT NOT NULL,
                                        creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
                                        CONSTRAINT fk_user_comment FOREIGN KEY (user_id) REFERENCES users(id),
                                        CONSTRAINT fk_photos_comment FOREIGN KEY (photo_id) REFERENCES photos(id)
);
