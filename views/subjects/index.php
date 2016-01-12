<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Subjects</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1>Subjects</h1>
                <?php if( !empty( $subjects ) ) : ?>
                <table>
                    <thead>
                        <th width="20%">Code</th>
                        <th width="40%">Name</th>
                        <th width="20%">Units</th>
                        <th width="20%">Fee</th>
                    </thead>
                    <tbody>
                        <?php foreach( $subjects as $subject ) : ?>
                        <tr>
                            <td align='center'>
                                <?php echo $subject['Code']; ?>
                            </td>
                            <td>
                                <?php echo $subject['Name']; ?>
                            </td>
                            <td align='center'>
                                <?php echo $subject['SubjectDetail']['Units']; ?>
                            </td>
                            <td align='center'>
                                &#8369; <?php echo number_format( (float) $subject['SubjectDetail']['Fee'], 2, '.', ',' ); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>                        
                    </tbody>
                </table>
                <?php else : ?>
                <p><em>No subjects found.</em></p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>