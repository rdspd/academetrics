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
    ( 'administrator', SHA1( 'password' ), 1 ),
    ( 'arthur.dent', SHA1( 'password' ), 3 ),
    ( 'tricia.mcmillan', SHA1( 'password' ), 3 ),
    ( 'zaphod.beeblebrox', SHA1( 'password' ), 3 );
UNLOCK TABLES;

--
-- Users
--
SELECT 'Data Dump' AS 'StudentDetails';
LOCK TABLES `StudentDetails` WRITE;
INSERT INTO `StudentDetails` ( `UserID`, `FirstName`, `MiddleName`, `LastName`, `Email`, `Address`, `StudentNumber` )
VALUES    
    ( 2, 'Arthur', null, 'Dent', 'arthur.dent@hitchikers.com', 'Planet Earth', 'STDNT-2016-0002' ),
    ( 3, 'Tricia', null, 'McMillan', 'tricia.mcmillan@hitchikers.com', 'Planet Earth', 'STDNT-2016-0003' ),
    ( 4, 'Zaphod', null, 'Beeblebrox', 'zaphod.beeblebrox@hitchikers.com', 'Somewhere in Betelgeuse', 'STDNT-2016-0004' );
UNLOCK TABLES;

--
-- StudentsSubjectsMatch
--
SELECT 'Data Dump' AS 'StudentsSubjectsMatch';
LOCK TABLES `StudentsSubjectsMatch` WRITE;
INSERT INTO `StudentsSubjectsMatch` ( `UserID`, `SubjectID`, `Grade` )
VALUES
    ( 2, 1, 1.75 ),
    ( 2, 2, 1.50 ),
    ( 2, 3, 1.25 ),
    ( 3, 1, 2.75 ),
    ( 3, 2, 2.50 ),
    ( 3, 3, 2.25 ),
    ( 3, 4, 2.50 ),
    ( 4, 2, 2.50 ),
    ( 4, 3, 1.75 ),
    ( 4, 4, 3.00 );
UNLOCK TABLES;