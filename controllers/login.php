<?php

/**
 *  Login Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:54 +08:00
 **/

session_start();

function index( $config, $parameters ) {
    if( 'POST' == getRequestMethod() ) {
        $username = isset( $_POST['username'] ) ? $_POST['username'] : null;
        $password = isset( $_POST['password'] ) ? sha1( $_POST['password'] ) : null;

        loadModel( 'models/Users' );

        $result = checkLogin( $config, $username, $password );

        if( $result['status'] ) {
            if( isset( $result['user'] ) ) {
                $_SESSION['uname'] = $result['user']['UserName'];
                $_SESSION['urole'] = $result['user']['UserRole']['ID'];
                header( 'Location: /' );
                exit;
            }
        }
        else {
            return [
                'status'  => true,
                'message' => $result['message'],
                'invalid' => true,
            ];
        }
    }

    return [
        'status' => true,
        'message' => 'Index action completed for controller Home.',
        'data' => [],
    ];
}