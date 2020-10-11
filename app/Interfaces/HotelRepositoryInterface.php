<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface HotelRepositoryInterface
{
    public function searchHotels(Request $request);

    #validation part
    public function searchHotelsValidation(Request $request);

}
