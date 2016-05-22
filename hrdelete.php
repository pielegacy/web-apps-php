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
            <div id="index-main-min" class="content-centered">
                <br/>
                <?php 
                if (!isset($_POST["confirmed"])){
                    echo '<form action="hrdelete.php?jobID='.$_GET["jobID"].'" method="POST">
                        <label for="confirmed">Confirm Delete For '.$_GET["jobID"].'?</label>
                        <input type="checkbox" name="confirmed" id="confirmed" required="true"/>
                        <br/>
                        <input type="submit" value="Submit"/>
                    </form>';
                }
                else {
                    clearJob();
                    echo "<a class=\"center\" href=\"hrportal.php\">".$_GET["jobID"]." cleared of all applications. <br/> <u>Click here to return to portal.</u></a>";
                }
                ?>
                
            </div>
        <?php RenderFooter("hr"); ?>
    </body>
</html>