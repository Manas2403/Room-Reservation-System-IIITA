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
loadTimeSlots(8, 22, "fromT", "toT");
