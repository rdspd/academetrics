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
                    403
                </h1>
                <h2 class='error-message'>
                    The page you are trying to look for does is not accessible on your end.
                </h2>
            </div>
        </div>
    </body>
</html>