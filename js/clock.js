function displayClock() {
    var time = new Date();
    var type = "AM";
    var message = "Good morning!"
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    

    if (hours == 0) {
        hours = 12;
    }else if (hours > 12) {
        hours = hours - 12;
        type = "PM";
        message = "Good afternoon!";
    }
    
    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes
    }

    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    var myClock = document.getElementById('clock');
    var myMessage = document.getElementById('message');
    myClock.textContent = hours + ":" + minutes + ":" + seconds + "       " + type;
    myMessage.textContent = message;
    
    setTimeout('displayClock()', 1000);
}
displayClock();
