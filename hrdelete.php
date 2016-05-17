<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd HR Delete" />
        <meta name="keywords" content="db,pty,ltd,hr,delete" />
        <meta name="author" content="Alex Billson" />
    <?php require "main.php" ?>
    </head>
    <body>
        <?php RenderHeader("hr"); ?>
            <div id="index-main-min" class="content-centered">
                <?php
                    echo "<h1 class='center'>Are you sure you want to delete all entries for job ".
                    $_GET["jobID"]." ?</li>";
                    
                ?>
            </div>
        <?php RenderFooter("hr"); ?>
    </body>
</html>