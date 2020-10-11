<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface HotelRepositoryInterface
{
    public function searchHotels(Request $request);

    public function searchHotelsByProviders(Request $request, $searchingProviderName);

    #validation part
    public function searchHotelsValidation(Request $request);

}
