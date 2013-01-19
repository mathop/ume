-- Padrões

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';










-- SCHAME ume

CREATE SCHEMA IF NOT EXISTS `ume`
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci ;







-- Utilize ume

USE `ume`;











-- TABLE people

CREATE  TABLE IF NOT EXISTS `ume`.`people` 
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `branch_id` INT(11) NOT NULL ,
  `person_type_id` INT(11) NOT NULL ,
  `name` VARCHAR(100) NULL DEFAULT NULL ,
  `phone` VARCHAR(45) NULL DEFAULT NULL ,
  `mobile` VARCHAR(45) NULL DEFAULT NULL ,
  `customize_payment` TINYINT(4) NULL DEFAULT 28 ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `cpf` VARCHAR(45) NULL DEFAULT NULL ,
  `rg` VARCHAR(45) NULL DEFAULT NULL ,
  `date_of_birth` VARCHAR(45) NULL DEFAULT NULL ,
  `observation` VARCHAR(200) NULL DEFAULT NULL ,
  `image` VARCHAR(150) NULL DEFAULT NULL ,
  
  PRIMARY KEY (`id`) ,
  
  INDEX `fk_pessoas_filiais1_idx` (`branch_id` ASC) ,
  INDEX `fk_people_person_types1_idx` (`person_type_id` ASC) ,
  
  CONSTRAINT `fk_pessoas_filiais1`
    FOREIGN KEY (`branch_id` )
    REFERENCES `ume`.`branches` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
  CONSTRAINT `fk_people_person_types1`
    FOREIGN KEY (`person_type_id` )
    REFERENCES `ume`.`person_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;



-- TABLE addresses

CREATE  TABLE IF NOT EXISTS `ume`.`addresses` 
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `person_id` INT(11) NOT NULL ,
  `city_id` INT(11) NOT NULL ,
  `street` VARCHAR(45) NULL DEFAULT NULL ,
  `number` VARCHAR(45) NULL DEFAULT NULL ,
  `complement` VARCHAR(45) NULL DEFAULT NULL ,
  `neighborhood` VARCHAR(45) NULL DEFAULT NULL ,

  PRIMARY KEY (`id`) ,
  
  INDEX `fk_addresses_people1_idx` (`person_id` ASC) ,
  INDEX `fk_addresses_cities1_idx` (`city_id` ASC) ,
  
  CONSTRAINT `fk_addresses_people1`
    FOREIGN KEY (`person_id` )
    REFERENCES `ume`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT `fk_addresses_cities1`
    FOREIGN KEY (`city_id` )
    REFERENCES `ume`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;










-- TABLE contracts

CREATE  TABLE IF NOT EXISTS `ume`.`contracts`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `person_id` INT(11) NOT NULL ,
  `course_id` INT(11) NOT NULL ,
  `period_id` INT(11) NOT NULL ,
  `bank_num` VARCHAR(45) NULL DEFAULT NULL ,
  `year` VARCHAR(45) NULL DEFAULT NULL ,
  `semester` VARCHAR(45) NOT NULL ,
  `active` VARCHAR(45) NULL DEFAULT NULL ,
  `date_rescinded` DATE NULL DEFAULT NULL ,
  `observation` VARCHAR(200) NULL DEFAULT NULL ,

  PRIMARY KEY (`id`) ,

  INDEX `fk_contracts_people1_idx` (`person_id` ASC) ,
  INDEX `fk_contracts_courses1_idx` (`course_id` ASC) ,
  INDEX `fk_contracts_periods1_idx` (`period_id` ASC) ,

  CONSTRAINT `fk_contracts_people1`
    FOREIGN KEY (`person_id` )
    REFERENCES `ume`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT `fk_contracts_courses1`
    FOREIGN KEY (`course_id` )
    REFERENCES `ume`.`courses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

  CONSTRAINT `fk_contracts_period1`
    FOREIGN KEY (`period_id` )
    REFERENCES `ume`.`periods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;









-- TABLE branches

CREATE  TABLE IF NOT EXISTS `ume`.`branches`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;






-- TABLE person_types

CREATE  TABLE IF NOT EXISTS `ume`.`person_types`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) 
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;






-- TABLE points

CREATE  TABLE IF NOT EXISTS `ume`.`points` 
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) 
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;






-- TABLE event_types

CREATE  TABLE IF NOT EXISTS `ume`.`event_types`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) 
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;








-- TABLE courses

CREATE  TABLE IF NOT EXISTS `ume`.`courses`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;







-- TABLE cities

CREATE  TABLE IF NOT EXISTS `ume`.`cities`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) 
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;







-- TABLE events

CREATE  TABLE IF NOT EXISTS `ume`.`events`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `point_id` INT(11) NOT NULL ,
  `event_type_id` INT(11) NOT NULL ,
  `contract_id` INT(11) NOT NULL ,
  
  PRIMARY KEY (`id`) ,
  
  INDEX `fk_events_points1_idx` (`point_id` ASC) ,
  INDEX `fk_events_event_types1_idx` (`event_type_id` ASC) ,
  INDEX `fk_events_contracts1_idx` (`contract_id` ASC) ,
  
  CONSTRAINT `fk_events_points1`
    FOREIGN KEY (`point_id` )
    REFERENCES `ume`.`points` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
  CONSTRAINT `fk_events_event_types1`
    FOREIGN KEY (`event_type_id` )
    REFERENCES `ume`.`event_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  
  CONSTRAINT `fk_events_contracts1`
    FOREIGN KEY (`contract_id` )
    REFERENCES `ume`.`contracts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;







-- TABLE periods

CREATE  TABLE IF NOT EXISTS `ume`.`periods`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;







-- Padrões

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;