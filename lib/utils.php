<?php

/**
 *  Library for handling utility methods
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2015-12-30 02:30:06 +08:00
 **/

 function prettyPrint( $print, $terminate = true )
 {
    echo '<pre>', print_r( $print, true ), '</pre>';
    
    if( $terminate ) {
        exit;
    }
 }