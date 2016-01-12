<?php

/**
 *  StudentsSubjectsMatch model
 *
 *  @author Enrique Bondoc <enrique.bondoc@writetospeak.info>
 *  @since  2016-01-13 04:04:01 +08:00
 **/

function addStudentSubjectMatch( $config, $studentID, $subjectID )
{
    $connection = getConnection( $config );

    if( false === $connection['status'] ) {
        return $connection;
    }

    $connection = $connection['connection'];

    try {
        /**
         *  Insert into StudentsSubjectsMatch table.
         */
        $query = sprintf(
            '
            INSERT INTO `StudentsSubjectsMatch` ( `UserID`, `SubjectID` )
            VALUES ( :UserID, :SubjectID )
            '
        );

        $preparedStatement = $connection->prepare( $query );
        $preparedStatement->bindValue( ':UserID', $studentID, PDO::PARAM_INT );
        $preparedStatement->bindValue( ':SubjectID', $subjectID, PDO::PARAM_INT );
        $result = $preparedStatement->execute();

        closeConnection( $connection );

        if( $result ) {
            return [
                'status'  => true,
                'message' => 'Match (Student-Subject) has been added successfully.',
            ];
        }

        return [
            'status'  => false,
            'message' => 'An error occured while trying to add the Student-Subject match.',
        ];
    }
    catch( Exception $e ) {
        closeConnection( $connection );

        return [
            'status'  => false,
            'message' => $e->getMessage(),
            'code'    => 500,
        ];
    }
}