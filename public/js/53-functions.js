function showHideMobMenu() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
    var h = document.getElementById("id-header");
    if (h.className === "") {
        h.className += "responsive";
    } else {
        h.className = "";
    }
}