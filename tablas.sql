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
