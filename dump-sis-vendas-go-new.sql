-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema SisVendasGo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SisVendasGo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SisVendasGo` DEFAULT CHARACTER SET utf8 ;
USE `SisVendasGo` ;

-- -----------------------------------------------------
-- Table `SisVendasGo`.`tb_carro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SisVendasGo`.`tb_carro` (
  `id_carro` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ano_fabricacao` INT(4) NULL DEFAULT NULL,
  `ano_modelo` INT(4) NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `opcionais` VARCHAR(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_carro`))
ENGINE = InnoDB
AUTO_INCREMENT = 83
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SisVendasGo`.`tb_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SisVendasGo`.`tb_documento` (
  `fk_id_carro` INT(10) UNSIGNED NOT NULL,
  `id_documento` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_veiculo` VARCHAR(45) NULL DEFAULT NULL,
  `numero_chassi` VARCHAR(45) NULL DEFAULT NULL,
  `placa_veiculo` VARCHAR(8) NULL DEFAULT NULL,
  `valor` DOUBLE NULL,
  PRIMARY KEY (`id_documento`),
  INDEX `fk_tb_documento_tb_carro_idx` (`fk_id_carro` ASC),
  CONSTRAINT `fk_tb_documento_tb_carro`
    FOREIGN KEY (`fk_id_carro`)
    REFERENCES `SisVendasGo`.`tb_carro` (`id_carro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SisVendasGo`.`tb_representates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SisVendasGo`.`tb_representates` (
  `id_representante` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_representante` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_representante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SisVendasGo`.`tb_vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SisVendasGo`.`tb_vendas` (
  `id_venda` INT(11) NOT NULL AUTO_INCREMENT,
  `fk_tb_documento` INT(11) NOT NULL,
  `data_venda` DATE NULL,
  `fk_id_representantes` INT(10) UNSIGNED NOT NULL,
  `valor_total` VARCHAR(45) NULL,
  PRIMARY KEY (`id_venda`),
  INDEX `fk_tb_vendas_tb_documento1_idx` (`fk_tb_documento` ASC),
  INDEX `fk_tb_vendas_tb_representates1_idx` (`fk_id_representantes` ASC),
  CONSTRAINT `fk_tb_vendas_tb_documento1`
    FOREIGN KEY (`fk_tb_documento`)
    REFERENCES `SisVendasGo`.`tb_documento` (`id_documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_vendas_tb_representates1`
    FOREIGN KEY (`fk_id_representantes`)
    REFERENCES `SisVendasGo`.`tb_representates` (`id_representante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
