<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | 403 Forbidden</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1 class='error-heading'>
                    500
                </h1>
                <h2 class='error-message'>
                    An internal server error has occured and is now being investigated by the sleeping panda.
                </h2>
            </div>
        </div>
    </body>
</html>