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