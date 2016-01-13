<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | 404 Not Found</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1 class='error-heading'>
                    404
                </h1>
                <h2 class='error-message'>
                    The page you are trying to look for does not exist or may have moved somewhere else.
                </h2>
            </div>
        </div>
    </body>
</html>