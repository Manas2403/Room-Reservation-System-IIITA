let events = [];
function loadCalendar() {
    var calendarEl = document.getElementById("calendar");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: "IST",
        initialView: "timeGridWeek",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "timeGridWeek,timeGridDay",
        },
        events: events,
    });

    calendar.render();
}
function sendHttpReq() {
    //send ajax httprequests to interact with the database
    /*
     * arg 0 = id of element to show results
     * arg 1 = array of parameters to the php script
     * arg 2 = name of the php script
     */

    var script = arguments[0];

    var xhr;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft,XMLHTTP");
    }
    var data = "";
    xhr.open("POST", script, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let bookings = JSON.parse(xhr.responseText);
                if (bookings.length > 0) {
                    bookings.map((e) => {
                        events.push({
                            title: e.description + " by " + e.userid,
                            start: moment(
                                e.date + e.starttime,
                                "YYYY.MM.DD H:mm:ss"
                            )
                                .tz("Asia/Kolkata")

                                .toISOString(),
                            end: moment(
                                e.date + e.endtime,
                                "YYYY.MM.DD H:mm:ss"
                            )
                                .tz("Asia/Kolkata")

                                .toISOString(),
                        });
                    });
                }
                loadCalendar();
            }
        }
    }
}

sendHttpReq("./controller/getAllBookings.php");
