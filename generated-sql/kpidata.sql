
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
    `month` INTEGER,
    `day` INTEGER,
    `year` INTEGER,
    `issuekey` VARCHAR(255),
    `summary` VARCHAR(255),
    `userspent` VARCHAR(255),
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
-- myemployee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myemployee`;

CREATE TABLE `myemployee`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `speciality` VARCHAR(128),
    `employee` VARCHAR(128),
    `level` VARCHAR(128),
    `data` VARCHAR(128),
    `datemonth` VARCHAR(128),
    `dateyear` VARCHAR(128),
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
    `projectname` VARCHAR(128),
    `budget` DOUBLE,
    `totalestimated` DOUBLE,
    `totalspent` DOUBLE,
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

-- ---------------------------------------------------------------------
-- projectdata_assignee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `projectdata_assignee`;

CREATE TABLE `projectdata_assignee`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `myprokectid` INTEGER,
    `myassigneeid` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mydatatemp
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mydatatemp`;

CREATE TABLE `mydatatemp`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project` VARCHAR(255),
    `nonbil` VARCHAR(24),
    `estimated` DOUBLE,
    `spent` DOUBLE,
    `date` INTEGER,
    `employee` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- myprojecttmp
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myprojecttmp`;

CREATE TABLE `myprojecttmp`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `date` INTEGER,
    `employee` VARCHAR(255),
    `projectname` VARCHAR(128),
    `totalhoursestimated` DOUBLE,
    `totalhoursspent` DOUBLE,
    `hourlyrateAvr` DOUBLE,
    `totalcostestimated` DOUBLE,
    `totalcostspent` DOUBLE,
    `totalcost` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- myanalitic
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myanalitic`;

CREATE TABLE `myanalitic`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `projectname` VARCHAR(128),
    `issuekey` VARCHAR(128),
    `initialestimate` VARCHAR(128),
    `nonbil` VARCHAR(24),
    `assignee` VARCHAR(128),
    `estimatedhourssum` DOUBLE,
    `logworkhourssum` DOUBLE,
    `logworkusername` VARCHAR(128),
    `logworkyear` INTEGER,
    `logworkmonth` INTEGER,
    `logworkdatatime` INTEGER,
    `logworkage` INTEGER,
    `countissues` INTEGER,
    `countissuespersent` DOUBLE,
    `estimatedhourssubtask` DOUBLE,
    `logedhours` DOUBLE,
    `remaininghours` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- myanaliticnonbill
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `myanaliticnonbill`;

CREATE TABLE `myanaliticnonbill`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `projectname` VARCHAR(128),
    `issuekey` VARCHAR(128),
    `initialestimate` VARCHAR(128),
    `nonbil` VARCHAR(24),
    `assignee` VARCHAR(128),
    `estimatedhourssum` DOUBLE,
    `logworkhourssum` DOUBLE,
    `logworkusername` VARCHAR(128),
    `logworkyear` INTEGER,
    `logworkmonth` INTEGER,
    `logworkdatatime` INTEGER,
    `logworkage` INTEGER,
    `countissues` INTEGER,
    `countissuespersent` DOUBLE,
    `estimatedhourssubtask` DOUBLE,
    `logedhours` DOUBLE,
    `remaininghours` DOUBLE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
