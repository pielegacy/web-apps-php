<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd Apply Page" />
        <meta name="keywords" content="db,pty,ltd,apply" />
        <meta name="author" content="Alex Billson" />
        <script src="scripts/apply.js"></script>
        <script src="scripts/notify.js"></script>
        <?php require "main.php"; ?>
    </head>
    <body>
        <?php
            RenderHeader();
        ?>
        <div id="index-main-min">
            <form class="form-apply"  method="post" action="http://mercury.ict.swin.edu.au/it000000/formtest.php">
                <h1 class="form-header">Apply For Position</h1>
                <fieldset>
                    <!--DONT FORGET TO ADD REQUIRED TAGS-->
                    <legend>Personal Details</legend>
                    <div class="input-field">    
                        <label for="firstname" title="Maximum of 25 characters">Given Name*</label>
                        <input type="text" class="text-input" id="firstname" name="firstname" placeholder="John" maxlength="25" required="required" pattern="^[a-zA-Z]+$"/>
                    </div>
                    <div class="input-field">    
                        <label for="surname" title="Maximum of 25 characters">Surname*</label>
                        <input type="text" class="text-input" id="surname" name="surname" placeholder="Smith" maxlength="25" required="required" pattern="^[a-zA-Z]+$"/>
                    </div>
                    <div class="input-field">    
                        <label for="dateofbirth" title="dd/mm/yyyy">Date Of Birth*</label>
                        <input type="text" class="text-input" id="dateofbirth" name="dateofbirth" placeholder="19/12/1997" required="required" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"/>
                    </div>
                    <div class="input-field">
                        <label for="genders">Gender*</label>
                        <div id="genders" name="genders" class="gender-input">
                            <label for="male">Male</label><input id="male" type="radio" name="gender" value="male"/>
                            <label for="female">Female</label><input id="female" type="radio" name="gender" value="female"/>
                            <label for="other">Other</label><input id="other" type="radio" name="gender" value="other" checked="checked"/>
                        </div>
                    </div>
                    <div class="input-field">    
                        <label for="phone" title="It's a phone number'">Mobile Number</label>
                        <input type="tel" class="text-input" id="phone" name="phone" placeholder="0444 444 444" required="required" pattern="^\d{4}[\ ]\d{3}[\ ]\d{3}|\d{10}$|"/>
                    </div>
                    <div class="input-field">    
                        <label for="email" title="address@email.com">Email*</label>
                        <input type="email" class="text-input" id="email" name="email" placeholder="alex@email.com" required="required"/>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address Details</legend>
                    <div class="input-field">
                       <label for="unitnumber">Unit Number</label>
                       <input type="text" class="text-input" id="unitnumber" name="unitnumber" placeholder="1" pattern="^\d*$"/>
                    </div>
                    <div class="input-field">
                       <label for="streetnumber">Street Number*</label>
                       <input type="text" class="text-input" id="streetnumber" name="streetnumber" placeholder="22" required="required" pattern="^\d*$"/>
                    </div>
                    <div class="input-field">
                       <label for="streetname">Street Name*</label>
                       <input type="text" class="text-input" id="streetname" name="streetname" placeholder="Fake St" required="required" maxlength="40"/>
                    </div>
                    <div class="input-field">
                       <label for="suburbname">Suburb Name*</label>
                       <input type="text" class="text-input" id="suburbname" name="suburbname" placeholder="Eltham North" required="required" maxlength="40"/>
                    </div>
                    <div class="input-field">
                       <label for="statename">State*</label>
                       <select required="required" name="statename" id="statename" class="other-input">
                           <option value="">Choose a state</option>
                           <option value="VIC">VIC</option>
                           <option value="ACT">ACT</option>
                           <option value="NSW">NSW</option>
                           <option value="QLD">QLD</option>
                           <option value="SA">SA</option>
                           <option value="WA">WA</option>
                           <option value="TAS">TAS</option>
						   <option value="NT">NT</option>	
                       </select>
                    </div>
                    
                    <div class="input-field">
                       <label for="postcode">Post Code*</label>
                       <input type="text" class="text-input" id="postcode" name="postcode" placeholder="3095" required="required" pattern="^\d{4}$"/>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Job Details</legend>
                    <div class="input-field">
                        <label for="job-select">Job Interest*</label>
                        <select required="required" id="job-select" name="job-select" class="other-input">
                            <option id="choiceDefault" value="">Choose a job...</option>
                            <option id="choiceDB0001" value="DB0001">DB0001-Db Administrator</option>
                            <option id="choiceDB0002" value="DB0002">DB0002-Db Sys Administrator</option>
                            <option id="choiceDB0003" value="DB0003">DB0003-NoSql Db Sys Administrator</option>
                        </select>
                    </div>
                    <div class="input-field">
                       <label for="cv">Upload CV</label>
                       <input type="file" class="other-input" name="cv" id="cv"/>
                    </div>
                    <div class="input-field">
                        <label for="cv">Skills</label>
                        <span class="check-input">
                            <label for="skill-html">HTML</label><input type="checkbox" name="skill-html" id="skill-html" value="html"/>
                            <label for="skill-css">CSS</label><input type="checkbox" name="skill-css" id="skill-css" value="css"/>
                            <label for="skill-js">JS</label><input type="checkbox" name="skill-js" id="skill-js" value="js"/>
                            <label for="skill-php">PHP</label><input type="checkbox" name="skill-php" id="skill-php" value="php"/>
                            <label for="skill-sql">SQL</label><input type="checkbox" name="skill-sql" id="skill-sql" value="sql"/>
                            <label for="skill-mysql">MySQL</label><input type="checkbox" name="skill-mysql" id="skill-mysql" value="mysql"/>
                            <label for="skill-other">Other</label><input type="checkbox" name="skill-other" id="skill-other" value="other"/>
                        </span>
                    </div>
                    <div class="input-field">
                       <label for="details">Additional Details/Other Skills</label>
                       <textarea class="text-input" rows="4" id="details" name="details" placeholder="I am keen to be employed"></textarea>
                    </div>
                    
                    
                </fieldset>
                <fieldset>
                    <div id="error-log"></div>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">
                </fieldset>
            </form>
        </div>
            <?php
                RenderFooter();
            ?>
    </body>
</html>
