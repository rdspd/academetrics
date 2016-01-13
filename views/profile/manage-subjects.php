<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Manage Subjects</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1>Remaining Subjects</h1>
                <?php if( !empty( $subjects ) ) : ?>                
                <form method='POST'>
                    <?php if( !empty( $subjects ) ) : ?>
                    <div class='form-segment'>
                        <h4>Subjects</h4>
                        <ul>
                        <?php foreach( $subjects as $subject ) : ?>                    
                            <li class='no-float'>
                                <input type='checkbox' value='<?php echo $subject['ID']; ?>' name='Subjects[]' />
                                <label><?php echo $subject['Name']; ?> (<?php echo $subject['Units']; ?> units, &#8369; <?php echo $subject['Fee']; ?>)</label>
                            </li>                    
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class='form-segment' align='right'>
                        <input type='submit' value='Add Subjects' />
                    </div>
                </form>
                <?php else : ?>
                <p>There are no more remaining subjects for you to take.</p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>