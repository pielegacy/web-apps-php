<!DOCTYPE html>
<html>
    <head>
        <title>Database Administrator Company Pty. Ltd.</title>
        <link rel="stylesheet" href="styles/main.css" />
        <meta charset="UTF-8" />
        <meta name="description" content="Database Administrator Company Pty. Ltd About Page" />
        <meta name="keywords" content="db,pty,ltd,about" />
        <meta name="author" content="Alex Billson" />
    <?php require "main.php" ?>
    </head>
    <body>
        <?php RenderHeader(); ?>
        <div id="index-main-min" class="about-me">
            <div class="left-float">
                <h1 class="about-title">Alex Billson</h1>
                <p class="stud-number">Computer Science (Professional)</p>
                <p class="stud-number">101091995</p>
                <span class="stud-number">Enjoys :</span>
                <ul class="stud-number">
                    <li>Long walks on the beach</li>
                    <li>Marvelling at God's creations</li>
                    <li>Making up for lost time</li>
                </ul>
            </div>
            <aside class="right-float">
                <img class="img-admin" src="images/adminphoto.jpg" alt="A sexy man">
            </aside>
            <div class="clear-float"></div>
            <div class="left-float">Tutor : Ms Vicki Caravias</div>
            <div class="right-float">Tutorial : Wednesdays at 11:30</div>
            <br/>
            <div class="center units">
                <p>Unit Legend</p>
                <span class="td-introtoprog">Intro To Programming</span>
                <span class="td-webapps">Creating Web Apps</span>
                <span class="td-logic">Logic Essentials</span>
                <span class="td-bizlaw">Intro To Business Law</span>
            </div>
            <table class="clear-float timetable">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>My Timetable</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <!--tr*12>td.td-time+td+td+td+td+td-->
                <tr>
                    <td class="td-time">8:00am</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">8:30am</td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog">COS10009</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">9:00am</td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog">Lab 1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">9:30am</td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">10:00am</td>
                    <td class="td-introtoprog">COS10009</td>
                    <td class="td-bizlaw">LAW10004</td>
                    <td class="td-introtoprog"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">10:30am</td>
                    <td class="td-introtoprog">Lecture 1</td>
                    <td class="td-bizlaw">Tutorial 1</td>
                    <td class="td-webapps">COS10011</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">11:00am</td>
                    <td class="td-introtoprog"></td>
                    <td class="td-bizlaw"></td>
                    <td class="td-webapps">Lab 1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">11:30am</td>
                    <td class="td-introtoprog"></td>
                    <td></td>
                    <td class="td-webapps"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">12:00pm</td>
                    <td class="td-introtoprog"></td>
                    <td></td>
                    <td class="td-webapps"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">12:30pm</td>
                    <td></td>
                    <td></td>
                    <td class="td-logic">COS10003</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">1:00pm</td>
                    <td></td>
                    <td></td>
                    <td class="td-logic">Lecture 1</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">1:30pm</td>
                    <td></td>
                    <td></td>
                    <td class="td-logic"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">2:00pm</td>
                    <td></td>
                    <td></td>
                    <td class="td-logic"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">2:30pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog">COS10009</td>
                </tr>
                <tr>
                    <td class="td-time">3:00pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog">Workshop 1</td>
                </tr>
                <tr>
                    <td class="td-time">3:30pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog"></td>
                </tr>
                <tr>
                    <td class="td-time">4:00pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-introtoprog"></td>
                </tr>
                <tr>
                    <td class="td-time">4:30pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">5:00pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="td-time">5:30pm</td>
                    <td class="td-webapps">COS10011</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-logic">COS10003</td>
                </tr>
                <tr>
                    <td class="td-time">6:00pm</td>
                    <td class="td-webapps">Lecture 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-logic">Tutorial 1</td>
                </tr>
                <tr>
                    <td class="td-time">6:30pm</td>
                    <td class="td-webapps"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-logic"></td>
                </tr>
                <tr>
                    <td class="td-time">7:00pm</td>
                    <td class="td-webapps"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-logic"></td>
                </tr>
                <tr>
                    <td class="td-time">7:30pm</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="clear-float center">
                <p>Want to chat? Email me at <a href="mailto:101091995@student.swin.edu.au">101091995@student.swin.edu.au</a></p>
            </div>
            <br/>
        </div>
        <?php RenderFooter(); ?>
    </body>
</html>