/**
* notify.js 
* Author: Alex Billson 101091995
* Purpose: Easy toast notifications
* Created: 27/4/2016
* Last Updated: 15/5/2016
* Credits: Myself
*/
// Message can include html tags

function showNotification(message:string, color){
var jobcode = document.getElementById("job-code");
   var notificationtag = document.createElement("div");
   notificationtag.innerHTML = message + "Click me to abolish";
   notificationtag.className = "notificationtag"
   notificationtag.style.background = color;
   notificationtag.addEventListener("click", function(){
       notificationtag.style.display = "none";
   })
   document.body.appendChild(notificationtag);
}
function showNotificationList(message:string, color, topmultiplier:number){
        var jobcode = document.getElementById("job-code");
        var notificationtag = document.createElement("div");
        notificationtag.innerHTML = message + "Click me to abolish";
        notificationtag.className = "notificationtag"
        notificationtag.style.background = color;
        var top = (topmultiplier * 80) + 60;
        notificationtag.style.top = top + "px";
        notificationtag.addEventListener("click", function(){
            notificationtag.style.display = "none";
        })
        document.body.appendChild(notificationtag);
}
// function scanPage() {
//     let errorCall = document.getElementById("error-message");
//     errorCall.innerHTML = "taken";
// }
// scanPage();