/**
* Author: Alex Billson 101091995
* Purpose: Backend JS for enhancements2 page
* Created: 27/4/2016
* Last Updated: 27/4/2016
* Credits: Myself
*/
function init(){
    var testnotify = document.getElementById("testnotify");
    testnotify.addEventListener("click", function(){
        showNotification("<h2>It works!</h2>", "#5fba7d");
    });
}
window.onload = init;