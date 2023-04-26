function loadTimeSlots() {
    let start = arguments[0];
    let end = arguments[1];
    for (let i = start; i < end; i++) {
        let timeStr = i + ":00";
        let str = "<option value='" + timeStr + ":00'>" + timeStr + "</option>";
        document.getElementById(arguments[2]).innerHTML += str;
    }
    loadEndTimeSlot(end, arguments[2], arguments[3]);
}
function loadEndTimeSlot() {
    let limit = document.getElementById(arguments[1]).value;
    limit = parseInt(limit.slice(0, limit.indexOf(":"))) + 1;

    document.getElementById(arguments[2]).innerHTML = "";
    let end = arguments[0];

    for (let i = limit; i <= end; i++) {
        let timeStr = i + ":00";
        let str = "<option value='" + timeStr + ":00'>" + timeStr + "</option>";

        document.getElementById(arguments[2]).innerHTML += str;
    }
}
loadTimeSlots(8, 19, "fromT", "toT");

let loc = document.querySelector("#location");
let date = document.querySelector("#selectDate");
let startTime = document.querySelector("#fromT");
let endTime = document.querySelector("#toT");
let selectedRoom = document.querySelector("#room");
let selectedCourse = document.querySelector("#course");
let description = document.querySelector("#description");
let input_heading = document.querySelectorAll(".input_heading");
let btn = document.querySelector("#submit_btn");
date.style.display = "none";
startTime.style.display = "none";
endTime.style.display = "none";
selectedRoom.style.display = "none";
selectedCourse.style.display = "none";
description.style.display = "none";
for (let i = 0; i < input_heading.length; i++) {
    input_heading[i].style.display = "none";
}
loc.addEventListener("change", () => {
    date.style.display = "block";
});
date.addEventListener("change", () => {
    input_heading[0].style.display = "block";
    input_heading[1].style.display = "block";
    input_heading[2].style.display = "block";
    startTime.style.display = "block";
    endTime.style.display = "block";
    selectedRoom.style.display = "block";
    selectedCourse.style.display = "block";
    description.style.display = "block";
    var params = [
        "isAvailable",
        loc.value,
        date.value,
        startTime.value,
        endTime.value,
    ];
    sendHttpReq("room", params, "./controller/checkRooms.php");
});
startTime.addEventListener("change", () => {
    loadEndTimeSlot(19, "fromT", "toT");
    var params = [
        "isAvailable",
        loc.value,
        date.value,
        startTime.value,
        endTime.value,
    ];
    sendHttpReq("room", params, "./controller/checkRooms.php");
});
endTime.addEventListener("change", () => {
    var params = [
        "isAvailable",
        loc.value,
        date.value,
        startTime.value,
        endTime.value,
    ];
    sendHttpReq("room", params, "./controller/checkRooms.php");
});
selectedRoom.addEventListener("change", () => {});
function sendHttpReq() {
    //send ajax httprequests to interact with the database
    /*
     * arg 0 = id of element to show results
     * arg 1 = array of parameters to the php script
     * arg 2 = name of the php script
     */
    var elementId = arguments[0];
    var params = arguments[1];
    var script = arguments[2];

    var xhr;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft,XMLHTTP");
    }

    var data = "param_1=" + params[0];
    for (var i = 1; i < params.length; i++) {
        data += "&param_" + (i + 1) + "=" + params[i];
    }

    xhr.open("POST", script, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log(xhr);
                console.log(JSON.parse(xhr.responseText));
                let rooms = JSON.parse(xhr.responseText);
                rooms.forEach((e) => {
                    document
                        .querySelector("#room")
                        .options.add(new Option(e.roomname, e.roomname));
                });
            } else {
                document.getElementById(elementId).innerHTML =
                    "An error occured: Error code " + xhr.status;
            }
        } else {
            document.getElementById(elementId).innerHTML =
                "An error occured: Error code " + xhr.readyState;
        }
    }
}
