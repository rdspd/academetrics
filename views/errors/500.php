<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Error 500</title>
        <link rel='stylesheet' href="/css/cobalt.css" />
    </head>
    <body>
        <?php require 'views/shared/header.php'; ?>
        <div class='main-container'>
            <div class='header-nav'></div>
            <div class='error-page-container'>
                <h2>500</h2>
                <h3>Internal Server Error</h3>
                <p>
                    The server has encountered an internal server error and cannot serve the page you are currently requesting.
                    Alternatively, you can go back to the <a href="/">Home page</a> and continue from there.
                </p>
            </div>
        </div>
        <?php require 'views/shared/footer.php'; ?>
    </body>
</html>