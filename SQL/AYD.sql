-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema AYD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AYD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AYD` DEFAULT CHARACTER SET utf8 ;
USE `AYD` ;

-- -----------------------------------------------------
-- Table `AYD`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AYD`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(500) NULL,
  `areaEmpresarial` VARCHAR(100) NULL,
  PRIMARY KEY (`idempresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AYD`.`oferta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AYD`.`oferta` (
  `idferta` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `puestosVacantes` INT NULL,
  `tiempoContratacion` VARCHAR(45) NULL,
  `nivelExperiencia` VARCHAR(45) NULL,
  `genero` TINYINT(1) NULL,
  `salarioMInimo` VARCHAR(45) NULL,
  `salarioMaximo` VARCHAR(45) NULL,
  `escolaridad` VARCHAR(45) NULL,
  `empresa_idempresa` INT NOT NULL,
  PRIMARY KEY (`idferta`, `empresa_idempresa`),
  INDEX `fk_oferta_empresa_idx` (`empresa_idempresa` ASC),
  CONSTRAINT `fk_oferta_empresa`
    FOREIGN KEY (`empresa_idempresa`)
    REFERENCES `AYD`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AYD`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AYD`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NULL,
  `email` VARCHAR(80) NULL,
  `password` VARCHAR(250) NULL,
  `authKey` VARCHAR(250) NULL,
  `accessToken` VARCHAR(250) NULL,
  `activate` TINYINT(1) NOT NULL DEFAULT 0,
  `nombre` VARCHAR(50) NULL,
  `apelildo` VARCHAR(50) NULL,
  `fechaNac` VARCHAR(45) NULL,
  `role` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `activate`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AYD`.`candidato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AYD`.`candidato` (
  `Users_id` INT NOT NULL,
  `Users_activate` TINYINT(1) NOT NULL,
  `oferta_idferta` INT NOT NULL,
  `oferta_empresa_idempresa` INT NOT NULL,
  PRIMARY KEY (`Users_id`, `Users_activate`, `oferta_idferta`, `oferta_empresa_idempresa`),
  INDEX `fk_candidato_oferta1_idx` (`oferta_idferta` ASC, `oferta_empresa_idempresa` ASC),
  CONSTRAINT `fk_candidato_Users1`
    FOREIGN KEY (`Users_id` , `Users_activate`)
    REFERENCES `AYD`.`Users` (`id` , `activate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_candidato_oferta1`
    FOREIGN KEY (`oferta_idferta` , `oferta_empresa_idempresa`)
    REFERENCES `AYD`.`oferta` (`idferta` , `empresa_idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
