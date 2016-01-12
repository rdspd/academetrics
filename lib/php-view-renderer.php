<?php

/**
 *  Library for rendering views using PHP
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 03:00:39 +08:00
 **/

function render( $config, $template, $viewVariables )
{
    $metadata = extractMetadata( $config );

    $paths = explode( PATH_SEPARATOR, get_include_path() );

    if( !empty( $viewVariables ) && is_array( $viewVariables ) ) {
        extract( $viewVariables );
    }

    foreach( $paths as $path ) {
        if( file_exists( $path . DIRECTORY_SEPARATOR . $template ) ) {
            require $template;
            return true;
        }
    }

    return false;
}

function extractMetadata( $config )
{
    if( empty( $config ) || !is_array( $config ) ) {
        return [];
    }

    $metadata = [];
    if( isset( $config['application']['view']['baseTitle'] ) ) {
        $metadata['baseTitle'] = $config['application']['view']['baseTitle'];
    }

    return $metadata;
}