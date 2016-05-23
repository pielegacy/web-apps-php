<?php
    /**
    * Author: Alex Billson 101091995
    * Purpose: Provide the main PHP functionality for the site
    * Created: 10/5/2016
    * Last Updated: 11/5/2016
    * Credits: Myself
    */
    define("IsLocal", false);
    // Used to render minimal-header, CSS applied in page
    function RenderHeader($type = "main")
    {
    //    TESTING CODE  
    //    $sqlmanager = new SqlConnection();
    //    $sqlmanager->init();
    
    // TODO : Add support for current page
        if ($type == "hr"){
        echo '
        <header class="header-image-min">
            <br />
            <h1><a href="index.php">Database Administrator Company Pty. Ltd</a></h1>
            <script src="scripts/notify.js"></script>
            <script src="scripts/searchtophp.js"></script>
        </header>
        <nav class="hr-nav">
            <ul>
                <li class="current"><a href="hrportal.php">HR Portal</a></li>
                <li> | </li>
                <li>Filter by:</li>
                <li><a href="hrportal.php">All</a></li>
                <li><a href="hrportal.php?byJob=DB0001" title="Database Administrator">DB0001</a></li>
                <li><a href="hrportal.php?byJob=DB0002" title="Database Systems Administrator">DB0002</a></li>
                <li><a href="hrportal.php?byJob=DB0003" title="NoSql Database Administrator">DB0003</a></li>
                <li><form action="hrportal.php?byName=true" method="POST" class="inline-form"><input type="text" name="byName" id="name-search" placeholder="Surname?"/></form></li>
                <li> | </li>
                <li><a href="index.php">Exit</a></li>
            </ul>
        </nav>';
        }
        else {
            echo '
        <header class="header-image-min">
            <br />
            <h1><a href="index.php">Database Administrator Company Pty. Ltd</a></h1>
            <script src="scripts/notify.js"></script>
        </header>
        <nav>
            <ul>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a class="current" href="apply.php">Apply</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>';
        }
    }
    // Similar to render header, but for the footer 
    function RenderFooter($type = "main"){
        if ($type == "hr"){
            echo '
            <footer class="hr-nav">
                &copy; 2016, Alex Billson - Interested in the site\'s PHP enhancements? <a href="enhancements.html">Click here</a>
            </footer>
            ';
        }
        else {
        echo '
            <footer>
                &copy; 2016, Alex Billson - Interested in the site\'s enhancements? <a href="enhancements.html">Click here</a>
            </footer>
            ';
        }
    }
    // Prepares data from form for usage in SQL
    function prepData($type, $formdata){
        switch ($type) {
            case 'skills':
                    $skillstring = "";
                    if (isset($formdata["skill-html"]))
                        $skillstring .= "html|";
                    if (isset($formdata["skill-css"]))
                        $skillstring .= "css|";
                    if (isset($formdata["skill-js"]))
                        $skillstring .= "js|";
                    if (isset($formdata["skill-php"]))
                        $skillstring .= "php|";
                    if (isset($formdata["skill-sql"]))
                        $skillstring .= "sql|";
                    if (isset($formdata["skill-mysql"]))
                        $skillstring .= "mysql|";
                    if (isset($formdata["skill-other"]))
                        $skillstring .= "other";
                    return $skillstring;
                break;
            case 'gender':
                if (isset($formdata["gender"]) === false || $formdata["gender"] != "male" && $formdata["gender"] != "female")
                    return "other";
                else 
                    return $formdata["gender"];
                break;
            default:
                if (!isset($formdata[$type]))
                    return "";
                else
                    return $formdata[$type];
                break;
        }
    }
    // Converts status number into string
    function ReturnStatus($number){
        switch ($number) {
            case 0:
                return 'New';
                break;
            case 1:
                return 'Current';
                break;
            case 2:
                return 'Final';
                break;
            default:
                return 'Unknown';
                break;
        }
    }
    // Handles Custom Query Functionality
    function ParseQuery($querystring)
    {
        $querystring = str_replace("&", "' AND ", $querystring);
        $querystring = str_replace(">=", ">='", $querystring);
        $querystring = str_replace("<=", "<='", $querystring);
        $querystring = str_replace(" is ", "=", $querystring);
        $querystring = str_replace("=", "='", $querystring);
        $querystring = str_replace(">", ">'", $querystring);
        $querystring = str_replace("<", "<'", $querystring);
        $querystring = str_replace("|", "' OR ", $querystring);
        $stmt = "SELECT * FROM table_eoi WHERE ".$querystring."';";
        $stmt = str_replace("''", "'", $stmt);
        return $stmt;
        
    }
    // SqlConnection object
    // Facilitates easier usage of MySql across site
    class SqlConnection{
        const sql_user = "root";
        const sql_password = "";
        const sql_host = "localhost:3306";
        const sql_db = "main";
        
        // const sql_user = "s101091995";
        // const sql_password = "Elth@m13";
        // const sql_host = "mysql.ict.swin.edu.au";
        // const sql_db = "s101091995_db"; 
        function __construct(){
            $this->conn = new mysqli(self::sql_host,self::sql_user,self::sql_password); // initializer for databas
            mysqli_select_db($this->conn, self::sql_db);
        }
        function __destruct(){
            @$this->conn->close(); // After we're done with it, close the Database
        }
        public function init()
        {
            $sql = 'CREATE TABLE IF NOT EXISTS table_eoi('.
            'EOINumber int KEY AUTO_INCREMENT,'.
            'EOIStatus int DEFAULT 0,'. // 0 = new, 1 = current, 2 = final
            'FirstName varchar(20) NOT NULL,'.
            'LastName varchar(30) NOT NULL,'.
            'Gender varchar(10) NOT NULL,'.
            'AddressUnit varchar(20),'.
            'AddressStreetNumber varchar(20),'.
            'AddressStreet varchar(20) NOT NULL,'.
            'AddressSuburb varchar(20) NOT NULL,'.
            'AddressState varchar(20) NOT NULL,'.
            'AddressPostCode varchar(4) NOT NULL,'.
            'Email varchar(40) NOT NULL,'.
            'Phone varchar(15) NOT NULL,'.
            'JobID varchar(6) NOT NULL,'.
            'Skills text,'.
            'Details text);';
            $query = $this->conn->query($sql);
        }
        public function addEOI($postData){
            var_dump($postData);
            $stmt = $this->conn->prepare("INSERT INTO table_eoi (EOIStatus, FirstName,".
            " LastName, Gender, AddressUnit, AddressStreetNumber, AddressStreet, AddressSuburb, AddressState, AddressPostCode, Email, Phone, JobID, Skills, Details)".
            " VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $skilldata = prepData("skills", $postData);
            $unitplaceholder = prepData("unitnumber", $postData);
            $detailsdata = prepData("details", $postData);
            $genderdata = prepData("gender", $postData);
            mysqli_stmt_bind_param($stmt, 'ssssssssssssss' , 
            $postData["firstname"], 
            $postData["surname"],
            $genderdata,
            $unitplaceholder,
            $postData["streetnumber"], 
            $postData["streetname"], 
            $postData["suburbname"], 
            $postData["statename"], 
            $postData["postcode"],
            $postData["email"], 
            $postData["phone"], 
            $postData["job-select"],
            $skilldata, 
            $detailsdata);
            if ($stmt->execute()){
                echo "<h3>Your submission has been sent to our Human Resources Department for consideration.</h3>";
                $this->retrieveEOINumber($postData["surname"]);
            }
            else{
                echo "<h3>Server error, please contact us for help</h3>";
                echo $stmt->error;
            }
            $stmt->close();
            $this->conn->close();
        }
        // Retrieves the most recent EOI for a person depending on their surnamez
        public function retrieveEOINumber($lastName){
            $stmt = sprintf("SELECT EOINumber FROM table_eoi WHERE LastName = '%s' ORDER BY EOINumber DESC LIMIT 1;", $lastName);
            if ($res = $this->conn->query($stmt)){ 
                $array = $res->fetch_assoc();
                echo "<p>Your Expression Of Interest Reference Number is ".$array["EOINumber"]."</p>";
            }
            else {
                errorMessage("Failed to retrieve EOI Number");    
            }
        }
        // Used to easierly pull HR Related queries
        public function hrQuery($type){
            $valid = true;
            switch ($type) {
                case 'pull':
                    // Defaults to select all                    
                    $stmt = "SELECT * FROM table_eoi;";
                    // Where a job has been specified
                    if (isset($_GET["byJob"])){
                        $stmt = "SELECT * FROM table_eoi WHERE JobID = \"".$_GET["byJob"]."\";";
                    }
                    // Where a search has been submitted
                    else if (isset($_GET["byName"])){
                        $stmt = "SELECT * FROM table_eoi WHERE (Firstname LIKE '".$_POST["byName"]."%' OR LastName LIKE '".$_POST["byName"]."%');";
                    }
                    else if (isset($_GET["byQuery"])){
                        $stmt = ParseQuery($_POST["query"]);
                    }    
                    if ($res = $this->conn->query($stmt)){
                        echo "<table><tr><th>EOI</th><th>Status</th><th>Name</th><th>Location</th><th>Email</th><th>Phone</th><th>Job Interest</th><th class='center'>Details</th></tr>";
                        while ($row = $res->fetch_assoc())
                            echo "<tr class='hr-row'><td>".$row["EOINumber"]."</td><td>".ReturnStatus($row["EOIStatus"])."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>"
                            . $row["AddressSuburb"]. ', '. $row["AddressState"] .' '. $row["AddressPostCode"]."</td><td>".
                            $row["Email"]."</td><td>".$row["Phone"]."</td><td>".$row["JobID"]."</td><td><a href=\"hrdetails.php?eoi=".$row["EOINumber"]."\">...</a>" 
                            ."</td></tr>";
                        echo "</table>";
                        echo "<div class='content-centered center'><h3>Options</h3><hr/>";
                        if (isset($_GET["byJob"])){
                            echo "<a href='hrdelete.php?jobID=".$_GET["byJob"]."'>Delete All Records For This Job</a>";
                            echo '<form method="POST" action="hrportal.php?updateStatusJob='.$_GET["byJob"].'">'.
                            '<label for="status-new">Update EOI Status for Job </label><select name="status-new" id="status-new">
                            <option value="">Choose Status</option>
                            <option value="0">New</option>
                            <option value="1">Current</option>
                            <option value="2">Final</option>
                            </select> 
                            <input type="submit" value="Update"/>'.
                            '</form>';
                        }
                        echo '<form action="hrportal.php?byQuery=true" method="POST">'.
                            '<label for="query" >Custom Query <a href="enhancements3.html">﹖</a> </label>'.
                            '<input type="text" autocomplete="off" id="query" name="query"/>'.
                        '</form>';
                        echo "</div>";
                    }
                    else {
                        $valid = false;
                    }
                    break;
                // hredit.php?eoi=[THE EOI]
                case 'eoi-details':
                    $eoi = $_GET["eoi"];
                    $stmt = sprintf("SELECT * FROM table_eoi WHERE EOINumber = %d;", $eoi);
                    if ($res = $this->conn->query($stmt)){
                        $row = $res->fetch_assoc();
                        echo "<h1>EOI #".$row['EOINumber'].": ".$row['FirstName']." ".$row['LastName']."</h1>";
                        echo "<hr/>";
                        echo "<p>Interested In : <u><a href=\"job-description.php?jobid=".$row["JobID"]."\">".$row["JobID"]."</a></u></p>";
                        echo "<p>Submission Status : ".ReturnStatus($row["EOIStatus"])."</p>";
                        echo "<p>Gender : ".ucfirst($row["Gender"])."</p>";
                        echo "<p>Address : ";
                        if ($row["AddressUnit"] != ""){
                            echo $row["AddressUnit"]."/";
                        }
                        echo $row["AddressStreetNumber"]." ".$row["AddressStreet"].", ".$row["AddressSuburb"].", ".$row["AddressState"]." ".$row["AddressPostCode"]."</p>";
                        echo "<p>Email : ".$row["Email"]."</p>";
                        echo "<p>Phone : ".$row["Phone"]."</p>";
                        echo "<p>Skills : <br/><ol>";
                        $skills = explode("|",$row['Skills']);
                        foreach ($skills as $key => $value) {
                            if ($value != "")
                                echo "<li>".ucfirst($value)."</li>";
                        }
                        echo "</ol>";
                        if ($row["Details"] != "")
                            echo "<p>Details/Other Skills : </p><blockquote>".$row['Details']."</blockquote>";
                    }
                    break;
                // Remove Job Applications From Certain ID
                case 'job-clear':
                    $stmt = sprintf("DELETE FROM table_eoi WHERE JobID = '%s';", $_GET["jobID"]);
                    $res = $this->conn->query($stmt);
                break;
                // Update EOI Status
                case "update-status":
                if ($_POST["status-new"] != ""){
                    if (isset($_GET["updateStatusJob"])){
                        $stmt = "UPDATE table_eoi SET EOIStatus=".$_POST["status-new"]." WHERE JobID = '".$_GET["updateStatusJob"]."';";
                    }
                    else{
                        $stmt = "UPDATE table_eoi SET EOIStatus=".$_POST["status-new"]." WHERE EOINumber = '".$_GET["eoi"]."';";
                    }
                    if (!$this->conn->query($stmt)){
                        errorMessage("<h1>Server Error, Contact IT</h1>");
                        echo mysqli_error($this->conn);
                    }
                }
                    break;
                default:
                    # code...
                    break;
            }
            if (!$valid)
                errorMessage("Unexpected Error. Contact Support");
        }
    }
    function clearJob(){
        if (isset($_GET["jobID"])){
            $sql = new SqlConnection();
            $sql->hrQuery('job-clear');
        }
    }
    function RenderHRPage($type){
        $sql = new SqlConnection();
        $sql->init();
        $sql->hrQuery($type);
    }
    function UpdateStatus(){
        $sql = new SqlConnection();
        $sql->init();
        $sql->hrQuery("update-status");
    }
    function RenderJobPage(){
        $id = $_GET["jobid"];
        $mainbody = '';
        switch ($id) {
            case 'DB0001':
                $mainbody = '<aside class="jobs-link jobs-float">
                    <div class="jobs-icon icon1"></div>
                    <h2>Database Administrator</h2>
                    <ul>
                        <li>Works with all forms of database technologies</li>
                        <li>Engaging work and challenging workload</li>
                        <li>Exciting income opportunities</li>
                    </ul>
            </aside>
            <div class="details-float">
                <h2>A Job For Tomorrow, TODAY!</h2>
                <em id="job-code">DB0001</em>
                <p>The world revolves around data and it\'s thanks to rag tag <br/>
                Database Administrators to curate the streams of the internet. <br/>
                As a database administrator you\'d be expected to work within a team of 
                other database administrators; this team a cohesive and well rounded group
                of IT professionals. <br/> Working with languages such as SQL and database query technologies
                like LINQ, our clients would need to know that you take your work very seriously and
                meet deadlines with the finest of products. <br/> Salary for this job ranges between $60,000 and $70,000
                dollars a year but greater, more delicious, opportunities are available. <br/>
                Required skills include : 
                </p>
                <ul>
                    <li>A deep unuderstanding of SQL and MySql technologies</li>
                    <li>Basic understand of web technologies like HTML, CSS and Javascript</li>
                    <li>Formal clothing</li>
                    <li>A love for computing</li>
                    <li>A cheeky smile</li>
                </ul>
                <a id="apply-db0001" href="apply.php" class="apply-link">Interested? Apply now</a>
            </div>';
                break;
            case 'DB0002':
                $mainbody = '<aside class="jobs-link jobs-float">
                    <div class="jobs-icon icon2"></div>
                    <h2>Database Systems Administrator</h2>
                    <ul>
                        <li>Works with all forms of database systems</li>
                        <li>Engaging work and challenging systems</li>
                        <li>Systematic income opportunities</li>
                    </ul>
            </aside>
            <div class="details-float">
                <h2>A Job For Tomorrow With Systems, TODAY WITH SYSTEMS!</h2>
                <em id="job-code">DB0002</em>
                <p>The world revolves around data and their systems and it\'s thanks to rag tag
                Database Systems Administrators to curate the streams of the internet and their systems. <br/>
                As a database systems administrator you\'d be expected to work within a team of 
                other database systems administrators; this team a cohesive and well rounded group
                of IT professionals who know about systems. <br/> Working with languages such as SQL and database query technologies
                like LINQ, (including their relative systems) our clients would need to know that you take your work very seriously and
                meet deadlines with the finest of products including their systems. <br/> Salary for this job ranges between $60,000 and $70,000
                dollars a year but greater, more delicious and systematic, opportunities are available. <br/>
                Required skills include :
                </p> 
                <ul>
                    <li>A deep unuderstanding of SQL and MySql technologies and their systems</li>
                    <li>Basic understand of web technologies like HTML, CSS and Javascript systems</li>
                    <li>Systems</li>
                    <li>A love for computing systems</li>
                    <li>A cheeky system</li>
                </ul>
                <a href="apply.php" class="apply-link">Interested? Apply now</a>';
            break;
            case 'DB0003':
                $mainbody = '<aside class="jobs-link jobs-float">
                    <div class="jobs-icon icon3"></div>
                    <h2>NoSql Database Systems Administrator</h2>
                    <ul>
                        <li>Utilise new and emerging database technologies</li>
                        <li>Develop unique and scalable solutions</li>
                        <li>Discover the financial prospects of a relatively new market</li>
                    </ul>
            </aside>
            <div class="details-float">
                <h2>Tables? No, that\'s not the future</h2>
                <em id="job-code">DB0003</em>
                <p>The world revolves around data that\'s not in tables and it\'s thanks to rag tag <br/>
                NoSql Database Administrators to curate the streams of the internet. <br/>
                As a NoSQL database administrator you\'d be expected to work within a team of 
                other NoSQL database administrators; this team a cohesive and well rounded group
                of IT professionals. <br/> Working with languages such as Javascript and database query technologies
                like MongoDB, our clients would need to know that you take your work very seriously and
                meet deadlines with the finest of products. <br/> Salary for this job ranges between $50,000 and $60,000
                dollars a year but greater, more delicious, opportunities are available. <br/>
                Required skills include : 
                </p>
                <ul>
                    <li>A deep understanding of NodeJS and MongoDB technologies</li>
                    <li>Basic understand of web technologies like HTML, CSS and Javascript</li>
                    <li>Formal clothing</li>
                    <li>A love for computing and hatred for tables</li>
                    <li>A cheeky smile</li>
                </ul>
                <a href="apply.php" class="apply-link">Interested? Apply now</a>
            </div>';
            break;
            default:
                $mainbody = "There's nothing here cowboy.";
                break;
        }
        echo $mainbody;
    }
    // Validation for each individual field, returns true if valid, returns false if invalid
    function ValidateField($key, $value){
        $valid = true;
        if (isset($value) && $value != "" && $value != NULL && $value != "Submit"){
            switch ($key) {
                case 'firstname':
                    if (strlen($value) > 25 || (!preg_match("/^[a-zA-Z]*$/", $value)))
                        $valid = false;
                    break;
                case 'surname':
                    if (strlen($value) > 25 || (!preg_match("/^[a-zA-Z \-]*$/", $value)))
                        $valid = false;
                    break;
                case 'dateofbirth':
                    $date = date_parse($value);
                    $currentdate = getdate();
                    $dateyear = $date['year'];
                    $currentdateyear = $currentdate['year'];
                    if ($currentdateyear - 80 >= $dateyear || $currentdateyear - 15 <= $dateyear) // dd/mm/yyyy validation
                        $valid = false;
                    break;
                case 'streetname':
                case 'suburbname':
                    if (strlen($value) > 40){
                        $valid = false;
                    }
                    break;
                case 'statename':
                    $states = array ('VIC', 'ACT', 'NSW', 'QLD', 'SA', 'WA', 'TAS', 'NT');
                    $checks = false;
                    foreach ($states as $statekey => $statevalue) {
                        if ($statevalue == $value)
                            $checks = true;
                    }
                    $valid = $checks;
                    break;
                case 'postcode':
                    $statename = $_POST['statename'];
                    $postcodepairs = array('3' => 'VIC', '8' => 'VIC','1' => 'NSW','2' => 'NSW','4' => 'QLD',
                    '9' => 'QLD','0' => 'NT/ACT','6'=>'WA', '5' => 'SA','7' => 'TAS');
                    $postsplit = str_split($value);
                    if ($postcodepairs[$postsplit[0]] && strlen($value) == 4){ // Checks if element is a valid state
                        if (strpos($postcodepairs[$postsplit[0]], $statename) === FALSE)
                            $valid = false;
                    }
                    else {
                        $valid = false;
                    }
                    break;
                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL))
                        $valid = false;
                    break;
                case 'phone':
                    if (!preg_match("/^\d{4}[\ ]\d{3}[\ ]\d{3}|\d{10}$/", $value) || strlen($value) > 12 || strlen($value) < 8) // Why's this still getting through?
                        $valid = false;
                    break;
                case 'job-select':
                    if (strlen($value) != 6)
                        $valid = false;
                    break;
                case 'skill-other':
                    if (!isset($_POST["details"]) || $_POST["details"] == "")
                        $valid = false;
                    break;
                case 'details' :
                    if ($value == "" || $value == NULL){
                        $valid = false;
                    }
                    break;
                default:
                    break;
            }
        }
        else {
            switch ($key) {
                case 'firstname':
                case 'surname':
                case 'dateofbirth':
                case 'streetname':
                case 'suburbname':
                case 'statename':
                case 'email':
                case 'postcode':
                case 'streetnumber':
                    $valid = false;
                    break;
                case 'gender':
                    $value = "other";
                    break;
                
                default:
                    break;
            }
        }
        return $valid;
    }
    // Handles validation and submission logic
    function SubmitJobApplication(){
        $formvalid = true;
        foreach ($_POST as $key => $value) {
            if (ValidateField($key, $value) == false){
                $formvalid = false;
                echo "<p>".$key." is invalid.</p>";
            }
        }
        if ($formvalid){
            $sqlconn = new SqlConnection();
            $sqlconn->init();
            $sqlconn->addEOI($_POST);
            echo "<div id='success-message'><h2>Please Note EOI Number</h2></div>";
        }
        else {
            errorMessage("Job Submission Failed, Check Fields");
        }
    }
    // Error helper
    function errorMessage($content){
        echo "<div class='error-message'><h2>".$content."</h2></class>";
    }
    
?>