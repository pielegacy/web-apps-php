/**
* Author: Alex Billson 101091995
* Purpose: Link to job description pages
* Created: 27/4/2016
* Last Updated: 27/4/2016
* Credits: Myself
*/
function setJobInterest(){
    //alert(document.getElementById("job-code").innerHTML);
    window.localStorage.setItem("jobinterest", document.getElementById("job-code").innerHTML);
}

function init(){
    var jobcode = document.getElementById("job-code");
    showNotification("<h2>" + jobcode.innerHTML + " set as current interest</h2>", "#5fba7d");
    setJobInterest();
}
window.onload = init;
