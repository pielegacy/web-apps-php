<?php
    /**
    * Author: Alex Billson 101091995
    * Purpose: Provide the main PHP functionality for the site
    * Created: 10/5/2016
    * Last Updated: 11/5/2016
    * Credits: Myself
    */
    // Used to render minimal-header, CSS applied in page
    function RenderHeader()
    {
    //    TESTING CODE  
    //    $sqlmanager = new SqlConnection();
    //    $sqlmanager->init();
        echo '
        <header class="header-image-min">
            <br />
            <h1><a href="index.php">Database Administrator Company Pty. Ltd</a></h1>
        </header>
        <nav>
            <ul>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a class="current" href="apply.php">Apply</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>';
    }
    // Similar to render header, but for the footer 
    function RenderFooter(){
        echo '
        <footer>
            &copy; 2016, Alex Billson - Interested in the site\'s enhancements? <a href="enhancements.html">Click here</a>
        </footer>
        ';
    }
    // SqlConnection object
    // Facilitates easier usage of MySql across site
    class SqlConnection{
        const sql_user = "root";
        const sql_password = "";
        const sql_host = "localhost:3306";
        function __construct(){
            $this->conn = new mysqli(self::sql_host,self::sql_user,self::sql_password); // initializer for databas
            mysqli_select_db($this->conn,"main");
        }
        public function init()
        {
            $sql = 'CREATE TABLE IF NOT EXISTS table_eoi('.
            'EOINumber int KEY AUTO_INCREMENT,'.
            'FirstName varchar(20) NOT NULL,'.
            'LastName varchar(30) NOT NULL,'.
            'AddressUnit varchar(20),'.
            'AddressStreet varchar(20) NOT NULL,'.
            'AddressSuburb varchar(20) NOT NULL,'.
            'AddressState varchar(20) NOT NULL,'.
            'AddressPostCode varchar(4) NOT NULL,'.
            'Email varchar(40) NOT NULL,'.
            'Phone varchar(15) NOT NULL,'.
            'Skills text,'.
            'Details text);';
            mysqli_select_db($this->conn,"main");
            $query = mysqli_query($this->conn, $sql);
        }
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
                    <li>A deep unuderstanding of NodeJS and MongoDB technologies</li>
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
        function ValidateJobApplication(){
            
        }
        echo $mainbody;
    }
?>