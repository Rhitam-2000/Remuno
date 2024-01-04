var song = $("#song")[0]; // Get the native DOM element

song.ontimeupdate = function () {
  $("#progress").val(this.currentTime);
};

$("#progress").on("input", function () {
  song.currentTime = $(this).val();

  if (!song.paused) {
    song.play();
  }

  $("#ctrl").removeClass("fa-play").addClass("fa-pause");
});

function playPause() {
  var ctrl = $("#ctrl");
  if (ctrl.hasClass("fa-pause")) {
    song.pause();
    ctrl.removeClass("fa-pause").addClass("fa-play");
  } else {
    if (song.paused) {
      song.load(); // Reload the media element if it's paused
    }
    song.play().catch((error) => {
      // Handle the promise rejection (e.g., log the error)
      console.error("Play promise rejected:", error);
    });
    ctrl.removeClass("fa-play").addClass("fa-pause");
  }
}

function playSong(id, pid) {
  console.log("playSong called with id:", id, "and pid:", pid);
  song.pause();
  $.ajax({
    url: "get_song_details.php",
    method: "POST",
    data: {
      id: id,
      pid: pid,
    },
    success: function (data) {
      data = JSON.parse(data);
      $("#song-source").attr("src", data.path);
      $("#song").on("canplaythrough", function () {
        song.currentTime = 0;
        $("#player").attr("data-songid", id);
        $("#player").attr("data-playlistid", pid);
        playPause();
      });
    },
  });
}

function loadNextSong() {
  var plid = $("#player").data("playlistid");
  var id = $("#player").data("songid");

  $.ajax({
    url: "get_next_song.php",
    method: "POST",
    data: {
      id: id,
      plid: plid,
    },
    success: function (response) {
      console.log(response);
      // Assuming response contains the next song details
      var nextSong = JSON.parse(response);
      $("#song-source").attr("src", nextSong.path);
      $("#song")[0].dispatchEvent(new Event("canplaythrough"));
      $("#player").attr("data-songid", nextSong.id);
      $("#player").attr("data-playlistid", plid);
      playPause();
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
    },
  });
}


function loadPreviousSong() {
   plid = $("#player").data("playlistid");
   id = $("#player").data("songid");

  const data = $.ajax({
    url: "get_next_song.php",
    method: "POST",
    data: {
      id: id,
      plid: plid,
    },
    success: function (response) {
      console.log(response);
      // $("#player").attr("data-songid", response);
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
    },
  });
}

// Reset any additional player state here
