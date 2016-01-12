<?php

/**
 *  UserRoles model
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 03:03:54 +08:00
 **/

function getUserRoleByID( $config, $id )
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
                `UserRoles`.*
            FROM `UserRoles`
            WHERE 
                `ID` = :ID
            LIMIT 1
            '
        );

        $data = [
            'ID' => $id,
        ];

        $preparedStatement = $connection->prepare( $query, [ PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ] );
        $preparedStatement->execute( $data );
        $preparedStatement->setFetchMode( PDO::FETCH_ASSOC );

        $record = $preparedStatement->fetch();
        
        if( !empty( $record ) ) {
            $record = [
                'ID'           => $record['ID'],
                'Name'         => $record['Name'],
                'Code'         => $record['Code'],
                'DateAdded'    => $record['DateAdded'],
                'DateModified' => $record['DateModified'],
            ];

            return [
                'status'   => true,
                'message'  => 'User Role found and retrieved successfully.',
                'userRole' => $record,
            ];
        }

        closeConnection( $connection );
        
        return [
            'status'  => false,
            'message' => 'No user role found with given ID.',
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