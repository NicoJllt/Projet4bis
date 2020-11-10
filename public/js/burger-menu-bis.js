function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
        document.getElementById('myTopnav').classList.add('animation');
    } else {
        x.className = "topnav";
    }
}