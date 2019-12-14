SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cartorio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cartorio` DEFAULT CHARACTER SET utf8 ;
USE `cartorio` ;

-- -----------------------------------------------------
-- Table `cartorio`.`tb_cartorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_cartorio` (
  `nome_fantasia` VARCHAR(100) NOT NULL,
  `razao_social` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(14) NOT NULL,
  `ativo` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`cnpj`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio`.`tb_contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_contato` (
  `id_contato` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fone` VARCHAR(12) NULL,
  `email` VARCHAR(100) NULL,
  `cartorio_cnpj` VARCHAR(14) NOT NULL,
  `ativo` TINYINT UNSIGNED NULL DEFAULT 1,
  PRIMARY KEY (`id_contato`),
  INDEX `fk_tb_contato_tb_cartorio_idx` (`cartorio_cnpj` ASC),
  UNIQUE INDEX `id_contato_UNIQUE` (`id_contato` ASC) ,
  CONSTRAINT `fk_tb_contato_tb_cartorio`
    FOREIGN KEY (`cartorio_cnpj`)
    REFERENCES `cartorio`.`tb_cartorio` (`cnpj`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio`.`tb_tabeliao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_tabeliao` (
  `id_tabeliao` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `cartorio_cnpj` VARCHAR(14) NOT NULL,
  `ativo` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_tabeliao`),
  INDEX `fk_tb_tabeliao_tb_cartorio1_idx` (`cartorio_cnpj` ASC) ,
  UNIQUE INDEX `id_tabeliao_UNIQUE` (`id_tabeliao` ASC) ,
  CONSTRAINT `fk_tb_tabeliao_tb_cartorio1`
    FOREIGN KEY (`cartorio_cnpj`)
    REFERENCES `cartorio`.`tb_cartorio` (`cnpj`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio`.`tb_estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_estado` (
  `estado` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  UNIQUE INDEX `estado_UNIQUE` (`estado` ASC) ,
  UNIQUE INDEX `uf_UNIQUE` (`uf` ASC) ,
  PRIMARY KEY (`uf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio`.`tb_cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_cidade` (
  `id_cidade` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(50) NOT NULL,
  `estado_uf` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  UNIQUE INDEX `id_cidade_UNIQUE` (`id_cidade` ASC) ,
  INDEX `fk_tb_cidade_tb_estado1_idx` (`estado_uf` ASC) ,
  CONSTRAINT `fk_tb_cidade_tb_estado1`
    FOREIGN KEY (`estado_uf`)
    REFERENCES `cartorio`.`tb_estado` (`uf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio`.`tb_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio`.`tb_endereco` (
  `id_endereco` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `endereco` VARCHAR(90) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `cartorio_cnpj` VARCHAR(14) NOT NULL,
  `ativo` TINYINT NOT NULL DEFAULT 1,
  `cidade_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_endereco`),
  INDEX `fk_tb_endereco_tb_cartorio1_idx` (`cartorio_cnpj` ASC) ,
  UNIQUE INDEX `id_endereco_UNIQUE` (`id_endereco` ASC) ,
  INDEX `fk_tb_endereco_tb_cidade1_idx` (`cidade_id` ASC) ,
  CONSTRAINT `fk_tb_endereco_tb_cartorio1`
    FOREIGN KEY (`cartorio_cnpj`)
    REFERENCES `cartorio`.`tb_cartorio` (`cnpj`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_endereco_tb_cidade1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `cartorio`.`tb_cidade` (`id_cidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
