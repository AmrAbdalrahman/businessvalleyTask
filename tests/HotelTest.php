<?php

class HotelTest extends TestCase
{
    /**
     * /api/hotel/search [POST]
     */
    public function testShouldReturnAllMatchedHotels()
    {

        $parameters = [
            'from_date' => '2020-10-20',
            'to_date' => '2020-10-31',
            'city' => 'CAI',
            'adults_number' => 2
        ];

        $this->post("api/hotel/search", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson([
            'status' => true,
            "error" => null,
        ]);
        $this->seeJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'provider',
                        'hotelName',
                        'fare',
                        'amenities',
                    ]
                ],
                'status',
                'error'
            ]
        );

    }


    /**
     * /api/hotel/bestHotels [POST]
     */
    public function testShouldReturnAllMatchedBestHotels()
    {

        $parameters = [
            'from_date' => '2020-10-20',
            'to_date' => '2020-10-31',
            'city' => 'SPX',
            'adults_number' => 4
        ];

        $this->post("api/hotel/bestHotels", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson([
            'status' => true,
            "error" => null,
        ]);
        $this->seeJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'hotel',
                        'hotelRate',
                        'hotelFare',
                        'roomAmenities',
                    ]
                ],
                'status',
                'error'
            ]
        );

    }

    /**
     * /api/hotel/bestHotels [POST]
     */
    public function testShouldReturnAllMatchedTopHotels()
    {

        $parameters = [
            'from_date' => '2020-10-20',
            'to_date' => '2020-10-31',
            'city' => 'HRG',
            'adults_number' => 4
        ];

        $this->post("api/hotel/topHotels", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson([
            'status' => true,
            "error" => null,
        ]);
        $this->seeJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'hotelName',
                        'rate',
                        'price',
                        'discount',
                        'roomAmenities',
                    ]
                ],
                'status',
                'error'
            ]
        );

    }

}
