<?php

/**
 *  Home Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 22:10:30 +08:00
 **/

session_start();

function index()
{
    return [
        'status' => true,
        'message' => 'Index action completed for controller Home.',
        'data' => [],
    ];
}