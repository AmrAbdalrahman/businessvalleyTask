<?php

namespace App\Repositories;

use App\Interfaces\HotelRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class HotelRepository implements HotelRepositoryInterface
{
    use ApiResponseTrait;

    //search the hotels for all providers
    public function searchHotels(Request $request)
    {
        $providersData = decodeProvidersJsonFile();

        $matchedResults = [];
        //loop for providers
        foreach ($providersData as $key => $provider) {

            //get name of provider
            $providerName = $key;

            //loop for hotels per each providers
            foreach ($provider as $hotel) {

                if ($this->booleanHotelValidation($request, $hotel)) {
                    $hotelData = $hotel;
                    $hotelData->providerName = $providerName;
                    array_push($matchedResults, $hotelData);
                }

            }
        }
        return orderHotelsByRate($matchedResults);
    }


    #validation part
    public function searchHotelsValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d|after_or_equal:from_date',
            'city' => 'required',
            'adults_number' => 'required|numeric',

        ]);
    }

    public function booleanHotelValidation(Request $request, $hotel)
    {
        if (($request->from_date >= $hotel->from_date) &&
            ($request->to_date <= $hotel->to_date)
            && ($request->city == $hotel->city) &&
            ($request->adults_number == $hotel->adults_number)) {
            return true;
        }
        return false;
    }


}
