<?php

/**
 *  Library for handling database functions
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-02 05:56:09 +08:00
 **/

function getConnection( $config )
{
    if( empty( $config ) || !is_array( $config ) ) {
        return [
            'status'  => false,
            'message' => 'No configuration provided.',
            'code' => 500,
        ];
    }

    if( !isset( $config['database'] ) ) {
        return [
            'status'  => false,
            'message' => 'Database configuration is missing on provided settings.',
            'code' => 500,
        ];
    }

    $hostName = $config['database']['host'];
    $userName = $config['database']['username'];
    $password = $config['database']['password'];
    $database = $config['database']['database'];
    $driver   = $config['database']['driver'];

    $connectionString = sprintf(
        '%s:host=%s;dbname=%s;charset=utf8',
        $driver,
        $hostName,
        $database
    );

    $connection = new PDO( $connectionString, $userName, $password );

    if( $connection ) {
        return [
            'status'  => true,
            'message' => 'Connection successfully established.',
            'connection' => $connection,
        ];
    }

    return [
        'status'  => false,
        'message' => 'Unable to establish database connection.',
        'code' => 500,
    ];
}

function closeConnection( $connection )
{
    if( $connection instanceof PDO ) {
        $connection = null;
    }
}