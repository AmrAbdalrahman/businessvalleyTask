<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BestHotelResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'hotel' => $this->hotelName,
            'hotelRate' => $this->hotelRate,
            'hotelFare' => round($this->fare, 2),
            'roomAmenities' => implode(', ', $this->amenities)
        ];
    }

}
