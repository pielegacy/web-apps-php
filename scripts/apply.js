/**
* Author: Alex Billson 101091995
* Purpose: Apply page JS
* Created: 27/4/2016
* Last Updated: 27/4/2016
* Credits: Myself
*/
function init(){
    loadDetails();
    var jobcode = localStorage.jobinterest;
    var jobdropdown = document.getElementById("job-select");
    if (jobcode || jobcode == ""){
        jobdropdown.value = jobcode;
        document.getElementById("choiceDefault").setAttribute("disabled","disabled");
        if (jobcode != "DB0001")
            document.getElementById("choiceDB0001").setAttribute("disabled","disabled");
        if (jobcode != "DB0002")
            document.getElementById("choiceDB0002").setAttribute("disabled","disabled");
        if (jobcode != "DB0003")
            document.getElementById("choiceDB0003").setAttribute("disabled","disabled");
    }
    else {
        console.log("Unassigned Jobcode");
    }
    jobdropdown.addEventListener("click",editJob);
    window.onsubmit = submitForm;
}
function editJob(){
    //window.location = "jobs.html";
}
function loadDetails() {
    if (sessionStorage.firstname != null){
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("surname").value = sessionStorage.surname;
        document.getElementById("dateofbirth").value = sessionStorage.dateofbirth;
        if (sessionStorage.gender =="male"){document.getElementById("male").checked = true;}
        else if (sessionStorage.gender = "female"){document.getElementById("female").checked = true;}
        else {document.getElementById("other").checked = true;}
           
        document.getElementById("phone").value = sessionStorage.phone;
        document.getElementById("email").value = sessionStorage.email;
        document.getElementById("unitnumber").value = sessionStorage.unitnumber;
        document.getElementById("streetnumber").value = sessionStorage.streetnumber;
        document.getElementById("streetname").value = sessionStorage.streetname;
        document.getElementById("suburbname" ).value = sessionStorage.suburbname;
        document.getElementById("statename").value = sessionStorage.state;
        document.getElementById("postcode").value = sessionStorage.postcode;    
    }  
}
// Saves all details in sessionStorage
function saveDetails(){
    sessionStorage.firstname = document.getElementById("firstname").value;
    sessionStorage.surname = document.getElementById("surname").value;
    sessionStorage.dateofbirth = document.getElementById("dateofbirth").value;
    if (document.getElementById("male").checked){sessionStorage.gender = "male";}
    else if (document.getElementById("female").checked){sessionStorage.gender = "female";}
    else{ sessionStorage.gender = "other";}
    sessionStorage.phone = document.getElementById("phone").value;
    sessionStorage.email = document.getElementById("email").value;
    sessionStorage.unitnumber = document.getElementById("unitnumber").value;
    sessionStorage.streetnumber = document.getElementById("streetnumber").value;
    sessionStorage.streetname = document.getElementById("streetname").value;
    sessionStorage.suburbname = document.getElementById("suburbname").value;
    sessionStorage.state = document.getElementById("statename").value;
    sessionStorage.postcode = document.getElementById("postcode").value;
}
function validateDate() {
    var dateinput = document.getElementById("dateofbirth").value;
    var datearray = dateinput.split("/");
    var date = new Date();
    var nowdate = new Date();
    date.setDate(parseInt(datearray[0]));
    date.setMonth(parseInt(datearray[1])-1);
    date.setFullYear(parseInt(datearray[2]));
    if (date.getFullYear() < nowdate.getFullYear() - 15 && date.getFullYear() > nowdate.getFullYear() - 80){
        return true;
    }
    else {
        errorHighlightField("dateofbirth");
        return false;
    }
}
function validatePostCode(){
    var postinput = document.getElementById("postcode").value;
    var stateinput = document.getElementById("statename").value;
    var postsplit = postinput.split("");
    var result = false;
// Matches the first char to a case 
    switch (postsplit[0]) {
        case "3":
        case "8":
            if (stateinput == "VIC")
                result = true;
        break;
        case "1":
        case "2":
            if (stateinput == "NSW")
                result = true;
        break;
        case "4":
        case "9":
            if (stateinput == "QLD")
                result = true;
        break;
        case "0":
            if (stateinput == "NT" || stateinput =="ACT")
                result = true;
        break;
        case "6":
            if (stateinput == "WA")
                result = true;
        break;
        case "5":
            if (stateinput == "SA")
                result = true;
        break;
        case "7":
            if (stateinput == "TAS")
                result = true;
        break;
        default:
            result = false;
            break;
    }
    if (result == false){
        errorHighlightField("statename");
        errorHighlightField("postcode");
    }
    return result;
}
function validateOtherSkills(){
    var skillcheck = document.getElementById("skill-other").checked;
    var otherskills = document.getElementById("details");

    if (skillcheck && otherskills.value == ""){
        otherskills.placeholder = "Please enter other skills"
        errorHighlightField("details");
        errorHighlightField("skill-other");
        return false;
    }
    else {
        return true;
    }
}
function submitForm(){
    clearLog();
    errorClearField("dateofbirth");
    errorClearField("statename");
    errorClearField("postcode");
    errorClearField("details");
    errorClearField("skill-other");
    var vDate = validateDate();
    var vPost = validatePostCode();
    var vSkills = validateOtherSkills();
    var errorcount = 0;
    if (vDate && vPost && vSkills){
        saveDetails();
        return true;
    }
    else{
        if (!vDate){
            errorcount++;
            showNotificationList("<h2>Invalid date. Must be between 15 and 80 years old</h2>", "#e80909", errorcount);
        }
        if (!vPost){
            errorcount++;
            showNotificationList("<h2>Post code doesn't match state</h2>", "#e80909", errorcount);
        }
        if (!vSkills){
            errorcount++;
            showNotificationList("<h2>Other skills selected but none specified</h2>", "#e80909", errorcount);
        }
        return false;
    }
}
function errorHighlightField(fieldid){
    document.getElementById(fieldid).style.boxShadow = "1px 1px 1px red";
}
function errorClearField(fieldid){
    document.getElementById(fieldid).style.boxShadow = "0px 0px 0px red";
}
function clearLog(){
    var erroroutput = document.getElementById("error-log");
    erroroutput.innerHTML ="";
}
window.onload = init;
