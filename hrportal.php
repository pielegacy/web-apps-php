<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd HR Portal" />
        <meta name="keywords" content="db,pty,ltd,hr,portal" />
        <meta name="author" content="Alex Billson" />
    <?php require "main.php" ?>
    </head>
    <body>
        <?php RenderHeader("hr"); ?>
            <div id="hr-table" class="jobs-details">
                <br/>
                <?php RenderHRPage('pull-all'); ?>
            </div>
        <?php RenderFooter("hr"); ?>
    </body>
</html>