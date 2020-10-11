<?php

namespace App\Http\Controllers;


use App\Http\Resources\HotelResource;
use App\Repositories\HotelRepository;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    private $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function search(Request $request)
    {
        $validation = $this->hotelRepository->searchHotelsValidation($request);
        if ($validation) {
            return $validation;
        }
        $hotels = $this->hotelRepository->searchHotels($request);
        if (count($hotels) > 0) {
            return $this->apiResponse(HotelResource::collection($hotels));
        }
        return $this->notFoundResponse('no hotels found');
    }

}
