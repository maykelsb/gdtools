CREATE TABLE `gdtools`.`project` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Project\'s name',
  `description` TEXT NULL COMMENT 'Project\'s description',
  `creation` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Project\'s creation date',
  PRIMARY KEY (`id`))
COMMENT = 'Store game projects';
---
