<?php

namespace App\Common\Constant\Http\External\ShopeeFood;

class ShopeeFoodDishListRequest
{
    static array $headers = [
        'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:108.0) Gecko/20100101 Firefox/108.0',
        'Accept' => 'application/json, text/plain, */*',
        'Accept-Language' => 'en-GB,en;q=0.5',
        'Accept-Encoding' => 'gzip, deflate, br',
        'x-foody-client-id' => '',
        'x-foody-client-type' => '1',
        'x-foody-app-type' => '1004',
        'x-foody-client-version' => '3.0.0',
        'x-foody-api-version' => '1',
        'x-foody-client-language' => 'vi',
        'x-foody-access-token' => '',
        'Origin' => 'https://shopeefood.vn',
        'Connection' => 'keep-alive',
        'Referer' => 'https://shopeefood.vn/',
        'Sec-Fetch-Dest' => 'empty',
        'Sec-Fetch-Mode' => 'cors',
        'Sec-Fetch-Site' => 'cross-site',
        'TE' => 'trailers'
    ];

    static string $getDishListURL = "https://gappapi.deliverynow.vn/api/dish/get_delivery_dishes";
    static string $getIdFromURLURL = "https://gappapi.deliverynow.vn/api/delivery/get_from_url";

}
