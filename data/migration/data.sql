USE `Academetrics`;

-- 
-- User Roles
--
SELECT 'Data Dump' AS 'UserRoles';
LOCK TABLES `UserRoles` WRITE;
INSERT INTO `UserRoles` ( `Name`, `Code` )
VALUES 
    ( 'Administrator', 'ADMIN' ),
    ( 'Lecturer', 'LECTR' ),
    ( 'Student', 'STDNT' );
UNLOCK TABLES;

--
-- Subjects
--
SELECT 'Data Dump' AS 'Subjects';
LOCK TABLES `Subjects` WRITE;
INSERT INTO `Subjects` ( `Name`, `Code` )
VALUES 
    ( 'Mathematics', 'MATH' ),
    ( 'Science', 'SCIE' ),
    ( 'Language', 'LANG' ),
    ( 'Literature', 'LITE' ),
    ( 'History', 'HIST' ),
    ( 'Arts', 'ARTS' ),
    ( 'Accounting', 'ACCT' );
UNLOCK TABLES;

--
-- SubjectDetails
--
SELECT 'Data Dump' AS 'SubjectDetails';
LOCK TABLES `SubjectDetails` WRITE;
INSERT INTO `SubjectDetails` ( `SubjectID`, `Units`, `Fee` )
VALUES
    ( 1, 4, 500.00 ),
    ( 2, 5, 600.00 ),
    ( 3, 3, 300.00 ),
    ( 4, 4, 400.00 ),
    ( 5, 5, 500.00 ),
    ( 6, 3, 300.00 ),
    ( 7, 5, 600.00 );
UNLOCK TABLES;

--
-- Users
--
SELECT 'Data Dump' AS 'Users';
LOCK TABLES `Users` WRITE;
INSERT INTO `Users` ( `UserName`, `Password`, `UserRoleID` )
VALUES
    ( 'arthur.dent', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 3 ),
    ( 'tricia.mcmillan', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 3 ),
    ( 'zaphod.beeblebrox', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 3 );
UNLOCK TABLES;

--
-- Users
--
SELECT 'Data Dump' AS 'StudentDetails';
LOCK TABLES `StudentDetails` WRITE;
INSERT INTO `StudentDetails` ( `UserID`, `FirstName`, `MiddleName`, `LastName`, `Email`, `Address`, `StudentNumber` )
VALUES
    ( 1, 'Arthur', null, 'Dent', 'arthur.dent@hitchikers.com', 'Planet Earth', 'STDNT-2016-0001' ),
    ( 2, 'Tricia', null, 'McMillan', 'tricia.mcmillan@hitchikers.com', 'Planet Earth', 'STDNT-2016-0002' ),
    ( 3, 'Zaphod', null, 'Beeblebrox', 'zaphod.beeblebrox@hitchikers.com', 'Somewhere in Betelgeuse', 'STDNT-2016-0003' );
UNLOCK TABLES;