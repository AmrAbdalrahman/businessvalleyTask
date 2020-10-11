<?php

//decode providers and it's hotels
function decodeProvidersJsonFile()
{
    //Providers JSON File
    $path = storage_path() . env('HOTELS_FILE_PATH');

    $jsonRequest = file_get_contents($path);
    //Decoding JSON
    return json_decode($jsonRequest);
}

//decode providers and it's hotels
function orderHotelsByRate($array)
{
    return collect($array)->sortByDesc('hotelRate');
}

//decode providers and it's hotels
function sendPushNotification($hotel)
{
    /*here will integrate with the sdk or call api to send broadcast message
     to all users with new hotel data added
    and then call this function after successfully added new hotel*/
}





