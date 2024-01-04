
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
        $.ajax({
            url:"get_homepage.php",
            type:"GET",
            success:function(data)
            {
                $('#content').empty().html(data);
            }
        })
      })
});
$("#loginbtn").click(function()
{
  console.log("clicked");
  window.location.href = "login.php";
})
