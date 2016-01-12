DROP DATABASE IF EXISTS `Academetrics`;
CREATE DATABASE IF NOT EXISTS `Academetrics` CHARSET = UTF8;
SET NAMES 'UTF8';

USE `Academetrics`;

-- 
-- User Roles
--
SELECT 'Table Schema' AS 'UserRoles';
DROP TABLE IF EXISTS `UserRoles`;
CREATE TABLE IF NOT EXISTS `UserRoles`(
    `ID` TINYINT (1) AUTO_INCREMENT,
    `Name` VARCHAR (30) NOT NULL,
    `Code` VARCHAR (30) NOT NULL,

    `DateAdded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DateModified` TIMESTAMP NULL,

    PRIMARY KEY ( `ID` )
) ENGINE = InnoDB CHARSET = utf8;

-- 
-- Users
--
SELECT 'Table Schema' AS 'Users';
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users`(
    `ID` INT (11) UNSIGNED AUTO_INCREMENT,
    `UserName` VARCHAR (30) NOT NULL,
    `Password` VARCHAR (300) NOT NULL,

    `UserRoleID` TINYINT (1) NOT NULL,

    `DateAdded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DateModified` TIMESTAMP NULL,

    PRIMARY KEY ( `ID` ),
    UNIQUE KEY ( `UserName` ),
    FOREIGN KEY ( `UserRoleID` ) REFERENCES `UserRoles` ( `ID` ) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE = InnoDB CHARSET = utf8;

-- 
-- StudentDetails
--
SELECT 'Table Schema' AS 'StudentDetails';
DROP TABLE IF EXISTS `StudentDetails`;
CREATE TABLE IF NOT EXISTS `StudentDetails`(
    `UserID` INT (11) UNSIGNED NOT NULL,

    `FirstName` VARCHAR (30) NOT NULL,
    `MiddleName` VARCHAR (30) NULL,
    `LastName` VARCHAR (30) NULL,
    `Email` VARCHAR (50) NULL,
    `Address` VARCHAR (200) NULL,
    `StudentNumber` VARCHAR (100) NULL,

    `DateAdded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DateModified` TIMESTAMP NULL,

    PRIMARY KEY ( `UserID` ),
    UNIQUE KEY ( `Email` )
) ENGINE = InnoDB CHARSET = utf8;

--
-- Subjects
--
SELECT 'Table Schema' AS 'Subjects';
DROP TABLE IF EXISTS `Subjects`;
CREATE TABLE IF NOT EXISTS `Subjects`(
    `ID` INT (11) UNSIGNED AUTO_INCREMENT,
    `Name` VARCHAR (30) NOT NULL,
    `Code` VARCHAR (30) NOT NULL,

    `DateAdded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DateModified` TIMESTAMP NULL,

    PRIMARY KEY ( `ID` ),
    UNIQUE KEY ( `Name` )
) ENGINE = InnoDB CHARSET = utf8;

--
-- SubjectDetails
--
SELECT 'Table Schema' AS 'SubjectDetails';
DROP TABLE IF EXISTS `SubjectDetails`;
CREATE TABLE IF NOT EXISTS `SubjectDetails`(
    `SubjectID` INT(11) UNSIGNED NOT NULL,
    `Units` TINYINT (1) DEFAULT 1,
    `Fee` DECIMAL ( 7, 2 ) DEFAULT 0.00,
        
    `DateAdded` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `DateModified` TIMESTAMP NULL,

    PRIMARY KEY ( `SubjectID` ),
    FOREIGN KEY ( `SubjectID` ) REFERENCES `Subjects` ( `ID` ) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE = InnoDB CHARSET = utf8;

--
-- StudentsSubjectsMatch
--
SELECT 'Table Schema' AS 'StudentsSubjectsMatch';
DROP TABLE IF EXISTS `StudentsSubjectsMatch`;
CREATE TABLE IF NOT EXISTS `StudentsSubjectsMatch`(
    `UserID` INT (11) UNSIGNED NOT NULL,
    `SubjectID`  INT (11) UNSIGNED NOT NULL,

    `Grade` DECIMAL ( 5, 2 ) DEFAULT 0.00,
    
    PRIMARY KEY ( `UserID`, `SubjectID` ),
    FOREIGN KEY ( `UserID` ) REFERENCES `Users` ( `ID` ) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY ( `SubjectID` ) REFERENCES `Subjects` ( `ID` ) ON UPDATE NO ACTION ON DELETE NO ACTION
) ENGINE = InnoDB CHARSET = utf8;