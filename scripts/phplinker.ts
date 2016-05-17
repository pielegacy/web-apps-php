/**
* phplinker.js 
* Author: Alex Billson 101091995
* Purpose: Allow toast notifications to work with PHP
* Created: 15/5/2016
* Last Updated: 15/5/2016
* Credits: Myself
*/
function scanForError() {
    let errorCalls = document.getElementsByClassName("error-message");
    if (errorCalls.length != 0){
        for (var key in errorCalls) {
            if (errorCalls.hasOwnProperty(key)) {
                var element = errorCalls[key];
                showNotificationList(element.innerHTML, "red", key);
                element.style.display = "none";
            }
        }
    }
    else {
        let successCall = document.getElementById("success-message");
        showNotification(successCall.innerHTML, "#5fba7d");
        successCall.style.display = "none";
    }
}
function filterByName(){
    alert("Yes");
}
window.onload = scanForError;
if (document.getElementById("name-search")){
    var search = document.getElementById("name-search");
    search.onkeypress = filterByName;
}
