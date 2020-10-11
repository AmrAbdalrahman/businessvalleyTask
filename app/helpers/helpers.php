<?php

//decode providers and it's hotels
function decodeProvidersJsonFile()
{
    //Providers JSON File
    $path = storage_path() . "\json\hotels.json";

    $jsonRequest = file_get_contents($path);
    //Decoding JSON
    return json_decode($jsonRequest);
}

//decode providers and it's hotels
function orderHotelsByRate($array)
{
    return collect($array)->sortByDesc('hotelRate');
}





