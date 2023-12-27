
let song = document.getElementById("song");
let progress = document.getElementById("progress");
let ctrl = document.getElementById("ctrl");

song.onloadedmetadata = function () {
    progress.max = song.duration;
    progress.value = song.currentTime;
};

function playPause() {
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

song.addEventListener('timeupdate', function() {
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

function changeSong(path) {
   
  $("#song-source").attr("src", path);
  song.load(); 
  song.play(); 
  ctrl.classList.remove("fa-play");
  ctrl.classList.add("fa-pause");
}
