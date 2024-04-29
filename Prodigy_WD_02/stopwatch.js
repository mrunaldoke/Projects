let startTime;
let elapsedTime = 0;
let timerInterval;

function startStop() {
  if (!startTime) {
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(updateDisplay, 10);
    document.getElementById("startStop").textContent = "Stop";
  } else {
    clearInterval(timerInterval);
    startTime = null;
    document.getElementById("startStop").textContent = "Start";
  }
}

function reset() {
  clearInterval(timerInterval);
  startTime = null;
  elapsedTime = 0;
  document.getElementById("display").textContent = "00:00:00";
  document.getElementById("startStop").textContent = "Start";
  document.getElementById("laps").innerHTML = "";
}

function lap() {
  if (startTime) {
    let lapTime = Date.now() - startTime - elapsedTime;
    elapsedTime += lapTime;
    let formattedTime = formatTime(lapTime);
    let lapItem = document.createElement("li");
    lapItem.textContent = formattedTime;
    document.getElementById("laps").appendChild(lapItem);
  }
}

function updateDisplay() {
  let currentTime = Date.now();
  elapsedTime = currentTime - startTime;
  let formattedTime = formatTime(elapsedTime);
  document.getElementById("display").textContent = formattedTime;
}

function formatTime(time) {
  let hours = Math.floor(time / (1000 * 60 * 60));
  let minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((time % (1000 * 60)) / 1000);
  let milliseconds = Math.floor((time % 1000) / 10);
  return (
    (hours < 10 ? "0" : "") + hours + ":" +
    (minutes < 10 ? "0" : "") + minutes + ":" +
    (seconds < 10 ? "0" : "") + seconds + "." +
    (milliseconds < 10 ? "0" : "") + milliseconds
  );
}
