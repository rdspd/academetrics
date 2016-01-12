<?php

/**
 *  Library for handling controller functions
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 03:31:13 +08:00
 **/

function findDefaultController( $config )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to identify default controller.' );
    }

    if( !is_array( $config ) || empty( $config ) ) {
        return null;
    }

    if( isset( $config['application']['controllers']['default']['controller'] ) ) {
        return $config['application']['controllers']['default']['controller'];
    }

    return null;
}

function findDefaultControllerAction( $config )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to identify default controller action.' );
    }

    if( !is_array( $config ) || empty( $config ) ) {
        return null;
    }

    if( isset( $config['application']['controllers']['default']['action'] ) ) {
        return $config['application']['controllers']['default']['action'];
    }

    return 'index';
}

function loadController( $config, $controller )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to dispatch controller.' );
    }

    if( !is_array( $config ) || empty( $config ) ) {
        return [
            'status'  => false,
            'message' => 'Dispatched controller encountered an error.',
        ];
    }

    if( !is_string( $controller ) || empty( $controller ) ) {
        return [
            'status'  => false,
            'message' => 'Controller provided is empty or not a string.',
        ];
    }

    $controllerDir = null;
    if( isset( $config['application']['controllers']['directory'] ) ) {
        $controllerDir = $config['application']['controllers']['directory'];
    }

    if( empty( $controllerDir ) ) {
        return [
            'status'  => false,
            'message' => 'Controller directory not set -- unable to locate and load required controller.',
        ];
    }

    $controllerPath = null;
    $paths = explode( PATH_SEPARATOR, get_include_path() );

    foreach( $paths as $path ) {
        if( is_dir( $path . DIRECTORY_SEPARATOR . $controllerDir ) ) {
            $controllerPath = $path . DIRECTORY_SEPARATOR . $controllerDir;
            break;
        }
    }

    if( empty( $controllerPath ) ) {
        return [
            'status'  => false,
            'message' => 'Controller directory is set but not a valid directory.',
        ];
    }

    $result = validateController( $config, $controller );

    if( false === $result['status'] ) {
        return [
            'status'  => false,
            'message' => $result['message'],
        ];
    }

    $controllerFile = $controllerPath . DIRECTORY_SEPARATOR . $controller . '.php';

    if( !is_file( $controllerFile ) ) {
        return [
            'status'  => false,
            'message' => 'Controller cannot be found.',
        ];
    } 

    return [
        'status'     => true,
        'message'    => 'Controller successfully loaded.',
        'controller' => $controllerFile,
    ];    
}

function validateController( $config, $controller )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to dispatch controller.' );
    }

    if( !is_array( $config ) || empty( $config ) ) {
        return [
            'status'  => false,
            'message' => 'Dispatched controller encountered an error.',
        ];
    }

    if( !is_string( $controller ) || empty( $controller ) ) {
        return [
            'status'  => false,
            'message' => 'Controller provided is empty or not a string.',
        ];
    }

    if( !isset( $config['application']['controllers']['invokables'] ) ) {
        return [
            'status'  => false,
            'message' => 'Valid controllers are not set.',
        ];
    }

    $invokableControllers = $config['application']['controllers']['invokables'];

    if( in_array( $controller, $invokableControllers ) ) {
        return [
            'status'  => true,
            'message' => 'Controller is found valid.',
        ];
    }

    return [
        'status'  => false,
        'message' => 'No matching route found.',
    ];
}