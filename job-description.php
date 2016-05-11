<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd Job Database Administrator" />
        <meta name="keywords" content="db,pty,ltd,admin" />
        <meta name="author" content="Alex Billson" />
        <script src="scripts/jobdesc.js"></script>
        <script src="scripts/notify.js"></script>
        <?php require "main.php" ?>
    </head>
    <body>
        <?php RenderHeader(); ?>
        <div id="index-main-min" class="jobs-details">
            <?php RenderJobPage(); ?>
        </div>
        <?php RenderFooter(); ?>
    </body>
</html>