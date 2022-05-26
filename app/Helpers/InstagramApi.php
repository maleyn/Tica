<?php
    
    $access = 'IGQVJXWFl1XzV6MktQX3JQSGw1NjRQRDhHTjB3ZAVdkXzdwXzBBZAFhaTzBwR1ltZAjJUYzBFbHoxbGRvTFZAUb2JVbUV5T19Fclc2SnFHc29HQWlwOWFrQjY2MXdlbUdNWUpfTmhzNDdNMVU0WXFRQm9wTQZDZD';
    $photo_count = 6;

    $url = "https://graph.instagram.com/me/media?fields=media_url,caption&access_token=" . $access . '&limit=' . $photo_count;
    $cache = hash('sha256' , $url).'.json';
    // Met en cache les data et l'utilise pendant 1 heure
    if(file_exists('app/Cache/' . $cache) && filemtime('app/Cache/' . $cache) > time() - 60*60){
        $jsonData = json_decode(file_get_contents('app/Cache/' . $cache));
    } else {
        $jsonData = json_decode((file_get_contents($url)));
        file_put_contents('app/Cache/' . $cache,json_encode($jsonData));
    }
    
    return $dataInsta = $jsonData->data;
    
?>


