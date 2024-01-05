function getSongTable()
{
    console.log('song table');
    $.ajax({
        url:"get_songs_table.php",
        method:"GET",
        success:function(data)
        {
            console.log($('#content'));
            console.log(data);
            $("#content").empty().html(data);
        }
    })
}
function  getPlaylistTable()
{
    $.ajax({
        url:"get_playlist_table.php",
        method:"GET",
        success:function(data)
        {
            console.log($('#content'));
            console.log(data);
            $("#content").empty().html(data);
        }
    })
}
function getUserTable(){
    $.ajax({
        url:"get_user_table.php",
        method:"GET",
        success:function(data)
        {
            console.log($('#content'));
            console.log(data);
            $("#content").empty().html(data);
        }
    })
}

function songAdd(){
    $.ajax({
        url:"song_add_form.php",
        method:"GET",
        success:function(data)
        {
            console.log($('#content'));
            console.log(data);
            $("#content").empty().html(data);
        }
    }) 
}

