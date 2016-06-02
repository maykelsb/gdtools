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
