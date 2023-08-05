-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Endereco` (
                                                 `idEndereco` INT NOT NULL,
                                                 `CEP` VARCHAR(45) NULL,
    `pais` VARCHAR(45) NULL,
    `estado` VARCHAR(45) NULL,
    `cidade` VARCHAR(45) NULL,
    `bairro` VARCHAR(45) NULL,
    `tipoLogradouro` VARCHAR(45) NULL,
    `enderecoResidencial` VARCHAR(45) NULL,
    `numeroResidencia` VARCHAR(45) NULL,
    `complementoEndereco` VARCHAR(45) NULL,
    PRIMARY KEY (`idEndereco`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Funcao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Funcao` (
    `codigoFuncao` CHAR(4) NOT NULL,
    `descricao` VARCHAR(45) NULL,
    `cbo` INT(8) NULL,
    PRIMARY KEY (`codigoFuncao`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Canditatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Canditatos` (
    `nomeCandidato` VARCHAR(80) NOT NULL,
    `nomeMae` VARCHAR(80) NOT NULL,
    `nomePai` VARCHAR(80) NOT NULL,
    `sexoCandidato` VARCHAR(45) NOT NULL,
    `estadoCivil` VARCHAR(45) NOT NULL,
    `grauInstrucao` VARCHAR(45) NOT NULL,
    `racaCor` VARCHAR(45) NOT NULL,
    `dataNascimentoCandidato` DATETIME NOT NULL,
    `nacionalidade` VARCHAR(45) NOT NULL,
    `paisNascimento` VARCHAR(45) NOT NULL,
    `estadoNascimento` VARCHAR(45) NULL,
    `cidadeNascimento` VARCHAR(45) NULL,
    `numeroBotina` INT(2) NOT NULL,
    `numeroCalca` INT(2) NOT NULL,
    `tamanhoCamisa` VARCHAR(3) NOT NULL,
    `email` VARCHAR(80) NOT NULL,
    `numIdentidade` INT(15) NOT NULL,
    `orgaoEmissorIdentidade` VARCHAR(10) NULL,
    `estadoOrgaoEmissor` VARCHAR(45) NOT NULL,
    `cidadeEmissaoIdentidade` VARCHAR(45) NOT NULL,
    `dataExpedicaoIdentidade` VARCHAR(45) NOT NULL,
    `numCPF` INT(11) NOT NULL,
    `numPisPasep` INT(15) NOT NULL,
    `anexoIdentidade` VARCHAR(255) NOT NULL,
    `anexoCPF` VARCHAR(255) NOT NULL,
    `anexoCurriculo` VARCHAR(255) NOT NULL,
    `anexoCNH` VARCHAR(255) NOT NULL,
    `anexoCertificadoReservista` VARCHAR(255) NOT NULL,
    `status` VARCHAR(45) NOT NULL,
    `Endereco_idEndereco` INT NOT NULL,
    `funcao_contratado` CHAR(4) NOT NULL,
    PRIMARY KEY (`numCPF`),
    INDEX `fk_Candidatos_Endereco1_idx` (`Endereco_idEndereco` ASC) VISIBLE,
    INDEX `fk_Candidatos_Funcao1_idx` (`funcao_contratado` ASC) VISIBLE,
    CONSTRAINT `fk_Candidatos_Endereco1`
    FOREIGN KEY (`Endereco_idEndereco`)
    REFERENCES `mydb`.`Endereco` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Candidatos_Funcao1`
    FOREIGN KEY (`funcao_contratado`)
    REFERENCES `mydb`.`Funcao` (`codigoFuncao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Telefone` (
                                                 `telefone` INT NOT NULL,
                                                 PRIMARY KEY (`telefone`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Candidatos_has_Telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Candidatos_has_Telefone` (
    `Candidatos_numCPF` INT(11) NOT NULL,
    `Telefone_telefone` INT NOT NULL,
    PRIMARY KEY (`Candidatos_numCPF`, `Telefone_telefone`),
    INDEX `fk_Candidatos_has_Telefone_Telefone1_idx` (`Telefone_telefone` ASC) VISIBLE,
    INDEX `fk_Candidatos_has_Telefone_Candidatos_idx` (`Candidatos_numCPF` ASC) VISIBLE,
    CONSTRAINT `fk_Candidatos_has_Telefone_Candidatos`
    FOREIGN KEY (`Candidatos_numCPF`)
    REFERENCES `mydb`.`Canditatos` (`numCPF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Candidatos_has_Telefone_Telefone1`
    FOREIGN KEY (`Telefone_telefone`)
    REFERENCES `mydb`.`Telefone` (`telefone`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`funcaoCandidatada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcaoCandidatada` (
    `Candidatos_numCPF` INT(11) NOT NULL,
    `Funcao_codigoFuncao` CHAR(4) NOT NULL,
    `ehPrincipal` TINYINT NULL,
    PRIMARY KEY (`Candidatos_numCPF`, `Funcao_codigoFuncao`),
    INDEX `fk_Candidatos_has_Funcao_Funcao1_idx` (`Funcao_codigoFuncao` ASC) VISIBLE,
    INDEX `fk_Candidatos_has_Funcao_Candidatos1_idx` (`Candidatos_numCPF` ASC) VISIBLE,
    CONSTRAINT `fk_Candidatos_has_Funcao_Candidatos1`
    FOREIGN KEY (`Candidatos_numCPF`)
    REFERENCES `mydb`.`Canditatos` (`numCPF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Candidatos_has_Funcao_Funcao1`
    FOREIGN KEY (`Funcao_codigoFuncao`)
    REFERENCES `mydb`.`Funcao` (`codigoFuncao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Dependentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Dependentes` (
    `numCPFDependente` INT(11) NOT NULL,
    `nomeDependente` VARCHAR(100) NULL,
    `sexoDependente` VARCHAR(45) NULL,
    `dataNascimentoDependente` DATETIME NULL,
    `grauParentesco` VARCHAR(45) NULL,
    `Candidatos_numCPF` INT(11) NOT NULL,
    PRIMARY KEY (`numCPFDependente`, `Candidatos_numCPF`),
    INDEX `fk_Dependente_Candidatos1_idx` (`Candidatos_numCPF` ASC) VISIBLE,
    CONSTRAINT `fk_Dependente_Candidatos1`
    FOREIGN KEY (`Candidatos_numCPF`)
    REFERENCES `mydb`.`Canditatos` (`numCPF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`confidentesDaAlfa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`confidentesDaAlfa` (
    `nomeConfidenteNaAlfa` VARCHAR(80) NOT NULL,
    `cidade` VARCHAR(100) NOT NULL,
    `funcao` VARCHAR(100) NOT NULL,
    `Candidatos_numCPF` INT(11) NOT NULL,
    `idConfidenteNaAlfa` INT NOT NULL,
    PRIMARY KEY (`idConfidenteNaAlfa`),
    INDEX `fk_confidenteNaAlfa_Candidatos1_idx` (`Candidatos_numCPF` ASC) VISIBLE,
    UNIQUE INDEX `idConfidenteNaAlfa_UNIQUE` (`idConfidenteNaAlfa` ASC) VISIBLE,
    CONSTRAINT `fk_confidenteNaAlfa_Candidatos1`
    FOREIGN KEY (`Candidatos_numCPF`)
    REFERENCES `mydb`.`Canditatos` (`numCPF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Logins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Logins` (
    `senha` VARCHAR(45) NOT NULL,
    `Candidatos_numCPF` INT(11) NOT NULL,
    PRIMARY KEY (`senha`),
    INDEX `fk_table1_Logins1_idx` (`Candidatos_numCPF` ASC) VISIBLE,
    CONSTRAINT `fk_table1_Logins1`
    FOREIGN KEY (`Candidatos_numCPF`)
    REFERENCES `mydb`.`Canditatos` (`numCPF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
