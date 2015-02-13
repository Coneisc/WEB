-- -----------------------------------------------------
-- Table `apeisc_coneisc`.`clave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apeisc_coneisc`.`clave` (
  `cla_dni` VARCHAR(200) NOT NULL,
  `cla_pass` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`cla_dni`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `apeisc_coneisc`.`horario`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `apeisc_coneisc`.`horario` (
  `idhorario` VARCHAR(5) NOT NULL,
  `tema` VARCHAR(120) NOT NULL,
  `fecha` DATE NOT NULL,
  `horainicio` DATETIME NOT NULL,
  `horafin` DATETIME NOT NULL,
  `ponente` VARCHAR(80) NOT NULL,
  `urlimagen` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idhorario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apeisc_coneisc`.`usuario_horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apeisc_coneisc`.`usuario_horario` (
  `ins_dni` CHAR(8) NOT NULL,
  `idhorario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ins_dni`, `idhorario`),
  INDEX `fkhorario_idx` (`idhorario` ASC),
  CONSTRAINT `fkusuario`
    FOREIGN KEY (`ins_dni`)
    REFERENCES `apeisc_coneisc`.`inscripcion` (`ins_dni`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkhorario`
    FOREIGN KEY (`idhorario`)
    REFERENCES `apeisc_coneisc`.`horario` (`idhorario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Procedure : insertarinscripcion
-- -----------------------------------------------------

DELIMITER //

CREATE PROCEDURE insertarinscripcion(in ins_dni CHAR(8) ,in ins_nom VARCHAR(100) ,in ins_ape VARCHAR(100) ,in ins_mai VARCHAR(200) ,in ins_pho CHAR(11) ,in ins_eda INT(2) ,in ins_sex CHAR(1) ,in ins_ocu VARCHAR(3) ,in cod_ciu VARCHAR(3) ,in cod_uni VARCHAR(3) ,in ins_tra VARCHAR(15) ,in cod_est VARCHAR(3),in cla_dni VARCHAR(200),in use_pass VARCHAR(200))
BEGIN
INSERT INTO `inscripcion`(`ins_dni`, `ins_nom`, `ins_ape`, `ins_mai`, `ins_pho`, `ins_eda`, `ins_sex`, `ins_ocu`, `cod_ciu`, `cod_uni`, `ins_tra`, `cod_est`) VALUES (ins_dni, ins_nom, ins_ape, ins_mai, ins_pho, ins_eda, ins_sex, ins_ocu, cod_ciu, cod_uni, ins_tra, cod_est);

INSERT INTO `clave`(`cla_dni`, `cla_pass`) VALUES (cla_dni,use_pass);

END //

DELIMITER ;


