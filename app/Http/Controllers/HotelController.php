<?php

namespace App\Http\Controllers;


use App\Http\Resources\BestHotelResource;
use App\Http\Resources\HotelResource;
use App\Http\Resources\TopHotelResource;
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

    public function bestHotels(Request $request)
    {
        $validation = $this->hotelRepository->searchHotelsValidation($request);
        if ($validation) {
            return $validation;
        }
        $hotels = $this->hotelRepository->searchHotelsByProviders($request, 'BestHotels');
        if (count($hotels) > 0) {
            return $this->apiResponse(BestHotelResource::collection($hotels));
        }
        return $this->notFoundResponse('no hotels found');
    }

    public function topHotels(Request $request)
    {
        $validation = $this->hotelRepository->searchHotelsValidation($request);
        if ($validation) {
            return $validation;
        }
        $hotels = $this->hotelRepository->searchHotelsByProviders($request, 'TopHotel');
        if (count($hotels) > 0) {
            return $this->apiResponse(TopHotelResource::collection($hotels));
        }
        return $this->notFoundResponse('no hotels found');
    }

}
