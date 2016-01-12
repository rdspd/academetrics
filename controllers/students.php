<?php

/**
 *  Students Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:16 +08:00
 **/

session_start();

function index( $config, $parameters )
{
    loadModel( 'models/Students' );       

    $students = getAllStudents( $config );
    
    if( $students['status'] ) {
        if( isset( $_SESSION['uname'] ) ) {
            $students['loggedIn'] = true;
        }
        
        return $students;
    }

    return [
        'status'  => false,
        'message' => 'An error occured while trying to retrieve Students records.',
        'code'    => 500,
    ];
}