<?php

/**
 *  Library for handling routing functions
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 06:10:35 +08:00
 **/

function getConfigRoute( $config )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to extract configured routes.' );
    }

    if( !is_array( $config ) || empty( $config ) ) {
        return null;
    }

    if( isset( $config['routes'] ) ) {
        return $config['routes'];
    }

    return null;
}

function extractRouteParameters( $configRoutes, $routeTokens )
{
    if( !is_array( $configRoutes ) || empty( $configRoutes ) ) {
        return null;
    }

    if( !is_array( $routeTokens ) || empty( $routeTokens ) ) {
        return null;
    }

    $parametersMap = [];
    if( isset( $routeTokens[0] ) ) {
        if( isset( $configRoutes[ $routeTokens[0] ] ) ) {
            if( isset( $routeTokens[1] ) ) {
                if( isset( $configRoutes[ $routeTokens[0] ][ $routeTokens[1] ] ) ) {
                    $parametersMap = $configRoutes[ $routeTokens[0] ][ $routeTokens[1] ]; 
                    unset( $routeTokens[0], $routeTokens[1] );
                    $routeTokens = array_values( $routeTokens );
                }
            }
        }
    }

    $parameters = [];
    if( count( $parametersMap ) <= count( $routeTokens ) ) {
        foreach( $parametersMap as $index => $field ) {
            $parameters[ $field ] = $routeTokens[ $index ];
        }
    }
    return $parameters;
}