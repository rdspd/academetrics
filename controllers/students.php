<?php

/**
 *  Students Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:16 +08:00
 **/

session_start();

function index()
{
    return [
        'status' => true,
        'message' => 'Index action completed for controller Student.',
        'data' => [],
    ];
}