<?php

/**
 *  Subjects model
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 00:12:15 +08:00
 **/

function getAllSubjects( $config )
{
    $connection = getConnection( $config );

    if( false === $connection['status'] ) {
        return $connection;
    }

    $connection = $connection['connection'];

    try {
        $query = sprintf(
            '
            SELECT
                `Subjects`.*,
                `SubjectDetails`.`Units` AS `SubjectDetailUnits`,
                `SubjectDetails`.`Fee` AS `SubjectDetailFee`,
                `SubjectDetails`.`DateAdded` AS `SubjectDetailDateAdded`,
                `SubjectDetails`.`DateModified` AS `SubjectDetailDateModified`
            FROM `Subjects`
            JOIN `SubjectDetails` ON `SubjectDetails`.`SubjectID` = `Subjects`.`ID`
            '
        );

        $preparedStatement = $connection->prepare( $query, [ PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ] );
        $preparedStatement->execute();
        $preparedStatement->setFetchMode( PDO::FETCH_ASSOC );

        $records = [];
        while( $record = $preparedStatement->fetch() ) {
            $records[] = [
                'ID'            => $record['ID'],
                'Name'          => $record['Name'],
                'Code'          => $record['Code'],
                'DateAdded'     => $record['DateAdded'],
                'DateModified'  => $record['DateModified'],
                'SubjectDetail' => [
                    'Units'        => $record['SubjectDetailUnits'],
                    'Fee'          => $record['SubjectDetailFee'],
                    'DateAdded'    => $record['SubjectDetailDateAdded'],
                    'DateModified' => $record['SubjectDetailDateModified'],
                ],
            ];
        }

        closeConnection( $connection );

        return [
            'status'  => true,
            'message' => 'Subjects successfully retrieved.',
            'subjects' => $records,
        ]; 
    }
    catch( Exception $e ) {
        closeConnection( $connection );

        return [
            'status'  => false,
            'message' => $e->getMessage(),
            'code'    => 500,
        ];
    }
}

function getSubjectsNotTakenByStudent( $config, $studentID )
{
    $connection = getConnection( $config );

    if( false === $connection['status'] ) {
        return $connection;
    }

    $connection = $connection['connection'];

    try {
        $query = sprintf(
            '
            SELECT 
                `Subjects`.*,
                `SubjectDetails`.`Units` AS `Units`,
                `SubjectDetails`.`Fee` AS `Fee`
            FROM `Subjects`
            JOIN `SubjectDetails` ON `SubjectDetails`.`SubjectID` = `Subjects`.`ID`
            WHERE 
            `Subjects`.`ID` NOT IN (
                SELECT `SubjectID` FROM `StudentsSubjectsMatch`
                WHERE `StudentsSubjectsMatch`.`UserID` = 2
            )
            GROUP BY `Subjects`.`ID`
            ORDER BY `Subjects`.`ID`
            '
        );

        $data = [
            'ID' => $studentID
        ];

        $preparedStatement = $connection->prepare( $query, [ PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ] );
        $preparedStatement->execute( $data );
        $preparedStatement->setFetchMode( PDO::FETCH_ASSOC );

        $records = [];
        while( $record = $preparedStatement->fetch() ) {
            $records[] = $record;
        }
        
        return [
            'status'   => true,
            'message'  => 'Subjects not taken yet by given student successfully retrieved.',
            'subjects' => $records,
        ];
    }
    catch( Exception $e ) {
        closeConnection( $connection );

        return [
            'status'  => false,
            'message' => $e->getMessage(),
            'code'    => 500,
        ];
    }
}