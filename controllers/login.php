<?php

/**
 *  Login Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:54 +08:00
 **/

session_start();

function index() {
    return [
        'status' => true,
        'message' => 'Index action completed for controller Home.',
        'data' => [],
    ];
}