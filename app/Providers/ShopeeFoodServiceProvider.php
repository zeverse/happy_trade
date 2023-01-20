<?php

namespace App\Providers;

use App\DTO\DishDetail;
use App\DTO\Vendor;
use App\Interfaces\VendorService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;


class ShopeeFoodServiceProvider extends ServiceProvider implements VendorService
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function searchRestaurant(string $keyword): array
    {
        // TODO: Implement searchRestaurant() method.
        return [];
    }

    public function getDishList(Vendor $vendor): array
    {
        // TODO: Implement getDishList() method.
        $deliveryId = $this->getDataFromURL($vendor->url);
        $response = Http::withHeaders(
            [
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
            ]
        )->get("https://gappapi.deliverynow.vn/api/dish/get_delivery_dishes", [
            "id_type" => 2,
            "request_id" => $deliveryId
        ])->json()["reply"]["menu_infos"];
        return [];

    }

    public function getDishDetail(): DishDetail
    {
        // TODO: Implement getDishDetail() method.
        return new DishDetail();
    }

    private function getDataFromURL(string $url): int
    {
        $response = Http::withHeaders([
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
        ])->get(
            "https://gappapi.deliverynow.vn/api/dish/get_delivery_dishes",
            [
                "url" => $url
            ]
        );

        return $response->json()["reply"]["delivery_id"];
    }
}
