
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- mydatastore
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mydatastore`;

CREATE TABLE `mydatastore`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project` VARCHAR(255),
    `nonbil` VARCHAR(24),
    `assignee` DOUBLE,
    `estimated` DOUBLE,
    `$spenttime` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- myassignee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myassignee`;

CREATE TABLE `myassignee`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `assigneename` VARCHAR(128),
    `salary` DOUBLE,
    `hourlyrate` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mykpitable
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mykpitable`;

CREATE TABLE `mykpitable`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `totalestimated` DOUBLE,
    `nonbillblestimated` DOUBLE,
    `billblestimated` DOUBLE,
    `totalspenttime` DOUBLE,
    `nonbillblspenttime` DOUBLE,
    `billblspentTime` DOUBLE,
    `totalprojects` DOUBLE,
    `totalpm` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
