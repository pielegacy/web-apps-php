<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd Apply Page" />
        <meta name="keywords" content="db,pty,ltd,apply" />
        <meta name="author" content="Alex Billson" />
        <script src="scripts/notify.js"></script>
        <script src="scripts/phplinker.ts"></script>
        <?php require "main.php"; ?>
    </head>
    <body>
        <?php
            RenderHeader();
        ?>
        <div id="index-main-min">
            <div class="content-centered">
                <h2>Job Submission Status</h2>
                <?php
                    SubmitJobApplication();
                ?>
            </div>
        </div>
            <?php
                RenderFooter();
            ?>
    </body>
</html>
