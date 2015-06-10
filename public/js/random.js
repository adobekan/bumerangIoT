function randomKey(field)
{
    var key = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz*/?-0123456789";
    for( var i=0; i < 35; i++ )
        key += possible.charAt(Math.floor(Math.random() * possible.length));

    $('[name="'+field+'"]')[0].value=key;

}