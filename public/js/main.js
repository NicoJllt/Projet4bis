
var flashMessageClass = document.getElementsByClassName('flash-message-home');

function timeOutMessageFlash() {
    setTimeout(function () {
        flashMessageClass.style.display = 'none';
    }, 5000);
}

timeOutMessageFlash();