// Disparition des messages flash
setTimeout(function() {
    let div = document.getElementsByClassName('flash-messages');
    if (div && div[0]) {
        div[0].style.display='none';
    }
}, 4000)