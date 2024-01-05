var song = $("#song")[0]; // Get the native DOM element

song.ontimeupdate = function () {
  // $("#progress").val(this.currentTime);
  var currentTime = song.currentTime;
    var duration = song.duration;

    // Calculate the progress percentage
    var p = (currentTime / duration) * 100;

    // Update the progress bar value
    $("#progress").val(p);
};

$("#progress").on("input", function () {
  var seekTime = ($(this).val() / 100) * song.duration;

  song.currentTime = seekTime;

  if (!song.paused) {
    song.play();
  }

  $("#ctrl").removeClass("fa-play").addClass("fa-pause");
});



function playPause() {
  console.log("playpause");
  var ctrl = $("#ctrl");
  if (ctrl.hasClass("fa-pause")) {
    song.pause();
    ctrl.removeClass("fa-pause").addClass("fa-play");
  } else {
    song.play()
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
      console.log("hyy")
      data = JSON.parse(data);
      console.log(data);
      
      $("#song-source").attr("src", data.path);

      $("#player").attr("data-songid", id);
      $("#player").attr("data-playlistid", pid);
      console.log($('song-name'));
      console.log($('song-artist'));
      $("#song-name").text(data.sname);
      $('#song-artist').text(data.sartist)
      song.load();
      $("#progress").attr("max",song.duration)
      playPause();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error fetching song details:", textStatus, errorThrown);
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
      $("#song-source").attr("src", response);
      $("#song")[0].dispatchEvent(new Event("canplaythrough"));
      $("#player").data("songid", response);
      $("#player").data("playlistid", plid);
      playSong(response,plid);
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
    url: "get_previous_song.php",
    method: "POST",
    data: {
      id: id,
      plid: plid,
    },
    success: function (response) {
      console.log(response);
      // $("#player").attr("data-songid", response);
      $("#song-source").attr("src", response);
      $("#song")[0].dispatchEvent(new Event("canplaythrough"));
      $("#player").data("songid", response);
      $("#player").data("playlistid", plid);
      playSong(response,plid);
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
    },
  });
}

// Reset any additional player state here
