<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $metadata['baseTitle']; ?> | Home</title>
        <link rel='stylesheet' href='/css/natural/desktop.css' />
    </head>
    <body>
        <div class='container'>
            <?php require 'views/shared/header.php'; ?>            
            <div class='content'>
                <h1>Academetrics</h1>
                <h3>What is Academetrics?</h3>
                <ul>
                    <li>
                        <strong>Academetrics</strong> is an academic management tool.
                    </li>
                    <li>
                        Students and Administrators can log in to manage their accounts.
                    </li>
                    <li>
                        Students can be added by Administrators.
                    </li>
                    <li>
                        Students can manage their own subjects.
                    </li>
                    <li>
                        Professors/Lecturers can be added at a later time (next release).
                    </li>
                </ul>
                <h3>About Academetrics</h3>
                <ul>
                    <li>
                        <strong>Academetrics</strong> use the same basic framework as the blog I use on writetospeak.
                    </li>
                    <li>
                        OOP is something I don't opt to use if I want to go full ham for performance, so you should not be able to see any OOP tricks on that basic framework.
                    </li>
                    <li>
                        Code is in <a href='https://github.com/redspade-redspade/academetrics'>Github for review</a>, but I locked it out just so no one could tamper with my own code base.
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>