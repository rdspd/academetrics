<?php

/**
 *  Students Controller
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-12 23:11:16 +08:00
 **/

session_start();

function index( $config, $parameters )
{
    loadModel( 'models/Students' );

    $students = getAllStudents( $config );
    
    if( $students['status'] ) {
        if( isset( $_SESSION['uname'] ) ) {
            $students['loggedIn'] = true;
        }

        if( isset( $_SESSION['urole'] ) ) {
            $students['role'] = $_SESSION['urole'];   
        }
        
        if( isset( $_SESSION['addStatus'] ) ) {
            $students['addStatus'] = $_SESSION['addStatus'];
            $_SESSION['addStatus'] = null;
            unset( $_SESSION['addStatus'] );
        }

        if( isset( $_SESSION['addStatusMessage'] ) ) {
            $students['addStatusMessage'] = $_SESSION['addStatusMessage'];
            $_SESSION['addStatusMessage'] = null;
            unset( $_SESSION['addStatusMessage'] );
        }        
        
        return $students;
    }

    return [
        'status'  => false,
        'message' => 'An error occured while trying to retrieve Students records.',
        'code'    => 500,
    ];
}

function view( $config, $parameters )
{
    loadModel( 'models/Students' );

    $studentNumber = isset( $parameters['student-number'] ) ? $parameters['student-number'] : 0;

    $student = getStudentByStudentNumber( $config, $studentNumber );
    
    if( $student['status'] ) {
        if( isset( $_SESSION['uname'] ) ) {
            $student['loggedIn'] = true;
        }

        if( isset( $_SESSION['urole'] ) ) {
            $student['role'] = $_SESSION['urole'];   
        }
        
        return $student;
    }

    return [
        'status'  => false,
        'message' => 'An error occured while trying to retrieve Student records.',
        'code'    => 500,
    ];
}

function add( $config, $parameters )
{
    loadModel( 'models/Subjects' );
    loadModel( 'models/Students' );

    $subjects = getAllSubjects( $config );

    if( !$subjects['status'] ) {
        $subjects['subjects'] = [];
    }
    
    if( 'POST' == getRequestMethod() ) {
        $result = addStudent( $config, $_POST );

        $_SESSION['addStatus'] = $result['status'];
        $_SESSION['addStatusMessage'] = $result['message'];

        header( 'Location: /students' );
    }

    return [
        'status'   => true,
        'message'  => 'An error occured while trying to retrieve Student records.',
        'subjects' => $subjects['subjects'],
    ];
}