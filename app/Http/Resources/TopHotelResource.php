<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopHotelResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'hotelName' => $this->hotelName,
            'rate' => (string)$this->hotelRate,
            'price' => $this->fare,
            'discount' => isset($this->discount) ? $this->discount . '%' : null,
            'roomAmenities' => $this->amenities
        ];
    }

}
