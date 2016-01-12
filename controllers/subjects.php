<?php

/**
 *  Subjects Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 00:12:23 +08:00
 **/

session_start();

function index( $config, $parameters )
{
    loadModel( 'models/Subjects' );       

    $subjects = getAllSubjects( $config );
    
    if( $subjects['status'] ) {
        return $subjects;
    }

    return [
        'status'  => false,
        'message' => 'An error occured while trying to retrieve Subjects records.',
        'code'    => 500,
    ];
}