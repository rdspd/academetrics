<?php

/**
 *  Students model
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:34 +08:00
 **/

function getAllStudents( $config )
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
                `Users`.*,
                `StudentDetails`.`FirstName` AS `StudentDetailsFirstName`,
                `StudentDetails`.`MiddleName` AS `StudentDetailsMiddleName`,
                `StudentDetails`.`LastName` AS `StudentDetailsLastName`,
                `StudentDetails`.`Email` AS `StudentDetailsEmail`,
                `StudentDetails`.`Address` AS `StudentDetailsAddress`,
                `StudentDetails`.`StudentNumber` AS `StudentDetailsStudentNumber`,
                `StudentDetails`.`DateAdded` AS `StudentDetailsDateAdded`,
                `StudentDetails`.`DateModified` AS `StudentDetailsDateModified`,
                `UserRoles`.`Name` AS `UserRoleName`,
                `UserRoles`.`Code` AS `UserRoleCode`,
                `UserRoles`.`DateAdded` AS `UserRoleDateAdded`,
                `UserRoles`.`DateModified` AS `UserRoleDateModified`
            FROM `Users`
            JOIN `StudentDetails` ON `StudentDetails`.`UserID` = `Users`.`ID`
            JOIN `UserRoles` ON `Users`.`UserRoleID` = `UserRoles`.`ID`
            WHERE `Users`.`UserRoleID` = :UserRoleID
            '
        );

        $data = [
            'UserRoleID' => 3,
        ];

        $preparedStatement = $connection->prepare( $query, [ PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ] );
        $preparedStatement->execute( $data );
        $preparedStatement->setFetchMode( PDO::FETCH_ASSOC );

        $records = [];
        while( $record = $preparedStatement->fetch() ) {
            $records[] = [
                'ID'            => $record['ID'],
                'UserName'      => $record['UserName'],
                'DateAdded'     => $record['DateAdded'],
                'DateModified'  => $record['DateModified'],
                'StudentDetail' => [
                    'FirstName'     => $record['StudentDetailsFirstName'],
                    'MiddleName'    => $record['StudentDetailsMiddleName'],
                    'LastName'      => $record['StudentDetailsLastName'],
                    'Email'         => $record['StudentDetailsEmail'],
                    'Address'       => $record['StudentDetailsAddress'],
                    'StudentNumber' => $record['StudentDetailsStudentNumber'],
                    'DateAdded'     => $record['StudentDetailsDateAdded'],
                    'DateModified'  => $record['StudentDetailsDateModified'],
                ],
                'UserRole' => [
                    'ID'           => $record['UserRoleID'],
                    'Name'         => $record['UserRoleName'],
                    'Code'         => $record['UserRoleCode'],
                    'DateAdded'    => $record['UserRoleDateAdded'],
                    'DateModified' => $record['UserRoleDateModified'],
                ],
            ];
        }

        closeConnection( $connection );

        return [
            'status'  => true,
            'message' => 'Students successfully retrieved.',
            'students' => $records,
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