-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema blog-mvc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog-mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog-mvc` DEFAULT CHARACTER SET utf8mb4 ;
USE `blog-mvc` ;

-- -----------------------------------------------------
-- Table `blog-mvc`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `User` (
  `idUser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` CHAR(60) NOT NULL,
  PRIMARY KEY (`idUser`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Category` (
  `idCategory` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `postCount` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCategory`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Post` (
  `idPost` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUser` INT UNSIGNED NOT NULL,
  `idCategory` INT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `content` TEXT NULL DEFAULT NULL,
  `creationDate` DATETIME NOT NULL,
  PRIMARY KEY (`idPost`),
  INDEX `fk_Post_User_idx` (`idUser` ASC),
  INDEX `fk_Post_Category_idx` (`idCategory` ASC),
  CONSTRAINT `fk_Post_User`
  FOREIGN KEY (`idUser`)
  REFERENCES `User` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Post_Category`
  FOREIGN KEY (`idCategory`)
  REFERENCES `Category` (`idCategory`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Comment` (
  `idComment` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPost` INT UNSIGNED NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `creationDate` DATETIME NOT NULL,
  PRIMARY KEY (`idComment`),
  INDEX `fk_Comment_Post_idx` (`idPost` ASC),
  CONSTRAINT `fk_Comment_Post`
  FOREIGN KEY (`idPost`)
  REFERENCES `Post` (`idPost`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
