
$(document).ready(function () {


    $('.playlist-card').on('click', function () {
      
        var playlistId = $(this).data('playlist-id');

        
        loadSongsOfPlaylist(playlistId);
    });
    function loadSongsOfPlaylist(id) {
        console.log(id);
        
        $.ajax({
          url: "playlist_songs.php",
          type: "POST", 
          data:  {id: id} ,
          success: function (data) {
            $("#content").empty().html(data);
          },
          error: function (xhr, status, error) {
            console.error("Error:", error);
          }
        });
      }
      $("#homebtn").click(function(){
        getHome();
      })
});
function getHome(){
  $.ajax({
    url:"get_homepage.php",
    type:"GET",
    success:function(data)
    {
        $('#content').empty().html(data);
    }
})
}
$("#loginbtn").click(function()
{
  console.log("clicked");
  window.location.href = "login.php";
})
$("#profilebtn").click(function(){
getprofile();
})
function getprofile(){
  console.log("profile");
  $.ajax({
    url:"profile.php",
    type:"GET",
    success:function(data)
    {
      $('#content').empty().html(data);
    }
})
}
$("#playlistbtn").click(function()
{
  getPlaylist();
})
function getPlaylist(){
  $.ajax({
    url:"playlist.php",
    type:"GET",
    success:function(data)
    {
      $('#content').empty().html(data)
    }
  })
}
function getLogout(){
  window.location.href="logout.php";
}