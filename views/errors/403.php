<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Error 403</title>
        <link rel='stylesheet' href="/css/cobalt.css" />
    </head>
    <body>
        <?php require 'views/shared/header.php'; ?>
        <div class='main-container'>
            <div class='header-nav'></div>
            <div class='error-page-container'>
                <h2>403</h2>
                <h3>Forbidden</h3>
                <p>
                    The page you are trying to reach is not accessible on your end.
                    Alternatively, you can go back to the <a href="/">Home page</a> and continue from there.
                </p>
            </div>
        </div>
        <?php require 'views/shared/footer.php'; ?>
    </body>
</html>