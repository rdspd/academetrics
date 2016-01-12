<?php

/**
 *  Profile Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 03:03:15 +08:00
 **/

session_start();

function index( $config, $parameters ) {
    if( !isset( $_SESSION['uname'] ) || ( isset( $_SESSION['urole'] ) && 3 != $_SESSION['urole'] ) ) {
        header( 'Location: /' );
        exit;
    }

    $userName = $_SESSION['uname'];

    loadModel( 'models/Students' );

    $profile = getStudentByStudentUserName( $config, $userName );
    
    if( $profile['status'] ) {
        return [
            'status' => true,
            'message' => $profile['message'],
            'student' => $profile['student'],
        ];
    }
    else {
        return [
            'status'  => false,
            'message' => $result['message'],
            'invalid' => true,
        ];
    }
}