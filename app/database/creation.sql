CREATE TABLE `gdtools`.`project` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Project\'s name',
  `description` TEXT NULL COMMENT 'Project\'s description',
  `creation` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Project\'s creation date',
  PRIMARY KEY (`id`))
COMMENT = 'Store game projects';
---
CREATE TABLE `gdtools`.`deck` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project` INT NOT NULL COMMENT 'References Project table',
  `name` VARCHAR(45) NOT NULL COMMENT 'Deck\'s name',
  `creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Deck\'s creaction',
  PRIMARY KEY (`id`),
  INDEX `deck_fk_project_idx` (`project` ASC),
  CONSTRAINT `deck_fk_project`
    FOREIGN KEY (`project`)
    REFERENCES `gdtools`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
COMMENT = 'Stores deck of things used by projects';
---
ALTER TABLE `gdtools`.`deck`
ADD COLUMN `description` TEXT NOT NULL AFTER `name`;
---
CREATE TABLE IF NOT EXISTS `gdtools`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Category\'s name',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Store category of components, like cards or dices'
---
CREATE TABLE IF NOT EXISTS `gdtools`.`templatetype` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Type\'s name. Ex: Standard card game',
  `width` FLOAT NOT NULL COMMENT 'Item\'s width',
  `height` FLOAT NOT NULL COMMENT 'Item\'s height',
  `color` CHAR(6) NOT NULL COMMENT 'Item\'s common color, most for card sizes',
  `category` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_templatetype_category1_idx` (`category` ASC),
  CONSTRAINT `fk_templatetype_category1`
    FOREIGN KEY (`category`)
    REFERENCES `gdtools`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Store a categorized list of sizes'
---
CREATE TABLE IF NOT EXISTS `gdtools`.`template` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project` INT NOT NULL,
  `templatetype` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL COMMENT 'Template\'s name',
  `description` TEXT NULL COMMENT 'Template\'s description. Functionality, how it\'s used are examples',
  PRIMARY KEY (`id`),
  INDEX `fk_template_project1_idx` (`project` ASC),
  INDEX `fk_template_templatetype1_idx` (`templatetype` ASC),
  CONSTRAINT `fk_template_project1`
    FOREIGN KEY (`project`)
    REFERENCES `gdtools`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_template_templatetype1`
    FOREIGN KEY (`templatetype`)
    REFERENCES `gdtools`.`templatetype` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'A template is like a blueprint of a componente'
---
