<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Login</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>            
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <div class='login-box'>
                    <div class='header'>login</div>                    
                    <div class='form-box'>
                        <?php if( isset( $invalid ) && $invalid ) : ?>
                        <div class='errors'>
                            Username/password do not match.
                        </div>
                        <?php endif; ?>
                        <form method='POST'>
                            <div class='row'>
                                <label for='username'>Username:</label>
                                <input type='text' name='username' />
                            </div>
                            <div class='row'>
                                <label for='password'>Password:</label>
                                <input type='password' name='password' />
                            </div>
                            <div class='row'>
                                <input type='submit' value='login' />
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>