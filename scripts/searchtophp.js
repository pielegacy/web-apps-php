function init() {
    if (document.getElementById("name-search")){
        var search = document.getElementById("name-search");
        search.onkeypress = filterByName;
    }
}
function filterByName(){
    if (event.keyCode == 13 && document.getElementById('name-search').value != "")
        window.location = 'hrportal.php?byName=' + document.getElementById("name-search").value;
}
window.onload = init;