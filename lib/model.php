<?php

/**
 *  Library for handling model functions
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 03:53:59 +08:00
 **/

function loadModel( $name )
{
    $modelFile = null;
    $paths = explode( PATH_SEPARATOR, get_include_path() );

    foreach( $paths as $path ) {
        $modelFile = $path . DIRECTORY_SEPARATOR . $name . '.php';        
        if( is_file( $modelFile ) ) {
            break;
        }
    }    
        
    if( empty( $modelFile ) ) {
        return [
            'status'  => false,
            'message' => 'Model cannot be located and loaded.',
        ];
    }

    return require $modelFile;
}