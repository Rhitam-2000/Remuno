
function loadPlayList(playlistId){
    $.ajax({
        url:'load_playlist.php',
        method:'POST',
        data:{
            playlist_id:playlistId
        },
        success:function(res)
        {
            $('#content').empty().html(res);
            console.log("loading");
        },
        error:function(xhr,status,error)
        {
            console.error('Error laoding playlist:',error);
        }
    });
}
function loadPlayListDetails(id)
{
    loadPlayList(id);
    console.log(id);
}
