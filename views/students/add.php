<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Add Student</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1>Add Student</h1>
                <form method='POST'>
                    <div class='form-segment'>
                        <label for='UserName'>User Name</label>
                        <input type='text' name='UserName' />
                    </div>
                    <div class='form-segment'>
                        <label for='Password'>Password</label>
                        <input type='password' name='Password' />
                    </div>
                    <div class='form-segment'>
                        <label for='FirstName'>First Name</label>
                        <input type='text' name='FirstName' />
                    </div>
                    <div class='form-segment'>
                        <label for='MiddleName'>Middle Name</label>
                        <input type='text' name='MiddleName' />
                    </div>
                    <div class='form-segment'>
                        <label for='LastName'>Last Name</label>
                        <input type='text' name='LastName' />
                    </div>
                    <div class='form-segment'>
                        <label for='Email'>E-mail</label>
                        <input type='text' name='Email' />
                    </div>
                    <div class='form-segment'>
                        <label for='Address'>Address</label>
                        <input type='text' name='Address' />
                    </div>
                    <?php if( !empty( $subjects ) ) : ?>
                    <div class='form-segment'>
                        <h4>Subjects</h4>
                        <ul>
                        <?php foreach( $subjects as $subject ) : ?>                    
                            <li>
                                <input type='checkbox' value='<?php echo $subject['ID']; ?>' name='Subjects[]' />
                                <label><?php echo $subject['Name']; ?></label>
                            </li>                    
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class='form-segment' align='right'>
                        <input type='submit' value='Add Student' />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>