<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'provider' => $this->providerName,
            'hotelName' => $this->hotelName,
            'fare' => $this->fare,
            'amenities' => $this->amenities,
        ];
    }

}
