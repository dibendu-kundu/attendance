let today = new Date();
let month = today.getMonth() + 1;
let year = today.getFullYear();
let date = today.getDate();

if (date < 10) {
    date = "0" + date;
}
if (month < 10) {
    month = "0" + month;
}
let mindate = year + "-" + month + "-" + date;
let maxdate = year + "-" + month + "-" + date;

// let mindate = date + "-" + month + "-" + year;   
document.getElementById("onlytoday").setAttribute("min", mindate);
document.getElementById("onlytoday").setAttribute("max", maxdate);
// console.log(mindate);


let sbtn = document.querySelector(".submitbtn");
let hiden = document.querySelector(".hide");
sbtn.disabled = true;
hiden.disabled=true;


function myfunc() {
    navigator.geolocation.getCurrentPosition(successfunc, errorfunc);
    function successfunc(position) {
        let { lati, longi } = position.coords;
        let timer = document.querySelector(".timer");
        let hide = document.querySelector(".hide");

        let counter = 15;
        setInterval(function () {
            counter--;
            if (counter >= 0) {

                timer.innerHTML = `${counter}s`;

            }
            else {
                navigator.geolocation.getCurrentPosition(onSuccess, onError);

                function onSuccess(position) {
                    let { latitude, longitude } = position.coords;


                    function torad(val) {
                        ans = val * (0.017453292);
                        return ans;
                    }

                    let lat1 = 23.545262;
                    let lon1 = 87.281247;
                    let lat2 = latitude;
                    let lon2 = longitude;

                    // let lat2 = 23.552560;
                    // let lon2 = 87.287082;

                    lat1 = torad(lat1);
                    lon1 = torad(lon1);
                    lat2 = torad(lat2);
                    lon2 = torad(lon2);

                    let dlat = lat2 - lat1;
                    let dlon = lon2 - lon1;

                    let dist;
                    dist = Math.pow(Math.sin(dlat / 2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(dlon / 2), 2);
                    dist = 2 * Math.asin(Math.sqrt(dist));
                    const r = 6371;
                    dist = dist * r * 1000;

                    // distance.innerHTML = `Your current distance is ${dist} M`;
                    if (dist <= 522) {
                        hide.value = 1;
                    }
                    else {
                        hide.value = 0;
                    }
                    sbtn.disabled = false;
                    hiden.disabled= false;
                    hiden.style.backgroundColor= '#e6ffee';
                    sbtn.style.backgroundColor= '#0000FF';
                    return true;
                }
                function onError() {
                    alert("Error in fetching device's location");
                }

            }

        }, 1000);
    }
    function errorfunc() {
        alert("Error");
    }
}
