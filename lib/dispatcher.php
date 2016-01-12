<?php

/**
 *  Library for handling application dispatching
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 02:18:13 +08:00
 **/

require 'controller.php';
require 'database.php';
require 'http-request.php';
require 'model.php';
require 'php-view-renderer.php';
require 'routes.php';
require 'utils.php';

function dispatch( $config )
{
    if( empty( $config ) ) {        
        throw new Exception( 'Need a configuration file to dispatch application.' );
    }

    $domain = getBaseDomain( $config );
    
    if( empty( $domain ) ) {        
        return render(
            $config,
            'views/errors/500.php',
            [ 
                'message' => 'Unable to identify request domain.',
            ]
        );
    }

    $url = assembleUrl( $domain );

    $tokens = parseUrl( $url );    
    if( empty( $tokens ) ) {
        return render(
            $config,
            'views/errors/500.php',
            [ 
                'message' => 'Unable to process request.',
            ]
        );
    }

    /**
     *  We're just concerned with the path.
     **/
    $controller = '';
    $routeParameters = [];

    if( !isset( $tokens['path'] ) || empty( $tokens['path'] ) ) {
        /**
         *  Use the default controller instead.
         **/
        $controller = findDefaultController( $config );

        if( empty( $controller ) ) {
            return render(
                $config,
                'views/errors/404.php',
                [ 
                    'message' => 'No fallback controller to load.',
                ]
            );    
        }
        $action = findDefaultControllerAction( $config );
    }    
    else {
        $route = $tokens['path'];
        $routeTokens = explode( '/', $route );
        
        foreach( $routeTokens as $index => $value ) {
            if( empty( $value ) ) {
                unset( $routeTokens[ $index ] );
            }
        }

        $routeTokens = array_values( $routeTokens );

        $controller = $routeTokens[0];

        if( 1 == count( $routeTokens ) ) {
            $action = findDefaultControllerAction( $config );
        }
        else {
            $action = $routeTokens[1];
        }

        if( 2 < count( $routeTokens ) ) {
            $configRoutes = getConfigRoute( $config );

            if( empty( $configRoutes ) ) {
                /**
                 *  Just discard the given parameters.
                 **/
                unset( $routeTokens );
            }

            $routeParameters = extractRouteParameters( $configRoutes, $routeTokens );
        }
    }    

    $result = loadController( $config, $controller );    

    if( false === $result['status'] ) {
        return render(
            $config,
            'views/errors/404.php',
            [ 
                'message' => $result['message'],
            ]
        );
    }

    $controllerFile = $result['controller'];

    require $controllerFile;

    if( !function_exists( $action ) ) {
        return render(
            $config,
            'views/errors/404.php',
            [ 
                'message' => 'Default controller action is not found.',
            ]
        );
    }

    $result = $action( $config, $routeParameters );

    if( false === $result['status'] ) {
        return render(
            $config,
            'views/errors/500.php',
            [ 
                'message' => $result['message'],
            ]
        );
    }

    /**
     *  View directory should be in structure: views/<controller-name>/<action-name>.php
     **/
    $viewFile = 'views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php';
    
    unset( $result['status'], $result['message'] );

    $viewRender = render(
        $config,
        $viewFile,
        $result
    );

    if( false === $viewRender ) {
        render(
            $config,
            'views/errors/500.php',
            [ 
                'message' => 'View template not found.',
            ]
        );
    }
}