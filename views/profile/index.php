<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Profile</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <?php if( !empty( $student ) ) : ?>
                <h1>Student Profile</h1>
                <h2>Details</h2>
                <table>
                    <tbody>
                        <tr>
                            <td class='column-label'>First Name</td>
                            <td class='column-data'>
                                <?php echo $student['StudentDetail']['FirstName']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class='column-label'>Middle Name</td>
                            <td class='column-data'>
                                <?php echo $student['StudentDetail']['MiddleName']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class='column-label'>Last Name</td>
                            <td class='column-data'>                            
                                <?php echo $student['StudentDetail']['LastName']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class='column-label'>Student Number</td>
                            <td class='column-data'>                            
                                <?php echo $student['StudentDetail']['StudentNumber']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class='column-label'>E-mail</td>
                            <td class='column-data'>                            
                                <?php echo $student['StudentDetail']['Email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class='column-label'>Address</td>
                            <td class='column-data'>                            
                                <?php echo $student['StudentDetail']['Address']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2>Subjects</h2>
                <a class='button add' href='/profile/manage-subjects'>
                    Manage Subjects
                </a>
                <?php if( isset( $student['Subjects'] ) && !empty( $student['Subjects'] ) ) :  ?>
                <table>
                    <thead>
                        <th width='20%'>Subject Code</th>
                        <th width='40%'>Subject</th>
                        <th width='20%'>Units</th>
                        <th width='20%'>Grade</th>
                    </thead>
                    <tbody>
                        <?php foreach( $student['Subjects'] as $subject ) : ?>
                        <tr>
                            <td align='center'>
                                <strong><?php echo $subject['Code']; ?></strong>
                            </td>
                            <td align='center'>                            
                                <?php echo $subject['Name']; ?>
                            </td>
                            <td align='center'>
                                <?php echo $subject['Units']; ?>
                            </td>
                            <td align='center'>
                                <strong><?php echo $subject['Grade']; ?></strong>
                            </td>
                        </tr>
                        <?php endforeach; ?>                        
                    </tbody>
                </table>
                <?php endif; ?>                
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>