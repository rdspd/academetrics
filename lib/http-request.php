<?php

/**
 *  Library for handling HTTP Requests
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 02:04:44 +08:00
 **/

function getBaseDomain( $config )
{   
    if( !isset( $config['application'] ) ) {
        throw new Exception( 'Application configuration is missing on provided settings.' );
    }

    if( !isset( $config['application']['domain'] ) ) {
        throw new Exception( 'Application base domain is not set.' );
    }

    return $config['application']['domain'];
}

function assembleUrl( $domain )
{
    $scheme = isset( $_SERVER['HTTPS'] ) && 'on' == $_SERVER['HTTPS'] ? 'https' : 'http';
    $port = isset( $_SERVER['SERVER_PORT'] ) && 80 == $_SERVER['SERVER_PORT'] ? '' : $_SERVER['SERVER_PORT'];

    return $scheme . '://' . $domain . getRequestUri() . getRequestQueryString();
}

function getRequestUri()
{
    $uri = '';
    if( isset( $_SERVER['REQUEST_URI'] ) && !empty( $_SERVER['REQUEST_URI'] ) ) {
        $uri = $_SERVER['REQUEST_URI'];

        /**
         *  Remove query string if present.
         **/
        $uriTokens = explode( '?', $uri );

        if( !empty( $uriTokens ) ) {            
            /**
             *  See if the first token is actually a separator. Return empty if it is.
             **/            
            if( '?' == $uriTokens[0]{0} ) {
                $uri = '';
            }
            elseif( 1 == strlen( $uriTokens[0] ) && '/' == $uriTokens[0]{0} ) {
                $uri = '';   
            }
            else {
                $uri = $uriTokens[0];
            }            
        }
    }
    return $uri;
}

function getRequestQueryString()
{
    $query = '';
    if( isset( $_SERVER['QUERY_STRING'] ) && !empty( $_SERVER['QUERY_STRING'] ) ) {
        $query = $_SERVER['QUERY_STRING'];
    }
    return '?' . $query;
}

function getRequestMethod()
{
    $method = '';
    if( isset( $_SERVER['REQUEST_METHOD'] ) && !empty( $_SERVER['REQUEST_METHOD'] ) ) {
        $method = $_SERVER['REQUEST_METHOD'];
    }
    return $method;
}

function parseUrl( $uri )
{
    if( empty( $uri ) ) {
        return $uri;
    }

    return parse_url( $uri );
}