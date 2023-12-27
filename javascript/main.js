function loadPlayList(playlistId) {
  $.ajax({
    url: "load_playlist.php",
    method: "POST",
    data: {
      playlist_id: playlistId,
    },
    success: function (res) {
      $("#content").empty().html(res);
      console.log("loading");
    },
    error: function (xhr, status, error) {
      console.error("Error laoding playlist:", error);
    },
  });
}
function loadPlayListDetails(id) {
  loadPlayList(id);
  console.log(id);
}
var urlParams = new URLSearchParams(window.location.search);
var plid = urlParams.get("plid");
var sid = urlParams.get("sid");
function changeSong(sid, plid) {
  window.location.href = `index.php?plid=${plid}&sid=${sid}`;
}
function loadNextSong() {
  console.log("plid:", plid);
  console.log("sid:", sid);

  $.ajax({
    url: "play_control.php",
    method: "POST",
    data: {
      plid: plid,
      sid: sid,
      next: 1,
    },
    success: function (res) {
      console.log("Next song loaded successfully");
      console.log(res);
      changeSong(res.songid, plid);
    },
    error: function (xhr, status, error) {
      console.error("Error loading next song:", error);
    },
  });
}

function loadPreviousSong() {
  $.ajax({
    url: "play_control.php",
    method: "POST",
    data: {
      plid: plid,
      sid: sid,
    },
    success: function (res) {
      console.log("next song loaded successfully");
      console.log(res);
      changeSong(res.songid, plid);
    },
  });
}
