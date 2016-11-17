
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
    `assignee` VARCHAR(255),
    `estimated` DOUBLE,
    `spenttime` DOUBLE,
    `day` INTEGER,
    `month` INTEGER,
    `year` INTEGER,
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
    `group` VARCHAR(128),
    `spented` DOUBLE,
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

-- ---------------------------------------------------------------------
-- myprojectdata
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myprojectdata`;

CREATE TABLE `myprojectdata`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `budget` DOUBLE,
    `hourlyrate` DOUBLE,
    `hourlybuffer` DOUBLE,
    `plannedvalue` DOUBLE,
    `actualcost` DOUBLE,
    `earnedvalueforus` DOUBLE,
    `earnedvalueforclient` DOUBLE,
    `earnedvaluevarience` DOUBLE,
    `schedulevariance` DOUBLE,
    `costvariance` DOUBLE,
    `scheduleperformanceindex` DOUBLE,
    `costperformanceindex` DOUBLE,
    `estimateatcompletionforclient` DOUBLE,
    `varianceatcompletionforclient` DOUBLE,
    `costatcompletionforus` DOUBLE,
    `tocompleteperformanceindex` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
