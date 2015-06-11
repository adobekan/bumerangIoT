var lastID=0;
(function worker(num)
{  num= num || 0;
    if(channelIDs.length>0)
    {
        if(num>=channelIDs.length )
        {
            setTimeout(function(){
                worker(0);}, 5000);
        }
        else
        {
            $.ajax({
                url: home+'/channels/' + channelIDs[num].id + '/latest',
                success: function (data) {
                    html(JSON.parse(data));

                },
                complete: function () {
                    // Schedule the next request when the current one is complete
                    worker(++num);
                }
            });
        }
    }
})();

function html(data)
{
    if(data.length) {
        if ($('#data' + data[0].channel_id).length) {
            updateHtml(data);
        }
        else {
            addHtml(data);
        }
    }
}


function updateHtml(data)
{
    if($('#data'+data[0].channel_id)[0].innerHTML != data[0].data)
    {
        $('#data'+data[0].channel_id)[0].innerHTML = data[0].data;
        $('#date'+data[0].channel_id)[0].innerHTML = data[0].created_at;
        $('#data'+data[0].channel_id).fadeTo(100, 0.1).fadeTo(200, 1.0);  //blink effect
        $('#date'+data[0].channel_id).fadeTo(100, 0.1).fadeTo(200, 1.0);  //blink effect

    }
}


function addHtml(data)
{
    if(data.length)
    {
        $('#last_data')[0].innerHTML=$('#last_data')[0].innerHTML + '<div class="panel panel-primary">' +
        '<div class="panel-footer small-panel"><b>Channel ID - '+data[0].channel_id+'</b><span id="date'+ data[0].channel_id+'" class="pull-right">' +
        '['+ data[0].created_at+']</span><h4 id="data'+ data[0].channel_id+'" class="orange-title">'+ data[0].data+'</h4></div></div>';
    }

}

function removeHtml()
{
    $('#last_data')[0].innerHTML="";
}