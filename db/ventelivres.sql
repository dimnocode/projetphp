-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ventelivres
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ventelivres
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ventelivres` DEFAULT CHARACTER SET utf8 ;
USE `ventelivres` ;

-- -----------------------------------------------------
-- Table `ventelivres`.`livres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ventelivres`.`livres` (
  `LivreID` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `titre` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `auteur` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `prix_unitaire` DECIMAL(10,0) NULL DEFAULT NULL COMMENT '',
  `actif` INT(1) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`LivreID`)  COMMENT '')
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ventelivres`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ventelivres`.`utilisateurs` (
  `utilisateur` VARCHAR(255) NOT NULL COMMENT '',
  `code` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `nom` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `prenom` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `admin` INT(1) NULL DEFAULT NULL COMMENT '',
  `actif` INT(1) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`utilisateur`)  COMMENT '')
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ventelivres`.`ventes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ventelivres`.`ventes` (
  `idvente` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `datevente` INT(11) NULL DEFAULT NULL COMMENT '',
  `etat` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `utilisateurs_utilisateur` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`idvente`, `utilisateurs_utilisateur`)  COMMENT '',
  INDEX `fk_vente_utilisateurs_idx` (`utilisateurs_utilisateur` ASC)  COMMENT '',
  CONSTRAINT `fk_vente_utilisateurs`
    FOREIGN KEY (`utilisateurs_utilisateur`)
    REFERENCES `ventelivres`.`utilisateurs` (`utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ventelivres`.`vente_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ventelivres`.`vente_details` (
  `idvente_detail` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `quantite` INT(11) NULL DEFAULT NULL COMMENT '',
  `prix_unitaire` DECIMAL(10,0) NULL DEFAULT NULL COMMENT '',
  `vente_idvente` INT(11) NOT NULL COMMENT '',
  `livres_LivreID` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`idvente_detail`, `vente_idvente`)  COMMENT '',
  INDEX `fk_vente_detail_livres1_idx` (`livres_LivreID` ASC)  COMMENT '',
  INDEX `fk_vente_detail_vente1_idx` (`vente_idvente` ASC)  COMMENT '',
  CONSTRAINT `fk_vente_detail_vente1`
    FOREIGN KEY (`vente_idvente`)
    REFERENCES `ventelivres`.`ventes` (`idvente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vente_detail_livres1`
    FOREIGN KEY (`livres_LivreID`)
    REFERENCES `ventelivres`.`livres` (`LivreID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
