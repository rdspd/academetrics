<?php

set_include_path( 
    get_include_path() . PATH_SEPARATOR .
    dirname( __DIR__ )
);

require 'lib/dispatcher.php';

dispatch( require 'configs/app-config.php' );