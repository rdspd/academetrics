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
                    <div>
                        <label for='UserName'>User Name</label>
                        <input type='text' name='UserName' />
                    </div>
                    <div>
                        <label for='Password'>Password</label>
                        <input type='password' name='Password' />
                    </div>
                    <div>
                        <label for='FirstName'>First Name</label>
                        <input type='text' name='FirstName' />
                    </div>
                    <div>
                        <label for='MiddleName'>Middle Name</label>
                        <input type='text' name='MiddleName' />
                    </div>
                    <div>
                        <label for='LastName'>Last Name</label>
                        <input type='text' name='LastName' />
                    </div>
                    <div>
                        <label for='Email'>E-mail</label>
                        <input type='text' name='Email' />
                    </div>
                    <div>
                        <label for='Address'>Address</label>
                        <input type='text' name='Address' />
                    </div>
                    <?php if( !empty( $subjects ) ) : ?>
                    <div>                        
                    <?php foreach( $subjects as $subject ) : ?>
                    <ul>
                        <li>
                            <input type='checkbox' value='<?php echo $subject['ID']; ?>' name='Subjects[]' />
                            <?php echo $subject['Name']; ?>
                        </li>
                    </ul>                    
                    <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div>
                        <input type='submit' value='Add Student' />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>