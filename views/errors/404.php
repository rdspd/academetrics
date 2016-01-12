<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Error 404</title>
        <link rel='stylesheet' href="/css/cobalt.css" />
    </head>
    <body>
        <?php require 'views/shared/header.php'; ?>
        <div class='main-container'>
            <div class='header-nav'></div>
            <div class='error-page-container'>
                <h2>404</h2>
                <h3>Page Not Found</h3>
                <p>
                    The page you are trying to look for does not exist or it may have moved somewhere else.
                    If you came around here by mistake, you can go back to the <a href="/">Home page</a> and continue from there.
                </p>
            </div>
        </div>
        <?php require 'views/shared/footer.php'; ?>
    </body>
</html>