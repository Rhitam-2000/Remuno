let song = document.getElementById("song");
let progress = document.getElementById("progress");
let ctrl = document.getElementById("ctrl");

song.onloadedmetadata = function () {
  progress.max = song.duration;
  progress.value = song.currentTime;
};

function playPause() {
  let ctrl = document.getElementById("ctrl");
  if (ctrl.classList.contains("fa-pause")) {
    song.pause();
    ctrl.classList.remove("fa-pause");
    ctrl.classList.add("fa-play");
  } else {
    song.play();
    ctrl.classList.remove("fa-play");
    ctrl.classList.add("fa-pause");
  }
}
const urlPara = new URLSearchParams(window.location.search);
const sidd = urlPara.get("sid");
if (sidd) {
  playPause();
}
song.addEventListener("timeupdate", function () {
  progress.value = song.currentTime;
});

progress.onchange = function () {
  song.currentTime = progress.value;
  if (!song.paused) {
    song.play();
  }
  ctrl.classList.remove("fa-play");
  ctrl.classList.add("fa-pause");
};
