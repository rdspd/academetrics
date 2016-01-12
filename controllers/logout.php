<?php

/**
 *  Logout Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 01:01:23 +08:00
 **/

session_start();

function index( $config, $parameters ) {
    if( isset( $_SESSION['uname'] ) ) {
        $_SESSION['uname'] = null;
        unset( $_SESSION['uname'] );        
    }
    header( 'Location: /home' );
}