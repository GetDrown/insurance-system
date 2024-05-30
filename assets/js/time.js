function updateTime() {
    var currentDate = new Date();
    var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };
    document.getElementById("currentDate").innerHTML =
        currentDate.toLocaleDateString("en-US", options);
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();
    var ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var currentTime = hours + ":" + minutes + " " + ampm;
    document.getElementById("currentTime").innerHTML = currentTime;
}
setInterval(updateTime, 1000);
updateTime();
