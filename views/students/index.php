<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Home</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1>Students</h1>
                <?php if( !empty( $students ) ) : ?>
                <table>
                    <thead>
                        <th width="30%">Student Number</th>
                        <th width="70%">Name</th>
                    </thead>
                    <tbody>
                        <?php foreach( $students as $student ) : ?>
                        <tr>
                            <td>
                                <?php if( isset( $loggedIn ) && true === $loggedIn ) : ?>
                                <a href='/students/view/<?php echo $student['StudentDetail']['StudentNumber']; ?>'>
                                <?php endif; ?>
                                    <?php echo $student['StudentDetail']['StudentNumber']; ?>
                                <?php if( isset( $loggedIn ) && true === $loggedIn ) : ?>
                                </a>
                                <?php endif; ?>                                
                            </td>
                            <td>
                                <?php echo $student['StudentDetail']['LastName']; ?>, <?php echo $student['StudentDetail']['FirstName']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                        
                    </tbody>
                </table>
                <?php else : ?>
                <p><em>No students found.</em></p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>