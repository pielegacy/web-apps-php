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
                <?php
                    if (isset($_POST["status-new"])){
                        $_GET["eoi"] = $_POST["eoi"];
                        UpdateStatus();
                    }
                    RenderHRPage('eoi-details'); 
                    $eoi = $_GET["eoi"];
                    echo "<form class=\"center\" action=\"hrdetails.php?eoi=\"$eoi\" method=\"POST\">";
                    echo "<input type=\"text\" name=\"eoi\" hidden value=\"".$eoi."\"/>";
                ?>
                    <h3>Options</h3>
                    <hr/>
                    <label for="status-new">Update Status : </label>
                    <select name="status-new" id="status-new">
                        <option value="">Choose Status</option>
                        <option value="0">New</option>
                        <option value="1">Current</option>
                        <option value="2">Final</option>
                    </select> 
                    <input type="submit" value="Update"/>
                </form>
            </div>
        <?php RenderFooter("hr"); ?>
    </body>
</html>