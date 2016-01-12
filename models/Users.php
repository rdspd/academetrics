<?php

/**
 *  Users model
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 01:01:59 +08:00
 **/

function checkLogin( $config, $username, $password )
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
                `UserRoles`.`Name` AS `UserRoleName`,
                `UserRoles`.`Code` AS `UserRoleCode`,
                `UserRoles`.`DateAdded` AS `UserRoleDateAdded`,
                `UserRoles`.`DateModified` AS `UserRoleDateModified`
            FROM `Users`
            JOIN `UserRoles` ON `Users`.`UserRoleID` = `UserRoles`.`ID`
            WHERE 
                `UserName` = :UserName 
            AND 
                `Password` = :Password
            LIMIT 1
            '
        );

        $data = [
            'UserName' => $username,
            'Password' => $password,
        ];

        $preparedStatement = $connection->prepare( $query, [ PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ] );
        $preparedStatement->execute( $data );
        $preparedStatement->setFetchMode( PDO::FETCH_ASSOC );

        $record = $preparedStatement->fetch();
        
        if( !empty( $record ) ) {
            $record = [
                'ID' => $record['ID'],
                'UserName' => $record['UserName'],
                'DateAdded' => $record['DateAdded'],
                'DateModified' => $record['DateModified'],
                'UserRole' => [
                    'ID'           => $record['UserRoleID'],
                    'Name'         => $record['UserRoleName'],
                    'Code'         => $record['UserRoleCode'],
                    'DateAdded'    => $record['UserRoleDateAdded'],
                    'DateModified' => $record['UserRoleDateModified'],
                ],
            ];

            return [
                'status'  => true,
                'message' => 'User found and retrieved successfully.',
                'user'    => $record,
            ];
        }

        return [
            'status'  => false,
            'message' => 'No user found with given user name and password.',
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